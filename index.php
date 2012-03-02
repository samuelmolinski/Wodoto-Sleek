<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>

<?php get_header(); ?>

<?php if ( $paged < 2 && $wpzoom_homepage_style == 'Business Style') { 
		include(TEMPLATEPATH . '/wpzoom_home.php'); } 
	   
	   if ($wpzoom_homepage_style == 'Traditional Blog' || $paged > 1) { 
		include(TEMPLATEPATH . '/wpzoom_slider.php');  ?>

		<div id="main">
			<div class="main_wrap">
				<div class="content">
					
					<?php if ($wpzoom_featured_carousel_show == 'Yes' && is_home() && $paged < 2) { include(TEMPLATEPATH . '/wpzoom_carousel.php'); }  // Carousel ?>

					<div class="post_content">
					
						<?php include(TEMPLATEPATH . '/wpzoom_recent_posts.php'); ?>
			 
					</div><!-- end .post_content -->
				  
					<div id="sidebar">

						<?php get_sidebar(); ?>

					</div><!-- end #sidebar -->

					<div class="cleaner">&nbsp;</div>
				
				</div><!-- end .content -->
				
		<?php } ?>
 
<?php get_footer(); ?>