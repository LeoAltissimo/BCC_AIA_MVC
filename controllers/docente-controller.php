<?php
/**
 * home - Controller Da Página de Docentes
 * @author Léo Altíssimo Neto
 */
class DocenteController extends MainController{
    

    public function index(){
		
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : null;

        if( !$parametros ){
            $this->listaDocentes();
            return;
        }
            	
		$modeloMenu       = $this->load_model('menu/menu-model');
		$modeloDocente    = $this->load_model('docente/docente-model');
        $modelFooter      = $this->load_model('footer/footer-model');

		/** Carrega os arquivos do view **/
        require ABSPATH . '/views/_includes/header.php';
        require ABSPATH . '/views/_includes/menu.php';
        
        if( $modeloDocente->professor == null )
            require ABSPATH . '/includes/404.php';
        else
           require ABSPATH . '/views/docente/docente-view.php';

        require ABSPATH . '/views/_includes/footer.php';
    }

    public function listaDocentes(){

        $modeloMenu         = $this->load_model('menu/menu-model');
		$modeloListaDocentes  = $this->load_model('muralprofessores/muralprofessores-model');
        $modelFooter        = $this->load_model('footer/footer-model');
		
		/** Carrega os arquivos do view **/
        require ABSPATH . '/views/_includes/header.php';
        require ABSPATH . '/views/_includes/menu.php';
        require ABSPATH . '/views/lista-professores/lista-professores-view.php';
        require ABSPATH . '/views/_includes/footer.php';

    }

}