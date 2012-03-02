<?php get_header(); ?>
<div id="featured">
    <div class="main_wrap">
    	<?php if ( have_posts() ) 	the_post(); ?>
 			<h1><?php _e('Error 404 - Nothing Found', 'wpzoom'); ?></h1>
			<div class="clear"></div>
     </div>
</div>
<div class="clear"></div>
 
   
<div id="main">
    <div class="main_wrap">
		<div class="content">

			<div class="post_content">
				<p><?php _e('The page you are looking for could not be found.', 'wpzoom');?> </p>
			</div><!-- end .post_content -->
          
			<div id="sidebar">

				<?php get_sidebar(); ?>

			</div><!-- end #sidebar -->

			<div class="cleaner">&nbsp;</div>
		
		</div><!-- end .content -->
 
 <?php get_footer(); ?>