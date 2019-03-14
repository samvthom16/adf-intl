<?php
/**
 * Template Name: UDHR Home
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
session_start();
$_SESSION['lang'] = $_GET['lang'];
if(!isset($_SESSION['lang']) ) {
 	$_SESSION['lang'] = 'English';
}
if ( have_rows( 'language' ) ) {
 	while ( have_rows( 'language' ) ) : the_row();
 		if(get_sub_field('language_name') == $_SESSION['lang']) {
			//Nav
			global $nav;
			$nav = get_sub_field( 'navigation' );
 			//Header
			$header_image = get_sub_field( 'udhr_image' );
 			$title = get_sub_field( 'udhr_headline' );
 			$sub = get_sub_field( 'udhr_sub' );
 			$intro = wpautop( get_sub_field( 'udhr_intro' ) );
 			$btn_text = get_sub_field( 'udhr_btn_text' );
			$btn_sub = get_sub_field( 'udhr_btn_sub' );
 			$second_link = get_sub_field( 'udhr_second' );
 			$second_text = get_sub_field( 'udhr_sec_text' );
 			$video = get_sub_field( 'udhr_video' );
 			//Feature
 			$show_feature = get_sub_field( 'udhr_featured' );
			$feature_section = get_sub_field( 'udhr_fsection' );
 			$feature_link = get_sub_field( 'udhr_flink' );
 			$feature_image = get_sub_field( 'udhr_fimage' );
 			$feature_content = get_sub_field( 'udhr_fcontent' );
			$feature_more = get_sub_field( 'udhr_fmore' );
 			//Stories
			$story_section = get_sub_field('udhr_story_section');
 			$stories = get_sub_field('udhr_stories');
            $showmore = get_sub_field('udhr_show');
            $showmoretext = get_sub_field('udhr_more_stories');
            $morestories = get_sub_field('udhr_hide_stories');
 			//Declaration
			$declaration_title = get_sub_field('udhr_decl_title');
 			$declaration = get_sub_field('udhr_decl');
 			$declaration_text = get_sub_field( 'udhr_down_text' );
            $declaration_full = get_sub_field( 'full_declaration_text' );
 			//Promote
 			$promote_title = get_sub_field( 'udhr_ban_title' );
 			$promote_image = get_sub_field( 'udhr_ban_img' );
            $promote_link = get_sub_field( 'udhr_ban_link' );
 			//About
 			$about = get_sub_field( 'udhr_about' );
 			$about_link = get_sub_field( 'udhr_ab_link' );
 			$about_text = get_sub_field( 'udhr_ab_text' );
			//Form
			global $form;
			$form = get_sub_field( 'udhr_form' );
			$_SESSION['confirm'] = get_sub_field( 'udhr_second_form' );
 		}
 	endwhile;
}
get_header('udhr');

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<header class="udhr-header">
				<?php echo wp_get_attachment_image( $header_image['ID'] , 'full'); ?>
				<div class="banner-content">
					<div class="banner-title">
						<?php
							if($title) {
								echo '<h1 id="title">'.$title.'</h1>';
							}
							if($sub) {
								echo '<h4>'.$sub.'</h4>';
							}
						?>
					</div>
					<div class="banner-subcontent">
						<?php echo $intro; ?>
						<div class="ctas">
							<a href="#" id="petition-trigger" class=" btn">
								<?php echo $btn_text; ?>
								<span><?php echo GFAPI::count_entries($form).' '.$btn_sub; ?></span>
							</a>
							<?php if($second_link) : ?>
							<a href = "<?php echo $second_link; ?>" class="secondary"><?php echo $second_text; ?> &raquo;</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</header>
			<?php if($video) : ?>
			<div class="feature-video">
				<div class="wrap">
					<div class="fitvids">
						<?php echo $video; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( $show_feature == 1 ) : ?>
			<div class="featured-story">
				<div class="wrap">
					<?php
						if($feature_section) {
							echo '<h2>'.$feature_section.'</h2>';
						}
					?>
					<div class="secondary-feature group">
						<a href = "<?php echo $feature_link; ?>" class="feature-image">
							<picture>
								<source srcset="<?php echo wp_get_attachment_image_src( $feature_image['ID'], 'square' )[0]; ?>" media="(max-width: 44em)">
								<source srcset="<?php echo wp_get_attachment_image_src( $feature_image['ID'] , 'large' )[0]; ?>" media="(max-width: 62.5em)">
								<?php echo wp_get_attachment_image( $feature_image['ID'] , 'square'); ?>
							</picture>
						</a>
						<div class="feature-content">
							<?php echo $feature_content; ?>
							<a href = "<?php echo $feature_link; ?>"><?php echo $feature_more; ?></a>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( $stories ) : ?>
			<div class="story-archive" id="story">
			    <div class="wrap">
					<?php
						if($story_section) {
							echo '<h2>'.$story_section.'</h2>';
						}
					?>
			        <div class="grid four">
			            <?php foreach($stories as $story) : ?>
			            <a href = "<?php echo $story['story_url']; ?>" class="archive-preview">
			                <?php $story_image = $story['story_image'];
			                if ( $story_image ) {
			                    echo wp_get_attachment_image( $story_image['ID'] , 'full');
			                } ?>
			                <div class="archive-content">
			                    <?php echo $story['story_content']; ?>
			                </div>
			            </a>
						<?php endforeach; ?>
			        </div>
                    <?php if ( $showmore ) : ?><a href = "#" id="show_more"><?php echo $showmoretext; ?> &raquo;</a><?php endif; ?>
			    </div>
			</div>
			<?php endif; ?>
            <?php if ( $showmore ) : ?>
			<div class="story-archive" id="more-story">
			    <div class="wrap">
			        <div class="grid four">
			            <?php foreach($morestories as $story) : ?>
			            <a href = "<?php echo $story['story_url']; ?>" class="archive-preview">
			                <?php $story_image = $story['story_image'];
			                if ( $story_image ) {
			                    echo wp_get_attachment_image( $story_image['ID'] , 'full');
			                } ?>
			                <div class="archive-content">
			                    <?php echo $story['story_content']; ?>
			                </div>
			            </a>
						<?php endforeach; ?>
			        </div>
			    </div>
			</div>
			<?php endif; ?>
			<div class="summary" id="declaration">
				<div class="sm-wrap group">
					<?php
						if($declaration_title) {
							echo '<h2>'.$declaration_title.'</h2>';
						}
					?>
					<div class="columns">
						<?php echo $declaration; ?>
					</div>
					<div class="summary-links">
						<a href = "<?php echo $declaration_link; ?>" id="trigger-declaration"><?php echo $declaration_text; ?> &raquo;</a>
					</div>
				</div>
			</div>
            <div class="full-declaration">
                <a href = "#" id="hide-declaration">&times;<span class="assistive-text">Hide Statement</span></a>
                <div class="sm-wrap">
                    <div class="full-decl-container">
                        <?php echo $declaration_full; ?>
                    </div>
                </div>
            </div>
			<div class="banner" id="promote">
				<?php
                if($promote_link) {
                    echo '<a href = "'.$promote_link.'">';
    				if($promote_title) {
    					echo '<h2>'.$promote_title.'</h2>';
    				}
    				if ( $promote_image ) {
    					echo wp_get_attachment_image( $promote_image['ID'] , 'full');
    				}
                    echo '</a>';
                } else {
                    if($promote_title) {
    					echo '<h2>'.$promote_title.'</h2>';
    				}
    				if ( $promote_image ) {
    					echo wp_get_attachment_image( $promote_image['ID'] , 'full');
    				}
                }
				?>
			</div>
			<div class="about" id="about">
				<div class="sm-wrap">
					<img src="<?php bloginfo('template_directory'); ?>/_i/logo.png" class="about-logo"/>
					<?php echo $about; ?>
					<a href = "<?php echo $about_link; ?>" target="_blank"><?php echo $about_text; ?> &raquo;</a>
				</div>
				<!--<div class="wrap">
					<a href = "#" class="btn" id="about-trigger">About ADF International</a>
					<div class="about-adf">
						<div class="group">
							<div class="third first">
								<img src = "http://placehold.it/600x400">
							</div>
							<div class="two-third">
								<p>Nulla quis lorem ut libero malesuada feugiat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla porttitor accumsan tincidunt.</p>
								<p>Nulla quis lorem ut libero malesuada feugiat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla porttitor accumsan tincidunt.</p>
							</div>
						</div>
					</div>
				</div>-->
			</div>
			<a href="#" id="sticky-petition">
				<?php include(get_template_directory().'/_svg/icon-edit.php'); ?>
				<?php echo $btn_text; ?>
			</a>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//	get_sidebar();
get_footer('udhr');
