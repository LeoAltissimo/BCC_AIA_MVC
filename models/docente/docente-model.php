<?php
/*
 * Model para página que apresenta um evento
 * @author Léo Altíssimo Neto
 */

class DocenteModel extends MainModel{

    public $professor = array();

    public function __construct( $db = false, $controller = null ){

		$this->db = $db;
		$this->controller = $controller;
		$this->parametros = $this->controller->parametros;
		$this->userdata = $this->controller->userdata;

		if( !$this->getProfessor( $this->parametros[0] ) )
            $this->professor = null;
	}

    protected function getProfessor( $paramId = null ){
        
        if( !$paramId )
            return false;

        $query = "SELECT * FROM professor
                  INNER JOIN emailprof ON emailprof.professorId = '$paramId'
                  INNER JOIN telprof ON  telprof.professorId = '$paramId'  
                  WHERE professor.professorId = '$paramId'";
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){

            $resultquery->data_seek( 0 );

            $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

            foreach( $linha as $key => $value ){
                if(  is_string( $value ) )
                    $this->professor["$key"] =  $value;
                else
                    $this->professor["$key"] = $value;
            }
            return true;
        }   
        else
            return false;
    }

    public function postProfessor( $params = null, $nomeArquivo = null ) {
        if( !$params )
            return false;

        $params["professorId"] = $params["professorId"] ? "'".$params["professorId"]."'" : 'null';
        $params["titulacao"] = $params["titulacao"] ? "'".$params["titulacao"]."'" : 'null';
        $params["nome"] = $params["nome"] ? "'".$params["nome"]."'" : 'null';
        $params["tel"] = $params["tel"] ? "'".$params["tel"]."'" : 'null';
        $params["email"] = $params["email"] ? "'".$params["email"]."'" : 'null';
        $params["lattes"] = $params["lattes"] ? "'".$params["lattes"]."'" : 'null';
        $params["facebook"] = $params["facebook"] ? "'".$params["facebook"]."'" : 'null';
        $params["apresentacao"] = $params["apresentacao"] ? "'".$params["apresentacao"]."'" : 'null';
        $nomeArquivo = $nomeArquivo ? "'".$nomeArquivo."'"  : 'null';

        if( $params["professorId"] !== 'null' ) {
            $query = "UPDATE professor SET professorNome=".$params["nome"]
                                         .", professorFacebook=".$params["facebook"]
                                         .", professorLattes=".$params["lattes"]
                                         .", professorApresentacao=".$params["apresentacao"]
                                         .", professorTitulacao=".$params["titulacao"]
                                         ." WHERE professorId=".$params["professorId"];
            $this->db->query( $query );

            $query2 = "UPDATE emailprof SET emailProfEmail=".$params["email"]
                                ." WHERE professorId=".$params["professorId"];
            $this->db->query( $query2 );

            $query3 = "UPDATE telprof SET telProfTel=".$params["tel"]
                                ." WHERE professorId=".$params["professorId"];
            $this->db->query( $query3 );

        } else {
            $query = "INSERT INTO professor ( professorId, cursoId, professorNome, professorFacebook, professorLattes, professorTumb, professorApresentacao, professorTitulacao)
                VALUES( null, 2," . $params['nome'] .",". $params['facebook'] .",". $params['lattes'] .",". $nomeArquivo .",". $params['apresentacao'] .",". $params['titulacao'].")";

            $this->db->query( $query );

            $query2 = "SELECT professorId FROM professor WHERE  professorNome=" . $params['nome'];
            $resultquery = $this->db->query( $query2 );

		    if( $resultquery && ( $resultquery->num_rows != 0 ) ){
                $resultquery->data_seek( 0 );

                $result = $resultquery->fetch_array(MYSQLI_ASSOC);
                $result["professorId"];

                $query3 = "INSERT INTO emailprof ( professorId, emailProfEmail) VALUES(" .$result["professorId"]. ", " .$params["email"].")";
                $this->db->query( $query3 );

                $query4 = "INSERT INTO telprof ( professorId, telProfTel) VALUES(" .$result["professorId"]. ", " .$params["tel"].")";
                $this->db->query( $query4 );

            }

        }
    }

}