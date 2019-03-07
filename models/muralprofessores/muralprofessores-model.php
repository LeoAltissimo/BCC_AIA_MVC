<?php
/*
 * Model para o módulo do Mural De Professores
 * @author Léo Altíssimo Neto
 */

 class MuralprofessoresModel extends MainModel{

    public $listaProfessores = array( array() );

    public function __construct( $db = false, $controller = null ){

		$this->db = $db;
		$this->controller = $controller;
		$this->parametros = $this->controller->parametros;
		$this->userdata = $this->controller->userdata;
        
        if(  !$this->getProfessores() )
            $this->listaProfessores = null;
    }

    private function getProfessores(){

        $query = "SELECT professorId, professorNome, professorTitulacao, professorFacebook, professorLattes, professorTumb, professorApresentacao FROM professor";

        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            
            for( $i = 0 ; $i < $resultquery->num_rows; $i++){
				$resultquery->data_seek( $i );

                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);
                
				foreach ($linha as $key => $value) {
					if( is_string( $value ) )
						$this->listaProfessores[$i]["$key"] = $value;
					else
						$this->listaProfessores[$i]["$key"] = $value;
                }
            }
			return true;
		}
        return false;
    }
 }