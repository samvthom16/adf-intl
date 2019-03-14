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
global $form;
?>

	</div><!-- #content -->
	<?php if(!isset($_COOKIE["hideBanner"])) : ?>
	<div class="cookie-bar">
		<div class="message">
			<?php the_field('cookie_text','option'); ?>
		</div>
		<a href = "#" class="close-cookie">OK</a>
	</div>
	<?php endif; ?>
</div><!-- #page -->
<div class="overlay">
	<div class="overlay-content petition">
		<div class="petition-container" id="petition">
			<a href = "#" class="overlay-close">&times<span class="assistive-text">Close</span></a>
			<?php gravity_form( $form, true, true, true, '',true); ?>
		</div>
	</div>
	<div class="overlay-video">
	</div>
	<a class = "overlay-hide" href="#">&times;</a>
</div>
<?php wp_footer(); ?>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afc78526bb936fd"></script>
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
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2334661420093630&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-59325025-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-59325025-1');
</script>
</body>
</html>
