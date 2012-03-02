<?php 
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php if ($wpzoom_seo_enable == 'Enable') { wpzoom_titles(); } else { ?> <?php bloginfo('name'); wp_title('-'); } ?></title>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if ($wpzoom_seo_enable == 'Enable') { 
if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
<?php meta_post_keywords(); ?>
<?php endwhile; endif; elseif(is_home()) : ?>
<meta name="description" content="<?php if (strlen($wpzoom_meta_desc) < 1) { bloginfo('description');} else {echo"$wpzoom_meta_desc";}?>" />
<?php meta_home_keywords(); ?>
<?php endif; ?>
<?php wpzoom_index(); ?>
<?php wpzoom_canonical(); } ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/dropdown.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/custom.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fonts.css" type="text/css" media="screen" />

<!-- CSS -->
<link type="text/css" href="<?php bloginfo('template_url'); ?>/css/skitter.styles.css" media="all" rel="stylesheet" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/overcast/jquery-ui-1.8.17.custom.css" type="text/css">

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.animate-colors-min.js?ver=3.3.1"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.easing.1.3.js?ver=3.3.1"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.skitter.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.gridnav.js"></script>

	
<!-- Init Plugin -->
<script type="text/javascript" >
	$(document).ready(function() {
		$(".box_skitter_medium").skitter({
			animation: "random", 
			thumbs: true, 
			focus_position: "rightTop", 
			controls_position: "leftTop", 
			numbers_align: "center", 
			controls: true, 
			enable_navigation_keys: true
		});
		$( "#tabs" ).tabs({ collapsible: true });
		
		//$(".box_skitter li a").fancybox();
		var items = $('#gridSlider li').length;
		console.debug(items);
		if (items > 4) {
			$("#gridSlider").css({"height": '730px'}).gridnav({
				rows	: 2,
				navL	: '#tj_prev',
				navR	: '#tj_next',
				type	: {
					mode		: 'disperse', 	// use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
					speed		: 500,			// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
					easing		: '',			// for fade, seqfade, updown, sequpdown, showhide, disperse, rows	
					factor		: '50',			// for seqfade, sequpdown, rows
					reverse		: 'false'			// for sequpdown
				}
			});
		} else {
			$( ".tj_nav" ).fadeOut();
		}
		
	});
	
	
</script>
<!--[if IE 7 ]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie7.css" /><![endif]-->
<?php if (strlen($wpzoom_misc_favicon) > 1 ) { ?><link rel="shortcut icon" href="<?php echo "$wpzoom_misc_favicon";?>" type="image/x-icon" /><?php } ?> 
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php wpzoom_rss(); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_enqueue_script('jquery');  ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>  
<?php wp_head(); ?>
 
</head>

<body <?php body_class(); ?>>

<div id="header" class="headerBG">
    <div class="wrap">
    
       <div id="logo">
			<a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" /><h1><?php bloginfo('name'); ?></h1></a>
			<a href="#"><h5><?php bloginfo('description'); ?></h5></a>
		</div><!-- end #logo -->
		<div class="clear"></div>
		<div id="navigation" class="dropdown dropdownBG">
			<?php wp_nav_menu( array('container' => '', 'container_class' => '', 'menu_class' => 'mainmenu',  'sort_column' => 'menu_order', 'theme_location' => 'primary' ) ); ?>
			<div class="clear"></div>
		</div>
		
    </div>
    
</div>