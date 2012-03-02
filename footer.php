<?php
 global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>

     </div><!-- end .main_wrap -->
</div><!-- end #main -->

<div id="footer">
    <div class="widgets">
		<div class="main_wrap">
	    
			<div class="column">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 1') ) : ?> <?php endif; ?>
			</div><!-- end .column -->
			
			<div class="column">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 2') ) : ?> <?php endif; ?>
			</div><!-- end .column -->
			
			<div class="column">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 3') ) : ?> <?php endif; ?>
			</div><!-- end .column -->
			
			<div class="column last">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 4') ) : ?> <?php endif; ?>
			</div><!-- end .column -->
			
			<div class="cleaner">&nbsp;</div>
	    </div><!-- end .main_wrap -->
    </div>
    <div class="copyright">
		<div class="main_wrap">
			<div class="left"><p class="copy"><?php _e('Copyright', 'wpzoom'); ?> &copy; <?php echo date("Y",time()); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'wpzoom'); ?>.</p></div>
			<div class="right"><p class="wpzoom"></p></div>
	     </div><!-- end .main_wrap -->
    </div>
</div>
	

<?php if ($wpzoom_misc_analytics != '' && $wpzoom_misc_analytics_select == 'Yes')
{
  echo stripslashes($wpzoom_misc_analytics);
} ?> 

<?php wp_footer(); ?>

<?php wpzoom_js('slides', 'jcarousel', 'fancybox', 'wpzoom' ); ?>
<?php //wpzoom_js('slides', 'jcarousel', 'dropdown', 'fancybox', 'wpzoom' ); ?>


<script type="text/javascript">
jQuery(document).ready(function() {
		
	jQuery('#slides').css({ display : 'block' });
	jQuery("#slides").slides({
		play: <?php if ($wpzoom_slideshow_auto == 'Yes') { echo "$wpzoom_slideshow_speed"; }  if ($wpzoom_slideshow_auto == 'No') { ?>0<?php } ?>,
		width: 960,
		generatePagination: true,
 		pause: 1000,
 		effect: '<?php if ($wpzoom_slideshow_effect == 'Slide') { ?>slide<?php } else { ?>fade<?php } ?>',
 		autoHeight: true,
		hoverPause: true
	});	
 
});
</script>

 <script type="text/javascript">
	function mycarousel_initCallback(carousel)
	{  jQuery('.jcarousel-next').bind('click', function() {
        carousel.next();
        return false;
    });

    jQuery('.jcarousel-prev').bind('click', function() {
        carousel.prev();
        return false;
    });
	};

	jQuery(document).ready(function() {
		jQuery('#carousel').jcarousel({
			scroll: 1,
  			wrap: 'circular',
			auto: <?php if ($wpzoom_carousel_auto == 'Yes') { echo "$wpzoom_carousel_speed"; }  if ($wpzoom_carousel_auto == 'No') { ?>0<?php } ?>,
 			initCallback: mycarousel_initCallback
		});
	});
</script>

 
</body>
</html>
