<?php if ( ! defined('ABSPATH')) exit; 

if( $parametros[1] !== 'N' ) {
    $vals = $modeloDisciplinas;
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">F</span>onte Bibliográfica</h1>
    </div>
    <div>
        <form method="POST">
        <input type="hidden" name="disciplinaId" value="<?php echo $parametros[0] ?>">
        <input type="hidden" name="bibliografiaId" value="<?php echo $parametros[1] ?>">
        <input type="hidden" name="disciblibioTipo" value="<?php echo $parametros[2] ?>">
        <div class="col-12">
            <div class="col-12 form-separator">
                <input class="col-6 prof-input-text" type="text" name="bibliografiaTitulo"  placeholder="Título"  value="<?php echo $vals->livro["bibliografiaTitulo"] ?>"/>
                <input class="col-5 prof-input-text" type="text" name="bibliografiaAutor"   placeholder="Autor"   value="<?php echo $vals->livro["bibliografiaAutor"] ?>"/>
                <input class="col-5 prof-input-text" type="text" name="bibliografiaEditora" placeholder="Editora" value="<?php echo $vals->livro["bibliografiaEditora"] ?>"/>
                <input class="col-2 prof-input-text" type="text" name="bibliografiaAno"     placeholder="Ano"     value="<?php echo $vals->livro["bibliografiaAno"] ?>"/>
                <input class="col-2 prof-input-text" type="text" name="bibliografiaVolume"  placeholder="Volume"  value="<?php echo $vals->livro["bibliografiaVolume"] ?>"/>
                <input class="col-2 prof-input-text" type="text" name="bibliografiaEdicao"  placeholder="Edição"  value="<?php echo $vals->livro["bibliografiaEdicao"] ?>"/>
            </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>

<?php
} else {
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">F</span>onte Bibliográfica</h1>
    </div>
    <div>
        <form method="POST">
        <input type="hidden" name="disciplinaId" value="<?php echo $parametros[0] ?>">
        <input type="hidden" name="bibliografiaId" value="<?php echo $parametros[1] ?>">
        <input type="hidden" name="disciblibioTipo" value="<?php echo $parametros[2] ?>">
        <div class="col-12">
            <div class="col-12 form-separator">
                <input class="col-6 prof-input-text" type="text" name="bibliografiaTitulo"  placeholder="Título"   />
                <input class="col-5 prof-input-text" type="text" name="bibliografiaAutor"   placeholder="Autor"    />
                <input class="col-5 prof-input-text" type="text" name="bibliografiaEditora" placeholder="Editora"  />
                <input class="col-2 prof-input-text" type="text" name="bibliografiaAno"     placeholder="Ano"      />
                <input class="col-2 prof-input-text" type="text" name="bibliografiaVolume"  placeholder="Volume"   />
                <input class="col-2 prof-input-text" type="text" name="bibliografiaEdicao"  placeholder="Edição"   />
            </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>


<?php } ?>