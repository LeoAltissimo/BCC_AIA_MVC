<?php 
/*
 * Model para O modulo sobre as informações do curso
 * @author Léo Altíssimo Neto
 */

class SobreModel extends MainModel{

	public $curso = array();
	public $email = array();
	public $contato = array();
	public $endereco = array();

	public function __construct( $db = fasle, $controller = NULL ){
		$this->db = $db;
		$this->controller = $controller;
		$this->parametros = $this->controller->parametros;
		$this->userdata = $this->controller->userdata;

		if( ! $this->getSobre() ) {
			$this->curso = NULL;
			$this->email = NULL;
			$this->contato = NULL;
			$this->endereco = NULL;
		}
		else {
			$this->getEmail();
			$this->getTel();
			$this->getEndereco();
		}
	}
	
	public function refresh() {
		if( ! $this->getSobre() ) {
			$this->curso = NULL;
			$this->email = NULL;
			$this->contato = NULL;
			$this->endereco = NULL;
		}
		else {
			$this->getEmail();
			$this->getTel();
			$this->getEndereco();
		}
	}	

	protected function getSobre(){
		$query ="SELECT * FROM curso WHERE curso.cursoId='". CURSO_ID ."'";

		$queryResult = $this->db->query( $query );

		if( $queryResult ){
			$this->curso = $queryResult->fetch_array( MYSQLI_ASSOC );
			return true;
		}

		return false;
	}

	protected function getEmail(){
		$query ="SELECT * FROM emailcurso WHERE emailcurso.cursoId='". CURSO_ID ."'";

		$queryResult = $this->db->query( $query );

		if( $queryResult ){
			$this->email = $queryResult->fetch_array( MYSQLI_ASSOC );
			return true;
		}
		return false;
	}

	protected function getTel(){
		$query ="SELECT * FROM telcurso WHERE telcurso.cursoId='". CURSO_ID ."'";

		$queryResult = $this->db->query( $query );

		if( $queryResult ){
			$this->contato = $queryResult->fetch_array( MYSQLI_ASSOC );
			return true;
		}
		return false;
	}

	protected function getEndereco(){
		$query ="SELECT * FROM enderecocurso WHERE enderecocurso.cursoId='". CURSO_ID ."'";

		$queryResult = $this->db->query( $query );

		if( $queryResult ){
			$this->endereco = $queryResult->fetch_array( MYSQLI_ASSOC );
			return true;
		}
		return false;
	}

	public function setCurso($params = NULL){ 
        if( !$params || !isset($params["cursoNome"]) )
            return false;

		//curso
		$params["cursoNome"] = 				  			$params["cursoNome"] ? 								"'".$params["cursoNome"]."'" : 'null';
		$params["cursoDescricao"] = 		  		$params["cursoDescricao"] ? 					"'".$params["cursoDescricao"]."'" : 'null';
		// emailcurso
		$params["emailCursoId"] = 		  			$params["emailCursoId"] ? 						"'".$params["emailCursoId"]."'" : 'null';
		$params["emailCursoEmail"] = 		  		$params["emailCursoEmail"] ? 					"'".$params["emailCursoEmail"]."'" : 'null';
		// telcurso
		$params["telCursoId"] = 		  	  		$params["telCursoId"] ? 							"'".$params["telCursoId"]."'" : 'null';
		$params["telCursoTel"] = 			  			$params["telCursoTel"] ? 							"'".$params["telCursoTel"]."'" : 'null';
		//cursoendereco
		$params["enderecoCursoId"] = 		  		$params["enderecoCursoId"] ? 					"'".$params["enderecoCursoId"]."'" : 'null';
		$params["enderecoCursoCep"] = 		  	$params["enderecoCursoCep"] ? 				"'".$params["enderecoCursoCep"]."'" : 'null';
		$params["enderecoCursoRua"] = 		  	$params["enderecoCursoRua"] ? 				"'".$params["enderecoCursoRua"]."'" : 'null';
		$params["enderecoCursoNumero"] = 	  	$params["enderecoCursoNumero"] ? 			"'".$params["enderecoCursoNumero"]."'" : 'null';
		$params["enderecoCursoBairro"] = 	  	$params["enderecoCursoBairro"] ? 			"'".$params["enderecoCursoBairro"]."'" : 'null';
		$params["enderecoCursoComplemento"] = $params["enderecoCursoComplemento"] ? "'".$params["enderecoCursoComplemento"]."'" : 'null';
		$params["enderecoCursoCidade"] =	  	$params["enderecoCursoCidade"] ? 			"'".$params["enderecoCursoCidade"]."'" : 'null';
		$params["enderecoCursoEstado"] = 	  	$params["enderecoCursoEstado"] ? 			"'".$params["enderecoCursoEstado"]."'" : 'null';
		$params["enderecoCursoPais"] = 		  	$params["enderecoCursoPais"] ? 				"'".$params["enderecoCursoPais"]."'" : 'null';

		$query = "UPDATE curso SET cursoNome=".$params["cursoNome"]
							   .", cursoDescricao=".$params["cursoDescricao"]
							   ." WHERE cursoId=". CURSO_ID;
		$this->db->query( $query );

		$query2 = "UPDATE emailcurso SET emailCursoEmail="	.$params["emailCursoEmail"]
							   		 ." WHERE emailCursoId=".$params["emailCursoId"];
		$this->db->query( $query2 );

		$query3 = "UPDATE telCurso SET telCursoTel="	  .$params["telCursoTel"]
							   		 ." WHERE telCursoId=".$params["telCursoId"];
		$this->db->query( $query3 );

		$query4 = "UPDATE enderecoCurso SET enderecoCursoCep=".$params["enderecoCursoCep"]
							   .", enderecoCursoRua=".$params["enderecoCursoRua"]
							   .", enderecoCursoNumero=".$params["enderecoCursoNumero"]
							   .", enderecoCursoBairro=".$params["enderecoCursoBairro"]
							   .", enderecoCursoComplemento=".$params["enderecoCursoComplemento"]
							   .", enderecoCursoCidade=".$params["enderecoCursoCidade"]
							   .", enderecoCursoEstado=".$params["enderecoCursoEstado"]
							   .", enderecoCursoPais=".$params["enderecoCursoPais"]
							   ." WHERE enderecoCursoId=".$params["enderecoCursoId"];
		$this->db->query( $query4 );
    }

}