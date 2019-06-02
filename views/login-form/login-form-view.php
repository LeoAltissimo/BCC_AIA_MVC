<?php 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit; 
?>

<style>
    #bk-login {
        background-image: url('<?php echo  HOME_URI. '/views/_images/bk-login.jpg' ?>');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<div id="bk-login" class="col-md-12 login-view-container">
<div class="col-md-4 contact-form">
    <h4 class="heading">Login</h4>
    <form action='<?php echo HOME_URI . '/admin';?>' method="post">
            <input type="text" placeholder="login" name="userdata[user]"/>
            <input type="password" placeholder="Senha" name="userdata[user_password]"/>
            <div class="submit1">
                <?php if( $this->login_error ) { ?>
                    <p class="login-menssage">Usuário ou senha incorretos</p>
                <?php } ?>
                <input type="submit" value="entrar">
            </div>
    </form>
</div>
</div>