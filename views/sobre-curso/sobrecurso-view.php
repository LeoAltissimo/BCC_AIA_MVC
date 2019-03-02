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
				<p class="para1"><?php echo utf8_encode($modeloSobre->curso['cursoDescricao']); ?></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--// sobre o curso -->
<!--about-->
<div class="about">
	<div class="container">
		<div class="about-main">
			<div class="about-right">
				<h3 class="subheading-w3-agile">About Us</h3>
				<p class="para-w3-agileits">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis tristique est, et egestas odio, sed interdum risus.</p>
				<!-- stats -->
				<div class="stats">
					<div class="stats_inner">
						<div class="col-md-6 col-sm-6 col-xs-6 stat-grids">
							<p class="counter-agileits-w3layouts">20</p>
							<div class="stats-text-wthree">
								<h3>CLASSES</h3>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 stat-grids">
							<p class="counter-agileits-w3layouts">87</p>
							<div class="stats-text-wthree">
								<h3>REVIEWS</h3>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 stat-grids">
							<p class="counter-agileits-w3layouts">12</p>
							<div class="stats-text-wthree">
								<h3> ACTIVITIES</h3>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 stat-grids">
							<p class="counter-agileits-w3layouts">45</p>
							<div class="stats-text-wthree">
								<h3>PRIZE LAURATES</h3>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //stats -->
			</div>
		</div>
	</div>
</div>
<!--//sobre-->
<?php } // fim if( $modeloSobre->curso ) ?>