<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>

<?php if( $modeloProfessores->listaProfessores ){ ?>
<!-- Mural Professores -->
<div class="team">
		<div class="container">
			<h3 class="title-txt"><span>C</span>orpo Docente</h3>
			<div class="row team-row">

            <?php
                foreach( $modeloProfessores->listaProfessores as $key => $value ){
            ?>
                <div class="col-md-3 col-sm-6 thumbnail team-w3agile">
				<?php echo  "<a href='" .HOME_URI. '/docente/index/' . $value["professorId"] . "'>" ?>
					<img src=" <?php echo  HOME_URI. '/views/_images/' . $value["professorTumb"] . '.jpg' ?> " class="img-responsive" alt="">
				</a>
					<div class="team-info">
						<div class="caption">
							<h4><?php echo $value["professorNome"]; ?></h4>
							<p><?php echo $value["professorTitulacao"]; ?></p>
						</div>
						<div class="w3ls-social-icons">
                            <?php if( $value["professorFacebook"] ) { ?>
                                <a class="facebook" href="<?php echo $value["professorFacebook"]; ?>"><span class="fa fa-facebook"></span></a>
                            <?php } ?> 
                            <?php if( $value["professorLattes"] ) { ?>
                                <a class="facebook" href="<?php echo $value["professorLattes"]; ?>"><span class="fa fa-facebook"></span></a>
                            <?php } ?>    
						</div>
					</div>
                </div>
            <?php
                }
            ?>
            
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- // Mural Professores -->
<?php } ?>