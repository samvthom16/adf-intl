<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ADF
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="secondary-feature group">
		<?php $image = get_post_thumbnail_id( $post->ID );
		if($image) : ?>
		<a href = "<?php the_permalink(); ?>" class="feature-image">
			<picture>
				<source srcset="<?php echo wp_get_attachment_image_src( $image, 'square' )[0]; ?>" media="(max-width: 44em)">
				<source srcset="<?php echo wp_get_attachment_image_src( $image, 'large' )[0]; ?>" media="(max-width: 62.5em)">
				<?php echo wp_get_attachment_image($image, 'square'); ?>
			</picture>
		</a>
		<?php else:
				$modules = get_field('modules',$post->ID);
				$specific_row = $modules[0];
				$banner = $specific_row['ban_image'];
				if( !empty($banner) ) :
		?>
		<a href = "<?php the_permalink(); ?>" class="feature-image">
			<?php echo wp_get_attachment_image( $banner['id'], 'full' ); ?>
		</a>
				<?php else: ?>
		<a href = "<?php the_permalink(); ?>" class="feature-image placeholder">
			<?php include(get_template_directory().'/_svg/icon-search.php'); ?>
		</a>
		<?php 	endif;
		endif; ?>
		<span class="content-type"><?php echo get_post_type($post); ?></span>
		<div class="feature-content">
			<h3><?php the_title(); ?></h3>
			<p><?php echo excerpt(60); ?></p>
			<a href = "<?php the_permalink(); ?>">Read more</a>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
