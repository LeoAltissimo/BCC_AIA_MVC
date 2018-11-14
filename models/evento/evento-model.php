<?php
/*
 * Model para página que apresenta um evento
 * @author Léo Altíssimo Neto
 */

class EventoModel extends MainModel{

    public $evento = array();
    public $endereco = array();
    public $professorOrganizador = array(); 
    public $acontecimentos = array( array() );
    public $trabalhos = array( array() );
    public $comissoes = array( array() );

    public function __construct( $db = false, $controller = null ){

		$this->db = $db;
		$this->controller = $controller;
		$this->parametros = $this->controller->parametros;
		$this->userdata = $this->controller->userdata;

		if( !$this->getEvento( $this->parametros[0] ) )
            $this->listaDisciplinas             = 
                $this->endereco                 = 
                $this->professorOrganizador     = 
                $this->trabalhos                =
                $this->comissoes                = null;
        else{
            
            if( !$this->getEndereco())
                $this->endereco = null;

            if( !$this->getProf() )
                $this->professorOrganizador = null;

            if( !$this->getAcontecimentos() )
                $this->acontecimentos = null;

            if( !$this->getTrabalhos() )
                $this->trabalhos = null;
            
            if( !$this-> getComissoes() )
                $this->comissoes = null;
        }
	}

    protected function getEvento( $paramIdEvento = null ){
        
        if( !$paramIdEvento )
            return false;

        $query = "SELECT * FROM evento JOIN eventoemail, eventoendereco, eventotel WHERE evento.eventoId='$paramIdEvento' ";
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){

            $resultquery->data_seek( 0 );

            $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

            foreach( $linha as $key => $value ){
                if(  is_string( $value ) )
                    $this->evento["$key"] = utf8_encode( $value );
                else
                    $this->evento["$key"] = $value;
            }

            return true;
        }   
        else
            return false;
    }

    protected function getEndereco(){
        $query = 'SELECT * FROM eventoendereco WHERE eventoId=' . $this->evento['eventoId'] ;
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){

                $resultquery->data_seek( 0 );

                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    if(  is_string( $value ) )
                        $this->endereco["$key"] = utf8_encode( $value );
                    else
                        $this->endereco["$key"] = $value;
                }

            return true;
        }   
        else
            return false;
    }

    protected function getProf(){
        $query = 'SELECT 
            professor.professorNome,
            professor.professorFacebook,
            professor.professorLattes,
            professor.professorTumb,
            professor.professorTitulacao,
            emailProf.emailProfEmail,
            telProf.telProfTel
        FROM professor JOIN emailProf, telProf WHERE professor.professorId=' . $this->evento['eventoProfOrganizador'];
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){

                $resultquery->data_seek( 0 );

                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    if(  is_string( $value ) )
                        $this->professorOrganizador["$key"] = utf8_encode( $value );
                    else
                        $this->professorOrganizador["$key"] = $value;
                }
                
            return true;
        }   
        else
            return false;
    }

    protected function getAcontecimentos(){

        $query = "SELECT * FROM acontecimento WHERE acontecimento.eventoId='" . $this->evento['eventoId'] . "' ORDER BY acontecimento.acontecimentoData";
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            
            for( $i = 0 ; $i < $resultquery->num_rows ; $i++){
                
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    if(  is_string( $value ) )
                        $this->acontecimentos[$i]["$key"] = utf8_encode( $value );
                    else
                        $this->acontecimentos[$i]["$key"] = $value;
                }
            }
                
            return true;
        }   
        else
            return false;
    }

    protected function getTrabalhos(){

        $query = 'SELECT * FROM trabalho WHERE trabalho.eventoId=' . $this->evento['eventoId'];
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            
            for( $i = 0 ; $i < $resultquery->num_rows ; $i++){
                
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    if(  is_string( $value ) )
                        $this->trabalhos[$i]["$key"] = utf8_encode( $value );
                    else
                        $this->trabalhos[$i]["$key"] = $value;
                }
            }
                
            return true;
        }   
        else
            return false;
    }

    protected function getComissoes(){

        $query = 'SELECT * FROM comissao WHERE comissao.eventoId=' . $this->evento['eventoId'];
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            
            for( $i = 0 ; $i < $resultquery->num_rows ; $i++){
                
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    if(  is_string( $value ) )
                        $this->comissoes[$i]["$key"] = utf8_encode( $value );
                    else
                        $this->comissoes[$i]["$key"] = $value;
                }
            }
                
            return true;
        }   
        else
            return false;
    }

}