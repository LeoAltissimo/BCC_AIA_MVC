<?php if ( ! defined('ABSPATH')) exit;

if( isset($parametros[1]) ) {
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">T</span>rabalho</h1>
    </div>
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="eventoId" value="<?php echo $parametros[0] ?>">
        <input type="hidden" name="trabalhoId" value="<?php echo $parametros[1] ?>">
        <div class="col-10 input-container">
            <input class="col-11 prof-input-text" type="text" name="trabalhoTitulo" placeholder="Titulo do Trabalho" value="<?php echo $vals["trabalhoTitulo"]; ?>" />
            <input class="col-11 prof-input-text" type="text" name="trabalhoAutores" placeholder="Autores" value="<?php echo $vals["trabalhoAutores"]; ?>" />
        </div>
        <div class="col-2">
            <label id="inputBk"  class="label">
                <i id="inputTumbLabel" class="fas fa-paperclip"></i>
                <span class="title">Arquivo Trabalho</span>
                <input id="inputTumb" type="file" name="trabalhoCaminho" type="file" value="<?php echo $vals['trabalhoCaminho']; ?>"/>
            </label>
            <?php echo $vals['trabalhoCaminho'] ?>
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
        <h1><span class="first-letter">T</span>rabalho</h1>
    </div>
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="eventoId" value="<?php echo $parametros[0] ?>">
        <input type="hidden" name="trabalhoId">
        <div class="col-10 input-container">
            <input class="col-11 prof-input-text" type="text" name="trabalhoTitulo" placeholder="Titulo do Trabalho" />
            <input class="col-11 prof-input-text" type="text" name="trabalhoAutores" placeholder="Autores" />
        </div>
        <div class="col-2">
            <label id="inputBk"  class="label">
                <i id="inputTumbLabel" class="fas fa-paperclip"></i>
                <span class="title">Arquivo Trabalho</span>
                <input id="inputTumb" type="file" name="trabalhoCaminho" type="file" />
            </label>
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