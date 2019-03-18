<?php if ( ! defined('ABSPATH')) exit;

if( isset($parametros[1]) ) {
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">A</span>contecimento</h1>
    </div>    
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="eventoId" value="<?php echo $parametros[0] ?>">
        <input type="hidden" name="acontecimentoId" value="<?php echo $parametros[1] ?>">
        <div class="col-12">
            <input class="col-12 prof-input-text" type="text" name="nome" placeholder="Nome do acontecimento" value="<?php echo $vals['acontecimentoNome'] ?>"/>
            <div class='col-12'>
              <input class="col-5 prof-input-text" type="date" name="data" placeholder="Data"value="<?php echo $vals['acontecimentoData'] ?>"/>
              <input class="col-3 prof-input-text" type="text" name="inicio" placeholder="hora de início" value="<?php echo $vals['acontecimentoInicio'] ?>"/>
              <input class="col-3 prof-input-text" type="text" name="termino" placeholder="hora de término" value="<?php echo $vals['acontecimentoTermino'] ?>"/>
            </div>
            <div class="col-12">
              <input class="col-4 prof-input-text" type="text" name="local" placeholder="Local" value="<?php echo $vals['acontecimentoLocal'] ?>"/>
              <input class="col-3 prof-input-text" type="text" name="ministrante" placeholder="Ministrante" value="<?php echo $vals['acontecimentoMinistrante'] ?>"/>
              <input class="col-3 prof-input-text" type="text" name="tipo" placeholder="Tipo (palestra, minicurso, ...)" value="<?php echo $vals['acontecimentoTipo'] ?>"/>
              <input class="col-1 prof-input-text" type="number" name="vagas" placeholder="numero de vagas" value="<?php echo $vals['acontecimentoVagas'] ?>"/>
            </div>
            <div>
                <div class='editContainer'>
                    <div id='ApresentacaoeditControls' class="editControls">
                    <div>
                        <a data-role='undo' href='javascript:void(0)'><i class='fa fa-undo'></i></a>
                        <a data-role='redo' href='javascript:void(0)'><i class='fa fa-repeat'></i></a>
                        <a data-role='bold' href='javascript:void(0)'><i class='fa fa-bold'></i></a>
                        <a data-role='italic' href='javascript:void(0)'><i class='fa fa-italic'></i></a>
                        <a data-role='underline' href='javascript:void(0)'><i class='fa fa-underline'></i></a>
                        <a data-role='strikeThrough' href='javascript:void(0)'><i class='fa fa-strikethrough'></i></a>
                        <a data-role='justifyLeft' href='javascript:void(0)'><i class='fa fa-align-left'></i></a>
                        <a data-role='justifyCenter' href='javascript:void(0)'><i class='fa fa-align-center'></i></a>
                        <a data-role='justifyRight' href='javascript:void(0)'><i class='fa fa-align-right'></i></a>
                        <a data-role='justifyFull' href='javascript:void(0)'><i class='fa fa-align-justify'></i></a>
                        <a data-role='indent' href='javascript:void(0)'><i class='fa fa-indent'></i></a>
                        <a data-role='outdent' href='javascript:void(0)'><i class='fa fa-outdent'></i></a>
                        <a data-role='insertUnorderedList' href='javascript:void(0)'><i class='fa fa-list-ul'></i></a>
                        <a data-role='insertOrderedList' href='javascript:void(0)'><i class='fa fa-list-ol'></i></a>
                        <a data-role='h1' href='javascript:void(0)'>h<sup>1</sup></a>
                        <a data-role='h2' href='javascript:void(0)'>h<sup>2</sup></a>
                        <a data-role='p' href='javascript:void(0)'>p</a>
                        <a data-role='subscript' href='javascript:void(0)'><i class='fa fa-subscript'></i></a>
                        <a data-role='superscript' href='javascript:void(0)'><i class='fa fa-superscript'></i></a>
                    </div>
                    </div>
                    <div id='editorApresentacao'class="editor" contenteditable>
                    <?php echo $vals['acontecimentoApresentacao'] ?>
                    </div>
                    <input type="hidden" id='outputApresentacao' name="apresencacao" value="<?php echo $vals['acontecimentoApresentacao'] ?>"/>
                </div>
            </div>
            <div>
                <div class='editContainer'>
                    <div id='ObcervacoeseditControls' class="editControls">
                    <div>
                        <a data-role='undo' href='javascript:void(0)'><i class='fa fa-undo'></i></a>
                        <a data-role='redo' href='javascript:void(0)'><i class='fa fa-repeat'></i></a>
                        <a data-role='bold' href='javascript:void(0)'><i class='fa fa-bold'></i></a>
                        <a data-role='italic' href='javascript:void(0)'><i class='fa fa-italic'></i></a>
                        <a data-role='underline' href='javascript:void(0)'><i class='fa fa-underline'></i></a>
                        <a data-role='strikeThrough' href='javascript:void(0)'><i class='fa fa-strikethrough'></i></a>
                        <a data-role='justifyLeft' href='javascript:void(0)'><i class='fa fa-align-left'></i></a>
                        <a data-role='justifyCenter' href='javascript:void(0)'><i class='fa fa-align-center'></i></a>
                        <a data-role='justifyRight' href='javascript:void(0)'><i class='fa fa-align-right'></i></a>
                        <a data-role='justifyFull' href='javascript:void(0)'><i class='fa fa-align-justify'></i></a>
                        <a data-role='indent' href='javascript:void(0)'><i class='fa fa-indent'></i></a>
                        <a data-role='outdent' href='javascript:void(0)'><i class='fa fa-outdent'></i></a>
                        <a data-role='insertUnorderedList' href='javascript:void(0)'><i class='fa fa-list-ul'></i></a>
                        <a data-role='insertOrderedList' href='javascript:void(0)'><i class='fa fa-list-ol'></i></a>
                        <a data-role='h1' href='javascript:void(0)'>h<sup>1</sup></a>
                        <a data-role='h2' href='javascript:void(0)'>h<sup>2</sup></a>
                        <a data-role='p' href='javascript:void(0)'>p</a>
                        <a data-role='subscript' href='javascript:void(0)'><i class='fa fa-subscript'></i></a>
                        <a data-role='superscript' href='javascript:void(0)'><i class='fa fa-superscript'></i></a>
                    </div>
                    </div>
                    <div id='editorObcervacoes'class="editor" contenteditable>
                    <?php echo $vals['acontecimentoObs'] ?>
                    </div>
                    <input type="hidden" id='outputObcervacoes' name="obcervacoes" value="<?php echo $vals['acontecimentoObs'] ?>"/>
                </div>
            </div>
         </div>
            <input class="form-submit" type="submit">
        </form>
    </div>

<script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/jquery-2.2.3.min.js"></script>
<script>
$('#ApresentacaoeditControls a').click(function(e) {
  switch($(this).data('role')) {
    case 'h1':
    case 'h2':
    case 'p':
      document.execCommand('formatBlock', false, $(this).data('role'));
      break;
    default:
      document.execCommand($(this).data('role'), false, null);
      break;
    }
  update_output();
})
$('#editorApresentacao').bind('blur keyup paste copy cut mouseup', function(e) {
  update_output('#outputApresentacao', '#editorApresentacao');
})

$('#ObcervacoeseditControls a').click(function(e) {
  switch($(this).data('role')) {
    case 'h1':
    case 'h2':
    case 'p':
      document.execCommand('formatBlock', false, $(this).data('role'));
      break;
    default:
      document.execCommand($(this).data('role'), false, null);
      break;
    }
  update_output();
})
$('#editorObcervacoes').bind('blur keyup paste copy cut mouseup', function(e) {
  update_output('#outputObcervacoes', '#editorObcervacoes');
})

function update_output(param1, param2) {
  $(param1).val($(param2).html());
}
</script>
</section>

<?php
} else {
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">A</span>contecimento</h1>
    </div>    
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="eventoId" value="<?php echo $parametros[0] ?>">
        <input type="hidden" name="acontecimentoId" value="">
        <div class="col-12">
            <input class="col-12 prof-input-text" type="text" name="nome" placeholder="Nome do acontecimento" />
            <div class='col-12'>
              <input class="col-5 prof-input-text" type="date" name="data" placeholder="Data" />
              <input class="col-3 prof-input-text" type="text" name="inicio" placeholder="hora de início" />
              <input class="col-3 prof-input-text" type="text" name="termino" placeholder="hora de término" />
            </div>
            <div class="col-12">
              <input class="col-4 prof-input-text" type="text" name="local" placeholder="Local" />
              <input class="col-3 prof-input-text" type="text" name="ministrante" placeholder="Ministrante" />
              <input class="col-3 prof-input-text" type="text" name="tipo" placeholder="Tipo (palestra, minicurso, ...)" />
              <input class="col-1 prof-input-text" type="number" name="vagas" placeholder="vagas" />
            </div>
            <div>
                <div class='editContainer'>
                    <div id='ApresentacaoeditControls' class="editControls">
                    <div>
                        <a data-role='undo' href='javascript:void(0)'><i class='fa fa-undo'></i></a>
                        <a data-role='redo' href='javascript:void(0)'><i class='fa fa-repeat'></i></a>
                        <a data-role='bold' href='javascript:void(0)'><i class='fa fa-bold'></i></a>
                        <a data-role='italic' href='javascript:void(0)'><i class='fa fa-italic'></i></a>
                        <a data-role='underline' href='javascript:void(0)'><i class='fa fa-underline'></i></a>
                        <a data-role='strikeThrough' href='javascript:void(0)'><i class='fa fa-strikethrough'></i></a>
                        <a data-role='justifyLeft' href='javascript:void(0)'><i class='fa fa-align-left'></i></a>
                        <a data-role='justifyCenter' href='javascript:void(0)'><i class='fa fa-align-center'></i></a>
                        <a data-role='justifyRight' href='javascript:void(0)'><i class='fa fa-align-right'></i></a>
                        <a data-role='justifyFull' href='javascript:void(0)'><i class='fa fa-align-justify'></i></a>
                        <a data-role='indent' href='javascript:void(0)'><i class='fa fa-indent'></i></a>
                        <a data-role='outdent' href='javascript:void(0)'><i class='fa fa-outdent'></i></a>
                        <a data-role='insertUnorderedList' href='javascript:void(0)'><i class='fa fa-list-ul'></i></a>
                        <a data-role='insertOrderedList' href='javascript:void(0)'><i class='fa fa-list-ol'></i></a>
                        <a data-role='h1' href='javascript:void(0)'>h<sup>1</sup></a>
                        <a data-role='h2' href='javascript:void(0)'>h<sup>2</sup></a>
                        <a data-role='p' href='javascript:void(0)'>p</a>
                        <a data-role='subscript' href='javascript:void(0)'><i class='fa fa-subscript'></i></a>
                        <a data-role='superscript' href='javascript:void(0)'><i class='fa fa-superscript'></i></a>
                    </div>
                    </div>
                    <div id='editorApresentacao'class="editor" contenteditable>
                    <p>Apresentação</p>
                    </div>
                    <input type="hidden" id='outputApresentacao' name="apresencacao"/>
                </div>
            </div>
            <div>
                <div class='editContainer'>
                    <div id='ObcervacoeseditControls' class="editControls">
                    <div>
                        <a data-role='undo' href='javascript:void(0)'><i class='fa fa-undo'></i></a>
                        <a data-role='redo' href='javascript:void(0)'><i class='fa fa-repeat'></i></a>
                        <a data-role='bold' href='javascript:void(0)'><i class='fa fa-bold'></i></a>
                        <a data-role='italic' href='javascript:void(0)'><i class='fa fa-italic'></i></a>
                        <a data-role='underline' href='javascript:void(0)'><i class='fa fa-underline'></i></a>
                        <a data-role='strikeThrough' href='javascript:void(0)'><i class='fa fa-strikethrough'></i></a>
                        <a data-role='justifyLeft' href='javascript:void(0)'><i class='fa fa-align-left'></i></a>
                        <a data-role='justifyCenter' href='javascript:void(0)'><i class='fa fa-align-center'></i></a>
                        <a data-role='justifyRight' href='javascript:void(0)'><i class='fa fa-align-right'></i></a>
                        <a data-role='justifyFull' href='javascript:void(0)'><i class='fa fa-align-justify'></i></a>
                        <a data-role='indent' href='javascript:void(0)'><i class='fa fa-indent'></i></a>
                        <a data-role='outdent' href='javascript:void(0)'><i class='fa fa-outdent'></i></a>
                        <a data-role='insertUnorderedList' href='javascript:void(0)'><i class='fa fa-list-ul'></i></a>
                        <a data-role='insertOrderedList' href='javascript:void(0)'><i class='fa fa-list-ol'></i></a>
                        <a data-role='h1' href='javascript:void(0)'>h<sup>1</sup></a>
                        <a data-role='h2' href='javascript:void(0)'>h<sup>2</sup></a>
                        <a data-role='p' href='javascript:void(0)'>p</a>
                        <a data-role='subscript' href='javascript:void(0)'><i class='fa fa-subscript'></i></a>
                        <a data-role='superscript' href='javascript:void(0)'><i class='fa fa-superscript'></i></a>
                    </div>
                    </div>
                    <div id='editorObcervacoes'class="editor" contenteditable>
                    <p>Observações</p>
                    </div>
                    <input type="hidden" id='outputObcervacoes' name="obcervacoes"/>
                </div>
            </div>
         </div>
            <input class="form-submit" type="submit">
        </form>
    </div>

<script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/jquery-2.2.3.min.js"></script>
<script>
$('#ApresentacaoeditControls a').click(function(e) {
  switch($(this).data('role')) {
    case 'h1':
    case 'h2':
    case 'p':
      document.execCommand('formatBlock', false, $(this).data('role'));
      break;
    default:
      document.execCommand($(this).data('role'), false, null);
      break;
    }
  update_output();
})
$('#editorApresentacao').bind('blur keyup paste copy cut mouseup', function(e) {
  update_output('#outputApresentacao', '#editorApresentacao');
})

$('#ObcervacoeseditControls a').click(function(e) {
  switch($(this).data('role')) {
    case 'h1':
    case 'h2':
    case 'p':
      document.execCommand('formatBlock', false, $(this).data('role'));
      break;
    default:
      document.execCommand($(this).data('role'), false, null);
      break;
    }
  update_output();
})
$('#editorObcervacoes').bind('blur keyup paste copy cut mouseup', function(e) {
  update_output('#outputObcervacoes', '#editorObcervacoes');
})

function update_output(param1, param2) {
  $(param1).val($(param2).html());
}
</script>
</section>

<?php } ?>