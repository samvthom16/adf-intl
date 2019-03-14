<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ADF
 */

?>

<section class="no-results not-found">
	<div class="wrap">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'adf-intl' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php
					printf(
						wp_kses(
							/* translators: 1: link to WP admin new post page. */
							__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'adf-intl' ),
							array(
								'a' => array(
									'href' => array(),
								),
							)
						),
						esc_url( admin_url( 'post-new.php' ) )
					);
				?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'adf-intl' ); ?></p>

				<?php get_search_form(); ?>
				<?php if($_GET['post_type']) : ?>
				<section class="resource-dropdowns">
					<?php
						$terms = get_terms(
									array(
										'taxonomy' => 'type',
										'hide_empty' => true,
									)
								);
						if($terms) :
					?>
					<div class="archive-dropdown">
						<a href = "#" class="cat-dropdown">By Type</a>
						<ul>
							<?php foreach ($terms as $term) : ?>
							<li>
								<a href = "<?php echo get_term_link( $term , 'type'); ?>?post_type=resource"><?php echo $term->name; ?></a>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
					<?php
						$terms = get_terms(
									array(
										'taxonomy' => 'issues',
										'hide_empty' => true,
									)
								);
						if($terms) :
					?>
					<div class="archive-dropdown">
						<a href = "#" class="cat-dropdown">By Issue</a>
						<ul>
							<?php foreach ($terms as $term) : ?>
							<li>
								<a href = "<?php echo get_term_link( $term , 'issues'); ?>?post_type=resource"><?php echo $term->name; ?></a>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
					<?php
						$terms = get_terms(
									array(
										'taxonomy' => 'regions',
										'hide_empty' => true,
									)
								);
						if($terms) :
					?>
					<div class="archive-dropdown">
						<a href = "#" class="cat-dropdown">By Region</a>
						<ul>
							<?php foreach ($terms as $term) : ?>
							<li>
								<a href = "<?php echo get_term_link( $term , 'regions'); ?>?post_type=resource"><?php echo $term->name; ?></a>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<?php endif; ?>
				</section>
				<?php endif; ?>
			<?php else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'adf-intl' ); ?></p>
				<?php
					get_search_form();

			endif; ?>
		</div><!-- .page-content -->
	</div>
</section><!-- .no-results -->
