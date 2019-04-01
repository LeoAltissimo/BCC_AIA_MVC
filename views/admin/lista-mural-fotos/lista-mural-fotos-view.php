<?php if ( ! defined('ABSPATH')) exit; ?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">M</span>ural de Fotos</h1>
        <?php echo  "<a  class='add-button' href='" .HOME_URI. "/admin/muralEdit/'>" ?>
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <div>
        <ul>
        <?php if(  $modeloMural->listaFotos !== NULL ) foreach( $modeloMural->listaFotos as $value ){ ?>
            <li class="professor-item">
                <div class="prof-container">
                    <img class="prof-thumb" src=
                        "<?php 
                            echo HOME_URI . "/views/_images/" . $value['muralFotoCaminho']; 
                        ?>" 
                        alt="imagem do mural"
                    >
                    <p>
                        <?php 
                            echo $value['muralFotoTitulo']; 
                        ?>
                    </p>
                </div>
                <?php 
                    echo "<a  class='add-button' href='" .HOME_URI. '/admin/muralEdit/' . 
                         $value["muralFotoId"] . "'>" 
                ?>
                    <i class="fas fa-pen"></i> Editar
                </a>
            </li>
        <?php } ?>    
        </ul>
    </div>
</section>