<?php if ( ! defined('ABSPATH')) exit; ?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="pt-BR">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="pt-BR">
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html lang="pt-BR">
<!--<![endif]-->

<head>
	<title><?php echo $this->title; ?></title>
	<!-- Meta Tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- // Meta Tags -->
	<link href="<?php echo HOME_URI;?>/views/_css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?php echo HOME_URI;?>/views/_css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="<?php echo HOME_URI;?>/views/_css/swipebox.css" rel="stylesheet" >
	<!--testimonial flexslider-->
	<link href="<?php echo HOME_URI;?>/views/admin/_css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600,800" rel="stylesheet">
	<!--//fonts-->

</head>

<body>
  <header class="app-header">
    <!-- Logo -->
    <a href="#">
    <img class="navbar-brand-full" alt='Logo Ciência da Computação' src='<?php echo HOME_URI;?>/views/_images/logo.jpg' width="130">
    </a>
    <a class="navbar-toggler sidebar-toggler d-md-down-none" href="#">
      <i class="fa fa-lock"></i> Logout
    </a>
  </header>

  <div class="main-container">
    <div class="menu-container">
        <ul>
          <li>
            <a class="main-menu-item" href='<?php echo HOME_URI . '/admin/professores/';?>'>
            <i class="fas fa-chalkboard-teacher"></i></i> Professores
            </a>
          </li>
          <li>
            <a class="main-menu-item" href="index.html">
              <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
          </li>
          <li>
            <a class="main-menu-item" href="index.html">
              <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
          </li>
        </ul>
    </div>
    <main class="main">