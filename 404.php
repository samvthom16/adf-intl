<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ADF
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<div class="centered-text">
					<div class="wrap">
						<h1>Oops! Nothing is here.</h1>
						<p>Looks like the web address you were trying to visit doesn't exist. Maybe we sent you to the wrong place or perhaps you typed in the url incorrectly. Maybe the dropdown menus below will help or you can try searching.</p>
						<?php get_search_form(); ?>
						<div class="group">
							<?php $issues = get_field('issues', 'option');
							if( $issues ): ?>
							<div class="half first dropdown ">
								<a href = "#" class="dd-trigger">Issues We Face<?php include(get_template_directory().'/_svg/icon-caret-down.php'); ?></a>
								<ul class="dropdown-list">
									<?php foreach( $issues as $issue ): ?>
									<li>
										<a href = "<?php echo get_term_link( $issue , 'issues'); ?>">
											<?php echo $issue->name; ?>
										</a>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php endif;
							$regions = get_field('regions', 'option');
							if( $regions ): ?>
							<div class="half dropdown ">
								<a href = "#" class="dd-trigger">Regions We Work In<?php include(get_template_directory().'/_svg/icon-caret-down.php'); ?></a>
								<ul class="dropdown-list">
									<?php foreach( $regions as $region ): ?>
									<li>
										<a href = "<?php echo get_term_link( $region , 'regions'); ?>">
											<?php echo $region->name; ?>
										</a>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
