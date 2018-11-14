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

        $query = "SELECT * FROM professor JOIN emailprof ON professor.professorId = emailprof.professorId  WHERE professor.professorId='$paramId'";
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){

            $resultquery->data_seek( 0 );

            $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

            foreach( $linha as $key => $value ){
                if(  is_string( $value ) )
                    $this->professor["$key"] = utf8_encode( $value );
                else
                    $this->professor["$key"] = $value;
            }
            return true;
        }   
        else
            return false;
    }

}