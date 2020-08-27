<?php
/**
 * The template for displaying the header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
		
	<header id="masthead" class="site-header" role="banner">
		
		<div class="container">
			<div class="row">
				<div class="site-branding">
					<a href="<?php echo home_url() ?>"><?php ss_theme_logo() ?></a>
				</div><!-- .site-branding -->
				<nav id="site-navigation" class="navigation">
					<?php wp_nav_menu( array(
						'theme_location'    => 'primary',
						'menu_class'  		=> 'menu navigation_menu',
						'container'   		=> 'false',
					) ); ?>

					<div class="navigation_toggle mobile_only">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</nav>
			</div>
		</div>
	
	</header><!-- .site-header -->
	<div id="content" class="site-content">
