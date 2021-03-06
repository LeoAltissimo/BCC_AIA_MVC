<?php if ( ! defined('ABSPATH')) exit; ?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">E</span>ventos</h1>
        <?php echo  "<a  class='add-button' href='" .HOME_URI. "/admin/eventoEdit/'>" ?>
            <i class="fas fa-user-plus"></i>
        </a>
    </div>
    <div>
        <ul>
        <?php if(   $modeloEvento->eventos !== NULL ) foreach( $modeloEvento->eventos as $value ){ ?>
            <li class="professor-item">
                <div class="prof-container">
                    <img class="prof-thumb" src="<?php echo HOME_URI . "/views/_images/" . $value['eventoCapa']; ?>" alt="">
                    <p><?php echo $value['eventoNome']; ?></p>
                </div>
                <?php echo  "<a  class='add-button' href='" .HOME_URI. '/admin/eventoEdit/' . $value["eventoId"] . "'>" ?>
                    <i class="fas fa-pen"></i> Editar
                </a>
            </li>
        <?php } ?>    
        </ul>
    </div>
</section>