<?php
/*
 * Model para o módulo do slider da home 
 * @author Léo Altíssimo Neto
 */

class SliderModel extends MainModel{

	public $slide = array(array());
	public $slideConfig = array();

	public function __construct( $db = false, $controller = null ){
		$this->db = $db;
		$this->controller = $controller;
		$this->parametros = $this->controller->parametros;
		$this->userdata = $this->controller->userdata;

		if( ! $this->getSlides() )
			$this->slide = null;

		if( isset($this->parametros[0]) ){
			$this->getSlide($this->parametros[0]);
		}
	}

	public function refresh(){
		if( isset($this->parametros[0]) ){
			$this->getSlide($this->parametros[0]);
		}
	}

	public function getSlides(){
		$query = "SELECT * FROM homeslide";

		$resultquery = $this->db->query( $query );

		if( $resultquery ){
			for( $i = 0 ; $i < $resultquery->num_rows; $i++){
				$resultquery->data_seek( $i );

				$linha = $resultquery->fetch_array(MYSQLI_ASSOC);

				foreach ($linha as $key => $value) {
					$this->slide[$i]["$key"] = $value;
				}
			}
			return true;
		}
		return false;
	}

	public function getSlide($id){
		$query = "SELECT * FROM homeslide WHERE homeSlideId=" . $id;

		$queryResult = $this->db->query( $query );

		if( $queryResult ){
			$this->slideConfig = $queryResult->fetch_array( MYSQLI_ASSOC );
			return true;
		}
		return false;
	}

	public function setSlide($params = NULL, $slideImg = NULL){ 
        if( !$params )
            return false;

		$params["homeSlideId"] = 		$params["homeSlideId"] ? 		"'".$params["homeSlideId"]."'" : 'null';
		$params["homeSlideTitulo"] = 	$params["homeSlideTitulo"] ? 	"'".$params["homeSlideTitulo"]."'" : 'null';
		$params["homeSlideTituloCor"] = $params["homeSlideTituloCor"] ?	"'".$params["homeSlideTituloCor"]."'" : 'null';
		$slideImg = $slideImg ? "'".$slideImg."'" : 'null';

        if( $params["homeSlideId"] !== 'null' ) {
            $query = "UPDATE homeSlide SET homeSlideTitulo=".$params["homeSlideTitulo"]
                                         .", homeSlideTituloCor=".$params["homeSlideTituloCor"]
                                         .", homeSlideCaminho=".$slideImg
                                         ." WHERE homeSlideId=".$params["homeSlideId"];
            $this->db->query( $query );

        } else {
            $query = "INSERT INTO `homeslide` (`homeSlideId`, `homeSlideCaminho`, `homeSlideTitulo`, `homeSlideTituloCor`)
				VALUES( null," 
				. $slideImg .","
				. $params['homeSlideTitulo'] .","
				. $params['homeSlideTituloCor'] 
				.")";

            $this->db->query( $query );

        }
    }
}