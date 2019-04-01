<?php if ( ! defined('ABSPATH')) exit; 

if( $parametros ) {
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">M</span>ural de fotos</h1>
    </div>
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="muralFotoId" value="<?php echo $parametros[0] ?>">
        <input type="hidden" name="muralFotoCaminho" value="<?php echo $modeloMural->foto["muralFotoCaminho"]  ?>">
        <div class="col-10">
            <div class="col-12 form-separator">
                <!-- Slide Titulo -->
                <input 
                    class="col-10 prof-input-text" 
                    type="text" 
                    name="muralFotoTitulo" 
                    placeholder="Titulação" 
                    value=
                    "<?php 
                        echo $modeloMural->foto["muralFotoTitulo"] 
                    ?>" 
                />
            </div>
        </div>
        <div class="col-2">
            <style>
                #inputBk {
                    background-image: url('<?php echo  HOME_URI . "/views/_images/" . $modeloMural->foto['muralFotoCaminho']; ?>');
                    background-repeat: no-repeat;
                    background-size: cover;
                }
            </style>
            <label id="inputBk" class="label">
                <i id="inputTumbLabel" class="fas fa-camera"></i>
                <span class="title">Adicionar Foto</span>
                <input id="inputTumb" name="arquivo" type="file"/>
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

<?php
} else {
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">M</span>ural de fotos</h1>
    </div>
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="muralFotoId" value="<?php echo $parametros[0] ?>">
        <input type="hidden" name="muralFotoCaminho" value="<?php echo $modeloMural->foto["muralFotoCaminho"]  ?>">
        <div class="col-10">
            <div class="col-12 form-separator">
                <!-- Slide Titulo -->
                <input 
                    class="col-10 prof-input-text" 
                    type="text" 
                    name="muralFotoTitulo" 
                    placeholder="Titulação" 
                    value=""
                />
            </div>
        </div>
        <div class="col-2">
            <label id="inputBk" class="label">
                <i id="inputTumbLabel" class="fas fa-camera"></i>
                <span class="title">Adicionar Foto</span>
                <input id="inputTumb" name="arquivo" type="file"/>
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