<?php if ( ! defined('ABSPATH')) exit; 

if( $parametros ) {
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">P</span>rofessores</h1>
    </div>
    <div>
        <form method="POST">
        <input type="hidden" name="professorId" value="<?php echo $modeloDocente->professor['professorId'] ?>">
        <div class="col-10">
            <div class="col-12 form-separator">
                <input class="col-2 prof-input-text" type="text" name="titulacao" placeholder="Titulação" value="<?php echo $modeloDocente->professor["professorTitulacao"] ?>" />
                <input class="col-9 prof-input-text" type="text" name="nome" placeholder="Nome" value="<?php echo $modeloDocente->professor['professorNome'] ?>" required="required" />
            </div>        
            <div class="col-12 form-separator">
                <input class="col-5 prof-input-text" type="tel" name="tel" placeholder="tel" value="<?php echo $modeloDocente->professor['telProfTel'] ?>"/>
                <input class="col-6 prof-input-text" type="email" name="email" placeholder="email" value="<?php echo $modeloDocente->professor['emailProfEmail'] ?>" required="required"/>
            </div>
            <div class="col-12 form-separator">
                <input class="col-5 prof-input-text" type="text" name="lattes" placeholder="Link Lattes" value="<?php echo $modeloDocente->professor['professorLattes'] ?>"/>
                <input class="col-6 prof-input-text" type="text" name="facebook" placeholder="Facebook" value="<?php echo $modeloDocente->professor['professorFacebook'] ?>"/>
            </div>
        </div>
        <div class="col-2">
            <style>
                #inputBk {
                    background-image:  url('<?php echo  HOME_URI . "/views/_images/" . $modeloDocente->professor['professorTumb']; ?>');
                    background-repeat: no-repeat;
                    background-size: cover;
                }
            </style>
            <label id="inputBk" class="label">
                <i id="inputTumbLabel" class="fas fa-camera"></i>
                <span class="title">Adicionar Foto</span>
                <input id="inputTumb" type="file" name="arquivo" type="file" value="<?php echo $modeloDocente->professor['professorTumb'] ?>"/>
            </label>
        </div>
        <div class="col-12 form-separator">
            <textarea class="col-12 prof-input-textarea" name="apresentacao" placeholder="Apresentacao" rows="4"><?php echo $modeloDocente->professor['professorApresentacao'] ?></textarea>
        </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>
<script>
var intervaulo = setInterval(() => {
    var x = document.getElementById("inputTumb");
    if ('files' in x) 
        if (x.files.length > 0) {
            var y = document.getElementById("inputTumbLabel").className = "far fa-check-circle";
            clearInterval(intervaulo);
        }
}, 1000);
</script>

<?php
} else {
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">P</span>rofessores</h1>
    </div>
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="professorId">
        <div class="col-10">
            <div class="col-12 form-separator">
                <input class="col-2 prof-input-text" type="text" name="titulacao" placeholder="Titulação" />
                <input class="col-9 prof-input-text" type="text" name="nome" placeholder="Nome" required="required"/>
            </div>        
            <div class="col-12 form-separator">
                <input class="col-5 prof-input-text" type="tel" name="tel" placeholder="tel" />
                <input class="col-6 prof-input-text" type="email" name="email" placeholder="email" required="required" />
            </div>
            <div class="col-12 form-separator">
                <input class="col-5 prof-input-text" type="text" name="lattes" placeholder="Link Lattes" />
                <input class="col-6 prof-input-text" type="text" name="facebook" placeholder="Facebook" />
            </div>
        </div>
        <div class="col-2">
            <label class="label">
                <i id="inputTumbLabel" class="fas fa-camera"></i>
                <span class="title">Adicionar Foto</span>
                <input id="inputTumb" type="file" name="arquivo" type="file"/>
            </label>
        </div>
        <div class="col-12 form-separator">
            <textarea class="col-12 prof-input-textarea" name="apresentacao" placeholder="Apresentacao" rows="4"></textarea>
        </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>

<script>
var intervaulo = setInterval(() => {
    var x = document.getElementById("inputTumb");
    if ('files' in x) 
        if (x.files.length > 0) {
            var y = document.getElementById("inputTumbLabel").className = "far fa-check-circle";
            clearInterval(intervaulo);
        }
}, 1000);
</script>

<?php } ?>