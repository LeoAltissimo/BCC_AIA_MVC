<?php
/*
 * Model para o módulo do slider da home 
 * @author Léo Altíssimo Neto
 */

class SliderModel extends MainModel{

	public $slide = array(array());

	public function __construct( $db = false, $controller = null ){

		$this->db = $db;

		$this->controller = $controller;

		$this->parametros = $this->controller->parametros;

		$this->userdata = $this->controller->userdata;

		if( ! $this->getSlides() )
			$this->slide = null;
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

		return fasle;
	}

}