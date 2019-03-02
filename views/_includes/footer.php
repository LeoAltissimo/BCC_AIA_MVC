<?php if ( ! defined('ABSPATH')) exit; ?>

<!-- footer -->
	<div class="footer">
	<div class="container">
		<div class="f-bg-w3l">
		<div class="col-md-4 w3layouts_footer_grid">
					<h3>Sobre o Curso</h3>
					<p><?php echo utf8_encode($modelFooter->sobre . "..."); ?></p>
				</div>
				<div class="col-md-4 w3layouts_footer_grid hpft">
					<h3>Nosso contato</h3>
					<ul class="con_inner_text">
						<li><span class="fa fa-map-marker" aria-hidden="true"></span><?php echo $modelFooter->endereco; ?></li>
						<li><span class="fa fa-envelope-o" aria-hidden="true"></span> <a href="mailto:<?php echo $modelFooter->email; ?>"><?php echo $modelFooter->email; ?></a></li>
						<li><span class="fa fa-phone" aria-hidden="true"></span><?php echo $modelFooter->contato; ?></li>
					</ul>

					
				</div>
				<div class="col-md-4 w3layouts_footer_grid">
					<h2>Fale Conosco</h2>
					<form action="" method="post">
						<input type="email" name="Email" placeholder="E-mail:" required="">
						<textarea name='mensagem' placeholder='Mensagem' style="height: 80px"></textarea>
						<div class="clearfix"> </div>
					</form>
					<button class="btn1"><i class="fa fa-envelope-o" aria-hidden="true"></i></button>
				</div>
				<div class="clearfix"> </div>		
			</div>	
			</div>
	</div>
	<p class="copyright">©<?php echo date("Y"); ?> BCC-AIA. Bacharelado em Ciência da Computação | Unemat - Alto Araguaia. <br><sub>Desenvolvido por Leo Altíssimo Neto</sub></p>
	<!-- //footer -->

	<!-- Required Scripts -->
	<!-- Common Js -->
	<script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/jquery-2.2.3.min.js"></script>
	<!--// Common Js -->
	<!--search-bar-agileits-->
	<script src="<?php echo HOME_URI;?>/views/_js/main.js"></script>
	<!--//search-bar-agileits-->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- Banner Responsive slider -->
	<script src="<?php echo HOME_URI;?>/views/_js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 3
			$("#slider3").responsiveSlides({
				auto: true,
				pager: false,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- // Banner Responsive slider -->
	<!-- flexSlider -->
	<script defer src="<?php echo HOME_URI;?>/views/_js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<!-- //flexSlider -->
	<!-- stats -->
	<script src="<?php echo HOME_URI;?>/views/_js/jquery.waypoints.min.js"></script>
	<script src="<?php echo HOME_URI;?>/views/_js/jquery.countup.js"></script>
	<script>
		$('.counter-agileits-w3layouts').countUp();
	</script>
	<!-- //stats -->
	<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script>
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->


	<!-- swipe box js -->
	<script src="<?php echo HOME_URI;?>/views/_js/jquery.adipoli.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function () {
			$('.row2').adipoli({
				'startEffect': 'overlay',
				'hoverEffect': 'sliceDown'
			});
		});
	</script>
	<script src="<?php echo HOME_URI;?>/views/_js/jquery.swipebox.min.js"></script>
	<script type="text/javascript">
		jQuery(function ($) {
			$(".swipebox").swipebox();
		});
	</script>
	<!-- //swipe box js -->

	
 <script src="<?php echo HOME_URI;?>/views/_js/bootstrap.js"></script>
	<!--// Required Scripts -->
</body>
</html>