<ul class="article-list three-list group">
  <?php while( $this->query->have_posts() ) : $this->query->the_post();?>
	<li style="margin-bottom:30px;background:#fff;position:relative;">
    <a href="<?php the_permalink();?>">
      <?php
        global $post_id;
        $post_type = get_post_type();
        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium' );
        if( is_array( $thumbnail ) ){
          $bg_size = 'cover';
          if( $post_type == 'resource' ){
            $bg_size = 'contain';
          }
    			echo "<div class='orbit-thumbnail-bg' style='background-size:".$bg_size.";background-image: url(".$thumbnail[0].");'></div>";
    		}
      ?>
      <span class="content-type"><?php _e( do_shortcode('[orbit_post_type]') );?></span>
			<div class="article-content">
				<h4><?php the_title();?></h4>
				<div style="max-height:160px;overflow:hidden;margin-bottom:20px;"><?php the_excerpt();?></div>
				<strong class="link">Read more</strong>
			</div>
    </a>
  </li>
  <?php endwhile;?>
</ul>
