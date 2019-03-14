<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ADF
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="//fonts.googleapis.com/css?family=Roboto%3A400%2C600%2C700%7COpen+Sans%3A400%2C600%2C700%7CMontserrat%3A400%2C600%2C700&ver=4.9.5" rel="stylesheet">
	<link rel="icon"
      type="image/png"
      href="<?php bloginfo('template_directory'); ?>/_i/favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'adf-intl' ); ?></a>
	<button class="nav-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'adf-intl' ); ?></button>
	<header id="masthead" class="site-header group">
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/_i/logo.png" /><span class="assistive-text"><?php bloginfo( 'name' ); ?></span></a></p>
		<nav class="top-navigation group">
			<ul>
				<li>
					<a href = "#whatwedo">What We Do</a>
				</li>
				<li>
					<a href = "#whowesupport">Who We Support</a>
				</li>
				<li>
					<a href = "#donate">Donate</a>
				</li>
				<li class="social-icons">
					<a href = "#">
						<?php include(get_template_directory().'/_svg/icon-facebook.php'); ?>
						<span class="assistive-text">FaceBook</span>
					</a>
					<a href = "#">
						<?php include(get_template_directory().'/_svg/icon-twitter.php'); ?>
						<span class="assistive-text">Twitter</span>
					</a>
					<a href = "#">
						<?php include(get_template_directory().'/_svg/icon-google-plus.php'); ?>
						<span class="assistive-text">Google Plus</span>
					</a>
				</li>
			</ul>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
