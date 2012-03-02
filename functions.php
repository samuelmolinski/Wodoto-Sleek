<?php

/*-----------------------------------------------------------------------------------*/
/* WPZOOM Theme Functions - Don't edit this file until you know what you're doing	 */
/*-----------------------------------------------------------------------------------*/

// The path to WPZOOM Theme Functions
define("INC", TEMPLATEPATH . "/functions");


require_once INC . "/wpzoom-functions.php"; 		// Theme Custom Functions
require_once INC . "/wpzoom-core.php";				// WPZOOM Admin Panel & Theme Features
require_once INC . "/wpzoom-seo.php";				// WPZOOM SEO Panel
require_once INC . "/wpzoom-widgets.php";			// Custom Theme Widgets
require_once INC . "/wpzoom-sidebar.php";			// Initializing Widgetized Areas
require_once INC . "/wpzoom-shortcodes.php";		// Custom Shortcodes

/*-----------------------------------------------------------------------------------*/
/* In the empty space you can add your custom functions								 */
/*-----------------------------------------------------------------------------------*/
//Custom post

include_once 'metaboxes/setup.php';
include_once 'metaboxes/tabs-spec.php';

add_action('init', 'portfolio_register_post_type');

function portfolio_register_post_type() {
    register_post_type('Portfolio', array(
        'labels' => array(
            'name' => 'Portfolio',
            'singular_name' => 'portfolio',
            'add_new' => 'Add New Entry',
            'edit_item' => 'Edit Entry',
            'new_item' => 'New Entry',
            'view_item' => 'View Entry',
            'search_items' => 'Search Entries',
            'not_found' => 'No Entries Found',
            'not_found_in_trash' => 'No Entries found in Trash'
        ),
        'public' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'catagory'
        ),
		'rewrite' => array('slug' => 'portfolio'),
		'query_var' => true,
		'menu_position' => 5
    ));
}

// hook into the init action and call create_book_taxonomies() when it fires
add_action( 'init', 'create_portfolio_taxonomies' );

// create two taxonomies, genres and writers for the post type "book"
function create_portfolio_taxonomies() {

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name' => _x( 'Genres', 'taxonomy general name' ),
		'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Genres' ),
		'all_items' => __( 'All Genres' ),
		'parent_item' => __( 'Parent Genre' ),
		'parent_item_colon' => __( 'Parent Genre:' ),
		'edit_item' => __( 'Edit Genre' ),
		'update_item' => __( 'Update Genre' ),
		'add_new_item' => __( 'Add New Genre' ),
		'new_item_name' => __( 'New Genre Name' ),
	); 	

	register_taxonomy( 'genre', array( 'portfolio' ), array(		
	    'label'                         => 'Genre',
	    'labels'                        => $labels,
	    'public'                        => true,
	    'hierarchical'                  => true,
	    'show_ui'                       => true,
	    'show_in_nav_menus'             => true,
	    'args'                          => array( 'orderby' => 'DES' ),
	    'rewrite'                       => array( 'slug' => 'genre'),
	    'query_var'                     => true
	));
}

function echoSlider() {
	// usually needed
	global $portfolio_mb, $post;
	 
	// get the meta data for the current post
	$portfolio_mb->the_meta();
	$imgs = $portfolio_mb->meta[docs];
	//inspect($imgs);
		foreach ($imgs as $img) {
			echo '<li><a href="'.$img['imgurl'] .'" rel="shadowbox" title="'.$img['title'] .'" ><img src="'.get_bloginfo('template_directory') . '/scripts/timthumb.php?src='.$img['imgurl'] .'&amp;w=960&amp;h=450&amp;zc=2&amp;a=t&amp;cc=000000&amp;ct=0" /></a><div class="label_text"><p>'.$img['title'] .'</p></div></li>';
		}
	}

function echoTabs() {
	global $tabs_mb;
	$tabs_mb->the_meta();
	$meta = $tabs_mb->meta;	

	?>	
						<div id="tabs">
							<ul>
								<li style="width: 33%;"><a href="#tabs-1">Tools &amp; Technology</a></li>
								<li style="width: 34%;"><a href="#tabs-2">Innovation &amp; Customization</a></li>
								<li style="width: 33%;"><a href="#tabs-3">Problems and Solutions</a></li>
							</ul>
							<div id="tabs-1">
								<?php echo $meta['technology']; ?>
								<div class="clear"></div>
							</div>
							<div id="tabs-2">
								<?php echo wpautop($meta['innovation']); ?>
								<div class="clear"></div>
							</div>
							<div id="tabs-3">
								<?php echo wpautop($meta['problems']); ?>
								<div class="clear"></div>
							</div>
						</div>
	<?php
}

function custom_excerpt($chars, $link=true) { 

		global $post;
	
		$text = get_the_content();
	
		$text = $text . " ";
		$text = strip_tags($text);
		// strip custom tags ie. [caption]...[/caption]
		$text = preg_replace('#\[caption(.*?)\[/caption\]#', '', $text);
	
		if( strlen($text) > $chars )
			$ellipsis = true;
	
		$text = substr($text,0,$chars);
	
		$text = substr($text,0,strrpos($text,' ')); 
	
		if( $ellipsis == true )
			$text = $text . "... ";
		if ($link ==true)
			$text = $text . " <a href='". get_permalink($post->ID)."'>Read More</a>";
	
		echo $text;
	}


/*-----------------------------------------------------------------------------------*/
/* Don't add anything below this line												 */
/*-----------------------------------------------------------------------------------*/
/**********************************
	Debug function - WIP
***********************************/

function inspect($var){
	
	$bt = debug_backtrace();
	$src = file($bt[0]["file"]);
	$line = $src[ $bt[0]['line'] - 1 ];
	
	//striping the inspect() from the sting
	$strip = explode('inspect(', $line);
	$matches = preg_match('#\(#', $strip[0]);
	$strip = explode(')', $strip[1]);
	for ($i=0;$i<count($matches-1);$i++) {
		array_pop($strip);
	}
	$label = implode(')', $strip);
	
	$colorVar = 'Blue';
		
	if (is_bool($var)) {
		$colorType = 'Green';
		$type = 'bool';
	} elseif (is_string($var)) {
		$colorType = 'DarkOrange';
		$type = 'string';
		$var =  htmlspecialchars($var);
	} elseif (is_array($var)) {
		$colorType = 'DarkOrchid';	
		$type = 'array';		
	} elseif (is_object($var)) {
		$colorType = 'BlueViolet';	
		$type = 'object';		
	} else {
		$colorType = 'Tomato';	
	}
	
	
	echo "<p><pre style=' width: auto; height:auto; background-color:#FFF; overflow:visible; font-size:14px; background-color:#fff; display:inline-block;'><span style='color:$colorVar; width: auto; height:auto; font-size:14px; background-color:#fff; display:inline-block;'>";
		echo $label;
		echo "</span> = <span style='color:$colorType;width: auto; height:auto; font-size:14px; background-color:#fff; display:inline-block;'>";
		print_r($var);
		echo "</span></pre></p>";
			
}
?>