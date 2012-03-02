<div id="featured">
    <div class="main_wrap">
    
		<?php if ($wpzoom_featured_posts_show == 'Yes' && is_home() && $paged < 2) { ?>
		<div id="slides">
         
			<a class="prev browse">prev</a>
			<a class="next browse">next</a>

			<?php $loop = new WP_Query( array( 'post_type' => 'slideshow', 'posts_per_page' => $wpzoom_featured_posts_posts ) ); ?>
 			
			<div class="slides_container">
  			<?php while ( $loop->have_posts() ) : $loop->the_post(); unset($videocode); $videocode = get_post_meta($post->ID, 'wpzoom_post_embed_code', true); ?>

				<div class="slide">
 					<?php if (strlen($videocode) > 1) { 
							$videocode = str_replace("<embed","<param name='wmode' value='transparent'></param><embed",$videocode);
							$videocode = str_replace("<embed","<embed wmode='transparent' ",$videocode);
							?><div class="cover"><?php echo "$videocode"; ?></div><?php
						}
						if (!$videocode) {
							unset($img); 
							if ( current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail() ) {
							$thumbURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
							$img = $thumbURL[0]; }
							if ($img) {   ?>
							<img src="<?php echo $img ?>" width="<?php echo $thumbURL[1] ?>" height="<?php echo $thumbURL[2] ?>" alt="<?php the_title(); ?>" /><?php } 
						} // if a video does not exist ?>
					<div class="f-content">
						<h2><?php the_title(); ?></h2>
						<?php the_content(''); ?>
						<?php edit_post_link( __('Edit', 'wpzoom'), '<small>', '</small>'); ?>
					</div>
				</div><?php endwhile; ?>
			</div> 
		</div>
 		<?php  }  /*// Featured Slider ?>
 
        <div id="headline">
            <h1><?php echo "$wpzoom_message" ?></h1>
        </div>
        <?php */ ?>
    </div>
</div>

<?php wp_reset_query(); ?>