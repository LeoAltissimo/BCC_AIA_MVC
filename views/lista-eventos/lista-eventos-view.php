<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 

if( $modeloListaEvento->eventos){
?>


<div class="about-1">
	<div class="container">
    <h3 class="title-txt"><span>E</span>ventos</h3>
    
        <?php
            foreach( $modeloListaEvento->eventos as $value ){
        ?>

		<div class="ab-agile" style="margin-bottom: 20px;">
			<div class="col-md-6 aboutleft1">
				<a href='<?php echo HOME_URI. "/evento/index/" . $value['eventoId'] . "/"; ?> '>
                    <h3><?php echo $value['eventoNome']; ?></h3>
                </a>
				<p class="para1"><?php echo substr( $value['eventoApresentacao'], 0 , 300); ?></p>
			</div>
			<div class="col-md-6 aboutright1">
				<img src="<?php echo HOME_URI . "/views/_images/" . $value['eventoCapa']; ?>" class="img-responsive" alt="">
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

<h1>Não Existem Eventos cadastrasdos</h1>

<?php
}
?>