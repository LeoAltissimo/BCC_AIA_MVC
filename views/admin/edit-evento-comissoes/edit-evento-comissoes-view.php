<?php if ( ! defined('ABSPATH')) exit; ?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">C</span>omissões</h1>
    </div>    
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="eventoId" value="<?php echo $parametros[0] ?>">
        <input type="hidden" name="comissaoId" value="">
        <div class="col-12">
            <input class="col-12 prof-input-text" type="text" name="rotulo" placeholder="Título da comissão" />
            
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
                    <p>Integrantes</p>
                    </div>
                    <input type="hidden" id='outputObcervacoes' name="integranes"/>
                </div>
            </div>
        </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>

<script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/jquery-2.2.3.min.js"></script>
<script>

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