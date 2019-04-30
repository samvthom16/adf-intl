<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ADF
 */
$type = get_post_type($post->ID);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if($type != 'resource') : ?>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>
		<div class="article-header">
			<?php
			if ( is_singular() ) {
				echo '<h5>'.$type.'</h5>';
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			if($type == 'legal') {
				$action_date = get_field('action_date');
				if($action_date) {
					echo '<h5>Date of most recent action: '.$action_date.'</h5>';
				}
			}
			?>
			<?php if($type == 'commentary' || $type == 'news') :?>
			<div class="entry-meta">
				<?php
					$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
					if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
						$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
					}

					$time_string = sprintf( $time_string,
						esc_attr( get_the_date( 'c' ) ),
						esc_html( get_the_date() ),
						esc_attr( get_the_modified_date( 'c' ) ),
						esc_html( get_the_modified_date() )
					);

					$posted_on = sprintf(
						/* translators: %s: post date. */
						esc_html_x( 'Published on %s', 'post date', 'adf-intl' ),
						$time_string
					);
					if($type == 'commentary') {
						$byline = sprintf(
							/* translators: %s: post author. */
							esc_html_x( 'by %s', 'post author', 'adf-intl' ),
							'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
						);
					}

					 // WPCS: XSS OK.
					if(get_field('author_info') ){
						//adf_intl_posted_on();
						echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . ' </span>';
					} else {
						echo '<span class="posted-on">' . $posted_on . '</span>';
					}
				?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</div>
	</header><!-- .entry-header -->
	<?php endif; ?>
	<?php if($type == 'resource') :?>
		<div class="wrap resource-container group">
			<div class="third first">
				<div class="resource-sidebar">
					<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}
						$type = get_the_terms($post->ID,'type');
						echo '<h5>'.$type[0]->name.'</h5>';
						the_title( '<h1 class="resource-title">', '</h1>' );
						$option = get_field('resc_req');
						if($option == 'download') {
							$text = get_field('resc_text');
							echo '<a href = "'.get_field('resc_download').'" target="_blank">'.$text.'</a>';
						}

					?>
				</div>
			</div>
			<div class="two-third">
				<div class="resource-content">
					<?php
						the_content();
						if($option == 'form') {
							echo '<div class="form-container">';
							gravity_form( get_field('resc_form'), true, false, false, array('file' => get_field('resc_download')));
							echo '</div>';
						}
					?>

				</div>
			</div>
		</div>
	<?php else :?>
	<div class="entry-content sm-wrap">
		<?php
			$summary = get_field('summary');
			if(is_singular('news') && !empty($summary)) {
				echo '<div class="summary"><h2>Summary</h2>'.$summary.'</div>';
			}
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'adf-intl' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adf-intl' ),
				'after'  => '</div>',
			) );
			if($type == 'commentary' || $type == 'news' ):
		?>
		<div class="addthis_inline_share_toolbox"></div>
		<?php endif; ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<div class="sm-wrap">
			<?php if( have_rows('related_images') ): ?>
			<h4>Images for free use in print or online</h4>
			<div class="img-list">
				<?php
					while ( have_rows('related_images') ) : the_row();
						$image = get_sub_field('r_image');
						if( !empty($image) ):
				?>
				<a href = "<?php echo $image['url']; ?>" target="_blank">
					<img src="<?php echo $image['sizes'][ 'thumbnail' ]; ?>" alt="<?php echo $image['alt']; ?>" />
				</a>
			<?php endif; endwhile; ?>
			</div>
			<?php
			endif;
			$region_terms = wp_get_post_terms( $post->ID, 'regions' );
			if( $region_terms ) {
				$terms = array();
				foreach( $region_terms as $term ) {
					//This array below is used in the related articles section
					$regions[] = $term->slug;
				}
			}
			$issue_terms = wp_get_post_terms( $post->ID, 'issues' );
			if( $issue_terms ) {

				$terms = array();
				foreach( $issue_terms as $term ) {
					//This array below is used in the related articles section
					$issues[] = $term->slug;
				}
			}
			if( !get_field('topic_list') ): ?>
			<div class="topics">
				<h5><span>Related</span></h5>
				<ul>
				<?php
					if( $region_terms ) {
						foreach( $region_terms as $term ) {
							echo '<li><a href = "'.get_term_link( $term , 'regions').'">'.$term->name.'</a></li>';
						}
					}
					if( $issue_terms ) {
						foreach( $issue_terms as $term ) {
							echo '<li><a href = "'.get_term_link( $term , 'issues').'">'.$term->name.'</a></li>';
						}
					}
				?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</footer>
	<?php endif; ?>
	<?php if( have_rows('add_sections') ): ?>
	<div class="article-subcontent">
		<?php while ( have_rows('add_sections') ) : the_row(); ?>
		<?php if( get_row_layout() == 'two_third_mod' ): ?>
		<div class="content-section <?php the_sub_field('third_back'); ?>">
			<div class="wrap group">
				<div class="third first <?php the_sub_field('third_layout'); ?>">
					<?php
					$image = get_sub_field('third_image');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</div>
				<div class="two-third">
					<?php the_sub_field('third_content'); ?>
				</div>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'divider' ): ?>
		<div class="divider <?php the_sub_field('div_back'); ?>">
			<hr />
		</div>
		<?php elseif( get_row_layout() == 'subscribe' ): ?>
		<div class="subscribe <?php the_sub_field('sub_back'); ?>">
			<div class="wrap">
				<div class="newsletter">
					<?php gravity_form( get_sub_field('sub_form_id'), true, true); ?>
				</div>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'three_boxes' ): ?>
		<div class="three-boxes <?php the_sub_field('mbox_back'); ?>">
			<div class="wrap">
				<?php
				$title = get_sub_field('mboxes_title');
				if($title) {
					echo '<h2>'.$title.'</h2>';
				}
 				if( have_rows('mboxes') ): ?>
				<ul class="three-list group">
					<?php
					while ( have_rows('mboxes') ) : the_row();
						$url = get_sub_field('mbox_url');?>
					<li <?php if(!$url) {echo 'class="no-link"';} ?>>
						<?php
						$image = get_sub_field('mbox_icon');
						if( !empty($image) ): ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>
						<?php
							$title = get_sub_field('mbox_title');
							echo '<h4>'.(($url)?'<a href = "'.$url.'">':'').$title.(($url)?'</a>':'').'</h4>';
						?>
						<p><?php the_sub_field('mbox_content'); ?></p>
						<a <?php if(get_sub_field('mbox_target')){echo 'target="_blank"';} ?> href = "<?php echo $url; ?>"><?php the_sub_field('mbox_text'); ?></a>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'cent_text_video' ): ?>
		<div class="centered-text <?php the_sub_field('mcent_back'); ?>">
			<div class="wrap">
				<div class="fitvids">
					<?php the_sub_field('mcent_video'); ?>
				</div>
				<?php the_sub_field('mcent_content'); ?>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'halves' ): ?>
		<div class="content-section <?php the_sub_field('mhalf_back'); ?>">
			<div class="wrap group">
				<div class="half first">
					<?php the_sub_field('mfirst_half'); ?>
				</div>
				<div class="half">
					<?php the_sub_field('msecond_half'); ?>
				</div>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'video_list' ): ?>
		<div class="video-list <?php the_sub_field('video_back'); ?>">
			<div class="wrap">
				<?php
				$title = get_sub_field('video_section');
				if($title) {
					echo '<h2>'.$title.'</h2>';
				} if( have_rows('videos') ): ?>
				<ul class="three-list group">
					<?php while ( have_rows('videos') ) : the_row(); ?>
					<li>
						<a href = "#" data-video="<?php the_sub_field('video_code'); ?>">
							<div>
								<?php
								$image = get_sub_field('video_thumbnail');
								if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>
							</div>
							<span><?php the_sub_field('video_title'); ?></span>
						</a>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
		<?php elseif( get_row_layout() == 'form' ): ?>
		<div class="form-module <?php the_sub_field('form_back'); ?>">
			<div class="wrap">
				<div class="form-container">
					<?php gravity_form( get_sub_field('form_id'), true, true); ?>
				</div>
			</div>
		</div>
	<?php elseif( get_row_layout() == 'add_banner' ): ?>
		<div class="full-image">
			<?php
			$image = get_sub_field('add_image');
			if( !empty($image) ) {
				echo wp_get_attachment_image( $image['id'], 'full' );
			}
			?>
			<div class="image-overlay">
				<?php the_sub_field('add_content'); ?>
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
		<?php elseif( get_row_layout() == 'tabs' ): ?>
		<div class="tabs-container <?php the_sub_field('mtab_back'); ?>">
			<div class="wrap">
				<?php if( have_rows('mtab_layout') ): ?>
				<div class="tabs">
					<ul class="horizontal visible">
						<?php
						$t = 0;
						while ( have_rows('mtab_layout') ) : the_row();
							$tab_name = get_sub_field('tab_name');
							$tab_short = trim(preg_replace("/[^0-9a-z]+/i", "", strtolower($tab_name)));
						?>
						<li><a href="#<?php echo $tab_short.$t; ?>"><?php echo $tab_name; ?></a></li>
						<?php $t++; endwhile; ?>
					</ul>
					<?php
					$t = 0;
					while ( have_rows('mtab_layout') ) : the_row();
						$tab_name = get_sub_field('tab_name');
						$tab_short = trim(preg_replace("/[^0-9a-z]+/i", "", strtolower($tab_name)));
					?>
					<div id="<?php echo $tab_short.$t; ?>" class="tab-content group">
						<?php if( get_row_layout() == 'third_two_thirds' ): ?>
						<div class="third first">
							<?php
							$image = get_sub_field('tab_image');
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
		<?php endif; endwhile; ?>
	</div>
	<?php endif; ?>
	<?php

		$related = get_field('related_content');
		$dropdowns = get_field('content_dd');
		if($related || $dropdowns) :
	?>
	<footer class="entry-related gray-back">
		<?php
			if($related) :
				$count = get_field('cases_row');
				if( have_rows('related_cases') ):
		?>
		<div class="wrap group">
			<div class="article-display">
				<header>
					<h3>Related Cases</h3>
				</header>
				<?php if($count == 'one') : ?>
				<div class="secondary-feature group">
				<?php elseif($count == 'two') : ?>
				<ul class="article-list two-list always-two group">
				<?php elseif($count == 'three') : ?>
				<ul class="article-list three-list group">
				<?php else : ?>
				<ul class="article-list four-list group">
				<?php endif; ?>
				<?php
					while ( have_rows('related_cases') ) : the_row();
						$case = get_sub_field('rel_case');
						if( $case ):
							$post = $case;
							setup_postdata( $post );
							$type = get_post_type($post);
				?>
				<?php if($count == 'one') : ?>
				<a href = "<?php the_permalink(); ?>" class="<?php if($type == 'resource'){echo 'resource-feature';} ?> feature-image">
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
				<span class="content-type"><?php echo $type; ?></span>
				<div class="feature-content">
					<h3><?php the_title(); ?></h3>
					<p><?php echo excerpt(60); ?></p>
					<a href = "<?php the_permalink(); ?>">Read more</a>
				</div>
				<?php else : ?>
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
							<p><?php echo excerpt(30); ?></p>
							<strong class="link">Read more</strong>
						</div>
					</a>
				</li>
				<?php endif; wp_reset_postdata(); endif; endwhile; ?>
				<?php if($count == 'one') : ?>
				</div>
				<?php else : ?>
				</ul>
				<?php endif; ?>
			</div>
		</div><!--wrap-->
		<?php
				else :
					$exclude = array($post->ID);
					$args = array(
						'post_type' => array( 'news','commentary','legal','campaign' ),
						'posts_per_page' => 3,
						'post__not_in' => array( $post->ID ),
						'tax_query' => array(
						    'relation' => 'AND',
						    array(
						        'taxonomy' => 'regions',
						        'field'    => 'slug',
						        'terms'    => $regions,
						    ),
						    array(
						        'taxonomy' => 'issues',
						        'field'    => 'slug',
						        'terms'    => $issues,
						    ),
						),
					);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) :
		?>
		<div class="wrap group">
			<div class="article-display">
				<header>
					<h3>Additional Content</h3>
				</header>
				<ul class="article-list three-list always-two group">
					<?php $i= 0; while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
								<p><?php echo excerpt(30); ?></p>
								<strong class="link">Read more</strong>
							</div>
						</a>
					</li>
					<?php
						$exclude[] = get_the_ID();
						wp_reset_postdata();
						$i++;
					endwhile;
					if($i < 3) :
						$need = 3 - $i;
						$newargs = array(
							'post_type' => array( 'news','commentary','legal','campaign' ),
							'posts_per_page' => $need,
							'post__not_in' => $exclude,
							'tax_query' => array(
							    'relation' => 'OR',
							    array(
							        'taxonomy' => 'regions',
							        'field'    => 'slug',
							        'terms'    => $regions,
							    ),
							    array(
							        'taxonomy' => 'issues',
							        'field'    => 'slug',
							        'terms'    => $issues,
							    ),
							),
						);
						$the_query = new WP_Query( $newargs );
						if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post();
					?>
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
								<p><?php echo excerpt(30); ?></p>
								<strong class="link">Read more</strong>
							</div>
						</a>
					</li>
				<?php 		endwhile;
						endif;
					endif;
				?>
				</ul>
			</div>
		</div><!--wrap-->
		<?php
					endif;
				endif;
			endif; ?>
		<?php if($dropdowns) : ?>
		<div class="sm-wrap">
			<ul class="two-list group">
				<?php $issues = get_field('issues', 'option');
				if( $issues ): ?>
				<li class="dropdown ">
					<a href = "#" class="dd-trigger">Issues We Face <?php include(get_template_directory().'/_svg/icon-caret-down.php'); ?></a>
					<ul class="dropdown-list">
						<?php foreach( $issues as $issue ): ?>
						<li>
							<a href = "<?php echo get_term_link( $issue , 'issues'); ?>">
								<?php echo $issue->name; ?>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</li>
				<?php endif;
				$regions = get_field('regions', 'option');
				if( $regions ): ?>
				<li class="dropdown ">
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
				</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
	<?php
		endif;
		$cta = get_field('call_to_action');
		if($cta == 'global') :
	?>
	<div class="involved">
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
	<?php elseif($cta == 'custom') : ?>
	<div class="involved">
		<div class="wrap group">
			<div class="vertical-center">
				<?php the_field('cust_foot_content'); ?>
			</div>
			<div class="involved-options">
				<?php
				$image = get_field('cust_foot_image');
				if( !empty($image) ): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
