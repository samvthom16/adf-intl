<?php
/**
 * The template for displaying archive of resources
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ADF
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :
			if(!$_GET["post_type"]) :
		?>

			<header class="resource-header gray-back">
				<div class="wrap group">
					<div class="third first">
						<?php
							$image = get_field('feat_resc_image','option');
							$size = 'full'; // (thumbnail, medium, large, full or custom size)
							if( $image ) {
								echo wp_get_attachment_image( $image['id'], $size );
							}
						?>
					</div>
					<div class="two-third">
						<h5>Featured Resource</h5>
						<?php the_field('feat_resc_content','option'); ?>
						<a href = "<?php the_field('feat_resc_link','option'); ?>" class="btn" target="_BLANK"><?php the_field('feat_resc_btn','option'); ?></a>
					</div>
				</div>
				<?php if( have_rows('more_resources','option') ): ?>
				<div class="more-resources articles-module">
					<div class="wrap">
						<h2>More Resources</h2>
						<ul class="article-list three-list group">
							<?php
							while ( have_rows('more_resources','option') ) : the_row();
								$post_object = get_sub_field('more_content','option');
								if( $post_object ):
									$post = $post_object;
									setup_postdata( $post );
							?>
							<li class="resource-box">
								<a href = "<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('large');
										}
									?>
									<div class="article-content">
										<?php $title = get_the_title();
										$type = get_the_terms($post->ID,'type');
										echo '<h5>'.$type[0]->name.'</h5>';
										?>
										<h4><?php echo $title; ?></h4>

										<p><?php if(strlen($title) > 63) {echo excerpt(16);} elseif(strlen($title) > 32){echo excerpt(20);} else {echo excerpt(30);} ?></p>
										<strong class="link">Learn more</strong>
									</div>
								</a>
							</li>
						<?php wp_reset_postdata(); endif; endwhile;  ?>
						</ul>

					</div>
				</div>
				<?php endif; ?>
			</header><!-- .page-header -->
			<?php endif; ?>
			<div class="resource-list-container">
				<div class="wrap group">
					<header class="resource-list-header group">
						<h1 class="page-title">All Resources</h1>
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
						<div class="resource-search">

							<form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform" class="search-form">
							    <input type="text" name="s" placeholder="Search Resources" class="search-field"/>
							    <input type="hidden" name="post_type" value="resource" />
							    <input type="submit" alt="Search" value="Search" class="search-submit"/>
							</form>
						</div>
					</header>
					<div class="resource-list">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="resource-item">
							<?php
							$type = get_the_terms($post->ID,'type');
							echo '<h5>'.$type[0]->name.'</h5>';
							if ( has_post_thumbnail() ) {
								echo '<a href = "'.get_the_permalink().'">';
								the_post_thumbnail('medium');
								echo '</a>';
							}

							the_title();

							?>
							<div class="resource-actions">
								<a href = "<?php the_permalink(); ?>">
									<span>Learn More</span>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
					</div>
				<?php the_posts_navigation(array('prev_text' => __( 'More &raquo;' ),
            'next_text' => __( '&laquo; Previous' ),)); ?>
				</div>
			</div>
		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
