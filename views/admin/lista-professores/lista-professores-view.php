<?php if ( ! defined('ABSPATH')) exit; ?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">P</span>rofessores</h1>
        <?php echo  "<a  class='add-button' href='" .HOME_URI. "/admin/professorEdit/'>" ?>
            <i class="fas fa-user-plus"></i>
        </a>
    </div>
    <div>
        <ul>
        <?php foreach( $modeloProfessores->listaProfessores as $value ){ ?>
            <li class="professor-item">
                <div class="prof-container">
                    <img class="prof-thumb" src="<?php echo HOME_URI . "/views/_images/" . $value['professorTumb'] . ".jpg"; ?>" alt="">
                    <p><?php echo $value['professorTitulacao'] . " " . $value['professorNome']; ?></p>
                </div>
                <?php echo  "<a  class='add-button' href='" .HOME_URI. '/admin/professorEdit/' . $value["professorId"] . "'>" ?>
                    </i> Editar
                </a>
            </li>
        <?php } ?>    
        </ul>
    </div>
</section>