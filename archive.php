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
			<?php /* category archive */ if (is_category()) { ?> <?php _e('Archive for category:', 'wpzoom'); ?> <?php single_cat_title(); ?>
			<?php /* tag archive */ } elseif( is_tag() ) { ?><?php _e('Post Tagged with:', 'wpzoom'); ?> "<?php single_tag_title(); ?>"
			<?php /* daily archive */ } elseif (is_day()) { ?><?php _e('Archive for', 'wpzoom'); ?> <?php the_time('F jS, Y'); ?>
			<?php /* monthly archive */ } elseif (is_month()) { ?><?php _e('Archive for', 'wpzoom'); ?> <?php the_time('F, Y'); ?>
			<?php /* yearly archive */ } elseif (is_year()) { ?><?php _e('Archive for', 'wpzoom'); ?> <?php the_time('Y'); ?>
			<?php /* author archive */ } elseif (is_author()) { ?><?php printf( __( 'Articles by:  %s', 'wpzoom' ),   get_the_author()    ); ?>  
			<?php /* paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><?php _e('Archives', 'wpzoom'); ?>
			<?php /* home page */ } elseif (is_front_page()) { ?><?php _e('Recent Posts','wpzoom');?> <?php } ?>
		</div>
 		<div class="clear"></div>
     </div>
</div>
<div class="clear"></div>
 
   
<div id="main">
    <div class="main_wrap">
		<div class="content">

			<div class="post_content">
			
				<?php include(TEMPLATEPATH . '/wpzoom_recent_posts.php'); ?>
	 
			</div><!-- end .post_content -->
          
			<div id="sidebar">

				<?php get_sidebar(); ?>

			</div><!-- end #sidebar -->

			<div class="cleaner">&nbsp;</div>
		
		</div><!-- end .content -->
 
 <?php get_footer(); ?>