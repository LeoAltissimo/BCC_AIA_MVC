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
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Professores';
        
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        $modeloDocente = $this->load_model('docente/docente-model');

        if( $_POST ) {
            $nome_final = null;
            if( $_FILES ) {
                $_UP['pasta'] = './views/_images/';
                $_UP['tamanho'] = 1024*1024*100; //5mb
                $_UP['extensoes'] = array('jpg');

                //Faz a verificação da extensao do arquivo
                $extensao = explode('.', $_FILES['arquivo']['name']);
                if(array_search($extensao[1], $_UP['extensoes']) === false) {		
                    echo "ERROOOOUUU";
                } else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
                    echo "ERROOOOUUU";
                } else {
                    $nome_final = time().'.jpg';
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final);
                }
            }

            $modeloDocente->postProfessor( $_POST, $nome_final );
            $this->professores();
            return;
        } 
        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-professor/edit-professor-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
    }

    //Carrega a página "/views/amdmin/eventos"
    public function eventos() {

        // Verifica se o usuário está logado
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Eventos';
        
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        $modeloEvento = $this->load_model('muraleventos/muraleventos-model');
        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/lista-eventos/lista-eventos-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
        
    }

    //Carrega a página "/views/amdmin/eventoEdit/id.php"
    public function eventoEdit() {
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Eventos';
        
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        $modeloEvento = $this->load_model('evento/evento-model');


        if( $_POST ) {
            $nome_final = null;
            if( $_FILES) {
                $_UP['pasta'] = './views/_images/';
                $_UP['tamanho'] = 1024*1024*100; //5mb
                $_UP['extensoes'] = array('jpg');

                //Faz a verificação da extensao do arquivo
                $extensao = explode('.', $_FILES['capa-evento']['name']);
                if(array_search($extensao[1], $_UP['extensoes']) === false) {		
                    echo "ERROOOOUUU";
                } else if ($_UP['tamanho'] < $_FILES['capa-evento']['size']){
                    echo "ERROOOOUUU";
                } else {
                    $nome_final = time().'.jpg';
                    move_uploaded_file($_FILES['capa-evento']['tmp_name'], $_UP['pasta']. $nome_final);
                }
            }
            
            $modeloEvento->postEvento( $_POST, $nome_final );
            $this->eventos();
            return;
        } 
        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-evento/edit-evento-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
    }

    //Carrega a página "/views/amdmin/eventoEditComissoes/id.php"
    public function eventoEditComissoes() {
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Adicionar Comissão';
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        $modeloEvento = $this->load_model('evento/evento-model');

        if( $_POST ){
            $modeloEvento->postEventoComissao( $_POST );
            $this->eventos();
            return;
        }

        if( $parametros == null ) {
            $this->index();
            return;
        }

        if( isset($parametros[1]) )
            $vals = $modeloEvento->getComissao($parametros[1]);

        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-evento-comissoes/edit-evento-comissoes-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
    }

    //Carrega a página "/views/amdmin/eventoEditAcontecimento/id.php"
    public function eventoEditAcontecimento() {
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Comissão';
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $modeloEvento = $this->load_model('evento/evento-model');
        
        if( $_POST ){
            $modeloEvento->postEventoAcontecimento( $_POST );
            $this->eventos();
            return;
        }

        if( $parametros == null ) {
            $this->index();
            return;
        }

        if( isset($parametros[1]) )
            $vals = $modeloEvento->getAcontecimento($parametros[1]);

        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-evento-acontecimento/edit-evento-acontecimento-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
    }

    //Carrega a página "/views/amdmin/eventoEditTrabalho/id.php"
    public function eventoEditTrabalho() {
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Adicionar Trabalho';
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        if( $parametros == null ) {
            $this->index();
            return;
        }

        $modeloEvento = $this->load_model('evento/evento-model');

        if( $_POST ) {
            $nome_final = null;
            if( $_FILES) {
                $_UP['pasta'] = './files/';
                $_UP['tamanho'] = 1024*1024*100; //5mb
                $_UP['extensoes'] = array('pdf');

                //Faz a verificação da extensao do arquivo
                $extensao = explode('.', $_FILES['trabalhoCaminho']['name']);
                if(array_search($extensao[1], $_UP['extensoes']) === false) {		
                    echo "ERROOOOUUU";
                } else if ($_UP['tamanho'] < $_FILES['trabalhoCaminho']['size']){
                    echo "ERROOOOUUU";
                } else {
                    $nome_final = time().'.pdf';
                    move_uploaded_file($_FILES['trabalhoCaminho']['tmp_name'], $_UP['pasta']. $nome_final);
                }
            }
            
            $modeloEvento->postEventoTrabalho( $_POST, $nome_final );
            $this->eventos();
            return;
        } 

        if( isset($parametros[1]) )
            $vals = $modeloEvento->getTrabalho($parametros[1]);

        echo $vals["trabalhoTitulo"];

        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-evento-trabalho/edit-evento-trabalho-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
    }
}
