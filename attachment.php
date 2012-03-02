<?php get_header(); ?>
<div id="main">
    <div class="main_wrap">
		<div class="content full-width">
			
			<div class="post_content">
				<?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<h1><?php echo get_the_title( $post->post_parent ); ?></h1>
 
				<div class="entry">
  				
					<?php if ( wp_attachment_is_image() ) : ?>
				
					<p class="attachment" style="padding-top:20px; text-align:center; "><a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
								echo wp_get_attachment_image( $post->ID, $size='fullsize' ); // max $content_width wide or high.
							?></a></p>
							
							<center><strong><a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"> <?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?> [<?php _e('View full size', 'wpzoom'); ?>]</a></strong></center>
					
					
					<?php else : ?>
						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
	<?php endif; ?>
  
					<div class="cleaner">&nbsp;</div>
  
				</div><!-- end .entry -->
				
				<div class="navigation">
 					<div class="floatleft"><?php previous_image_link( false, __('&larr; Previous picture', 'wpzoom')); ?></div>
					<div class="floatright"><?php next_image_link( false, __('Next picture &rarr;', 'wpzoom')); ?></div>
				</div> 
		
				
				<div class="thumbnails">
					<?php
					echo show_all_thumbs();
					?>
				</div>
				 
				
				<?php endwhile; endif; ?>

			<div class="cleaner">&nbsp;</div>          
		</div><!-- /.post_content -->
	 

		<div class="cleaner">&nbsp;</div>
	</div><!-- end #content -->
 
<?php get_footer(); ?>