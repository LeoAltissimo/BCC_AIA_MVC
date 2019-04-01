<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>

<?php if( $modeloSobre->curso ){ ?>
<!-- Sobre o curso -->
<div class="about-1">
	<div class="container">
	<h3 class="title-txt"><span>O</span> Curso</h3>
		<div class="ab-agile">
			<div class="col-md-12 aboutleft1">
				<p class="para1"><?php echo $modeloSobre->curso['cursoDescricao']; ?></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--// sobre o curso -->
<?php } // fim if( $modeloSobre->curso ) ?>