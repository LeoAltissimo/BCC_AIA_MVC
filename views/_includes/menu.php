<?php if ( ! defined('ABSPATH')) exit; ?>

<?php if ( $this->login_required && ! $this->logged_in ) return; ?>

<!--Barra Superior-->
<div class="header">
<div class="top">
	<div class="container">
			<div class="col-md-9 top-left">
				<ul>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php  echo "$modeloMenu->cidade". "-" . "$modeloMenu->estado" ?></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo "$modeloMenu->contato"?></li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo "$modeloMenu->email"?>"><?php echo "$modeloMenu->email"?></a></li>
				</ul>
			</div>
			<div class="col-md-3 top-middle">
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				</ul>
			</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //Barra Superior -->
<!-- Menu -->
<div class="top-bar-w3layouts">
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href='<?php echo HOME_URI;?>'>
					<img id='img-logo' alt='Logo Ciência da Computação' src='<?php echo HOME_URI;?>/views/_images/logo.jpg'>
				</a>
			</div>
			<!-- Botoes do Menu -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo HOME_URI;?>">O Curso</a></li>
					<li><a href="<?php echo HOME_URI . '/evento/index/';?>">Eventos</a></li>
					<li><a href="<?php echo HOME_URI . '/disciplina/index/';?>">Disciplina</a></li>
					<li><a href="<?php echo HOME_URI . '/docente/index/';?>">Docentes</a></li>
				</ul>
			<!-- //Botoes do Menu -->
			</div>
			<div class="clearfix"> </div>
		</nav>
	</div>
</div>
<!-- Menu -->