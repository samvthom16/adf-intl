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
	<a href = "#page" id="trigger-top">
		<?php include(get_template_directory().'/_svg/icon-arrow-up.php'); ?>
		<span>Top</span>
	</a>
	<footer id="colophon" class="site-footer <?php if(get_field('hide_footer',$post->ID) && !is_search() ){echo 'hide-footer';} ?>">
		<div class="top-footer">
			<div class="wrap">
				<div class="footer-first group">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="footer-logo">
							<img src="<?php bloginfo('template_directory'); ?>/_i/logo-white.png" />
							<span class="assistive-text"><?php bloginfo( 'name' ); ?></span>
						</a>
				</div>
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
									<a href = "https://www.facebook.com/ADFInternational" target="_blank" class="facebook">
										<img src="<?php bloginfo('template_directory'); ?>/_i/facebook.png" />
										<span class="assistive-text">Facebook</span>
									</a>
									<a href = "https://twitter.com/ADFIntl" target="_blank" class="twitter">
										<img src="<?php bloginfo('template_directory'); ?>/_i/twitter.png" />
										<span class="assistive-text">Twitter</span>
									</a>
									<a href = "https://www.linkedin.com/company/adfinternational/" target="_blank"" class="linkedin">
										<img src="<?php bloginfo('template_directory'); ?>/_i/linkedin.png" />
										<span class="assistive-text">Twitter</span>
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
	<?php if(!isset($_COOKIE["hideBanner"])) : ?>
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
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afc78526bb936fd"></script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2334661420093630');
  fbq('init', '718679458477391');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2334661420093630&ev=PageView&noscript=1"
/>
<img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=718679458477391&ev=PageView&noscript=1"
/>

</noscript>
<!-- End Facebook Pixel Code -->
</body>
</html>
