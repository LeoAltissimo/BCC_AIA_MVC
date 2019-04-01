<?php if ( ! defined('ABSPATH')) exit; ?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">C</span>urso</h1>
    </div>
    <div>
        <form method="POST">
        <input type="hidden" name="emailCursoId" value="<?php echo $modeloCurso->email["emailCursoId"] ?>">
        <input type="hidden" name="telCursoId" value="<?php echo $modeloCurso->contato["telCursoId"] ?>">
        <input type="hidden" name="enderecoCursoId" value="<?php echo $modeloCurso->endereco["enderecoCursoId"] ?>">
        <div class="col-12">
            <div class="col-12 form-separator">
                <!-- Nome do curso -->
                <input 
                    class="col-11 prof-input-text" 
                    type="text" name="cursoNome" 
                    placeholder="Nome do curso" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->curso["cursoNome"]) ? 
                            $modeloCurso->curso["cursoNome"] : "") 
                    ?>" 
                />
            </div> 
            <div class="col-12 form-separator">
                <!-- Email do curso -->
                <input 
                    class="col-5 prof-input-text" 
                    type="email" name="emailCursoEmail" 
                    placeholder="E-mail do curso" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->email["emailCursoEmail"]) ? 
                            $modeloCurso->email["emailCursoEmail"] : "") 
                    ?>"
                />
                <!-- Telefone do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="text" name="telCursoTel" 
                    placeholder="Telefone do curso" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->contato["telCursoTel"]) ? 
                            $modeloCurso->contato["telCursoTel"] : "") 
                    ?>"
                />
            </div>
            <div class="col-12 form-separator">
                <!-- CEP do curso -->
                <input 
                    class="col-3 prof-input-text" 
                    type="text" name="enderecoCursoCep" 
                    placeholder="CEP" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->endereco["enderecoCursoCep"]) ? 
                            $modeloCurso->endereco["enderecoCursoCep"] : "") 
                    ?>"
                />
                <!-- Rua do curso -->
                <input 
                    class="col-3 prof-input-text" 
                    type="text" name="enderecoCursoRua" 
                    placeholder="Rua" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->endereco["enderecoCursoRua"]) ? 
                            $modeloCurso->endereco["enderecoCursoRua"] : "") 
                    ?>"
                />
                <!-- Numero do curso -->
                <input 
                    class="col-2 prof-input-text" 
                    type="text" name="enderecoCursoNumero" 
                    placeholder="Número" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->endereco["enderecoCursoNumero"]) ? 
                            $modeloCurso->endereco["enderecoCursoNumero"] : "") 
                    ?>"
                />
                <!-- Bairro do curso -->
                <input 
                    class="col-3 prof-input-text" 
                    type="text" name="enderecoCursoBairro" 
                    placeholder="Bairro" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->endereco["enderecoCursoBairro"]) ? 
                        $modeloCurso->endereco["enderecoCursoBairro"] : "") 
                    ?>"
                />
                <!-- Complemento do curso -->
                <input 
                    class="col-11 prof-input-text" 
                    type="text" name="enderecoCursoComplemento" 
                    placeholder="Complemento" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->endereco["enderecoCursoComplemento"]) ? 
                            $modeloCurso->endereco["enderecoCursoComplemento"] : "") 
                    ?>"
                />
                <!-- Cidade do curso -->
                <input 
                    class="col-3 prof-input-text" 
                    type="text" name="enderecoCursoCidade" 
                    placeholder="Cidade" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->endereco["enderecoCursoCidade"]) ? 
                            $modeloCurso->endereco["enderecoCursoCidade"] : "") 
                    ?>"
                />
                <!-- Estado do curso -->
                <input 
                    class="col-2 prof-input-text" 
                    type="text" name="enderecoCursoEstado" 
                    placeholder="Estado" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->endereco["enderecoCursoEstado"]) ? 
                            $modeloCurso->endereco["enderecoCursoEstado"] : "") 
                    ?>"
                />
                <!-- Pais do curso -->
                <input 
                    class="col-2 prof-input-text" 
                    type="text" name="enderecoCursoPais" 
                    placeholder="Pais" 
                    value=
                    "<?php
                        echo (isset($modeloCurso->endereco["enderecoCursoPais"]) ? 
                        $modeloCurso->endereco["enderecoCursoPais"] : "") 
                    ?>"
                />
            </div>
        </div>
        <div class="col-12 form-separator">
            <div class='editContainer'>
                <div id='sobreEditControls' class="editControls">
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
                <div id='editorSobre'class="editor" contenteditable>
                    <?php 
                        echo (isset($modeloCurso->curso["cursoDescricao"]) ? 
                            $modeloCurso->curso["cursoDescricao"] : 
                            "Descrição do curso") 
                    ?>
                </div>
                <input type="hidden" id='outputSobre' name="cursoDescricao"/>
            </div>
        </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>

<script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/jquery-2.2.3.min.js"></script>
<script>
    $('#sobreEditControls a').click(function(e) {
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

    $('#editorSobre').bind('blur keyup paste copy cut mouseup load', function(e) {
        update_output('#outputSobre', '#editorSobre');
    })

    function update_output(param1, param2) {
        $(param1).val($(param2).html());
    }

    update_output('#outputSobre', '#editorSobre');
</script>

