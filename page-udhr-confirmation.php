<?php
/**
 * Template Name: UDHR Confirmation
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
if(!empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if(!isset($_SESSION['lang']) ) {
 	$_SESSION['lang'] = 'English';
}
$parent = $post->post_parent;
if ( have_rows( 'language', $parent ) ) {
	while ( have_rows( 'language', $parent ) ) : the_row();
		if(get_sub_field('language_name') == $_SESSION['lang']) {
			//Nav
			global $nav;
			$nav = get_sub_field( 'navigation' );
			//Header
			$conf_image = get_sub_field( 'udhr_conf' );
			$conf_title = get_sub_field( 'udhr_conf_title' );
            $conf_text = get_sub_field( 'udhr_conf_text' );
            $btn_text = get_sub_field( 'udhr_btn_text' );
            $links = get_sub_field( 'udhr_promote' );
			//Feature
			/*$show_feature = get_sub_field( 'udhr_featured' );
			$feature_section = get_sub_field( 'udhr_fsection' );
			$feature_link = get_sub_field( 'udhr_flink' );
			$feature_image = get_sub_field( 'udhr_fimage' );
			$feature_content = get_sub_field( 'udhr_fcontent' );
			$feature_more = get_sub_field( 'udhr_fmore' );*/
			//Stories
			/*$story_section = get_sub_field('udhr_story_section');
			$stories = get_sub_field('udhr_stories');
            $showmoretext = get_sub_field('udhr_more_stories');
            $morestories = get_sub_field('udhr_hide_stories');*/
			//Declaration
			/*$declaration_title = get_sub_field('udhr_decl_title');
			$declaration = get_sub_field('udhr_decl');
			$declaration_link = get_sub_field( 'udhr_down_link' );
			$declaration_text = get_sub_field( 'udhr_down_text' );
            $declaration_full = get_sub_field( 'full_declaration_text' );*/
			//Promote
			/*$promote_title = get_sub_field( 'udhr_ban_title' );
			$promote_image = get_sub_field( 'udhr_ban_img' );
            $promote_link = get_sub_field( 'udhr_ban_link' );*/
			//About
			$about = get_sub_field( 'udhr_about' );
			$about_link = get_sub_field( 'udhr_ab_link' );
			$about_text = get_sub_field( 'udhr_ab_text' );
			//Form
			global $form;
			$form = get_sub_field( 'udhr_form' );
			//$_SESSION['confirm'] = get_sub_field( 'udhr_second_form' );
		}
	endwhile;
}
get_header('udhr'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main confirmation-page">
			<header class="udhr-header">
				<?php echo wp_get_attachment_image( $conf_image['ID'] , 'full');
				if($conf_title) {
					echo '<h1>'.$conf_title.'</h1>';
				}
				?>
			</header>
			<div id="second-form">
				<div class="sm-wrap">
					<?php echo $conf_text; ?>
				</div>
                <div class="addthis_inline_share_toolbox" data-url="<?php get_permalink($parent); ?>" data-title="<?php get_the_title($parent); ?>"></div>
                <?php if ( $links ) : ?>
                <div class="promote-links">
    			    <div class="med-wrap">
    			        <div class="grid four">
    			            <?php foreach($links as $link) : ?>
    			            <a href = "<?php echo $link['udhr_prom_link']; ?>" target="blank" class="archive-preview">
    			                <?php $link_image = $link['udhr_prom_image'];
    			                if ( $link_image ) {
    			                    echo wp_get_attachment_image( $link_image['ID'] , 'full');
    			                } ?>
    			                <div class="archive-content">
    			                    <?php echo $link['udhr_prom_text']; ?>
    			                </div>
    			            </a>
    						<?php endforeach; ?>
    			        </div>
    			    </div>
                </div>
                <?php endif; ?>
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
//	get_sidebar();
get_footer('udhr');
