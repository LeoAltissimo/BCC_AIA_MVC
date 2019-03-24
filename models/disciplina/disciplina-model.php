<?php
/*
 * Model para página que apresenta um evento
 * @author Léo Altíssimo Neto
 */

class DisciplinaModel extends MainModel{

    public $disciplina = array();
    public $livro = array();
    public $creditos = array( array() );
    public $bibliografiaBas = array( array() );
    public $bibliografiaCompl = array( array() );
    public $profList = array( array() );
    public $disciplinasList = array( array() );
    public $semestreList = array( array() );

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

        $this->getProfList();
        $this->getDisciplinasList();
        $this->getSemestreList();
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
                    $this->disciplina["$key"] = $value;
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
                        $this->creditos[0]["horas"] =  $linha["distribcreditosHorasaula"];
                    break;
                    case 2:
                        $this->creditos[1]["Credito"] = $linha["distribcreditosCreditos"];
                        $this->creditos[1]["horas"] = $linha["distribcreditosHorasaula"];
                    break;
                    case 3:
                        $this->creditos[2]["Credito"] = $linha["distribcreditosCreditos"];
                        $this->creditos[2]["horas"] = $linha["distribcreditosHorasaula"];
                    break;
                    case 4:
                        $this->creditos[3]["Credito"] = $linha["distribcreditosCreditos"];
                        $this->creditos[3]["horas"] =  $linha["distribcreditosHorasaula"];
                    break;
                    case 5:
                        $this->creditos[4]["Credito"] = $linha["distribcreditosCreditos"];
                        $this->creditos[4]["horas"] =  $linha["distribcreditosHorasaula"];
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

    public function getCreditosToEdit( ){
        $query = "SELECT * FROM distribcreditos WHERE distribcreditos.disciplinaId=" . $this->disciplina["disciplinaId"];
        $resultquery = $this->db->query( $query );

        if( $resultquery && ( $resultquery->num_rows != 0 ) ){  
                $resultquery->data_seek( 0 );
                return $linha = $resultquery->fetch_array(MYSQLI_ASSOC);
        }   
        else
            return false;
    }

