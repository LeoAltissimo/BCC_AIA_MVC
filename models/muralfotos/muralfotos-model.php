<?php
/*
 * Model para o módulo do Mural De Fotos
 * @author Léo Altíssimo Neto
 */

 class MuralfotosModel extends MainModel{

    public $listaFotos = array( array() );

    public function __construct( $db = false, $controller = null ){

		$this->db = $db;
		$this->controller = $controller;
		$this->parametros = $this->controller->parametros;
		$this->userdata = $this->controller->userdata;
        
        if(  !$this->getProfessores() )
            $this->listaFotos = null;
    }

    private function getProfessores(){

        $query = "SELECT muralFotoCaminho, muralFotoTitulo FROM muralfoto";

        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            
            for( $i = 0 ; $i < $resultquery->num_rows; $i++){
				$resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);
                
				foreach ($linha as $key => $value) {
					if( is_string( $value ) )
						$this->listaFotos[$i]["$key"] = utf8_encode ($value);
					else
						$this->listaFotos[$i]["$key"] = $value;
                }
            }
			return true;
		}
        return false;
    }
 }