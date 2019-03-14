<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ADF
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="archive-articles gray-back">
				<div class="wrap">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					//the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<ul class="article-list three-list group">
			<?php while ( have_posts() ) : the_post(); ?>
				<li>
					<a href = "<?php the_permalink(); ?>">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('large');
						}
						?>
						<span class="content-type"><?php echo get_post_type($post); ?></span>
						<div class="article-content">
							<h4><?php the_title(); ?></h4>
							<p><?php echo excerpt(60); ?></p>
							<strong class="link">Read more</strong>
						</div>
					</a>
				</li>
			<?php endwhile; ?>
			</ul>
			<?php the_posts_navigation(array('prev_text' => __( 'More &raquo;' ),
    'next_text' => __( '&laquo; Previous' ),));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
