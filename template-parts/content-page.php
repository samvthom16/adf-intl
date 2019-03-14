<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ADF
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( have_rows('modules') ): ?>
	<div class="page-content">
		<?php
		$i = 0;
		while ( have_rows('modules') ) : the_row();
			if( get_row_layout() == 'content_banner' ):
				$post_object = get_sub_field('banner_content');
				if( $post_object ):
					$post = $post_object;
					setup_postdata( $post );
					if(get_sub_field('banner_override')) {
						$title = get_sub_field('banner_title');
						$excerpt = get_sub_field('banner_excerpt');
						$text = get_sub_field('banner_link_text');
					} else {
						$title = get_the_title();
						$excerpt = excerpt(32);
						$text = 'Learn More';
					}
		?>
		<div class="full-banner" id="section<?php echo $i; ?>">
			<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
			?>
			<div class="banner-content">
				<div class="banner-wrap">
					<a href = "<?php the_permalink(); ?>">
						<h2><?php echo $title; ?></h2>
						<p><?php echo $excerpt; ?></p>
						<span><?php echo $text; ?></span>
					</a>
				</div>
			</div>
		</div>
		<?php wp_reset_postdata(); endif; ?>
		<?php elseif( get_row_layout() == 'custom_banner' ): ?>
		<div class="full-image" id="section<?php echo $i; ?>">
			<?php
			$image = get_sub_field('ban_image');
			if( !empty($image) ) {
				echo wp_get_attachment_image( $image['id'], 'full' );
			}
			?>
			<div class="image-overlay <?php the_sub_field('ban_location'); ?>">
				<?php the_sub_field('ban_content'); ?>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'centered_content' ): ?>
		<div class="centered-text <?php if(get_sub_field('cent_hide')) {echo 'hidden-module ';} the_sub_field('cent_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap">
				<?php
					$vid = get_sub_field('cent_video');
					if($vid):
				?>
				<div class="fitvids">
					<?php echo $vid; ?>
				</div>
				<?php
					endif;
					the_sub_field('cent_content');
					if( get_sub_field('cent_dropdowns') ) : ?>
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
				<?php endif; ?>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'three_boxes' ): ?>
		<div class="three-boxes <?php the_sub_field('box_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap">
				<?php
				$title = get_sub_field('box_section_title');

				if($title) {
					echo '<h2>'.$title.'</h2>';
				}
 				if( have_rows('boxes') ): ?>
				<ul class="three-list group">
					<?php
					while ( have_rows('boxes') ) : the_row();
						$url = get_sub_field('box_url');
					?>
					<li <?php if(!$url) {echo 'class="no-link"';} ?>>
						<?php
						$image = get_sub_field('box_icon');
						if( !empty($image) ): ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>
						<?php
							$box_title = get_sub_field('box_title');
							echo '<h4>'.(($url)?'<a href = "'.$url.'">':'').$box_title.(($url)?'</a>':'').'</h4>';
						?>
						<p><?php the_sub_field('box_paragraph'); ?></p>
						<a href = "<?php echo $url; ?>"><?php the_sub_field('box_link_text'); ?></a>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'subscribe' ): ?>
		<div class="subscribe <?php the_sub_field('sub_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap">
				<div class="newsletter">
					<?php gravity_form( get_sub_field('subscribe_form'), true, true); ?>
				</div>
			</div>
		</div>
		<?php
		elseif( get_row_layout() == 'featured_content' ):
			$post_object = get_sub_field('feat_content');
			if( $post_object ):
				$post = $post_object;
				setup_postdata( $post );
				$type = get_post_type($post);
		?>
		<div class="home-articles <?php the_sub_field('feat_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap">
				<div class="secondary-feature group <?php if($type == 'resource'){echo 'resource-feature';} ?>">
					<a href = "<?php the_permalink(); ?>" class="feature-image">
						<?php if($type == 'resource'): ?>
							<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' )[0]; ?>">
						<?php else : ?>
						<picture>
							<source srcset="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'square' )[0]; ?>" media="(max-width: 44em)">
							<source srcset="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' )[0]; ?>" media="(max-width: 62.5em)">
							<?php echo wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), 'square'); ?>
						</picture>
						<?php endif; ?>
					</a>
					<span class="content-type"><?php echo get_post_type($post); ?></span>
					<div class="feature-content">
						<h3><?php the_title(); ?></h3>
						<p><?php echo excerpt(60); ?></p>
						<a href = "<?php the_permalink(); ?>">Read more</a>
					</div>
				</div>
			</div>
		</div>
		<?php wp_reset_postdata(); endif; ?>
		<?php
		elseif( get_row_layout() == 'recent_content' ):
			$type = get_sub_field('recent_type');
			$args = array(
				'post_type' => $type,
				'posts_per_page' => 3
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) :
		?>
		<div class="articles-module <?php the_sub_field('recent_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap">
				<header>
					<h3>Recent <?php echo $type; ?></h3>
					<a href = "<?php echo get_post_type_archive_link( $type ); ?>">View All ></a>
				</header>
				<ul class="article-list three-list group">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li>
						<a href = "<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('large');
								}
							?>
							<span class="content-type"><?php echo $type; ?></span>
							<div class="article-content">
								<?php $title = get_the_title(); ?>
								<h4><?php echo $title; ?></h4>
								<p><?php if(strlen($title) > 63) {echo excerpt(16);} elseif(strlen($title) > 32){echo excerpt(20);} else {echo excerpt(30);} ?></p>
								<strong class="link">Read more</strong>
							</div>
						</a>
					</li>
					<?php wp_reset_postdata(); endwhile; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
		<?php elseif( get_row_layout() == 'custom_content' ): ?>
		<div class="articles-module <?php the_sub_field('cust_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap">
				<header>
					<h3><?php the_sub_field('cust_title'); ?></h3>
				</header>
				<?php if( have_rows('cust_boxes') ): ?>
				<ul class="article-list three-list group">
					<?php
					while ( have_rows('cust_boxes') ) : the_row();
						$post_object = get_sub_field('cust_piece');
						if( $post_object ):
							$post = $post_object;
							setup_postdata( $post );
					?>
					<li<?php if(get_post_type($post) == 'resource'){echo ' class="resource-box"';}?>>
						<a href = "<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('large');
								}
							?>
							<span class="content-type"><?php echo get_post_type($post); ?></span>
							<div class="article-content">
								<?php $title = get_the_title(); ?>
								<h4><?php echo $title; ?></h4>
								<p><?php if(strlen($title) > 63) {echo excerpt(16);} elseif(strlen($title) > 32){echo excerpt(20);} else {echo excerpt(30);} ?></p>
								<strong class="link">Read more</strong>
							</div>
						</a>
					</li>
				<?php wp_reset_postdata(); endif; endwhile;  ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'photo_gallery' ): ?>
		<div class="picture-gallery <?php the_sub_field('photo_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap">
				<div class="pic-intro">
					<?php the_sub_field('photo_intro'); ?>
				</div>
				<?php
				$main_image = get_sub_field('main_photo');
				$main_caption = get_sub_field('main_caption');
				if( !empty($main_image) ): ?>
				<div class="pic-main">
					<a href = "<?php echo $main_image['url']; ?>">
						<img src="<?php echo $main_image['url']; ?>" alt="<?php echo $main_image['alt']; ?>" />
					</a>
					<div class="pic-caption">
						<?php if($main_caption): ?>
						<p><?php echo $main_caption; ?></p>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
				<ul class="pic-list">
					<li>
						<a href = "#" data-src="<?php echo $main_image['url']; ?>" data-caption="<?php echo $main_caption; ?>">
							<img src = "<?php echo $main_image['sizes'][ 'thumbnail' ]; ?>">
						</a>
					</li>
					<?php
					if( have_rows('other_photos') ):
						while ( have_rows('other_photos') ) : the_row(); ?>
					<li>
						<?php $image = get_sub_field('photo_image');
						if( !empty($image) ): ?>
						<a href = "#" data-src="<?php echo $image['url']; ?>" data-caption="<?php the_sub_field('photo_caption'); ?>">
							<img src = "<?php echo $image['sizes'][ 'thumbnail' ]; ?>">
						</a>
						<?php endif; ?>
					</li>
					<?php endwhile; endif; ?>
				</ul>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'tabs' ): ?>
		<div class="tabs-container <?php the_sub_field('tab_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap">
				<?php if( have_rows('tab_layout') ): ?>
				<div class="tabs">
					<ul class="horizontal visible">
						<?php
						$t = 0;
						while ( have_rows('tab_layout') ) : the_row();
							$tab_name = get_sub_field('tab_name');
							$tab_short = trim(preg_replace("/[^0-9a-z]+/i", "", strtolower($tab_name)));
						?>
						<li><a href="#<?php echo $tab_short.$t; ?>"><?php echo $tab_name; ?></a></li>
						<?php $t++; endwhile; ?>
					</ul>
					<?php
					$t = 0;
					while ( have_rows('tab_layout') ) : the_row();
						$tab_name = get_sub_field('tab_name');
						$tab_short = trim(preg_replace("/[^0-9a-z]+/i", "", strtolower($tab_name)));
					?>
					<div id="<?php echo $tab_short.$t; ?>" class="tab-content group">
						<?php if( get_row_layout() == 'third_two_thirds' ): ?>
						<div class="third first">
							<?php
							$image = get_sub_field('tab_third');
							if( !empty($image) ): ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php endif; ?>
						</div>
						<div class="two-third">
							<?php the_sub_field('tab_two_third'); ?>
						</div>
						<?php elseif( get_row_layout() == 'halves' ):  ?>
						<div class="half first">
							<?php the_sub_field('first_half'); ?>
						</div>
						<div class="half">
							<?php the_sub_field('second_half'); ?>
						</div>
						<?php elseif( get_row_layout() == 'with_menu' ):  ?>
						<div class="two-third first">
							<?php the_sub_field('menu_content'); ?>
						</div>
						<div class="third">
							<?php if( have_rows('tab_menu') ): ?>
							<ul class="tab-menu">
								<?php while ( have_rows('tab_menu') ) : the_row(); ?>
								<li>
									<a href = "<?php the_sub_field('menu_url'); ?>"><?php the_sub_field('menu_text'); ?></a>
								</li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php $t++; endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'global_cta' ): ?>
		<div class="involved" id="section<?php echo $i; ?>">
			<div class="wrap group">
				<div class="vertical-center">
					<?php the_field('cta_text', 'option'); ?>
				</div>
				<?php if( have_rows('cta_actions', 'option') ): ?>
				<div class="involved-options">
					<?php while( have_rows('cta_actions', 'option') ): the_row(); ?>
					<a href = "<?php the_sub_field('cta_url'); ?>" class="involved-link <?php the_sub_field('cta_color'); ?>">
						<?php
						$image = get_sub_field('cta_icon');
						if( !empty($image) ): ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>
						<h4><?php the_sub_field('cta_title'); ?></h4>
						<p><?php the_sub_field('cta_summary'); ?></p>
					</a>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'custom_cta' ): ?>
		<div class="involved" id="section<?php echo $i; ?>">
			<div class="wrap group">
				<div class="vertical-center">
					<?php the_sub_field('cta_content'); ?>
				</div>
				<div class="involved-options">
					<?php
					$image = get_sub_field('cta_image');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'divider' ): ?>
		<div class="divider <?php the_sub_field('div_back'); ?>" id="section<?php echo $i; ?>">
			<hr />
		</div>
		<?php elseif( get_row_layout() == 'form' ): ?>
		<div class="form-module <?php if(get_sub_field('form_hide')) {echo 'hidden-module ';} the_sub_field('form_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap">
				<div class="form-container">
					<?php gravity_form( get_sub_field('form_id'), true, true); ?>
				</div>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'two_third_module' ): ?>
		<div class="two-third-module <?php if(get_sub_field('tt_mod_hide')) {echo 'hidden-module ';} the_sub_field('tt_mod_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap group">
				<?php
				$title = get_sub_field('tt_mod_title');
				if($title) {
					echo '<h2>'.$title.'</h2>';
				}
				?>
				<div class="third first <?php the_sub_field('tt_mod_location'); ?>">
					<?php
					$image = get_sub_field('tt_mod_image');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</div>
				<div class="two-third">
					<?php the_sub_field('tt_mod_content'); ?>
				</div>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'half_module' ): ?>
		<div class="half-module <?php if(get_sub_field('hmod_hide')) {echo 'hidden-module ';} the_sub_field('hmod_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap group">
				<?php
				$title = get_sub_field('hmod_title');
				if($title) {
					echo '<h2>'.$title.'</h2>';
				}
				?>
				<div class="half first">
					<?php the_sub_field('hmod_first'); ?>
				</div>
				<div class="half">
					<?php the_sub_field('hmod_second'); ?>
				</div>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'list_module' ): ?>
		<div class="list-module <?php the_sub_field('list_back'); ?>" id="section<?php echo $i; ?>">
			<div class="wrap group">
				<?php
				$title = get_sub_field('list_title');
				if($title) {
					echo '<h2>'.$title.'</h2>';
				}
				?>
				<ul class="<?php the_sub_field('list_rows'); ?>-list group">
					<?php while( have_rows('list') ): the_row(); ?>
					<li><?php the_sub_field('item_content'); ?></li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<?php endif; $i++; endwhile; ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
