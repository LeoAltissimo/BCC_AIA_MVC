<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>

<?php if ( $modeloEvento->evento['eventoCapa'] ){ ?>
<!--Banner do Evento-->
<style>
    .banner-evento{
        background: url('<?php echo HOME_URI. '/views/_images/' . $modeloEvento->evento['eventoCapa']; ?>') no-repeat 0px 0px;
        background-size: cover;
        background-position: center;
    }
</style>
<div class="banner banner-evento">
			
</div>
<!-- //Banner do Evento-->
<?php } ?>


<!-- Evento -->
<div class="typo">
    <div class="container">
        <!-- Nome do Evento--><h3 class="title-txt"><?php echo  $modeloEvento->evento['eventoNome']; ?></h3>
        
        <?php   if ( $modeloEvento->evento['eventoApresentacao'] ){ ?>
        <!-- Apresentacao -->
        <div class="grid_3 grid_5 w3l">
            <h3>Apresentação</h3>
            <div class="tab-content">
                <p class="para1">
                    <?php echo  $modeloEvento->evento['eventoApresentacao']; ?>
                </p>
            </div>
        </div>
        <!--//Apresetacao -->
        <?php  } ?>
        
        <?php if( $modeloEvento->acontecimentos ){ ?>
        <!-- Programacao -->
        <div class="grid_3 grid_5 w3l">
            <h3>Programacao</h3>
            <div class="tab-content">
                
                <div class="bs-docs-example">
                    <table class="table table-bordered">

                        <?php
                            $data = null; 
                            foreach( $modeloEvento->acontecimentos as $value ) {
                                if( $data == null || $data != $value['acontecimentoData'] ){
                        ?>
                            <thead>
                                <tr>
                                    <th colspan='2'> <?php echo $modeloEvento->inverte_Data( $value['acontecimentoData'] ); ?> </th>
                                </tr>
                            </thead>   
                        <?php
                                    $data = $value['acontecimentoData'];
                                }
                        ?>

                             <tr>
                                <td> <?php echo $value['acontecimentoInicio'] . " - " . $value['acontecimentoTermino']; ?> </td>
                                <td>
                                    <?php echo '<p>' . $value['acontecimentoTipo'] . 
                                               "</p><p>" . $value['acontecimentoNome'] . 
                                               "</p><p>" .  $value['acontecimentoMinistrante'] . "</p>"; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    </div>

            </div>
        </div>
        <!--//Programacao -->
        <?php } ?>

        <?php if( $modeloEvento->acontecimentos ){ ?>            
        <!-- Minicursos -->
        <div class="grid_3 grid_5 agile">
                <h3>Minicursos</h3>
                <?php 
                    foreach( $modeloEvento->acontecimentos as $value ) { 
                    if( $value['acontecimentoTipo'] == "Minicurso" ){
                ?>
                    <div class="well ">
                        <p><strong><?php echo $value['acontecimentoNome'] ; ?></strong></p>
                        <p>Ministrante: <?php echo $value['acontecimentoNome'] ; ?></p>
                        <p>Data: <?php echo $modeloEvento->inverte_Data( $value['acontecimentoData'] ) . $value['acontecimentoInicio'] . " - " . $value['acontecimentoTermino']; ?></p>
                        <p>Vagas: <?php echo $value['acontecimentoVagas'] ; ?></p>
                        <p>Local: <?php echo $value['acontecimentoLocal'] ; ?></p>
                        <p><?php echo $value['acontecimentoObs'] ; ?></p>
                        
                    </div>
                <?php } } ?>
        </div>
        <!-- //Minicursso-->
        <?php } ?>

        <!-- Regulamento -->
        <div class="grid_3 grid_5 w3l">
                <h3>Regulamento</h3>
                <div class="tab-content">
                    <p class="para1">
                        <?php echo  $modeloEvento->evento['eventoRegulamento']; ?>
                    </p>
                </div>
            </div>
        <!--//Regulamento -->


        <?php if( $modeloEvento->comissoes ){ ?>
        <!-- Comissoes -->
        <div class="grid_3 grid_5 agile">
                <h3>Comissões</h3>

                <?php foreach( $modeloEvento->comissoes as $value ){ ?>
                    <div class="well">
                        <p><strong><?php echo $value['comissaoRotulo'];?></strong></p>
                        <ul>
                            <?php echo $value['comissaoIntegrantes'];?>
                        </ul>
                    </div>
                <?php } ?>
        </div>
        <!-- //Comissoes-->
         <?php } ?>

        <?php if( $modeloEvento->trabalhos ) { ?>
        <!-- TrabalhosApresentados -->
        <div class="grid_3 grid_5 agile">
                <h3>Trabalhos Apresentados</h3>
                <ul class="list-group w3-agile">
                    <?php foreach( $modeloEvento->trabalhos as $value ){ ?>
                        <li class="list-group-item">
                            <a href='<?php echo $value['trabalhoCaminho']; ?>'><strong><?php echo $value['trabalhoTitulo']; ?></strong></a>
                            <p><?php echo $value['trabalhoAutores']; ?></p>
                        </li>
                    <?php } ?>
                </ul>
        </div>
        <!-- //TrabalhosApresentados-->
        <?php } ?>

        <!-- Contato -->
        <div class="grid_3 grid_5 agile">
                <h3>Contato</h3>
                <div class=" col-md-5 map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.9321388216636!2d-53.21622848552565!3d-17.318823066901146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x937c9aad935629a1%3A0xfd6f0518555be7ca!2sUniversidade+do+Estado+de+Mato+Grosso%2C+Campus+Universit%C3%A1rio+de+Alto+Araguaia!5e0!3m2!1spt-BR!2sbr!4v1554089972464!5m2!1spt-BR!2sbr"></iframe>
                    <div class="clearfix"></div>
                </div>
                <div class=" col-md-3 thumbnail team-w3agile">
                <?php echo  "<a href='" .HOME_URI. '/docente/index/' . $modeloEvento->professorOrganizador["professorId"] . "'>" ?>    
                    <img src="<?php echo HOME_URI. '/views/_images/' . $modeloEvento->professorOrganizador['professorTumb']; ?>" class="img-responsive" alt="">
                </a>
                    <div class="team-info">
                        <div class="caption">
                            <h4><?php echo $modeloEvento->professorOrganizador['professorNome']; ?></h4>
                            <p><?php echo $modeloEvento->professorOrganizador['professorTitulacao']; ?></p>
                        </div>
						<div class="w3ls-social-icons">
                            <?php if( $modeloEvento->professorOrganizador["professorFacebook"] ) { ?>
                                <a class="facebook" href="<?php echo $modeloEvento->professorOrganizador["professorFacebook"]; ?>"><span class="fa fa-facebook"></span></a>
                            <?php } ?> 
                            <?php if( $modeloEvento->professorOrganizador["professorLattes"] ) { ?>
                                <a class="facebook" href="<?php echo $modeloEvento->professorOrganizador["professorLattes"]; ?>"><span class="fa fa-facebook"></span></a>
                            <?php } ?>    
						</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class=" col-md-4 map">
                        <ul class="list-group w3-agile">
                            <li class="list-group-item"><?php echo $modeloEvento->professorOrganizador['professorTitulacao'] . $modeloEvento->professorOrganizador['professorNome']; ?></li>
                            <li class="list-group-item">Email: <?php echo "<a href='mailto:" . $modeloEvento->professorOrganizador['emailProfEmail'] . "'>" . $modeloEvento->professorOrganizador['emailProfEmail'] .
                                                                          "</a><br><a href='mailto:" . $modeloEvento->evento['eventoemailEmail'] . "'>" . $modeloEvento->evento['eventoemailEmail'] . "</a>"; ?></li>
                            <li class="list-group-item">Contato: <?php echo $modeloEvento->evento['eventotelTel']; ?></li>
                            <li class="list-group-item">Endereço: <?php echo "Rua " . $modeloEvento->endereco['eventoenderecoRua'] . 
                                                                             ", " . $modeloEvento->endereco['eventoenderecoNumero'] .
                                                                             " - " . $modeloEvento->endereco['eventoenderecoBairro'] .
                                                                             ",<br>cidade: " . $modeloEvento->endereco['eventoenderecoCidade'] . 
                                                                             " - " . $modeloEvento->endereco['eventoenderecoEstado']. 
                                                                             "<br>CEP: " . $modeloEvento->endereco['eventoenderecoCep']; ?></li>
                        </ul>
                    <div class="clearfix"></div>
                </div>
        </div>
        <!-- //Contato -->


    </div>
</div>
<!-- //Evento -->
