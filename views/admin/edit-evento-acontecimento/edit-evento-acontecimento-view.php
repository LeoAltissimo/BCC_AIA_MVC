<?php if ( ! defined('ABSPATH')) exit; ?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">A</span>contecimento</h1>
    </div>    
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="eventoId" value="<?php echo $parametros[0] ?>">
        <input type="hidden" name="comissaoId" value="">
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
              <input class="col-1 prof-input-text" type="number" name="vagas" placeholder="numero de vagas" />
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
                    <p>Apresentacao</p>
                    </div>
                    <input type="hidden" id='outputApresentacao'/>
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
                    <p>Obcervações</p>
                    </div>
                    <input type="hidden" id='outputObcervacoes'/>
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