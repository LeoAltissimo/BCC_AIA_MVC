<?php
/**
 * UserLogin - Manipula os dados de usuários
 *
 * Manipula os dados de usuários, faz login e logout, verifica permissões e 
 * redireciona página para usuários logados.
 *
 * @package CoreMVC
 * @since 0.1
 */
class UserLogin
{
	/**
	 * Usuário logado ou não
	 *
	 * Verdadeiro se ele estiver logado.
	 *
	 * @public
	 * @access public
	 * @var bol
	 */
	public $logged_in;
	
	/**
	 * Dados do usuário
	 *
	 * @public
	 * @access public
	 * @var array
	 */
	public $userdata;
	
	/**
	 * Mensagem de erro para o formulário de login
	 *
	 * @public
	 * @access public
	 * @var string
	 */
	public $login_error;
	
	/**
	 * Verifica o login
	 *
	 * Configura as propriedades $logged_in e $login_error. Também
	 * configura o array do usuário em $userdata
	 */
	public function check_userlogin () {
	
		if ( isset( $_SESSION['userdata'] )
			 && ! empty( $_SESSION['userdata'] )
			 && is_array( $_SESSION['userdata'] ) 
			 && ! isset( $_POST['userdata'] )
			) { 
			// Configura os dados do usuário
			$userdata = $_SESSION['userdata'];
			
			// Garante que não é HTTP POST
			$userdata['post'] = false;
		}

		if ( isset( $_POST['userdata'] )
			 && ! empty( $_POST['userdata'] )
			 && is_array( $_POST['userdata'] ) 
			) {
			// Configura os dados do usuário
			$userdata = $_POST['userdata'];
			
			// Garante que é HTTP POST
			$userdata['post'] = true;
		}

		if ( ! isset( $userdata ) || ! is_array( $userdata ) ) {
			$this->logout();
			return;
		}
		
		if ( $userdata['post'] === true ) {
			$post = true;
		} else {
			$post = false;
		}

		unset( $userdata['post'] );

		if ( empty( $userdata ) ) {
			$this->logged_in = false;
			$this->login_error = null;

			$this->logout();
			return;
		}
		
		extract( $userdata );
		
		if ( ! isset( $user ) || ! isset( $user_password ) ) {
			$this->logged_in = false;
			$this->login_error = null;

			$this->logout();
			return;
		}
		
		$query = $this->db->query( 
			'SELECT * FROM `users` WHERE user = "'.$user.'" LIMIT 1'
		);
		
		if ( ! $query ) {
			$this->logged_in = false;
			$this->login_error = 'Internal error.';
			
			$this->logout();
			return;
		}
		
		$fetch = $query->fetch_array(MYSQLI_ASSOC);

		$user_id = (int) $fetch['id'];
		
		if ( empty( $user_id ) ){
			$this->logged_in = false;
			$this->login_error = 'User do not exists.';
		
			$this->logout();
			return;
		}
		
		if (  base64_encode( $user_password . "Q@E#TBilinao" ) ==  $fetch['user_password'] ) {
			
			if ( $post ) {
				session_regenerate_id();
				$session_id = session_id();

				$_SESSION['userdata'] = $fetch;
				$_SESSION['userdata']['user_password'] = $user_password;
				$_SESSION['userdata']['user_session_id'] = $session_id;
				
				$query = $this->db->query(
					'UPDATE users SET user_session_id = ? WHERE user_id = ?',
					array( $session_id, $user_id )
				);
			}
				
			$_SESSION['userdata']['user_permissions'] = 'any';

			$this->logged_in = true;
			$this->userdata = $_SESSION['userdata'];
			
			if ( isset( $_SESSION['goto_url'] ) ) {
				$goto_url = urldecode( $_SESSION['goto_url'] );

				unset( $_SESSION['goto_url'] );

				echo '<meta http-equiv="Refresh" content="0; url=' . $goto_url . '">';
				echo '<script type="text/javascript">window.location.href = "' . $goto_url . '";</script>';
				//header( 'location: ' . $goto_url );
			}
			
			return;
		} else {
			$this->logged_in = false;
			$this->login_error = 'A Senha não esta correta';

			$this->logout();
			return;
		}
	}
	
	/**
	 * Logout
	 *
	 * Desconfigura tudo do usuárui.
	 *
	 * @param bool $redirect Se verdadeiro, redireciona para a página de login
	 * @final
	 */
	protected function logout( $redirect = false ) {
		// Remove all data from $_SESSION['userdata']
		$_SESSION['userdata'] = array();
		
		// Only to make sure (it isn't really needed)
		unset( $_SESSION['userdata'] );
		
		// Regenerates the session ID
		session_regenerate_id();
		
		if ( $redirect === true ) {
			// Send the user to the login page
			$this->goto_login();
		}
	}
	
	/**
	 * Vai para a página de login
	 */
	protected function goto_login() {
		// Verifica se a URL da HOME está configurada
		if ( defined( 'HOME_URI' ) ) {
			// Configura a URL de login
			$login_uri  = HOME_URI . '/login/';
			
			// A página em que o usuário estava
			$_SESSION['goto_url'] = urlencode( $_SERVER['REQUEST_URI'] );
			
			// Redireciona
			echo '<meta http-equiv="Refresh" content="0; url=' . $login_uri . '">';
			echo '<script type="text/javascript">window.location.href = "' . $login_uri . '";</script>';
			// header('location: ' . $login_uri);
		}
		
		return;
	}
	
	/**
	 * Envia para uma página qualquer
	 *
	 * @final
	 */
	final protected function goto_page( $page_uri = null ) {
		if ( isset( $_GET['url'] ) && ! empty( $_GET['url'] ) && ! $page_uri ) {
			// Configura a URL
			$page_uri  = urldecode( $_GET['url'] );
		}
		
		if ( $page_uri ) { 
			// Redireciona
			echo '<meta http-equiv="Refresh" content="0; url=' . $page_uri . '">';
			echo '<script type="text/javascript">window.location.href = "' . $page_uri . '";</script>';
			//header('location: ' . $page_uri);
			return;
		}
	}
	
	/**
	 * Verifica permissões
	 *
	 * @param string $required A permissão requerida
	 * @param array $user_permissions As permissões do usuário
	 * @final
	 */
	final protected function check_permissions( 
		$required = 'any', 
		$user_permissions = array('any')
	) {
		if ( ! is_array( $user_permissions ) ) {
			return;
		}

		// Se o usuário não tiver permissão
		if ( ! in_array( $required, $user_permissions ) ) {
			// Retorna falso
			return false;
		} else {
			return true;
		}
	}
}