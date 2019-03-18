<?php if ( ! defined('ABSPATH')) exit; 

if( $parametros ) {
    $vals = $modeloEvento;
?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">E</span>vento</h1>
    </div>
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="eventoId">
        <div class="col-10 input-container">
            <div class='col-12'>
            <input class="col-6 prof-input-text" type="text" name="nome" placeholder="Nome do evento" value="<?php echo $vals->evento["eventoNome"] ?>" />
            <input class="col-5 prof-input-text" type="email" name="email" placeholder="E-mail para contato" value="<?php echo $vals->evento["eventoemailEmail"] ?>" />
            </div>
            <div class="col-12">
            <select class="col-3 prof-input-text" name="prof-org" placeholder="Professor organizador">
                <?php foreach( $modeloEvento->profList as $value ) { ?>
                    <option value=<?php echo $value['professorId'];  echo ($vals->professorOrganizador['professorNome'] == $value['professorNome']) ? ' selected' : null; ?>>
                        <?php echo $value['professorNome'] ?>
                    </option>
                <?php } ?>
            </select>
            <input class="col-3 prof-input-text" type="tel" name="telefone" placeholder="Telefone para contato" value="<?php echo $vals->evento["eventotelTel"] ?>"/>
            <span>Início:</span>
            <input class="col-2 prof-input-text" type="date" name="date-i" value="<?php echo $vals->evento["eventoInicio"] ?>"/>
            <span>até</span>
            <input class="col-2 prof-input-text" type="date" name="date-f" value="<?php echo $vals->evento["eventoTermino"] ?>"/>
            </div>
        </div>
        <div class="col-2">
            <style>
                #inputBk {
                    background-image:  url('<?php echo  HOME_URI . "/views/_images/" . $vals->evento['eventoCapa']; ?>');
                    background-repeat: no-repeat;
                    background-size: cover;
                }
            </style>
            <label id="inputBk"  class="label">
                <i id="inputTumbLabel" class="fas fa-camera"></i>
                <span class="title">Capa do evento</span>
                <input id="inputTumb" type="file" name="capa-evento" type="file" value="<?php echo $vals->evento['eventoCapa'] ?>"/>
            </label>
            <?php echo $vals->evento['eventoCapa'] ?>
        </div>
        <div class="col-12">
            <textarea class="col-12 prof-input-textarea" name="apresentacao" placeholder="Apresentacao" rows="10">
                <?php echo $vals->evento["eventoApresentacao"] ?>
            </textarea>
            <textarea class="col-12 prof-input-textarea" name="regulamento" placeholder="Regulamento" rows="10">
                <?php echo $vals->evento["eventoRegulamento"] ?>
            </textarea>
        </div>
        <div class="col-12">
            <div class="col-12">
                <input class="col-6 prof-input-text" type="text" name="rua" placeholder="Rua" value="<?php echo $vals->endereco["eventoenderecoRua"] ?>"/>
                <input class="col-1 prof-input-text" type="number" name="numero" placeholder="Numero" value="<?php echo $vals->endereco["eventoenderecoNumero"] ?>"/>
                <input class="col-4 prof-input-text" type="text" name="bairro" placeholder="Bairro" value="<?php echo $vals->endereco["eventoenderecoBairro"] ?>"/>
            </div>
            <div class="col-12">
                <input class="col-6 prof-input-text" type="text" name="complemento" placeholder="Complemento" value="<?php echo $vals->endereco["eventoenderecoComplemento"] ?>"/>
                <input class="col-5 prof-input-text" type="text" name="cep" placeholder="CEP" value="<?php echo $vals->endereco["eventoenderecoCep"] ?>"/>
            </div>
            <div class="col-12">
                <input class="col-6 prof-input-text" type="text" name="cidade" placeholder="Cidade" value="<?php echo $vals->endereco["eventoenderecoCidade"] ?>"/>
                <input class="col-2 prof-input-text" type="text" name="estado" placeholder="Uf" value="<?php echo $vals->endereco["eventoenderecoEstado"] ?>"/>
                <input class="col-3 prof-input-text" type="text" name="pais" placeholder="Pais" value="<?php echo $vals->endereco["eventoenderecoPais"] ?>"/>
            </div>
        </div>
            <input class="form-submit" type="submit">
        </form>
    </div>
</section>
<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">C</span>omissoes</h1>
        <?php echo  "<a  class='add-button' href='" .HOME_URI. '/admin/eventoEditComissoes/' . $vals->evento["eventoId"] . "'>" ?>
            <i class="fas fa-plus"></i> Adicionar Comissão
        </a>
    </div>
    <div>
        <ul>
        <?php if( $vals->comissoes ) foreach( $vals->comissoes as $value ){ ?>
            <li class="professor-item">
                <div class="prof-container">
                    <p><?php echo $value['comissaoRotulo']; ?>: </p>
                    <p><small><?php echo $value['comissaoIntegrantes']; ?></small></p>
                </div>
                <?php echo  "<a  class='add-button' href='" .HOME_URI. '/admin/eventoEditComissoes/' . $vals->evento["eventoId"] . "/". $value["comissaoId"] ."'>" ?>
                    <i class="fas fa-pen"></i> Editar
                </a>
            </li>
        <?php } ?>    
        </ul>
    </div>
