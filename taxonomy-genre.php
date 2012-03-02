<?php
/*
Template Name: Portfolio
*/
?>
<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
$template = get_post_meta($post->ID, 'wpzoom_post_template', true);
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>

<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); inspect($term);?>

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
		<div class="content full-width portfolio">
			
				<div class="post_content">
					
					<h1 class="title"><?php echo $term->name; ?></h1>
					
					<?php $portfolioPosts = new WP_Query('post_type=portfolio&genre='.$term->slug); ?>
					<?php 
					//inspect($portfolioPosts); 
					if (have_posts()) { ?>
					<div id="gridSlider" class="tj_container">
						<div class="tj_nav">
							<span id="tj_prev" class="tj_prev">Previous</span>
							<span id="tj_next" class="tj_next">Next</span>
						</div>
						<div class="tj_wrapper">
						<ul class="tj_gallery">
					 	<?php 	
	 						while ($portfolioPosts->have_posts()) : $portfolioPosts->the_post(); 
	 						
	 						global $portfolio_mb;
	 						$portfolio_mb->the_meta();
	 						$imgs = $portfolio_mb->meta[docs];
	 						$firstimg = $imgs[0];
	 						
	 						//medium and large formats
	 						//$url  = get_bloginfo('template_directory') . '/scripts/timthumb.php?src='.$firstimg['imgurl'] .'&amp;w=200&amp;h=200&amp;zc=1&amp;&amp;cc=000000';
	 						$url  = get_bloginfo('template_directory') . '/scripts/timthumb.php?src='.$firstimg['imgurl'] .'&amp;w=300&amp;h=300&amp;zc=1&amp;&amp;cc=000000';
	 					?>
	 						<li><a href="<?php the_permalink(); ?>" title="<?php echo $imgs[0]['title']; ?>" rel="">
	 							<div class="tl-curve"></div><div class="tr-curve"></div><img src="<?php echo $url; ?>" alt="<?php echo $imgs[0]['title']; ?>"/><div class="bl-curve"></div><div class="br-curve"></div>						
	 						</a></li>
	 					<?php endwhile; ?>
						
						</ul>
						<div class="clear"></div>
						</div>						
					<div class="clear"></div>
					</div><!-- #gridSlider -->				
					<?php } else { ?>
					<p><?php _e('Sorry, no posts matched your criteria', 'wpzoom');?>.</p>
					<?php } ?>
	
				<div class="cleaner">&nbsp;</div>          
			</div><!-- /.post_content -->
				
		<div class="cleaner">&nbsp;</div>
	</div><!-- end #content -->
 
<?php get_footer(); ?>