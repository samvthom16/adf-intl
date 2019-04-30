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
global $nav;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Roboto+Condensed:400,700" rel="stylesheet">
	<link rel="icon"
      type="image/png"
      href="<?php bloginfo('template_directory'); ?>/_i/favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class('udhr'); ?>>
<div id="page" class="site">
	<header class="site-header group">
		<a href="https://www.ADFInternational.org/" rel="home" class="logo"><img src="<?php bloginfo('template_directory'); ?>/_i/logo-white.png" /><span class="assistive-text"><?php bloginfo( 'name' ); ?></span></a>
		<?php if(!is_page_template( 'page-udhr-single.php')) : ?>
		<nav class="site-nav">
			<?php if($nav) : ?>
			<ul>
				<?php foreach($nav as $item) : ?>
				<li>
					<a href = "<?php echo $item['nav_link']; ?>" class="sign-toggle"><?php echo $item['nav_label']; ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
			<?php
			if ( have_rows( 'language' ) ) :
				$i = 0;
				while ( have_rows( 'language' ) ) : the_row();
					$i++;
				endwhile;
				if($i > 1) :
			?>
			<div class="language-dropdown">
				<a href = "#" id="lang-trigger">
					Language<?php include(get_template_directory().'/_svg/icon-caret-down.php'); ?>
				</a>
				<ul>
					<?php while ( have_rows( 'language' ) ) : the_row(); ?>
					<li>
						<a href = "<?php echo strtok($_SERVER["REQUEST_URI"],'?').'?lang='.get_sub_field( 'language_name' ); ?>"><?php the_sub_field( 'language_name' ); ?></a>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php endif; endif; ?>
		</nav>
		<?php endif; ?>
	</header>
	<div id="content" class="site-content">
