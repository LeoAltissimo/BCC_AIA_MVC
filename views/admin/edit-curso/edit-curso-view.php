<?php if ( ! defined('ABSPATH')) exit; 

if( $parametros ) {
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">C</span>urso</h1>
    </div>
    <div>
        <form method="POST">
        <div class="col-12">
            <div class="col-12 form-separator">
                <!-- Nome do curso -->
                <input 
                    class="col-11 prof-input-text" 
                    type="text" name="cursoNome" 
                    placeholder="Nome do curso" 
                    value="<?php echo $modeloCurso->curso["cursoNome"] ?>" 
                />
            </div> 
            <div class="col-12 form-separator">
                <!-- Email do curso -->
                <input 
                    class="col-5 prof-input-text" 
                    type="email" name="emailCursoEmail" 
                    placeholder="E-mail do curso" 
                    value="<?php echo $modeloCurso->email["emailCursoEmail"] ?>" 
                />
                <!-- Telefone do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="text" name="telCursoTel" 
                    placeholder="Telefone do curso" 
                    value="<?php echo $modeloCurso->tel["telCursoTel"] ?>" 
                />
            </div>
            <div class="col-12 form-separator">
                <!-- CEP do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="number" name="enderecoCursoCep" 
                    placeholder="CEP" 
                    value="<?php echo $modeloCurso->endereco["enderecoCursoCep"] ?>" 
                />
                <!-- Rua do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="text" name="enderecoCursoRua" 
                    placeholder="Rua" 
                    value="<?php echo $modeloCurso->endereco["enderecoCursoRua"] ?>" 
                />
                <!-- Numero do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="text" name="enderecoCursoNumero" 
                    placeholder="Número" 
                    value="<?php echo $modeloCurso->endereco["enderecoCursoNumero"] ?>" 
                />
                <!-- Bairro do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="text" name="enderecoCursoBairro" 
                    placeholder="Bairro" 
                    value="<?php echo $modeloCurso->endereco["enderecoCursoBairro"] ?>" 
                />
                <!-- Complemento do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="text" name="enderecoCursoComplemento" 
                    placeholder="Bairro" 
                    value="<?php echo $modeloCurso->endereco["enderecoCursoComplemento"] ?>" 
                />
                <!-- Cidade do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="text" name="enderecoCursoCidade" 
                    placeholder="Cidade" 
                    value="<?php echo $modeloCurso->endereco["enderecoCursoCidade"] ?>" 
                />
                <!-- Estado do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="text" name="enderecoCursoEstado" 
                    placeholder="Estado" 
                    value="<?php echo $modeloCurso->endereco["enderecoCursoEstado"] ?>" 
                />
                <!-- Pais do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="text" name="enderecoCursoPais" 
                    placeholder="Pais" 
                    value="<?php echo $modeloCurso->endereco["enderecoCursoPais"] ?>" 
                />
            </div>
        </div>
        <div class="col-12 form-separator">
            <textarea 
                class="col-12 prof-input-textarea" 
                name="cursoDescricao" 
                placeholder="Descrição do curso" 
                rows="4"><?php echo $modeloCurso->curso['cursoDescricao'] ?>
            </textarea>
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
        <h1><span class="first-letter">C</span>urso</h1>
    </div>
    <div>
        <form method="POST">
        <div class="col-12">
            <div class="col-12 form-separator">
                <!-- Nome do curso -->
                <input 
                    class="col-11 prof-input-text" 
                    type="text" name="cursoNome" 
                    placeholder="Nome do curso"
                />
            </div> 
            <div class="col-12 form-separator">
                <!-- Email do curso -->
                <input 
                    class="col-5 prof-input-text" 
                    type="email" name="emailCursoEmail" 
                    placeholder="E-mail do curso"
                />
                <!-- Telefone do curso -->
                <input 
                    class="col-6 prof-input-text" 
                    type="text" name="telCursoTel" 
                    placeholder="Telefone do curso"
                />
            </div>
            <div class="col-12 form-separator">
                <!-- CEP do curso -->
                <input 
                    class="col-3 prof-input-text" 
                    type="number" name="enderecoCursoCep" 
                    placeholder="CEP" 
                />
                <!-- Rua do curso -->
                <input 
                    class="col-3 prof-input-text" 
                    type="text" name="enderecoCursoRua" 
                    placeholder="Rua" 
                />
                <!-- Numero do curso -->
                <input 
                    class="col-2 prof-input-text" 
                    type="text" name="enderecoCursoNumero" 
                    placeholder="Número"
                />
                <!-- Bairro do curso -->
                <input 
                    class="col-3 prof-input-text" 
                    type="text" name="enderecoCursoBairro" 
                    placeholder="Bairro"
                />
                <!-- Complemento do curso -->
                <input 
                    class="col-11 prof-input-text" 
                    type="text" name="enderecoCursoComplemento" 
                    placeholder="Complemento"
                />
                <!-- Cidade do curso -->
                <input 
                    class="col-3 prof-input-text" 
                    type="text" name="enderecoCursoCidade" 
                    placeholder="Cidade"
                />
                <!-- Estado do curso -->
                <input 
                    class="col-2 prof-input-text" 
                    type="text" name="enderecoCursoEstado" 
                    placeholder="Estado"
                />
                <!-- Pais do curso -->
                <input 
                    class="col-2 prof-input-text" 
                    type="text" name="enderecoCursoPais" 
                    placeholder="Pais"
                />
            </div>
        </div>
        <div class="col-12 form-separator">
            <textarea 
                class="col-12 prof-input-textarea" 
                name="cursoDescricao" 
                placeholder="Descrição do curso" 
                rows="4"></textarea>
        </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>

<?php
}
?>
