<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
$template = get_post_meta($post->ID, 'wpzoom_post_template', true);
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>

<?php get_header(); ?>

<?php if ($wpzoom_singlepost_bread == 'Show') { ?>
	<div id="featured">
		<div class="main_wrap">
			<div class="breadcrumbs"><?php _e('You are here:', 'wpzoom'); ?> <?php wpzoom_breadcrumbs(); ?></div>
			<div class="clear"></div>
		 </div>
	</div>
	<div class="clear"></div>
<?php } ?>

<div id="main">
    <div class="main_wrap">
		<div class="content<?php 
		  if ($template == 'Sidebar on the left') {echo' side-left';}
		  if ($template == 'Full Width (no sidebar)') {echo' full-width';} 
		  ?>">
			
			<div class="post_content">
				<?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

 				<div class="meta">
					<?php if ($wpzoom_singlepost_date == 'Show') { ?> <?php the_time("$dateformat $timeformat"); } ?> 
 					
					<?php if ($wpzoom_singlepost_comm == 'Show') { ?><span>/</span> <a href="<?php the_permalink() ?>#commentspost" title="Jump to the comments"><?php comments_number(__('no comments', 'wpzoom'),__('1 comment', 'wpzoom'),__('% comments', 'wpzoom')); ?></a><?php } ?>
					
					<?php edit_post_link( __('Edit', 'wpzoom'), '<span>/</span> ', ''); ?>
				
				</div>
 
				<div class="entry">
				
					<?php if (strlen($wpzoom_ad_content_imgpath) > 1 && $wpzoom_ad_content_select == 'Yes' && $wpzoom_ad_content_pos == 'Before') { echo '<div class="banner">'.stripslashes($wpzoom_ad_content_imgpath)."</div>"; }?>
				
					<?php the_content(); ?>
				
					<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					
					<?php if ($wpzoom_singlepost_tags == 'Show') { the_tags('<p class="tags">Tags ', ' ', '</p>'); } ?>

					<div class="cleaner">&nbsp;</div>
					
					<?php if (strlen($wpzoom_ad_content_imgpath) > 1 && $wpzoom_ad_content_select == 'Yes' && $wpzoom_ad_content_pos == 'After') { echo '<div class="banner">'.stripslashes($wpzoom_ad_content_imgpath)."</div>"; }?>

				</div><!-- end .entry -->
				
				<div id="comments">
					<?php comments_template(); ?>  
				</div>
				
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria', 'wpzoom');?>.</p>
				<?php endif; ?>

			<div class="cleaner">&nbsp;</div>          
		</div><!-- /.post_content -->
			
		<?php if ($template != 'Full Width (no sidebar)') { ?>
			  
			<div id="sidebar">
				<?php get_sidebar(); ?>
			</div><!-- end #sidebar -->
		
		<?php } ?>

		<div class="cleaner">&nbsp;</div>
	</div><!-- end #content -->
 
<?php get_footer(); ?>