<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>

<?php 
	if( $modeloEvento->eventos ){ 
?>
<!-- Mural de Eventos -->
<div class="about">
		<div class="container evento">
			<h3 class="title-txt-wht">Eventos</h3>
			<div class="col-md-6 testimonials-main">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">

							<?php 
								foreach( $modeloEvento->eventos as $evento ){ 	
							?>

								<li>
									<div class="inner-testimonials-w3ls">
										<a href='<?php echo HOME_URI . '/evento/index/' . $evento['eventoId'] ;?>'>
										<img src="<?php echo HOME_URI. '/views/_images/' . $evento['eventoCapa'];?>" alt="Capa evento <?php echo $evento['eventoNome'];?>" class="img-responsive" />
										<div class="testimonial-info-wthree">
											
												<h5><?php echo $evento['eventoNome'];?></h5>
												<span style="color: #fff"><?php echo "Início " . ($modeloEvento->inverte_data( $evento['eventoInicio'] )) . " término " . ($modeloEvento->inverte_data( $evento['eventoTermino'] ));?></span>
											
										</div>
										</a>
									</div>
								</li>
							
							<?php 
								} 
							?>

						</ul>
					</div>
				</section>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //Mural de Eventos -->
<?php 
	}
?>