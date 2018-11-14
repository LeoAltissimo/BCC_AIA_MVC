<?php
/**
 * home - Controller Da Home
 * @author Léo Altíssimo Neto
 */
class HomeController extends MainController
{

	//Carrega a página "/views/home/index.php"
    public function index() {

		$this->title = 'Ciências da Computação UNEMAT';
		
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
		$modeloMenu =   $this->load_model('menu/menu-model');
		$modeloSlider = $this->load_model('slider/slider-model');
        $modeloSobre =  $this->load_model('sobre/sobre-model');
        $modeloEvento = $this->load_model('muraleventos/muraleventos-model');
        $modeloDisciplinas = $this->load_model('muraldisciplinas/muraldisciplinas-model');
        $modeloProfessores = $this->load_model('muralprofessores/muralprofessores-model');
        $modeloFotos       = $this->load_model('muralfotos/muralfotos-model');
        $modelFooter       = $this->load_model('footer/footer-model');
		
		/** Carrega os arquivos do view **/
        require ABSPATH . '/views/_includes/header.php';

        require ABSPATH . '/views/_includes/menu.php';
        require ABSPATH . '/views/slider/slider-view.php';
        require ABSPATH . '/views/sobre-curso/sobrecurso-view.php';
        require ABSPATH . '/views/mural-eventos/mural-eventos-view.php';
        require ABSPATH . '/views/mural-disciplinas/mural-disciplinas-view.php';
        require ABSPATH . '/views/mural-professores/mural-professores-view.php';
        require ABSPATH . '/views/mural-fotos/mural-fotos-view.php';

        require ABSPATH . '/views/_includes/footer.php';
		
    }
}