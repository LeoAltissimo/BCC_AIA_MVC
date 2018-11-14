<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 

if( $modeloListaDocentes->listaProfessores){
?>


<div class="about-1">
	<div class="container">
    <h3 class="title-txt"><span>C</span>orpo Docente</h3>
    
        <?php
            foreach( $modeloListaDocentes->listaProfessores as $value ){
        ?>

		<div class="ab-agile">
			<div class="col-md-9 aboutleft1">
				<a href='<?php echo HOME_URI. "/docente/index/" . $value['professorId'] . "/"; ?> '>
                    <h3><?php echo $value['professorTitulacao'] . " " . $value['professorNome']; ?></h3>
                </a>
				<p class="para1"><?php echo substr( $value['professorApresentacao'], 0 , 300); ?></p>
			</div>
			<div class="col-md-3 aboutright1">
				<img src="<?php echo HOME_URI . "/views/_images/" . $value['professorTumb'] . ".jpg"; ?>" class="img-responsive" alt="">
			</div>
			<div class="clearfix"></div>
        </div>
        
        <?php
            }
        ?>

	</div>
</div>

<?php
}else{
?>

<h1>Não Existem Professores cadastrasdos</h1>

<?php
}
?>