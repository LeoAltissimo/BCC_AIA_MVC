<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>


<div class="typo">
    <div class='container'>
    <div class=" col-md-3 thumbnail team-w3agile">
        <img src="<?php echo HOME_URI. '/views/_images/' . $modeloDocente->professor['professorTumb']; ?>.jpg" class="img-responsive" alt="">
        <div class="team-info">
            <div class="caption">
                <h4><?php echo $modeloDocente->professor['professorNome']; ?></h4>
                <p><?php echo $modeloDocente->professor['professorTitulacao']; ?></p>
            </div>
            <div class="w3ls-social-icons">
                <?php if( $modeloDocente->professor["professorFacebook"] ) { ?>
                    <a class="facebook" href="<?php echo $modeloDocente->professor["professorFacebook"]; ?>"><span class="fa fa-facebook"></span></a>
                <?php } ?> 
                <?php if( $modeloDocente->professor["professorLattes"] ) { ?>
                    <a class="facebook" href="<?php echo $modeloDocente->professor["professorLattes"]; ?>"><span class="fa fa-facebook"></span></a>
                <?php } ?>    
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class=" col-md-8 map">

        <div class='wells'>
            <h3><?php echo $modeloDocente->professor['professorNome']; ?></h3>
            <p><?php echo $modeloDocente->professor['professorApresentacao']; ?></p>
        </div>
        
        <?php if( $modeloDocente->professor['emailProfEmail'] ){ ?>
        <div class="col-md-4 contact-grid1">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <div class="contact-right">
                <p>Email</p>
                <span><?php echo $modeloDocente->professor['emailProfEmail']; ?></span>
            </div>
        </div>
        <?php } //if( $modeloDocente->professor['telprof'] ) { ?>
        <div class="col-md-4 contact-grid1">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <div class="contact-right">
                <p>Contato</p>
                <span></span>
            </div>
        </div>
        <?php /* } */ if( $modeloDocente->professor['professorLattes'] ){ ?>
        <div class="col-md-4 contact-grid1">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <div class="contact-right">
                <p>Lattes</p>
                <span><?php echo $modeloDocente->professor['professorLattes']; ?></span>
            </div>
        </div>
        <?php } ?>

        <div class="clearfix"></div>
    </div>
                </div>
</div>