<ul class="article-list three-list group">
  <?php while( $this->query->have_posts() ) : $this->query->the_post();?>
	<li style="background:#fff;position:relative;">
      <?php _e( do_shortcode('[orbit_thumbnail_bg size="medium"]') );?>
      <span class="content-type"><?php _e( do_shortcode('[orbit_post_type]') );?></span>
			<div class="article-content">
				<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
				<div style="max-height:150px;overflow:hidden;"><?php the_excerpt();?></div>
				<strong class="link">Read more</strong>
			</div>
  </li>
  <?php endwhile;?>
</ul>
