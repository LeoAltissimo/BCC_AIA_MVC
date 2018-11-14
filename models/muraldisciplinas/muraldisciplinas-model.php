<?php
/*
 * Model para o módulo do Mural De Disciplinas
 * @author Léo Altíssimo Neto
 */

class MuraldisciplinasModel extends MainModel{

    public $numSemestre = 0;
    public $listaDisciplinas = array( array( array() ) );

    public function __construct( $db = false, $controller = null ){

		$this->db = $db;
		$this->controller = $controller;
		$this->parametros = $this->controller->parametros;
		$this->userdata = $this->controller->userdata;

		if( ! $this->getdisciplinas() )
			$this->listaDisciplinas = null;
	}

	public function getdisciplinas(){
       
        $query = "SELECT * FROM semestre ";
		$resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){

            $this->numSemestre = $resultquery->num_rows;

			for( $i = 0 ; $i < $this->numSemestre; $i++){
                $query = "SELECT disciplinaId, disciplinaNome FROM disciplina WHERE semestreID='" . ($i) . "'";
                $resultquery = $this->db->query( $query );
                
                if( $resultquery && ( $resultquery->num_rows != 0 ) ){
                    for( $j = 0 ; $j < $resultquery->num_rows; $j++){
                        $resultquery->data_seek( $j );
        
                        $linha = $resultquery->fetch_array(MYSQLI_NUM);

                            $this->listaDisciplinas[$i][$j]["disciplinaId"] = utf8_encode ($linha[0]);
                            $this->listaDisciplinas[$i][$j]["disciplinaNome"] = utf8_encode ($linha[1]);
                }

			}

        }
        return true;
    }
    else
        return false;

    }
}