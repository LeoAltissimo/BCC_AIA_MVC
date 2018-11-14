<?php
/*
 * Model para o módulo do Mural De eventos
 * @author Léo Altíssimo Neto
 */

 class MuraleventosModel extends MainModel{

    public $eventos = array( array() );

    public function __construct( $db = false, $controller = null ){

		$this->db = $db;

		$this->controller = $controller;

		$this->parametros = $this->controller->parametros;

		$this->userdata = $this->controller->userdata;

		if( ! $this->getEventos() )
			$this->eventos = null;
	}

	public function getEventos(){

		$query = "SELECT eventoId , eventoNome , eventoApresentacao, eventoInicio, eventoTermino, eventoCapa  FROM evento";

		$resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){

			for( $i = 0 ; $i < $resultquery->num_rows; $i++){
				$resultquery->data_seek( $i );

				$linha = $resultquery->fetch_array(MYSQLI_ASSOC);

				foreach ($linha as $key => $value) {
					if( is_string( $value ) )
						$this->eventos[$i]["$key"] = utf8_encode ($value);
					else
						$this->eventos[$i]["$key"] = $value;

				}
			}

			return true;
		}

		return false;
	}
 }