<?php
/*
 * Model para página que apresenta um evento
 * @author Léo Altíssimo Neto
 */

class DisciplinaModel extends MainModel{

    public $disciplina = array();
    public $creditos = array( array() );
    public $bibliografiaBas = array( array() );
    public $bibliografiaCompl = array( array() );

    public function __construct( $db = false, $controller = null ){

		$this->db = $db;
		$this->controller = $controller;
		$this->parametros = $this->controller->parametros;
		$this->userdata = $this->controller->userdata;

		if( !$this->getDisciplina( $this->parametros[0] ) ){
            $this->professor = null;
        }else{

            if( !$this->getCreditos() )
               $this->creditos = null;
            
            if( !$this->getBiblioBas() )
               $this->bibliografiaBas = null;

            if( !$this->getBiblioCompl() )
               $this->bibliografiaCompl = null;


        }
	}

    protected function getDisciplina( $paramId = null ){
        
        if( !$paramId )
            return false;

        $query = "SELECT * FROM disciplina WHERE disciplina.disciplinaId='$paramId'";
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){

            $resultquery->data_seek( 0 );

            $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

            foreach( $linha as $key => $value ){
                if(  is_string( $value ) )
                    $this->disciplina["$key"] = utf8_encode( $value );
                else
                    $this->disciplina["$key"] = $value;
            }

            if( $this->disciplina["disciplinaPrerequisito"] != null ){

                $query = "SELECT disciplina.disciplinaNome FROM disciplina WHERE disciplina.disciplinaId=" . $this->disciplina['disciplinaPrerequisito'];
                $resultquery = $this->db->query( $query );
                
                if( $resultquery && ( $resultquery->num_rows != 0 ) ){

                    $resultquery->data_seek( 0 );        
                    $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                    $this->disciplina["prerequisitoNome"] = $linha["disciplinaNome"];
                }

            }
            if( $this->disciplina["disciplinaProf"] != null ){

                $query = "SELECT professor.professorTitulacao, professor.professorNome FROM professor WHERE professor.professorId=" . $this->disciplina['disciplinaProf'] ;
                $resultquery = $this->db->query( $query );
                
                if( $resultquery && ( $resultquery->num_rows != 0 ) ){

                    $resultquery->data_seek( 0 );        
                    $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                    $this->disciplina["profNome"] = $linha["professorTitulacao"] . " " . $linha["professorNome"];
                }

            }
            return true;
        }   
        else
            return false;
    }

    protected function getCreditos(  ){
        $query = "SELECT * FROM distribcreditos WHERE distribcreditos.disciplinaId=" . $this->disciplina["disciplinaId"];
        $resultquery = $this->db->query( $query );

        if( $resultquery && ( $resultquery->num_rows != 0 ) ){

            for( $i = 0; $i < $resultquery->num_rows; $i++ ){
                
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);
                
                switch( $linha["distribcreditosTipo"] ){
                    case 1:
                        $this->creditos[0]["Credito"] = $linha["distribcreditosCreditos"];
                        $this->creditos[0]["horas"] = utf8_encode( $linha["distribcreditosHorasaula"]);
                    break;
                    case 2:
                        $this->creditos[1]["Credito"] = $linha["distribcreditosCreditos"];
                        $this->creditos[1]["horas"] = utf8_encode( $linha["distribcreditosHorasaula"]);
                    break;
                    case 3:
                        $this->creditos[2]["Credito"] = $linha["distribcreditosCreditos"];
                        $this->creditos[2]["horas"] = utf8_encode( $linha["distribcreditosHorasaula"]);
                    break;
                    case 4:
                        $this->creditos[3]["Credito"] = $linha["distribcreditosCreditos"];
                        $this->creditos[3]["horas"] = utf8_encode( $linha["distribcreditosHorasaula"]);
                    break;
                    case 5:
                        $this->creditos[4]["Credito"] = $linha["distribcreditosCreditos"];
                        $this->creditos[4]["horas"] = utf8_encode( $linha["distribcreditosHorasaula"]);
                    break;
                    default:
                    break;
                }

            }
            return true;
        }   
        else
            return false;
    }

    protected function getBiblioBas(){

        $query = "SELECT * FROM disciblibio JOIN bibliografia ON disciblibio.bibliografiaId = bibliografia.bibliografiaId WHERE disciblibio.disciblibioTipo='1' AND  disciblibio.disciplinaId=" . $this->disciplina["disciplinaId"];
        $resultquery = $this->db->query( $query );

        if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            
            for( $i = 0 ; $i < $resultquery->num_rows; $i++ ){
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    if(  is_string( $value ) )
                        $this->bibliografiaBas[$i]["$key"] = utf8_encode( $value );
                    else
                        $this->bibliografiaBas[$i]["$key"] = $value;
                }
            }
            return true;
        }   
        else
            return false;
    }

    protected function getBiblioCompl(){

        $query = "SELECT * FROM disciblibio JOIN bibliografia ON disciblibio.bibliografiaId = bibliografia.bibliografiaId WHERE disciblibio.disciblibioTipo='2' AND  disciblibio.disciplinaId=" . $this->disciplina["disciplinaId"];
        $resultquery = $this->db->query( $query );

        if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            
            for( $i=0 ; $i < $resultquery->num_rows; $i++ ){
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    if(  is_string( $value ) )
                        $this->bibliografiaCompl[$i]["$key"] = utf8_encode( $value );
                    else
                        $this->bibliografiaCompl[$i]["$key"] = $value;
                }
            }
            return true;
        }   
        else
            return false;
    }


}