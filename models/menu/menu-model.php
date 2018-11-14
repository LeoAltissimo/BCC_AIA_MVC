<?php

class MenuModel extends MainModel{

	public $cidade;

	public $estado;

	public $contato;

	public $email;

	public $facebook;


	public function __construct( $db = false, $controller = null ){
		$this->db = $db;
		$this->controller = $controller;
		$this->userdata = $this->controller->userdata;
		
		$this->getDadosMenu();
	}

	public function getDadosMenu(){

		$query = "SELECT enderecocurso.enderecoCursoCidade, enderecocurso.enderecoCursoEstado, telcurso.telCursoTel, emailcurso.emailCursoEmail FROM curso JOIN enderecocurso, telcurso, emailcurso";

		$resultQuery = $this->db->query( $query );

		if( $resultQuery ){

			$linha = $resultQuery->fetch_array( MYSQLI_ASSOC );
			
			$this->cidade =  $linha[ 'enderecoCursoCidade' ];
			$this->estado =  $linha['enderecoCursoEstado'];
			$this->contato = $linha['telCursoTel'];
			$this->email =   $linha['emailCursoEmail'];

			return true;
		}
		
		return false;
	}

}