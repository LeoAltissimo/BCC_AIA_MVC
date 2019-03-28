<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>


<?php if( $modeloDisciplinas->numSemestre != 0 ) { ?>
<!-- Mural Disciplinas -->
<div class="disciplinas">
		<div class="container">
			<h3 class="title-txt"><span>D</span>isciplinas</h3>
        <div class="diciplinasContainer">
        <?php
        for( $i = 0 ; $i < count( $modeloDisciplinas->listaDisciplinas); $i++ ){ 
            if( isset($modeloDisciplinas->listaDisciplinas[$i]) ){
        ?>    
            <div class="col-md-4 exp-info-right">
				<div class="ex-top">
                    <h4><?php echo $i + 1;?>º Semestre</h4>
                    
                    <?php
                        foreach( $modeloDisciplinas->listaDisciplinas[$i] as $value ) {
                    ?>
                            <li><span class="fa fa-check" aria-hidden="true"></span>
                                <a href='<?php echo HOME_URI . '/disciplina/index/' . $value['disciplinaId'] ;?>'>
                                    <?php echo $value["disciplinaNomeReduzido"]; ?>
                                </a>
                            </li>
                    <?php
                        }
					?>
				</div>
            </div>
        
        <?php } } ?>
        </div>
        <div class="clearfix"> </div>
	</div>
</div>
<!-- // Mural Disciplinas -->
<?php } ?>