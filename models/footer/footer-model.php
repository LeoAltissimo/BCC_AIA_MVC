<?php
/*
 * Model para o módulo do Mural De Fotos
 * @author Léo Altíssimo Neto
 */

 class FooterModel extends MainModel{

    public $sobre;
    public $endereco;
	public $contato;
    public $email;
    
    public function __construct( $db = false, $controller = null ){
		$this->db = $db;
		$this->controller = $controller;
		$this->userdata = $this->controller->userdata;
		
        if( !$this->getSobre() )
            $this->sobre = null;
        
        if( !$this->getEndereco() )
            $this->endereco = null;

        if( !$this->getContato() )
            $this->contato = null;
        
        if( !$this->getEmail() )
            $this->email = null;
    } 
    
    protected function getSobre(){

        $query = "SELECT cursoDescricao FROM curso WHERE cursoId='2' ";
        $result = $this->db->query( $query );

        if( $result ){
            $linha = $result->fetch_array( MYSQLI_ASSOC );
            $this->sobre = substr( $linha['cursoDescricao'], 0, 200);

            return true;
        }

        return false;
    }

    protected function getEndereco(){

        $query = "SELECT enderecoCursoRua, enderecoCursoNumero, 
                         enderecoCursoBairro, enderecoCursoCidade, 
                         enderecoCursoEstado, enderecoCursoCep  
                  FROM enderecocurso WHERE cursoId='2' ";
        
        $result = $this->db->query( $query );

        if( $result ){
            $linha = $result->fetch_array( MYSQLI_ASSOC );
            $this->endereco = $linha['enderecoCursoRua'] . ", " . 
                           $linha['enderecoCursoNumero'] . " - " . 
                           $linha['enderecoCursoBairro'] . ", " . 
                           $linha['enderecoCursoCidade'] . " - " .
                           $linha['enderecoCursoEstado'] . ", " .
                           $linha['enderecoCursoCep'];
            return true;
        }

        return false;
    }

    protected function getContato(){

        $query = "SELECT telCursoTel FROM telcurso WHERE cursoId='2' ";
        $result = $this->db->query( $query );

        if( $result ){
            $linha = $result->fetch_array( MYSQLI_ASSOC );
            $this->contato = $linha['telCursoTel'];

            return true;
        }
        return false;
    }

    protected function getEmail(){

        $query = "SELECT emailCursoEmail FROM emailCurso WHERE cursoId='2' ";
        $result = $this->db->query( $query );

        if( $result ){
            $linha = $result->fetch_array( MYSQLI_ASSOC );
            $this->email = $linha['emailCursoEmail'];

            return true;
        }
        return false;
    }

 }