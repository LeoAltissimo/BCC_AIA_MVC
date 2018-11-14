<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>


<?php if( $modeloListaDisciplinas->numSemestre != 0 ) { ?>
<!-- Mural Disciplinas -->
<div class="typo">
		<div class="container">
			<h3 class="title-txt"><span>D</span>isciplinas</h3>
            
        <?php
        for( $i = 1 ; $i < count( $modeloListaDisciplinas->listaDisciplinas); $i++ ){ 
            if( isset($modeloListaDisciplinas->listaDisciplinas[$i]) ){
        ?>    
            <div class="col-md-4">
                <div class="page-header">
                    <h3 class="bars"><?php echo $i ;?>º Semestre</h3>
                </div>
                <div class='well'>
                    <?php
                        foreach( $modeloListaDisciplinas->listaDisciplinas[$i] as $value ) {
                    ?>
                            <li><span class="fa fa-check" aria-hidden="true"></span>
                                <a href='<?php echo HOME_URI . '/disciplina/index/' . $value['disciplinaId'] ;?>'>
                                    <?php echo $value["disciplinaNome"]; ?>
                                </a>
                            </li>
                    <?php
                        }
                    ?>
                </div>
            </div>
        
        <?php } } ?>
        <div class="clearfix"> </div>
	</div>
</div>
<!-- // Mural Disciplinas -->
<?php } else
    echo "<h3>Não Existem Disciplinas Cadastradas</h3>";
?>