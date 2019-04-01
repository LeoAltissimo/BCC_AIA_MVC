<?php if ( ! defined('ABSPATH')) exit; ?>

<section class="dash-card">
    <div class="header-container">
        <h1><span class="first-letter">S</span>lides Carousel</h1>
        <?php echo  "<a  class='add-button' href='" .HOME_URI. "/admin/slideEdit/'>" ?>
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <div>
        <ul>
        <?php if(  $modeloSlides->slide !== NULL ) foreach( $modeloSlides->slide as $value ){ ?>
            <li class="professor-item">
                <div class="prof-container">
                    <img class="prof-thumb" src=
                        "<?php 
                            echo HOME_URI . "/views/_images/" . $value['homeSlideCaminho']; 
                        ?>" 
                        alt="imagem do slide"
                    >
                    <p>
                        <?php 
                            echo $value['homeSlideTitulo']; 
                        ?>
                    </p>
                </div>
                <?php 
                    echo "<a  class='add-button' href='" .HOME_URI. '/admin/slideEdit/' . 
                         $value["homeSlideId"] . "'>" 
                ?>
                    <i class="fas fa-pen"></i> Editar
                </a>
            </li>
        <?php } ?>    
        </ul>
    </div>
</section>