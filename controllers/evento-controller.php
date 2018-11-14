<?php
/**
 * home - Controller Da Página de Eventos
 * @author Léo Altíssimo Neto
 */
class EventoController extends MainController{
    

    public function index(){
		
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : null;

        if( !$parametros ){
            $this->listaEventos();
            return;
        }
            	
		$modeloMenu       = $this->load_model('menu/menu-model');
		$modeloEvento     = $this->load_model('evento/evento-model');
        $modelFooter      = $this->load_model('footer/footer-model');

		/** Carrega os arquivos do view **/
        require ABSPATH . '/views/_includes/header.php';
        require ABSPATH . '/views/_includes/menu.php';
        
        if( $modeloEvento->evento == null )
            require ABSPATH . '/includes/404.php';
        else
            require ABSPATH . '/views/evento/evento-view.php';

        require ABSPATH . '/views/_includes/footer.php';
    }

    public function listaEventos(){

        $modeloMenu         = $this->load_model('menu/menu-model');
		$modeloListaEvento  = $this->load_model('muraleventos/muraleventos-model');
        $modelFooter        = $this->load_model('footer/footer-model');
		
		/** Carrega os arquivos do view **/
        require ABSPATH . '/views/_includes/header.php';
        require ABSPATH . '/views/_includes/menu.php';
        require ABSPATH . '/views/lista-eventos/lista-eventos-view.php';
        require ABSPATH . '/views/_includes/footer.php';

    }

}