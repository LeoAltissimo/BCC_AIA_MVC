<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>

<?php if( $modeloFotos->listaFotos ){ ?>

<!-- Mural de Fotos -->
<div class="events-section">
		<div class="container">
			<h3 class="title-txt two"><span>E</span>strutura</h3>
			<div class="gallery_gds">

            <?php
                foreach( $modeloFotos->listaFotos as $key => $value ){ 
            ?>

				<div class="col-md-4 gallery-grids">
					<div class="galry-img-agileinfo">
						<a href="images/g2.jpg" class="swipebox" title=" <?php echo $value['muralFotoTitulo'];?> ">
							<img class="img-responsive img-style row2" src="<?php echo HOME_URI. '/views/_images/' . $value['muralFotoCaminho'] . '.jpg';?>" alt="<?php echo $value['muralFotoTitulo'];?>"/> 
						</a>
					</div>
                </div>
                
            <?php
                }
            ?>
            
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //Mural de fotos -->
<?php } ?>