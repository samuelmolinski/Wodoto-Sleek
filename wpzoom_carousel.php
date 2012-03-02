<div id="carousel" class="jcarousel">
	<ul>
		<?php $loop = new WP_Query( array( 'post_type' => 'carousel', 'posts_per_page' => $wpzoom_carousel_posts_posts) ); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
		<li>
			<?php unset($img); 
					if ( current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail() ) {
					$thumbURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
					$img = $thumbURL[0];  }
					else {  
						if (!$img)  {  $img = catch_that_image($post->ID);  } 
					}
					if ($img) {  ?>
					<a href="<?php echo $img ?>" class="fancy" rel="group" title="<?php the_title(); ?>"><span class="fade zoom"></span><img class="m-thumb" src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?w=270&amp;h=200&amp;zc=1&amp;src=<?php $img = wpzoom_wpmu($img); echo $img; ?>" width="270px" height="200px" alt="<?php the_title(); ?>" /></a><?php } ?>
			<div class="m-content">
				<h2><?php the_title(); ?></h2>
				<?php edit_post_link( __('Edit', 'wpzoom'), '', ''); ?>
				<?php the_content(''); ?>
			 </div>
		</li>
		<?php endwhile; ?>
		 
	</ul>
		 
</div><!-- /#carousel -->
<a class="jcarousel-prev" href="#">Prev</a>
<a class="jcarousel-next" href="#">Next</a>
<div class="clear"></div>