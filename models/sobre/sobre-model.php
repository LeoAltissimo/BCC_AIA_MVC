<?php 
/*
 * Model para O modulo sobre as informações do curso
 * @author Léo Altíssimo Neto
 */

class SobreModel extends MainModel{

	public $curso = array();

	public function __construct( $db = fasle, $controller = NULL ){

		$this->db = $db;
		$this->controller = $controller;
		$this->parametros = $this->controller->parametros;
		$this->userdata = $this->controller->userdata;

		if( ! $this->getSobre() )
			$this->curso = NULL;
	}

	public function getSobre(){

		$query ="SELECT curso.cursoDescricao FROM curso WHERE curso.cursoId='2'";

		$queryResult = $this->db->query( $query );

		if( $queryResult ){
			$this->curso = $queryResult->fetch_array( MYSQLI_ASSOC );

			return true;
		}

		return false;
	}

}