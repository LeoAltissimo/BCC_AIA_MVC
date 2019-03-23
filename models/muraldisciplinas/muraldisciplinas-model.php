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
		$querySemestre = $this->db->query( $query );

		if( $querySemestre && ( $querySemestre->num_rows != 0 ) ){

			for( $i = 0 ; $i < $querySemestre->num_rows; $i++){
                $querySemestre->data_seek( $i );
                $semestre = $querySemestre->fetch_array(MYSQLI_ASSOC);

                $query = "SELECT disciplinaId, disciplinaNome FROM disciplina WHERE semestreId='" . ($semestre['semestreId']) . "'";
                $resultquery = $this->db->query( $query );
                
                if( $resultquery && ( $resultquery->num_rows != 0 ) ){
                    for( $j = 0 ; $j < $resultquery->num_rows; $j++){
                        $resultquery->data_seek( $j );
        
                        $linha = $resultquery->fetch_array(MYSQLI_NUM);
                            
                            $title = str_split($linha[1], 20);
                            if( isset($title[1]) )
                                $title[0] = $title[0] . "...";
                            
                            $this->listaDisciplinas[$i][$j]["disciplinaId"] = $linha[0];
                            $this->listaDisciplinas[$i][$j]["disciplinaNome"] = $linha[1];
                }

			}

        }
        return true;
    }
    else
        return false;

    }
}