<?php if ( ! defined('ABSPATH')) exit; 

if( $parametros ) {
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">P</span>rofessores</h1>
    </div>
    <div>
        <form method="POST">
        <div class="col-12 form-separator">
            <input class="col-1 prof-input-text" type="text" name="titulacao" placeholder="Titulação" value="<?php echo $modeloDocente->professor["professorTitulacao"] ?>" />
            <input class="col-9 prof-input-text" type="text" name="nome" placeholder="Nome" value="<?php echo $modeloDocente->professor['professorNome'] ?>" />
        </div>        
        <div class="col-12 form-separator">
            <input class="col-4 prof-input-text" type="tel" name="tel" placeholder="tel" />
            <input class="col-6 prof-input-text" type="email" name="email" placeholder="email" value="<?php echo $modeloDocente->professor['emailProfEmail'] ?>"/>
        </div>
        <div class="col-12 form-separator">
            <input class="col-4 prof-input-text" type="text" name="lattes" placeholder="Link Lattes" value="<?php echo $modeloDocente->professor['professorLattes'] ?>"/>
            <input class="col-6 prof-input-text" type="text" name="facebook" placeholder="Facebook" />
        </div>
        <div class="col-12 form-separator">
            <textarea class="col-12 prof-input-textarea" name="apresentacao" placeholder="Apresentacao" rows="4"><?php echo $modeloDocente->professor['professorApresentacao'] ?></textarea>
        </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>

<?php
} else {
?>


<?php } ?>