<?php
/**
 * Template Name: UDHR Story
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
if( isset($_GET['lang']) ) {
    $_SESSION['lang'] = $_GET['lang'];
} else {
    if(!isset($_SESSION['lang']) ) {
     	$_SESSION['lang'] = 'English';
    }
}

$parent = $post->post_parent;
if ( have_rows( 'language', $parent ) ) {
	while ( have_rows( 'language', $parent ) ) : the_row();
		if(get_sub_field('language_name') == $_SESSION['lang']) {
			//Nav
			global $nav;
			$nav = get_sub_field( 'navigation' );
            $btn_text = get_sub_field( 'udhr_btn_text' );
			//Header
			$conf_image = get_sub_field( 'udhr_conf' );
			$conf_title = get_sub_field( 'udhr_conf_title' );
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
			//Declaration
			$declaration_title = get_sub_field('udhr_decl_title');
			$declaration = get_sub_field('udhr_decl');
			$declaration_link = get_sub_field( 'udhr_down_link' );
			$declaration_text = get_sub_field( 'udhr_down_text' );
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
while ( have_posts() ) : the_post();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <header class="story-header">
                <?php
                    $banner = get_field('story_banner');
                    if($banner) {
                        echo wp_get_attachment_image( $banner['ID'] , 'full');
                    }
                ?>
            </header>
            <div class="story-container">
                <div class="wrap group">
                    <div class="story-side third first">
                        <?php
                            $image = get_field('story_image');
                            if($image) {
                                echo wp_get_attachment_image( $image['ID'] , 'full');
                            }
                            $showvideo = get_field( 'story_vid' );
                            if($showvideo) :
                                $video = get_field('story_code');
                                $thumb = get_field('story_thumb');
                        ?>
                        <a href = "#" data-video="<?php echo $video; ?>">
                            <?php
                                if($thumb) {
                                    echo wp_get_attachment_image( $thumb['ID'] , 'full');
                                }
                                include(get_template_directory().'/_svg/icon-play-circle.php');
                            ?>
                        </a>
                        <?php endif; ?>
                    </div>
                    <article class="two-third">
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                        <div class="addthis_inline_share_toolbox"></div>
                    </article>
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
					<a href = "<?php echo $about_link; ?>"><?php echo $about_text; ?> &raquo;</a>
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
endwhile;
//	get_sidebar();
get_footer('udhr');
