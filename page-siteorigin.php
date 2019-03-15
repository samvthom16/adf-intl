<?php
/**
 * Template Name: SiteOrigin
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ADF
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
				<div class="page-content" style="max-width:1100px;padding:15px;padding-top:0;margin-left:auto;margin-right:auto;">
					
					<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
				</div>
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//	get_sidebar();
get_footer();
