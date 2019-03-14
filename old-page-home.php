<?php
/**
 * Template Name: Home
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

			<?php while ( have_posts() ) : the_post(); ?>
			<div class="full-banner">
				<!--<img src = "http://placehold.it/1920x855">-->
				<img src="<?php bloginfo('template_directory'); ?>/_i/un.jpg" />
				<div class="banner-content">
					<div class="banner-wrap">
						<a href = "#">
							<h2>United in Diversity</h2>
							<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut</p>
							<span>Learn More</span>
						</a>
					</div>
				</div>
			</div>
			<div class="centered-text">
				<div class="wrap">
					<div class="fitvids">
						<iframe src="https://player.vimeo.com/video/239848449?title=0&byline=0&portrait=0" width="640" height="338" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
					<h2>Defending Freedom. Seeking Justice.<br />Worldwide</h2>
					<p>ADF International, a global partner of Alliance Defending Freedom, is an alliance-building human rights organization that advocates for the right of people to freely live out their faith. We are at the forefront of defending religious freedom, the sanctity of life, and marriage and family around the world.</p>
					<div class="group">
						<div class="half first dropdown ">
							<a href = "#" class="dd-trigger">Issues We Face<?php include(get_template_directory().'/_svg/icon-caret-down.php'); ?></a>
							<ul class="dropdown-list">
								<li><a href = "#">Beginning of Life</a></li>
								<li><a href = "#">End of Life</a></li>
								<li><a href = "#">Free Speech</a></li>
								<li><a href = "#">Parental Rights</a></li>
								<li><a href = "#">Freedom of Conscience</a></li>
								<li><a href = "#">Church Autonomy</a></li>
								<li><a href = "#">Marriage & Family</a></li>
								<li><a href = "#">Global Persecution</a></li>
							</ul>
						</div>
						<div class="half dropdown ">
							<a href = "#" class="dd-trigger">Regions We Work In<?php include(get_template_directory().'/_svg/icon-caret-down.php'); ?></a>
							<ul class="dropdown-list">
								<li><a href = "#">Europe</a></li>
								<li><a href = "#">The Americas</a></li>
								<li><a href = "#">South Asia</a></li>
								<li><a href = "#">United Nations</a></li>
								<li><a href = "#">Africa</a></li>
								<li><a href = "#">Oceania</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="three-boxes dark-back">
				<div class="wrap">
					<h2>How We Help</h2>
					<ul class="three-list group">
						<li>
							<?php include(get_template_directory().'/_svg/icon-gavel.php'); ?>
							<h4>Advocacy</h4>
							<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis.</p>
							<a href = "#">Landmark cases</a>
						</li>
						<li>
							<?php include(get_template_directory().'/_svg/icon-money.php'); ?>
							<h4>Funding</h4>
							<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis.</p>
							<a href = "#">How funding works</a>
						</li>
						<li>
							<?php include(get_template_directory().'/_svg/icon-cap.php'); ?>
							<h4>Training</h4>
							<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis.</p>
							<a href = "#">Training Programs</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="home-articles gray-back">
				<div class="wrap">
					<div class="newsletter">
						<?php gravity_form( 1, true, true); ?>
					</div>
					<div class="secondary-feature group">
						<a href = "#" class="feature-image">
							<picture>
								<source srcset="<?php bloginfo('template_directory'); ?>/_i/barbwire.jpg" media="(max-width: 44em)">
								<source srcset="<?php bloginfo('template_directory'); ?>/_i/un.jpg" media="(max-width: 62.5em)">
								<img src="<?php bloginfo('template_directory'); ?>/_i/barbwire.jpg">

							</picture>
						</a>
						<span class="content-type">Article</span>
						<div class="feature-content">
							<h3>The Slippery Slope of Euthanasia Laws</h3>
							<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit vestibulum amet tortor, pede velit. Eleifend pharetra convallis enim a rutrum, pede nunc porta, odio quam nunc id tellus. Blandit dui eu, congue nec a sit praesent duis.</p>
							<a href = "#">Read more</a>
						</div>
					</div>
					<div class="article-display">
						<header>
							<h3>Recent</h3>
							<a href = "#">View All ></a>
						</header>
						<ul class="article-list three-list group">
							<li>
								<a href = "#">
									<img src="<?php bloginfo('template_directory'); ?>/_i/article1.jpg">
									<span class="content-type">News Release</span>
									<div class="article-content">
										<h4>The Future of Freedom</h4>
										<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit.</p>
										<strong class="link">Read more</strong>
									</div>
								</a>
							</li>
							<li>
								<a href = "#">
									<img src="<?php bloginfo('template_directory'); ?>/_i/article2.jpg">
									<span class="content-type">Article</span>
									<div class="article-content">
										<h4>The Future of Freedom</h4>
										<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit.</p>
										<strong class="link">Read more</strong>
									</div>
								</a>
							</li>
							<li>
								<a href = "#">
									<img src="<?php bloginfo('template_directory'); ?>/_i/article3.jpg">
									<span class="content-type">Legal Case</span>
									<div class="article-content">
										<h4>The Future of Freedom</h4>
										<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit.</p>
										<strong class="link">Read more</strong>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="involved">
				<div class="wrap group">
					<div class="vertical-center">
						<h2>You Can Make an Impact</h2>
						<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit vestibulum amet tortor, pede velit.</p>
					</div>
					<div class="involved-options">
						<a href = "#" class="involved-link donate-link">
							<?php include(get_template_directory().'/_svg/icon-gift.php'); ?>
							<h4>Donate</h4>
							<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo</p>
						</a>
						<a href = "#" class="involved-link subscribe-link">
							<?php include(get_template_directory().'/_svg/icon-envelope.php'); ?>
							<h4>Subscribe</h4>
							<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo</p>
						</a>
						<a href = "#" class="involved-link join-link">
							<?php include(get_template_directory().'/_svg/icon-comments.php'); ?>
							<h4>Get Involved</h4>
							<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo</p>
						</a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
