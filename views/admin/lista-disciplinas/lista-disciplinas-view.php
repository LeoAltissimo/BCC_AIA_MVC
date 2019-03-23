<?php if ( ! defined('ABSPATH')) exit; ?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">D</span>isciplinas</h1>
        <?php echo  "<a  class='add-button' href='" .HOME_URI. "/admin/disciplinaEdit/'>" ?>
            <i class="fas fa-user-plus"></i>
        </a>
    </div>
    <div>
        <ul>
        <?php 
        foreach($modeloDisciplinas->listaDisciplinas as $semestre ){ 
            foreach($semestre as $value){
        ?>
            
            <li class="professor-item">
                <div class="prof-container">
                    <p><?php echo $value['disciplinaNome']; ?></p>
                </div>
                <?php echo  "<a  class='add-button' href='" .HOME_URI. '/admin/disciplinaEdit/' . $value["disciplinaId"] . "'>" ?>
                    <i class="fas fa-pen"></i> Editar
                </a>
            </li>
        <?php 
            }
        } 
        ?>    
        </ul>
    </div>
</section>