<?php if ( ! defined('ABSPATH')) exit; 

if( $parametros ) {
    $vals = $modeloDisciplinas;
    $creditos = $vals->getCreditosToEdit();
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">D</span>isciplina</h1>
    </div>
    <div>
        <form method="POST">
        <input type="hidden" name="disciplinaId" value="<?php echo $modeloDisciplinas->disciplina['disciplinaId'] ?>">
        <div class="col-12">
            <div class="col-12 form-separator">
                <input class="col-12 prof-input-text" type="text" name="nome" placeholder="Nome da Disciplina"  value="<?php echo $vals->disciplina["disciplinaNome"] ?>"/>
                <select class="col-12 prof-input-text" name="disciplinaSemetre" placeholder="Semestre">
                <?php foreach( $vals->semestreList as $value ) { ?>
                    <option value=<?php echo $value['semestreId'];  echo ($vals->disciplina['semestreId'] == $value['semestreId']) ? ' selected' : null; ?>>
                        <?php echo $value['semestre'] . "º semestre"?>
                    </option>
                <?php } ?>
                </select>
                <select class="col-12 prof-input-text"  name="prerequisito" placeholder="Pré-requisito">
                <option label="Nenhum Pré-requisito">
                <?php foreach( $vals->disciplinasList as $value ) { ?>
                    <option value=<?php echo $value['disciplinaId'];  echo ($vals->disciplina['disciplinaPrerequisito'] == $value['disciplinaId']) ? ' selected' : null; ?>>
                        <?php echo $value['disciplinaNome'] ?>
                    </option>
                <?php } ?>
                </select>
                <input class="col-12 prof-input-text" type="text" name="profArea" placeholder="Área de atuação do professor" value="<?php echo $vals->disciplina["disciplinaProfarea"] ?>"/>
                <select class="col-12 prof-input-text" name="disciplinaProfessor" placeholder="Professor">
                <option label="Nenhum Professor">
                <?php foreach( $vals->profList as $value ) { ?>
                    <option value=<?php echo $value['professorId'];  echo ($vals->disciplina['disciplinaProf'] == $value['professorNome']) ? ' selected' : null; ?>>
                        <?php echo $value['professorNome'] ?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <div>
                <div class='editContainer'>
                    <div id='ementaeditControls' class="editControls">
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
                    <div id='editorEmenta'class="editor" contenteditable>
                    <?php echo $vals->disciplina["disciplinaEmenta"] ?>
                    </div>
                    <input type="hidden" id='outputEmenta' name="ementa"/>
                </div>
            </div>
            <div>
                <div class='editContainer'>
                    <div id='ObjetivoeditControls' class="editControls">
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
                    <div id='editorObjetivo'class="editor" contenteditable>
                    <?php echo $vals->disciplina["disciplinaObjetivo"] ?>
                    </div>
                    <input type="hidden" id='outputObjetivo' name="objetivo"/>
                </div>
            </div>
        <div class="col-12 form-separator">
        <input type="hidden" name="distribcreditosId" value="<?php echo $creditos['distribcreditosId'] ?>">
            <select class="col-12 prof-input-text" name="distribcreditosTipo" placeholder="Tipo de Crédito">
                <option value="0" <?php echo ($creditos["distribcreditosTipo"] == 0) ? ' selected' : null; ?>>
                  Unidade Curricular I - Formação Geral e Humanística
                </option>
                <option value="1" <?php echo ($creditos["distribcreditosTipo"] == 1) ? ' selected' : null; ?>>
                Unidade Curricular II - Formação Específica 
                </option>
                <option value="2" <?php echo ($creditos["distribcreditosTipo"] == 2) ? ' selected' : null; ?>>
                Unidade Curricular III - Formação Complementar de Enriquecimento Créditos Eletivos Obrigatórios
                </option>
                <option value="3" <?php echo ($creditos["distribcreditosTipo"] == 3) ? ' selected' : null; ?>>
                Unidade Curricular III - Formação Complementar de Enriquecimento Créditos Eletivos Livres
                </option>
                <option value="4" <?php echo ($creditos["distribcreditosTipo"] == 4) ? ' selected' : null; ?>>
                Atividade Curricular Obrigatória
                </option>
            </select>
            <input class="col-12 prof-input-text" type="text" name="distribcreditosCreditos" placeholder="Créditos"  value="<?php echo $creditos["distribcreditosCreditos"] ?>"/>
            <input class="col-12 prof-input-text" type="text" name="distribcreditosHorasaula" placeholder="Horas aula"  value="<?php echo $creditos["distribcreditosHorasaula"] ?>"/>
        </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>

<script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/jquery-2.2.3.min.js"></script>
<script>
$('#EmentaeditControls a').click(function(e) {
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
$('#editorEmenta').bind('blur keyup paste copy cut mouseup load', function(e) {
  update_output('#outputEmenta', '#editorEmenta');
})

$('#ObjetivoeditControls a').click(function(e) {
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
$('#editorObjetivo').bind('blur keyup paste copy cut mouseup load', function(e) {
  update_output('#outputObjetivo', '#editorObjetivo');
})

function update_output(param1, param2) {
  $(param1).val($(param2).html());
}

update_output('#outputObjetivo', '#editorObjetivo');
update_output('#outputEmenta', '#editorEmenta');
</script>

<?php
} else {
?>
<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">D</span>isciplina</h1>
    </div>
    <div>
        <form method="POST">
        <input type="hidden" name="disciplinaId">
        <div class="col-12">
            <div class="col-12 form-separator">
                <input class="col-12 prof-input-text" type="text" name="nome" placeholder="Nome da Disciplina" />
                <select class="col-12 prof-input-text" name="disciplinaSemetre" placeholder="Semestre">
                <?php foreach( $modeloDisciplinas->semestreList as $value ) { ?>
                    <option value=<?php echo $value['semestreId'] ?>>
                        <?php echo $value['semestre'] . "º semestre" ?>
                    </option>
                <?php } ?>
                </select>
                <select class="col-12 prof-input-text"  name="prerequisito" placeholder="Pré-requisito">
                        <option label="Nenhum Pré-requisito">
                    <?php foreach( $modeloDisciplinas->disciplinasList as $value ) { ?>
                        <option value=<?php echo $value['disciplinaId'] ?>>
                            <?php echo $value['disciplinaNome'] ?>
                        </option>
                    <?php } ?>
                </select>
                <input class="col-12 prof-input-text" type="text" name="profArea" placeholder="Área de atuação do professor"/>
                <select class="col-12 prof-input-text" name="disciplinaProfessor" placeholder="Professor">
                    <option label="Nenhum Professor">
                <?php foreach( $modeloDisciplinas->profList as $value ) { ?>
                    <option value=<?php echo $value['professorId']?>>
                        <?php echo $value['professorNome'] ?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <div>
                <div class='editContainer'>
                    <div id='ementaeditControls' class="editControls">
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
                    <div id='editorEmenta'class="editor" contenteditable>
                        Ementa
                    </div>
                    <input type="hidden" id='outputEmenta' name="ementa"/>
                </div>
            </div>
            <div>
                <div class='editContainer'>
                    <div id='ObjetivoeditControls' class="editControls">
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
                    <div id='editorObjetivo'class="editor" contenteditable>
                        Objetivos da disciplina
                    </div>
                    <input type="hidden" id='outputObjetivo' name="objetivo"/>
                </div>
            </div>
        </div>
        <div class="col-12 form-separator">
        <input type="hidden" name="distribcreditosId">
          <select class="col-12 prof-input-text" name="distribcreditosTipo" placeholder="Tipo de Crédito">
                <option value="0">
                  Unidade Curricular I - Formação Geral e Humanística
                </option>
                <option value="1">
                Unidade Curricular II - Formação Específica 
                </option>
                <option value="2">
                Unidade Curricular III - Formação Complementar de Enriquecimento Créditos Eletivos Obrigatórios
                </option>
                <option value="3">
                Unidade Curricular III - Formação Complementar de Enriquecimento Créditos Eletivos Livres
                </option>
                <option value="4">
                Atividade Curricular Obrigatória
                </option>
            </select>
            <input class="col-12 prof-input-text" type="text" name="distribcreditosCreditos" placeholder="Créditos" />
            <input class="col-12 prof-input-text" type="text" name="distribcreditosHorasaula" placeholder="Horas aula" />
        </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>

<script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/jquery-2.2.3.min.js"></script>
<script>
$('#EmentaeditControls a').click(function(e) {
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
$('#editorEmenta').bind('blur keyup paste copy cut mouseup load', function(e) {
  update_output('#outputEmenta', '#editorEmenta');
})

$('#ObjetivoeditControls a').click(function(e) {
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
$('#editorObjetivo').bind('blur keyup paste copy cut mouseup load', function(e) {
  update_output('#outputObjetivo', '#editorObjetivo');
})

function update_output(param1, param2) {
  $(param1).val($(param2).html());
}

update_output('#outputObjetivo', '#editorObjetivo');
update_output('#outputEmenta', '#editorEmenta');
</script>


<?php } ?>