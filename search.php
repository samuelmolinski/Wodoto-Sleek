<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>

<?php get_header(); ?>

<div id="featured">
    <div class="main_wrap">
    	<?php if ( have_posts() ) 	the_post(); ?>
 		<div class="breadcrumbs">
			<?php _e('Search Results for','wpzoom');?> <strong>"<?php the_search_query(); ?>"</strong>
		</div>
		<div class="clear"></div>
     </div>
</div>
<div class="clear"></div>
<div id="main">
    <div class="main_wrap">
		<div class="content">
 			<div class="post_content">
				<?php rewind_posts(); ?>

				<?php if (have_posts()) :  ?>
			 
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	
				<div class="posts">
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
					<div class="postcontent">
						
						<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="meta">
							<?php if ($wpzoom_home_date == 'Show') { ?> <?php the_time("$dateformat $timeformat"); } ?> 
							<?php if ($wpzoom_home_cat == 'Show') {?><span>/</span> <?php the_category(', '); } ?>
							
							<?php if ($wpzoom_home_comm == 'Show') { ?><span>/</span> <a href="<?php the_permalink() ?>#commentspost" title="Jump to the comments"><?php comments_number(__('no comments', 'wpzoom'),__('1 comment', 'wpzoom'),__('% comments', 'wpzoom')); ?></a><?php } ?>
							
							<?php edit_post_link( __('Edit', 'wpzoom'), '<span>/</span> ', ''); ?>
						
						</div>
		 
						<?php the_excerpt(); ?>
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
					
 			</div><!-- /.post_content -->
		
			<div id="sidebar">

				<?php get_sidebar(); ?>

			</div><!-- end #sidebar -->

			<div class="cleaner">&nbsp;</div>
		
		</div><!-- /.content -->
 
<?php get_footer(); ?>