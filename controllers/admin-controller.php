<?php
/**
 * home - Controller Da Home
 * @author Léo Altíssimo Neto
 */
class AdminController extends MainController
{

	//Carrega a página "/views/home/index.php"
    public function index() {

        if( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false ){
            $this->login();
            return;
        }

		$this->title = 'Ciências da Computação UNEMAT';
		
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
		$modeloMenu =   $this->load_model('menu/menu-model');
        $modelFooter       = $this->load_model('footer/footer-model');
		
		/** Carrega os arquivos do view **/
        require ABSPATH . '/views/_includes/header.php';

        require ABSPATH . '/views/_includes/menu.php';

        require ABSPATH . '/views/_includes/footer.php';
		
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
        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/_includes/header.php';

        require ABSPATH . '/views/_includes/menu.php';

        require ABSPATH . '/views/_includes/footer.php';
    }
}
