<?php $post_id = getUniqueID( $instance );?>
<a class='button-modal' data-toggle="modal" href="<?php _e( '#inline-modal'.$post_id );?>"><?php _e( $instance['text'] );?></a>

<!-- MODALS FROM THE INLINE POSTS -->
<?php if( function_exists( 'siteorigin_panels_render' ) ): $post_id = getUniqueID( $instance ); ?>
	<div id="<?php _e( 'inline-modal'.$post_id );?>" class="inline-modal" data-behaviour="inline-modal">
		<div class="inline-overlay"></div>
		<button type="button" class="close">&times;</button>
		<div class="inline-modal-dialog" role="document">
			<?php echo siteorigin_panels_render( 'w'.$post_id, true, $instance['modal'] );?>
		</div>
	</div>
<?php endif;?>
<!-- END OF MODALS -->