</section>
<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">A</span>contecimentos</h1>
        <?php echo  "<a  class='add-button' href='" .HOME_URI. '/admin/eventoEditAcontecimento/' . $vals->evento["eventoId"] . "'>" ?>
            <i class="fas fa-plus"></i> Adicionar Acontecimento
        </a>
    </div>
    <div>
        <ul>
        <?php if( $vals->acontecimentos ) foreach( $vals->acontecimentos as $value ){ ?>
            <li class="professor-item">
                <div class="prof-container">
                    <p><?php echo $value['acontecimentoNome']; ?></p>
                </div>
                <?php echo  "<a  class='add-button' href='" .HOME_URI. '/admin/eventoEditAcontecimento/' . $vals->evento["eventoId"] . "/". $value["acontecimentoId"] ."'>" ?>
                    <i class="fas fa-pen"></i> Editar
                </a>
            </li>
        <?php } ?>    
        </ul>
    </div>
</section>
<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">T</span>rabalhos</h1>
        <?php echo  "<a  class='add-button' href='" .HOME_URI. '/admin/eventoEditTrabalho/' . $vals->evento["eventoId"] . "'>" ?>
            <i class="fas fa-plus"></i> Adicionar Trabalho
        </a>
    </div>
    <div>
        <ul>
        <?php if( $vals->trabalhos ) foreach( $vals->trabalhos as $value ){ ?>
            <li class="professor-item">
                <div class="prof-container">
                    <p><?php echo $value['trabalhoTitulo']; ?></p>
                </div>
                <?php echo  "<a  class='add-button' href='" .HOME_URI. '/admin/eventoEditTrabalho/' . $vals->evento["eventoId"] ."/". $value["trabalhoId"] . "'>" ?>
                    <i class="fas fa-pen"></i> Editar
                </a>
            </li>
        <?php } ?>    
        </ul>
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
        <h1><span class="first-letter">E</span>vento</h1>
    </div>
    <div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="eventoId">
        <div class="col-10 input-container">
            <div class='col-12'>
            <input class="col-6 prof-input-text" type="text" name="nome" placeholder="Nome do evento" />
            <input class="col-5 prof-input-text" type="email" name="email" placeholder="E-mail para contato" />
            </div>
            <div class="col-12">
            <select class="col-3 prof-input-text" name="prof-org" placeholder="Professor organizador">
                <?php foreach( $modeloEvento->profList as $value ) { ?>
                    <option value="<?php echo $value['professorId']; ?>">
                        <?php echo $value['professorNome'] ?>
                    </option>
                <?php } ?>
            </select>
            <input class="col-3 prof-input-text" type="tel" name="telefone" placeholder="Telefone para contato" />
            <input class="col-2 prof-input-text" type="date" name="date-i" placeholder="Data de início" />
            <input class="col-2 prof-input-text" type="date" name="date-f" placeholder="Data de término" />
            </div>
        </div>
        <div class="col-2">
            <label class="label">
                <i id="inputTumbLabel" class="fas fa-camera"></i>
                <span class="title">Capa do evento</span>
                <input id="inputTumb" type="file" name="capa-evento" type="file"/>
            </label>
        </div>
        <div class="col-12">
            <textarea class="col-12 prof-input-textarea" name="apresentacao" placeholder="Apresentacao" rows="4"></textarea>
            <textarea class="col-12 prof-input-textarea" name="regulamento" placeholder="Regulamento" rows="4"></textarea>
        </div>
        <div class="col-12">
            <div class="col-12">
                <input class="col-6 prof-input-text" type="text" name="rua" placeholder="Rua" />
                <input class="col-1 prof-input-text" type="number" name="numero" placeholder="Numero" />
                <input class="col-4 prof-input-text" type="text" name="bairro" placeholder="Bairro" />
            </div>
            <div class="col-12">
                <input class="col-6 prof-input-text" type="text" name="complemento" placeholder="Complemento" />
                <input class="col-5 prof-input-text" type="text" name="cep" placeholder="CEP" />
            </div>
            <div class="col-12">
                <input class="col-6 prof-input-text" type="text" name="cidade" placeholder="Cidade" />
                <input class="col-2 prof-input-text" type="text" name="estado" placeholder="Uf" />
                <input class="col-3 prof-input-text" type="text" name="pais" placeholder="Pais" />
            </div>
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