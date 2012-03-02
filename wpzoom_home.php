<?php include(TEMPLATEPATH . '/wpzoom_slider.php');  // Featured Slider ?>
			
<div id="main">
    <div class="main_wrap">
		<div class="content">
         
			<?php if ($wpzoom_featured_carousel_show == 'Yes' && is_home() && $paged < 2) { include(TEMPLATEPATH . '/wpzoom_carousel.php'); }  // Carousel ?>

			<div class="home_widgets">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Widgets (below carousel)') ) : ?> <?php endif; ?>
		 
				<div class="widgets_col_left">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Widgets (left column)') ) : ?> <?php endif; ?>
				</div>
				
				<div class="widgets_col_right">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Widgets (right column)') ) : ?> <?php endif; ?>
				</div>
				
				<div class="cleaner">&nbsp;</div>
				
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Widgets (bottom)') ) : ?> <?php endif; ?>
					
				<div class="cleaner">&nbsp;</div>
			</div>
			  
				 
			<div class="home_sidebar">
				 
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Widgets (sidebar)') ) : ?> <?php endif; ?>
				
			</div>
		
			<div class="clear"></div>
		</div>