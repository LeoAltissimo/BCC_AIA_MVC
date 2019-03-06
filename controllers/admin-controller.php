<?php
/**
 * home - Controller Da Home
 * @author Léo Altíssimo Neto
 */
class AdminController extends MainController
{

	//Carrega a página "/views/amdmin/index.php"
    public function index() {

        // Verifica se o usuário está logado
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

		$this->title = 'DashBoard';
		
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
		
		/** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';

        require ABSPATH . '/views/admin/_includes/footer.php';
		
    }

    public function login() {

        if( isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ){
            $this->index();
            return;
        }
            
        $this->title = 'Login';
    
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
    
        $modeloMenu =   $this->load_model('menu/menu-model');
        $modelFooter       = $this->load_model('footer/footer-model');
        $senhaIncorreta = false;
        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/_includes/header.php';
        require ABSPATH . '/views/_includes/menu.php';
        require ABSPATH . '/views/login-form/login-form-view.php';

        require ABSPATH . '/views/_includes/footer.php';
    }

    //Carrega a página "/views/amdmin/professores.php"
    public function professores() {

        // Verifica se o usuário está logado
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Professores';
        
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        $modeloProfessores = $this->load_model('muralprofessores/muralprofessores-model');
        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/lista-professores/lista-professores-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
        
    }

    //Carrega a página "/views/amdmin/professorEdit/id.php"
    public function professorEdit() {

        // Verifica se o usuário está logado
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        if( $_POST ){
            
        } 

        $this->title = 'Professores';
        
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        $modeloDocente = $this->load_model('docente/docente-model');
        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-professor/edit-professor-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
    }
}
