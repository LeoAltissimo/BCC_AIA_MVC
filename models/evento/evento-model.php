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
    public $profList = array( array() );

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

        $this->getProfList();
	}

    protected function getEvento( $paramIdEvento = null ){
        
        if( !$paramIdEvento )
            return false;

        $query = "SELECT * FROM evento JOIN eventoemail, eventotel  WHERE evento.eventoId='$paramIdEvento' ";
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

    protected function getProfList() {
        
        $query = 'SELECT professorId, professorNome FROM professor';
        $resultquery = $this->db->query( $query );

		if( $resultquery && ( $resultquery->num_rows != 0 ) ){
            for( $i = 0 ; $i < $resultquery->num_rows ; $i++){    
                $resultquery->data_seek( $i );
                $linha = $resultquery->fetch_array(MYSQLI_ASSOC);

                foreach( $linha as $key => $value ){
                    if(  is_string( $value ) )
                        $this->profList[$i]["$key"] = utf8_encode( $value );
                    else
                        $this->profList[$i]["$key"] = $value;
                }
            }  
            return true;
        }   
        else
            return false;
    }

    public function postEvento( $params = null, $nomeArquivo = null ) {
        if( $params == null )
            return false;

        $params["eventoId"] = $params["eventoId"] ? "'".$params["eventoId"]."'" : 'null';
        $params["nome"] = $params["nome"] ? "'".$params["nome"]."'" : 'null';
        $params["email"] = $params["email"] ? "'".$params["email"]."'" : 'null';
        $params["telefone"] = $params["telefone"] ? "'".$params["telefone"]."'" : 'null';
        $params["date-i"] = $params["date-i"] ? "'".$params["date-i"]."'" : 'null';
        $params["date-f"] = $params["date-f"] ? "'".$params["date-f"]."'" : 'null';
        $params["prof-org"] = $params["prof-org"] ? "'".$params["prof-org"]."'" : 'null';
        $params["apresentacao"] = $params["apresentacao"] ? "'".$params["apresentacao"]."'" : 'null';
        $params["regulamento"] = $params["regulamento"] ? "'".$params["regulamento"]."'" : 'null';
        $nomeArquivo = $nomeArquivo ? "'".$nomeArquivo."'"  : 'null';

        $params["rua"] = $params["rua"] ? "'".$params["rua"]."'" : 'null';
        $params["numero"] = $params["numero"] ? "'".$params["numero"]."'" : 'null';
        $params["bairro"] = $params["bairro"] ? "'".$params["bairro"]."'" : 'null';
        $params["complemento"] = $params["complemento"] ? "'".$params["complemento"]."'" : 'null';
        $params["cep"] = $params["cep"] ? "'".$params["cep"]."'" : 'null';
        $params["cidade"] = $params["cidade"] ? "'".$params["cidade"]."'" : 'null';
        $params["estado"] = $params["estado"] ? "'".$params["estado"]."'" : 'null';
        $params["pais"] = $params["pais"] ? "'".$params["pais"]."'" : 'null';


        if( $params["eventoId"] !== 'null' ) {
            // $query = "UPDATE professor SET professorNome=".$params["nome"]
            //                              .", professorFacebook=".$params["facebook"]
            //                              .", professorLattes=".$params["lattes"]
            //                              .", professorApresentacao=".$params["apresentacao"]
            //                              .", professorTitulacao=".$params["titulacao"]
            //                              ." WHERE professorId=".$params["professorId"];
            // $this->db->query( $query );

            // $query2 = "UPDATE emailprof SET emailProfEmail=".$params["email"]
            //                     ." WHERE professorId=".$params["professorId"];
            // $this->db->query( $query2 );

            // $query3 = "UPDATE telprof SET telProfTel=".$params["tel"]
            //                     ." WHERE professorId=".$params["professorId"];
            // $this->db->query( $query3 );

        } else {
            $query = "INSERT INTO evento ( `eventoId`, `cursoId`, `eventoNome`, 
                                           `eventoApresentacao`, `eventoInicio`, 
                                           `eventoTermino`, `eventoRegulamento`, 
                                           `eventoProfOrganizador`, `eventoCapa`)
                VALUES( null, 2," . $params['nome'] .",". $params['apresentacao'] .",".
                        $params['date-i'] .",". $params['date-f'] .",".
                        $params['regulamento']. ",". $params['prof-org']. ",". $nomeArquivo .")";


            echo $query;
            $this->db->query( $query );

            $query2 = "SELECT eventoId FROM evento WHERE  eventoNome=" . $params['nome'];
            $resultquery = $this->db->query( $query2 );

		    if( $resultquery && ( $resultquery->num_rows != 0 ) ){
                $resultquery->data_seek( 0 );

                $result = $resultquery->fetch_array(MYSQLI_ASSOC);
                $result["eventoId"];

                $query3 = "INSERT INTO eventoemail ( `eventoId`, `eventoemailEmail`) VALUES(" .$result["eventoId"]. ", " .$params["email"].")";
                $this->db->query( $query3 );

                $query4 = "INSERT INTO eventotel ( `eventoId`, `eventotelTel`) VALUES(" .$result["eventoId"]. ", " .$params["telefone"].")";
                $this->db->query( $query4 );

                $query5 = "INSERT INTO eventoendereco ( 
                    `eventoId`, `eventoenderecoCep`, 
                    `eventoenderecoPais`, `eventoenderecoEstado`,
                    `eventoenderecoCidade`, `eventoenderecoBairro`,
                    `eventoenderecoRua`, `eventoenderecoNumero`, 
                    `eventoenderecoComplemento`
                ) 
                VALUES(" 
                    .$result["eventoId"].   ", " .$params["cep"].    ", "
                    .$params["pais"].       ", " .$params["estado"]. ", "
                    .$params["cidade"].     ", " .$params["bairro"]. ", "
                    .$params["rua"].        ", " .$params["numero"]. ", "
                    .$params["complemento"].
                ")";
                $this->db->query( $query5 );
            }

        }
    }

    public function postEventoComissao($params = null) {
        if( !$params )
            return false;

        $params["comissaoId"] = $params["comissaoId"] ? "'".$params["comissaoId"]."'" : 'null';
        $params["eventoId"] = $params["eventoId"] ? "'".$params["eventoId"]."'" : 'null';
        $params["rotulo"] = $params["rotulo"] ? "'".$params["rotulo"]."'" : 'null';
        $params["integranes"] = $params["integranes"] ? "'".$params["integranes"]."'" : 'null';

        if( $params["comissaoId"] !== 'null' ) {
            // $query = "UPDATE professor SET professorNome=".$params["nome"]
            //                              .", professorFacebook=".$params["facebook"]
            //                              .", professorLattes=".$params["lattes"]
            //                              .", professorApresentacao=".$params["apresentacao"]
            //                              .", professorTitulacao=".$params["titulacao"]
            //                              ." WHERE professorId=".$params["professorId"];
            // $this->db->query( $query );

            // $query2 = "UPDATE emailprof SET emailProfEmail=".$params["email"]
            //                     ." WHERE professorId=".$params["professorId"];
            // $this->db->query( $query2 );

            // $query3 = "UPDATE telprof SET telProfTel=".$params["tel"]
            //                     ." WHERE professorId=".$params["professorId"];
            // $this->db->query( $query3 );

        } else {
            $query = "INSERT INTO comissao ( `comissaoId`, `eventoId`, `comissaoRotulo`, `comissaoIntegrantes`)
                VALUES( null," . $params['eventoId'] .",". $params['rotulo'] .",". $params['integranes'] .")";

            $this->db->query( $query );
        }
    }

}