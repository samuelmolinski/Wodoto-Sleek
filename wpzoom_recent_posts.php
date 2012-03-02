<?php rewind_posts(); ?>

<?php if (is_front_page()) { 
		$z = count($wpzoom_exclude_cats_home);if ($z > 0) { 
		$x = 0; $que = ""; while ($x < $z) {
		$que .= "-".$wpzoom_exclude_cats_home[$x]; $x++;
		if ($x < $z) {$que .= ",";} } }		 
		query_posts($query_string . "&cat=$que"); 
	} 
	if (have_posts()) : 
?>

<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	
<div class="posts">

	<!-- <?php if ($wpzoom_homepost_thumb  == 'Show') { ?>	
		<?php if ( current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail() ) {
				$thumbURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
				$img = $thumbURL[0]; 
			}
			else {
			$img = catch_that_image($post->ID);
			}
			if ($img){ 
				$img = wpzoom_wpmu($img);
			?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $img ?>&amp;w=<?php echo "$wpzoom_homepost_thumb_width";?>&amp;h=<?php echo "$wpzoom_homepost_thumb_height";?>&amp;zc=1" alt="<?php the_title(); ?>" /></a>
		<?php } ?>
	<?php } ?> -->
	<div class="postcontent">
		
		<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		
		<?php if ($wpzoom_homepost_thumb  == 'Show') { ?>	
			<?php if ( current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail() ) {
					$thumbURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
					$img = $thumbURL[0]; 
				}
				else {
				$img = catch_that_image($post->ID);
				}
				if ($img){ 
					$img = wpzoom_wpmu($img);
				?>
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $img ?>&amp;w=<?php echo "$wpzoom_homepost_thumb_width";?>&amp;h=<?php echo "$wpzoom_homepost_thumb_height";?>&amp;zc=1" alt="<?php the_title(); ?>" /></a>
			<?php } ?>
		<?php } ?>
			
		<div class="meta">
			<?php if ($wpzoom_home_date == 'Show') { ?> <?php the_time("$dateformat $timeformat"); } ?> 
			<?php if ($wpzoom_home_cat == 'Show') {?><span>/</span> <?php the_category(', '); } ?>
			
			<?php if ($wpzoom_home_comm == 'Show') { ?><span>/</span> <a href="<?php the_permalink() ?>#commentspost" title="Jump to the comments"><?php comments_number(__('No comments', 'wpzoom'),__('1 comment', 'wpzoom'),__('% comments', 'wpzoom')); ?></a><?php } ?>
			
			<?php edit_post_link( __('Edit', 'wpzoom'), '<span>/</span> ', ''); ?>
		
		</div>
			
		<div class="postExcerpt">
		<?php custom_excerpt(300); ?>
		</div>
	</div>
	<div class="cleaner">&nbsp;</div>

</div><!-- /.post -->
<?php endwhile; ?>
 
<div class="cleaner">&nbsp;</div>

<div class="navigation">
	<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
		<div class="floatleft"><?php next_posts_link( __('&larr; Older Entries', 'wpzoom') ); ?></div>
		<div class="floatright"><?php previous_posts_link( __('Newer Entries &rarr;', 'wpzoom') ); ?></div>
	<?php } ?>
</div> 

<?php else : ?>

<p class="title"><?php _e('No posts matched your criteria', 'wpzoom');?></p>

<?php endif; ?>
<?php wp_reset_query(); ?>
<div class="cleaner">&nbsp;</div>