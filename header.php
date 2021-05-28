<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&family=Passion+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/jhr4bgw.css">
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.min.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<span id="siteMenu">
		<a id="menu-toggle" class="balloonNav"><span class="shadow"></span><span class="bar"></span></a>
	</span>

	<div id="navigation" class="navigation-screen">
		<a href="#" id="closeNav" class="closeNav"><span class="sr">Close Menu</span></a>
		<div class="wrapper">
			<nav class="menu-wrapper">
			<?php 
	      wp_nav_menu( 
	        array( 
	          'theme_location' => 'primary', 
	          'menu_id' => 'primary-menu',
	          'container'=> false
	        )
	      ); 
	    ?>
	    	<div class="social-media">
	    		<a href="#" class="instagram" aria-hidden="true"><i class="fab fa-instagram"></i></a>
	    		<a href="#" class="linkedin" aria-hidden="true"><i class="fab fa-linkedin-in"></i></a>
	    		<a href="#" class="mail" aria-hidden="true"><i class="fab fa-telegram-plane"></i></a>
	    	</div>
    	</nav>	
    </div>
	</div>

	