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
        
        $modeloCurso = $this->load_model('sobre/sobre-model');
        $modeloSlides = $this->load_model('slider/slider-model');
        $modeloMural = $this->load_model('muralfotos/muralfotos-model');

        if($_POST){
            $modeloCurso->setCurso($_POST);
            $modeloCurso->refresh();
        }
		
		/** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-curso/edit-curso-view.php';
        require ABSPATH . '/views/admin/lista-slides/lista-slides-view.php';
        require ABSPATH . '/views/admin/lista-mural-fotos/lista-mural-fotos-view.php';
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

    public function exit() {
        $this->logout();
        $this->login();
        return;

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

    //Carrega a página "/views/amdmin/slideEdit.php"
    public function slideEdit() {

        // Verifica se o usuário está logado
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Slide';
        
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        $modeloSlides = $this->load_model('slider/slider-model');


        if( $_POST ) {
            $nome_final = isset($_POST['homeSlideCaminho']) ? $_POST['homeSlideCaminho'] : NULL;
            if( $_FILES) {
                $_UP['pasta'] = './views/_images/';
                $_UP['tamanho'] = 1024*1024*100; //5mb
                $_UP['extensoes'] = array('jpg');

                //Faz a verificação da extensao do arquivo
                $extensao = explode('.', $_FILES['arquivo']['name']);
                if( sizeof($extensao) === 2 )
                    if(array_search($extensao[1], $_UP['extensoes']) === false) {		
                        echo "ERROOOOUUU";
                    } else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
                        echo "ERROOOOUUU";
                    } else {
                        $nome_final = time().'.jpg';
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final);
                    }
            }
            $modeloSlides->setSlide($_POST, $nome_final);
            $modeloSlides->refresh();
        }

        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-slide/edit-slide-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
    }

 //Carrega a página "/views/amdmin/muralEdit.php"
 public function muralEdit() {

    // Verifica se o usuário está logado
    if ( ! $this->logged_in ) {
        $this->logout();
        $this->login();
        return;
    }

    $this->title = 'Mural de Fotos';
    
    $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

    $modeloMural = $this->load_model('muralfotos/muralfotos-model');


    if( $_POST ) {
        $nome_final = isset($_POST['muralFotoCaminho']) ? $_POST['muralFotoCaminho'] : NULL;
        if( $_FILES) {
            $_UP['pasta'] = './views/_images/';
            $_UP['tamanho'] = 1024*1024*100; //5mb
            $_UP['extensoes'] = array('jpg');

            //Faz a verificação da extensao do arquivo
            $extensao = explode('.', $_FILES['arquivo']['name']);
            if( sizeof($extensao) === 2 )
                if(array_search($extensao[1], $_UP['extensoes']) === false) {		
                    echo "ERROOOOUUU";
                } else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
                    echo "ERROOOOUUU";
                } else {
                    $nome_final = time().'.jpg';
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final);
                }
        }
        $modeloMural->setMural($_POST, $nome_final);
        $modeloMural->refresh();
    }

    /** Carrega os arquivos do view **/
    require ABSPATH . '/views/admin/_includes/header.php';
    require ABSPATH . '/views/admin/edit-mural/edit-mural-view.php';
    require ABSPATH . '/views/admin/_includes/footer.php';
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
            $nome_final = $modeloEvento->evento['eventoCapa'];
            if( $_FILES) {
                $_UP['pasta'] = './views/_images/';
                $_UP['tamanho'] = 1024*1024*100; //5mb
                $_UP['extensoes'] = array('jpg');

                //Faz a verificação da extensao do arquivo
                $extensao = explode('.', $_FILES['capa-evento']['name']);
                if( sizeof($extensao) === 2 )
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
            if( $_FILES['trabalho-caminho']['name']) {
                $_UP['pasta'] = './files/';
                $_UP['tamanho'] = 1024*1024*100; //5mb
                $_UP['extensoes'] = array('pdf');
                
                //Faz a verificação da extensao do arquivo
                if( !file_exists($_UP['pasta'] . $_FILES['trabalho-caminho']['name'] ) ){
                    $extensao = explode('.', $_FILES['trabalho-caminho']['name']);
                    if(array_search($extensao[1], $_UP['extensoes']) === false) {		
                        echo "ERROOOOUUU 1";
                    } else if ($_UP['tamanho'] < $_FILES['trabalho-caminho']['size']){
                        echo "ERROOOOUUU 2";
                    } else {
                        $nome_final = time().'.pdf';
                        move_uploaded_file($_FILES['trabalho-caminho']['tmp_name'], $_UP['pasta']. $nome_final);
                    }
                } else {
                    $nome_final = $_FILES['trabalho-caminho']['name'];
                }
            }

            $modeloEvento->postEventoTrabalho( $_POST, $nome_final );
            $this->eventos();
            return;
        } 

        if( isset($parametros[1]) )
            $vals = $modeloEvento->getTrabalho($parametros[1]);

        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-evento-trabalho/edit-evento-trabalho-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
    }

    //Carrega a página "/views/amdmin/disciplinas.php"
    public function disciplinas() {

        // Verifica se o usuário está logado
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Disciplinas';
        
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        $modeloDisciplinas = $this->load_model('muraldisciplinas/muraldisciplinas-model');
        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/lista-disciplinas/lista-disciplinas-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
        
    }

    //Carrega a página "/views/amdmin/disciplinaEdit/id.php"
    public function disciplinaEdit() {
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Disciplinas';
        
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        $modeloDisciplinas = $this->load_model('disciplina/disciplina-model');

        if( $_POST ) {
            $modeloDisciplinas->postDisciplina( $_POST );
            $this->disciplinas();
            return;
        } 
        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-disciplinas/edit-disciplinas-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
    } 

    //Carrega a página "/views/amdmin/disciplinaEdit/id.php"
    public function disciplinaEditBibliografia() {
        if ( ! $this->logged_in ) {
            $this->logout();
            $this->login();
            return;
        }

        $this->title = 'Bibliografia';
        
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
        
        $modeloDisciplinas = $this->load_model('disciplina/disciplina-model');

        if( $parametros[1] !== 'N' ) {
            $modeloDisciplinas->getLivro( $parametros[1] );
        }

        if( $_POST ) {
            $modeloDisciplinas->postDisciplinaBibliografia( $_POST );
            $this->disciplinas();
            return;
        } 
        
        /** Carrega os arquivos do view **/
        require ABSPATH . '/views/admin/_includes/header.php';
        require ABSPATH . '/views/admin/edit-disciplinas-bibliografia/edit-disciplinas-bibliografia-view.php';
        require ABSPATH . '/views/admin/_includes/footer.php';
    } 
}
