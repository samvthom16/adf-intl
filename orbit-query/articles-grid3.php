<ul class="article-list three-list group">
  <?php while( $this->query->have_posts() ) : $this->query->the_post();?>
	<li>

			<?php _e( do_shortcode('[orbit_thumbnail_bg size="medium"]') );?>
      <span class="content-type"><?php _e( do_shortcode('[orbit_post_type]') );?></span>
			<div class="article-content">
				<h4><?php the_title();?></h4>
				<p><?php the_excerpt();?></p>
				<strong class="link">Read more</strong>
			</div>
		
	</li>
  <?php endwhile;?>
</ul>