    protected function getBiblioBas(){
        $query = "SELECT * FROM disciblibio INNER JOIN bibliografia ON disciblibio.bibliografiaId = bibliografia.bibliografiaId WHERE disciblibio.disciblibioTipo='1' AND  disciblibio.disciplinaId=" . $this->disciplina["disciplinaId"];
        $resultquery = $this->db->query( $query );

        if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            
            for( $i = 0 ; $i < $resultquery->num_rows; $i++ ){
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    if(  is_string( $value ) )
                        $this->bibliografiaBas[$i]["$key"] = $value;
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

        $query = "SELECT * FROM disciblibio INNER JOIN bibliografia ON disciblibio.bibliografiaId = bibliografia.bibliografiaId WHERE disciblibio.disciblibioTipo='2' AND  disciblibio.disciplinaId=" . $this->disciplina["disciplinaId"];
        $resultquery = $this->db->query( $query );

        if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            
            for( $i=0 ; $i < $resultquery->num_rows; $i++ ){
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    if(  is_string( $value ) )
                        $this->bibliografiaCompl[$i]["$key"] = $value;
                    else
                        $this->bibliografiaCompl[$i]["$key"] = $value;
                }
            }
            return true;
        }   
        else
            return false;
    }

    public function getDisciplinasList(){
        $query = 'SELECT disciplinaId, disciplinaNome FROM disciplina';
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            for( $i = 0 ; $i < $resultquery->num_rows ; $i++){    
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    $this->disciplinasList[$i]["$key"] = $value;
                }
            }  
            return true;
        }   
        else
            return false;
    }

    protected function getProfList() { 
        $query = 'SELECT professorId, professorNome FROM professor';
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            for( $i = 0 ; $i < $resultquery->num_rows ; $i++){    
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    $this->profList[$i]["$key"] = $value;
                }
            }  
            return true;
        }   
        else
            return false;
    }

    protected function getSemestreList() { 
        $query = 'SELECT semestreId, semestre FROM semestre';
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            for( $i = 0 ; $i < $resultquery->num_rows ; $i++){    
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    $this->semestreList[$i]["$key"] = $value;
                }
            }  
            return true;
        }   
        else
            return false;
    }

    public function getLivro($id = null) {
        $query = 'SELECT * FROM bibliografia WHERE bibliografiaId=' . $id;
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            $resultquery->data_seek( 0 );
            $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

            foreach( $linha as $key => $value ){
                $this->livro["$key"] = $value;
            } 
            return true;
        }   
        else
            return false;
    }

    public function postDisciplina( $params = null ) {
        if( $params == null )
            return false;

        $params["disciplinaId"] = $params["disciplinaId"] ? "'".$params["disciplinaId"]."'" : 'null';
        $params["disciplinaSemetre"] = $params["disciplinaSemetre"] ? "'".$params["disciplinaSemetre"]."'" : 'null';
        $params["nome"] = $params["nome"] ? "'".$params["nome"]."'" : 'null';
        $params["prerequisito"] = $params["prerequisito"] ? "'".$params["prerequisito"]."'" : 'null';
        $params["profArea"] = $params["profArea"] ? "'".$params["profArea"]."'" : 'null';
        $params["disciplinaProfessor"] = $params["disciplinaProfessor"] ? "'".$params["disciplinaProfessor"]."'" : 'null';
        $params["ementa"] = $params["ementa"] ? "'".$params["ementa"]."'" : 'null';
        $params["objetivo"] = $params["objetivo"] ? "'".$params["objetivo"]."'" : 'null';

        $params["distribcreditosId"] = $params["distribcreditosId"] ? "'".$params["distribcreditosId"]."'" : 'null';
        $params["distribcreditosTipo"] = $params["distribcreditosTipo"] ? "'".$params["distribcreditosTipo"]."'" : 'null';
        $params["distribcreditosCreditos"] = $params["distribcreditosCreditos"] ? "'".$params["distribcreditosCreditos"]."'" : 'null';
        $params["distribcreditosHorasaula"] = $params["distribcreditosHorasaula"] ? "'".$params["distribcreditosHorasaula"]."'" : 'null';

        if( $params["disciplinaId"] !== 'null' ) {
            $query = "UPDATE disciplina SET  disciplinaNome=".$params["nome"]
                                         .", semestreId=".$params["disciplinaSemetre"] 
                                         .", disciplinaPrerequisito=".$params["prerequisito"]
                                         .", disciplinaProfarea=".$params["profArea"]
                                         .", disciplinaProf=".$params["disciplinaProfessor"]
                                         .", disciplinaEmenta=".$params["ementa"]
                                         .", disciplinaObjetivo=".$params["objetivo"]
                                         ." WHERE disciplinaId=".$params["disciplinaId"];
            
            $this->db->query( $query );

            $query2 = "UPDATE distribcreditos SET distribcreditosTipo=".$params["distribcreditosTipo"] 
                                            .", distribcreditosCreditos=".$params["distribcreditosCreditos"]
                                            .", distribcreditosHorasaula=".$params["distribcreditosHorasaula"]
                                            ." WHERE distribcreditosId=".$params["distribcreditosId"];
            
           $this->db->query( $query2 );
        } else {
            $query = "INSERT INTO `disciplina` (
                `disciplinaId`, `semestreId`, 
                `disciplinaNome`, `disciplinaPrerequisito`, 
                `disciplinaProfarea`, `disciplinaProf`, 
                `disciplinaEmenta`, `disciplinaObjetivo`
                )
                VALUES( null," 
                        . $params['disciplinaSemetre'] .","
                        . $params['nome'] .","
                        . $params['prerequisito'] .","
                        . $params['profArea'] .","
                        . $params['disciplinaProfessor']. ","
                        . $params['ementa']. ","
                        . $params['objetivo']
                .")";

            $this->db->query( $query );

            $query2 = "SELECT disciplinaId FROM disciplina WHERE disciplinaNome=" . $params['nome'];
            $resultquery = $this->db->query( $query2 );

		    if( $resultquery && ( $resultquery->num_rows != 0 ) ){
                $resultquery->data_seek( 0 );
                $result = $resultquery->fetch_array(MYSQLI_ASSOC);

                $result["disciplinaId"] =  "'".$result["disciplinaId"]."'";

                $query2 = "INSERT INTO `distribcreditos` (
                    `distribcreditosId`, `disciplinaId`, 
                    `distribcreditosTipo`, `distribcreditosCreditos`, 
                    `distribcreditosHorasaula`
                    ) VALUES (null,"
                        . $result["disciplinaId"] . ","
                        . $params['distribcreditosTipo'] .","
                        . $params['distribcreditosCreditos'] .","
                        . $params['distribcreditosHorasaula']
                .")";

                $this->db->query( $query2 );
            }

            
        }
    }

    public function postDisciplinaBibliografia( $params = null ) {
        if( $params == null )
        return false;

        if( $params["bibliografiaId"] === 'N' )
            $params["bibliografiaId"] = null;

        $params["disciplinaId"] =        $params["disciplinaId"] ? "'".       $params["disciplinaId"]."'"        : 'null';
        $params["bibliografiaId"] =      $params["bibliografiaId"] ? "'".     $params["bibliografiaId"]."'"      : 'null';
        $params["disciblibioTipo"] =     $params["disciblibioTipo"] ? "'".    $params["disciblibioTipo"]."'"     : 'null';
        $params["bibliografiaTitulo"] =  $params["bibliografiaTitulo"] ? "'". $params["bibliografiaTitulo"]."'"  : 'null';
        $params["bibliografiaAutor"] =   $params["bibliografiaAutor"] ? "'".  $params["bibliografiaAutor"]."'"   : 'null';
        $params["bibliografiaEditora"] = $params["bibliografiaEditora"] ? "'".$params["bibliografiaEditora"]."'" : 'null';
        $params["bibliografiaAno"] =     $params["bibliografiaAno"] ? "'".    $params["bibliografiaAno"]."'"     : 'null';
        $params["bibliografiaVolume"] =  $params["bibliografiaVolume"] ? "'". $params["bibliografiaVolume"]."'"  : 'null';
        $params["bibliografiaEdicao"] =  $params["bibliografiaEdicao"] ? "'". $params["bibliografiaEdicao"]."'"  : 'null';

        if( $params["bibliografiaId"] !== 'null' ) {
            $query = "UPDATE bibliografia SET  bibliografiaTitulo=".$params["bibliografiaTitulo"]
                                        .", bibliografiaAutor=".$params["bibliografiaAutor"] 
                                        .", bibliografiaEdicao=".$params["bibliografiaEdicao"]
                                        .", bibliografiaAno=".$params["bibliografiaAno"]
                                        .", bibliografiaVolume=".$params["bibliografiaVolume"]
                                        .", bibliografiaEditora=".$params["bibliografiaEditora"]
                                        ." WHERE bibliografiaId=".$params["bibliografiaId"];
            
            $this->db->query( $query );

        } else {
            $query = "INSERT INTO `bibliografia` (
                `bibliografiaId`, `bibliografiaTitulo`, 
                `bibliografiaAutor`, `bibliografiaEdicao`, 
                `bibliografiaAno`, `bibliografiaVolume`, 
                `bibliografiaEditora`
                )VALUES( null," 
                        . $params['bibliografiaTitulo'] .","
                        . $params['bibliografiaAutor'] .","
                        . $params['bibliografiaEdicao'] .","
                        . $params['bibliografiaAno'] .","
                        . $params['bibliografiaVolume']. ","
                        . $params['bibliografiaEditora']
                .")";

            $this->db->query( $query );

            $query2 = "SELECT bibliografiaId FROM bibliografia WHERE bibliografiaTitulo=" . $params['bibliografiaTitulo'];
            $resultquery = $this->db->query( $query2 );

            if( $resultquery && ( $resultquery->num_rows != 0 ) ){
                $resultquery->data_seek( 0 );
                $result = $resultquery->fetch_array(MYSQLI_ASSOC);

                $result["bibliografiaId"] =  "'".$result["bibliografiaId"]."'";

                $query2 = "INSERT INTO `disciblibio` (
                    `disciblibioId`, `disciplinaId`, 
                    `bibliografiaId`, `disciblibioTipo`
                    ) VALUES ( null,"
                        . $this->disciplina["disciplinaId"] . ","
                        . $result['bibliografiaId'] .","
                        . $params['disciblibioTipo']
                .")";
                $this->db->query( $query2 );
            }
        }
    }
}