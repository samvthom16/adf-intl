<?php
/**
 * Template Name: Issues
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
			<div class="full-banner title-banner">
				<img src="<?php bloginfo('template_directory'); ?>/_i/un.jpg" />
				<div class="banner-content">
					<div class="banner-wrap">
						<h2>Euthanasia</h2>
						<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut</p>
					</div>
				</div>
			</div>
			<div class="home-articles gray-back">
				<div class="wrap">
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
							<h3>News Releases</h3>
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
									<img src="<?php bloginfo('template_directory'); ?>/_i/article3.jpg">
									<span class="content-type">News Release</span>
									<div class="article-content">
										<h4>The Future of Freedom</h4>
										<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit.</p>
										<strong class="link">Read more</strong>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<div class="article-display">
						<header>
							<h3>Articles</h3>
							<a href = "#">View All ></a>
						</header>
						<ul class="article-list three-list group">
							<li>
								<a href = "#">
									<img src="http://placehold.it/640x285">
									<span class="content-type">Articles</span>
									<div class="article-content">
										<h4>The Future of Freedom</h4>
										<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit.</p>
										<strong class="link">Read more</strong>
									</div>
								</a>
							</li>
							<li>
								<a href = "#">
									<img src="http://placehold.it/640x285">
									<span class="content-type">Articles</span>
									<div class="article-content">
										<h4>The Future of Freedom</h4>
										<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit.</p>
										<strong class="link">Read more</strong>
									</div>
								</a>
							</li>
							<li>
								<a href = "#">
									<img src="http://placehold.it/640x285">
									<span class="content-type">Articles</span>
									<div class="article-content">
										<h4>The Future of Freedom</h4>
										<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit.</p>
										<strong class="link">Read more</strong>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<div class="article-display">
						<header>
							<h3>Legal Matters</h3>
							<a href = "#">View All ></a>
						</header>
						<ul class="article-list three-list group">
							<li>
								<a href = "#">
									<img src="http://placehold.it/640x285">
									<span class="content-type">Legal Matter</span>
									<div class="article-content">
										<h4>The Future of Freedom</h4>
										<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit.</p>
										<strong class="link">Read more</strong>
									</div>
								</a>
							</li>
							<li>
								<a href = "#">
									<img src="http://placehold.it/640x285">
									<span class="content-type">Legal Matter</span>
									<div class="article-content">
										<h4>The Future of Freedom</h4>
										<p>Lorem ipsum dolor sit amet, sed diamlorem arcu pellentesque, et commodo massa porttitor diam fermentum venenatis. A non accumsan consequat litora sagittis, elit lectus libero arcu sollicitudin metus ut, adipiscing eu urna velit.</p>
										<strong class="link">Read more</strong>
									</div>
								</a>
							</li>
							<li>
								<a href = "#">
									<img src="http://placehold.it/640x285">
									<span class="content-type">Legal Matter</span>
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
						<a href = "#" class="btn yellow">Learn More</a>
					</div>
					<div class="involved-options">
						<img src = "http://placehold.it/645x450">
					</div>
				</div>
			</div>
			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
