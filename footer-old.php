<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ADF
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="top-footer">
			<div class="wrap">
				<div class="footer-first group">
					<div class="half first">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="footer-logo">
							<img src="<?php bloginfo('template_directory'); ?>/_i/logo-white.png" />
							<span class="assistive-text"><?php bloginfo( 'name' ); ?></span>
						</a>
					</div>
					<?php $issues = get_field('issues', 'option');
					if( $issues ): ?>
					<div class="half footer-dropdowns">
						<div class="dropdown ">
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
						<div class="dropdown ">
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
				<hr />
				<div class="footer-second">
					<ul class="three-list group">
						<li>
							<h4>About</h4>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'about',
									'menu_class' => 'two-list always-two group'
								) );
							?>
						</li>
						<li>
							<h4>Our Work</h4>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'work',
									'menu_class' => 'two-list always-two group'
								) );
							?>
						</li>
						<li>
							<h4>Connect</h4>
							<ul class="two-list always-two group">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'connect',
									'container' => '',
									'items_wrap' => '%3$s'
								) );
							?>
								<li class="social">
									<a href = "#" class="facebook">
										<img src="<?php bloginfo('template_directory'); ?>/_i/facebook.png" />
										<span class="assistive-text">Facebook</span>
									</a>
									<a href = "#" class="twitter">
										<img src="<?php bloginfo('template_directory'); ?>/_i/twitter.png" />
										<span class="assistive-text">Twitter</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="bottom-footer">
			<div class="wrap group">
				<div class="copyright">
					&copy; <?php bloginfo( 'name' ); ?>
				</div>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'bottom',
						'menu_class' => 'bottom-links',
					) );
				?>
			</div>
		</div>
	</footer><!-- #colophon -->
	<?php if(!$_COOKIE["hideBanner"]) : ?>
	<div class="cookie-bar">
		<div class="message">
			<?php the_field('cookie_text','option'); ?>
		</div>
		<a href = "#" class="close-cookie">OK</a>
	</div>
	<?php endif; ?>
</div><!-- #page -->
<div class="overlay-content"></div>
<div class="overlay"></div>
<?php wp_footer(); ?>

</body>
</html>
