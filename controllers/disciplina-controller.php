<?php
/**
 * home - Controller Da Página de Disciplinas
 * @author Léo Altíssimo Neto
 */
class DisciplinaController extends MainController{
    
    public function index(){
		
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : null;

        if( !$parametros ){
            $this->listaDisciplinas();
            return;
        }
            	
		$modeloMenu       = $this->load_model('menu/menu-model');
		$modeloDisciplina = $this->load_model('disciplina/disciplina-model');
        $modelFooter      = $this->load_model('footer/footer-model');

		/** Carrega os arquivos do view **/
        require ABSPATH . '/views/_includes/header.php';
        require ABSPATH . '/views/_includes/menu.php';
        
        if( $modeloDisciplina->disciplina == null )
            require ABSPATH . '/includes/404.php';
        else
        require ABSPATH . '/views/disciplina/disciplina-view.php';

        require ABSPATH . '/views/_includes/footer.php';
    }

    public function listaDisciplinas(){

        $modeloMenu              = $this->load_model('menu/menu-model');
		$modeloListaDisciplinas  = $this->load_model('muraldisciplinas/muraldisciplinas-model');
        $modelFooter             = $this->load_model('footer/footer-model');

		/** Carrega os arquivos do view **/
        require ABSPATH . '/views/_includes/header.php';
        require ABSPATH . '/views/_includes/menu.php';
        require ABSPATH . '/views/lista-disciplinas/lista-disciplinas-view.php';
        require ABSPATH . '/views/_includes/footer.php';

    }
}