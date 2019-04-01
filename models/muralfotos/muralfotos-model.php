<?php
/*
 * Model para o módulo do Mural De Fotos
 * @author Léo Altíssimo Neto
 */

 class MuralfotosModel extends MainModel{

    public $listaFotos = array( array() );
    public $foto = array();

    public function __construct( $db = false, $controller = null ){

		$this->db = $db;
		$this->controller = $controller;
		$this->parametros = $this->controller->parametros;
		$this->userdata = $this->controller->userdata;
        
        if(  !$this->getMural() )
            $this->listaFotos = null;

        if( isset($this->parametros[0]) )
            $this->getFoto($this->parametros[0]);

    }

    public function refresh(){
        if( isset($this->parametros[0]) )
            $this->getFoto($this->parametros[0]);
    }

    private function getMural(){

        $query = "SELECT * FROM muralfoto";

        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            
            for( $i = 0 ; $i < $resultquery->num_rows; $i++){
				$resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);
                
				foreach ($linha as $key => $value) {
					$this->listaFotos[$i]["$key"] = $value;
                }
            }
			return true;
		}
        return false;
    }

    private function getFoto($id = NULL){
        if( $id === NULL )
            return false;

        $query = "SELECT * FROM muralfoto WHERE muralFotoId=" . $id;

		$queryResult = $this->db->query( $query );

		if( $queryResult ){
			$this->foto = $queryResult->fetch_array( MYSQLI_ASSOC );
			return true;
		}
		return false;
	}


    public function setMural($params = NULL, $muralImg = NULL){ 
        if( !isset( $params ) )
            return false;

		$params["muralFotoId"] = 		$params["muralFotoId"] ? 		"'".$params["muralFotoId"]."'" : 'null';
		$params["muralFotoTitulo"] = 	$params["muralFotoTitulo"] ? 	"'".$params["muralFotoTitulo"]."'" : 'null';
		$muralImg = $muralImg ? "'".$muralImg."'" : 'null';

        if( $params["muralFotoId"] !== 'null' ) {
            $query = "UPDATE muralFoto SET muralFotoTitulo=".$params["muralFotoTitulo"]
                                         .", muralFotoCaminho=".$muralImg
                                         ." WHERE muralFotoId=".$params["muralFotoId"];
            $this->db->query( $query );
        } else {
            $query = "INSERT INTO `muralfoto` (`muralFotoId`, `muralFotoCaminho`, `muralFotoTitulo`)
				VALUES( null," 
				. $muralImg .","
				. $params['muralFotoTitulo']
				.")";

            $this->db->query( $query );

        }
    }
 }