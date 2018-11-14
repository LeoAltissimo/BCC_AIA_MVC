<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>


<div class="typo">
    <div class='container'>

        <!-- INFORMACOES DA DISCIPLINA -->
        <div class="col-md-12">
            <div class="page-header">
                <h3 class="bars">IDENTIFICAÇÃO DA DISCIPLINA</h3>
            </div>
            <div class='well'>DISCIPLINA: <b><?php echo $modeloDisciplina->disciplina["disciplinaNome"]; ?></b></div>
            <div class='well'>PRÉ-REQUISITOS: <b><?php echo $modeloDisciplina->disciplina["disciplinaPrerequisito"] ? $modeloDisciplina->disciplina["prerequisitoNome"] : "<i>Não Possui</i>"; ?></b></div>
            <div class='well'>PROFESSOR DA ÁREA DE: <b><?php echo $modeloDisciplina->disciplina["disciplinaProfarea"]; ?></b></div>
            
            <?php if( isset($modeloDisciplina->disciplina["disciplinaProf"]) ){ ?>
                <div class='well'>PROFESSOR: <b><a href='<?php echo HOME_URI. "/docente/index/" . $modeloDisciplina->disciplina['disciplinaProf'] . "/"; ?>'><?php echo $modeloDisciplina->disciplina["profNome"]; ?></b></a></div>
            <?php } ?>
        </div>
        <!-- //INFORMACOES DA DISCIPLINA -->

        <?php if( isset($modeloDisciplina->creditos) ) { ?>
        <!-- DISTRIBUICOES DE CREDITOS -->
        <div class="col-md-12 aboutleft1">
            <div class="page-header">
                <h3 class="bars">DISTRIBUIÇÃO DOS CRÉDITOS</h3>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan='2'>Tipo de Disciplina</th>
                        <th>Créditos</th>
                        <th>Horas-aulas</th>
                    </tr>
                </thead>
                <tr>
                    <td colspan='2'>Unidade Curricular I - Formação Geral e Humanística</td>
                    <td><?php if( isset($modeloDisciplina->creditos[0]["Credito"]) ) echo $modeloDisciplina->creditos[0]["Credito"];?></td>
                    <td><?php if( isset($modeloDisciplina->creditos[0]["horas"]) ) echo $modeloDisciplina->creditos[0]["horas"];?></td>
                </tr>
                <tr>
                    <td colspan='2'>Unidade Curricular II - Formação Específica</td>
                    <td><?php if( isset($modeloDisciplina->creditos[1]["Credito"]) ) echo $modeloDisciplina->creditos[1]["Credito"];?></td>
                    <td><?php if( isset($modeloDisciplina->creditos[1]["horas"]) ) echo $modeloDisciplina->creditos[1]["horas"];?></td>
                </tr>
                <tr>
                    <td rowspan="2">
                        Unidade Curricular II - Formação Específica
                    <td>Créditos Eletivos Obrigatórios</td>
                    <td><?php if( isset($modeloDisciplina->creditos[2]["Credito"]) ) echo $modeloDisciplina->creditos[2]["Credito"];?></td>
                    <td><?php if( isset($modeloDisciplina->creditos[2]["horas"]) ) echo $modeloDisciplina->creditos[2]["horas"];?></td>
                </tr>
                <tr>
                    <td>Créditos Eletivos Livres</td>
                    <td><?php if( isset($modeloDisciplina->creditos[3]["Credito"]) ) echo $modeloDisciplina->creditos[3]["Credito"];?></td>
                    <td><?php if( isset($modeloDisciplina->creditos[3]["horas"]) ) echo $modeloDisciplina->creditos[3]["horas"];?></td>
                </tr>
                <tr>
                    <td colspan='2'>Atividade Curricular Obrigatória</td>
                    <td><?php if( isset($modeloDisciplina->creditos[4]["Credito"]) ) echo $modeloDisciplina->creditos[4]["Credito"];?></td>
                    <td><?php if( isset($modeloDisciplina->creditos[4]["horas"]) ) echo $modeloDisciplina->creditos[4]["horas"];?></td>
                </tr>
            </table>
        </div>
        <!-- //DISTRIBUICOES DE CREDITOS -->
        <?php } ?>
        
        <?php if( isset($modeloDisciplina->disciplina["disciplinaEmenta"]) ) { ?>
        <!-- EMENTA -->
        <div class="col-md-12">
            <div class="page-header">
                <h3 class="bars">EMENTA</h3>
            </div>
            <div class='well'>
                <?php echo $modeloDisciplina->disciplina["disciplinaEmenta"]; ?>
            </div>
        </div>
        <!-- //EMENTA -->
        <?php } ?>
        
        <?php if( isset($modeloDisciplina->disciplina["disciplinaObjetivo"]) ) { ?>
        <!-- OBJETIVOS DA DISCIPLINA -->
        <div class="col-md-12">
            <div class="page-header">
                <h3 class="bars">OBJETIVOS DA DISCIPLINA</h3>
            </div>
            <div class='well'>
                <?php echo $modeloDisciplina->disciplina["disciplinaObjetivo"]; ?>
            </div>
        </div>
        <!-- //OBJETIVOS DA DISCIPLINA -->
        <?php } ?>
        
        <?php if( $modeloDisciplina->bibliografiaBas || $modeloDisciplina->bibliografiaCompl ){ ?>
        <!-- BIBLIOGRAFIA -->
        <div class="col-md-12">
            <div class="page-header">
                <h3 class="bars">BIBLIOGRAFIA</h3>
            </div>
            <div class='list-group list-group-alternate'>
                <a>
                <?php if( $modeloDisciplina->bibliografiaBas ){ ?>
                    <h3>Básica</h3>
                    <?php foreach( $modeloDisciplina->bibliografiaBas as $livro ){ ?>
                        <div class='well'>
                            <p><b><?php echo $livro["bibliografiaTitulo"]; ?></b></p>
                            <p><?php echo $livro["bibliografiaAutor"]; ?></p>
                            <p><?php echo $livro["bibliografiaVolume"] . $livro["bibliografiaEditora"] . $livro["bibliografiaAno"]; ?></p>
                        </div>
                    <?php } 
                }?>
                </a>
                <a>
                <?php if( $modeloDisciplina->bibliografiaCompl ){ ?>
                    <h3>Complementar</h3>
                    <?php foreach( $modeloDisciplina->bibliografiaCompl as $livro ){ ?>
                        <div class='well'>
                            <p><b><?php echo $livro["bibliografiaTitulo"]; ?></b></p>
                            <p><?php echo $livro["bibliografiaAutor"]; ?></p>
                            <p><?php echo $livro["bibliografiaVolume"] . $livro["bibliografiaEditora"] . $livro["bibliografiaAno"]; ?></p>
                        </div>
                    <?php } 
                }?>
                </a>
            </div>
        </div>
        <!-- //BIBLIOGRAFIA -->
        <?php } ?>    

        <?php if( isset( $modeloDisciplina->anexos ) ){ ?>
        <!-- ANEXOS -->
        <div class="col-md-12">
            <div class="page-header">
                <h3 class="bars">Anexos</h3>
            </div>
            <div class='list-group list-group-alternate'>
                <a>
                    <h3>Complementar</h3>
                    <div class='well'>
                        <p><b>Desenvolvimento de jogos 3D e aplicações em realidade virtual.</b></p>
                        <p>AZEVEDO, Eduardo.</p>
                        <p>Rio de Janeiro: Elsevier, 2005.</p>
                    </div>
                </a>
            </div>
        </div>
        <!-- //ANEXOS -->
        <?php } ?>

    </div>
</div>