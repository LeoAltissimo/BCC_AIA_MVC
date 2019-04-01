<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>

<!--Slider-->
<?php if( $modeloSlider->slide ){ ?>
<div class="slider">
	<div class="callbacks_container">
		<ul class="rslides" id="slider3">
		<?php  foreach ($modeloSlider->slide as $slide) {

			$cor = $slide['homeSlideTituloCor'] ? $slide['homeSlideTituloCor'] : 'ffffff';

			echo "
				<li>
					<div class='slider-img1' style=' background-image: url(" . HOME_URI. "/views/_images/$slide[homeSlideCaminho])'  >
						<div class='container'>
							<div class='slider_banner_info_w3ls'>
								<h4 style='color: $cor'>$slide[homeSlideTitulo]</h4>
							</div>
						</div>
					</div>
				</li>";
		} ?>
		
		</ul>
	</div>
</div>
<div class="clearfix"> </div>
<?php }// fim if( $modeloSlider->slide )  ?>
<!--//Slider-->