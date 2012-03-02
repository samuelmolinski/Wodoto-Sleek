<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>

<?php get_header(); ?>

<div id="featured">
    <div class="main_wrap">
		<h1><?php the_title(); ?></h1>
 		<div class="clear"></div>
     </div>
</div>
<div class="clear"></div>

<div id="main">
    <div class="main_wrap">
		<div class="content">
			
			<div class="post_content">
				<?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>
 
 				<div class="meta">
 					<?php edit_post_link( __('Edit', 'wpzoom'), '', ''); ?>
				
				</div>
 
				<div class="entry">
				
					<?php if (strlen($wpzoom_ad_content_imgpath) > 1 && $wpzoom_ad_content_select == 'Yes' && $wpzoom_ad_content_pos == 'Before') { echo '<div class="banner">'.stripslashes($wpzoom_ad_content_imgpath)."</div>"; }?>
				
					<?php the_content(); ?>
				
					<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					
					<?php if ($wpzoom_singlepost_tags == 'Show') { the_tags('<p class="tags">Tags ', ' ', '</p>'); } ?>

					<div class="cleaner">&nbsp;</div>
					
					<?php if (strlen($wpzoom_ad_content_imgpath) > 1 && $wpzoom_ad_content_select == 'Yes' && $wpzoom_ad_content_pos == 'After') { echo '<div class="banner">'.stripslashes($wpzoom_ad_content_imgpath)."</div>"; }?>

				</div><!-- end .entry -->
				 
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria', 'wpzoom');?>.</p>
				<?php endif; ?>

			<div class="cleaner">&nbsp;</div>          
		</div><!-- /.post_content -->
 			  
		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div><!-- end #sidebar -->
  
		<div class="cleaner">&nbsp;</div>
	</div><!-- end #content -->
 
<?php get_footer(); ?>