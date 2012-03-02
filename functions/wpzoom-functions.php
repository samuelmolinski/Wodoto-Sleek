<?php

/*-----------------------------------------------------------------------------------*/
/* WPZOOM Custom Functions															 */
/*-----------------------------------------------------------------------------------*/


/*--------------------------------------------*/
/* Reset [gallery] shortcode aditional styles						
/*--------------------------------------------*/

add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));



/*--------------------------------------------*/
/* Show thumbnails on attachement template						
/*--------------------------------------------*/

function show_all_thumbs() {

	global $post;
	
	$post = get_post($post);
	$images = &get_children( 'post_type=attachment&post_mime_type=image&output=ARRAY_N&orderby=menu_order&order=ASC&post_parent='.$post->post_parent);
	if($images) {
	foreach( $images as $imageID => $imagePost ){
	if($imageID==$post->ID){
	} else {
	unset($the_b_img);
	$the_b_img = wp_get_attachment_image($imageID, 'thumbnail', false);
	$thumblist .= '<a href="'.get_attachment_link($imageID).'">'.$the_b_img.'</a>';
	}
	}
	}
	return $thumblist;
}


/*--------------------------------------------*/
/* Add Support for Shortcodes in Excerpt						
/*--------------------------------------------*/

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');


/*----------------------------------*/
/* Default Excerpt Lenght 			*/
/*----------------------------------*/

function new_excerpt_length($length) {
	return (int) get_option("wpzoom_excerpt") ? (int) get_option("wpzoom_excerpt") : 50;
}
add_filter('excerpt_length', 'new_excerpt_length');


  
/*----------------------------------*/
/* Custom Posts Options				*/
/*----------------------------------*/

add_action('admin_menu', 'wpzoom_options_box');

function wpzoom_options_box() {
	add_meta_box('wpzoom_post_template', 'Video Embed', 'wpzoom_post_info', 'slideshow', 'side', 'high');
	add_meta_box('wpzoom_testimonial', 'Testimonial Options', 'wpzoom_testimonial_options', 'testimonial', 'side', 'high');
	add_meta_box('wpzoom_post_template', 'Custom Post Options', 'wpzoom_post_options', 'post', 'side', 'high');
	add_meta_box("button_notice", "Button shortcode", "button_notice_completed", "slideshow", "side", "high");
 	add_meta_box("button_notice", "Button shortcode", "button_notice_completed", "carousel", "side", "high");
 	add_meta_box("testimonial_info", "Important Notice", "testimonial_info_completed", "testimonial", "side", "high");
 }
 

// Slider Video Embed
function wpzoom_post_info() {
	global $post;
	?>
	<fieldset>
		<div>
  
			<p>
				<label for="wpzoom_post_embed_code" >Enter embed code if you want to show a video in this slide:</label><br />
				<textarea style="height: 100px; width: 250px;" name="wpzoom_post_embed_code" id="wpzoom_post_embed_code"><?php echo get_post_meta($post->ID, 'wpzoom_post_embed_code', true); ?></textarea>
				<br />
			</p>
 		</div>
	</fieldset>
	<?php
	}
	
// Testimonial Options
function wpzoom_testimonial_options() {
	global $post;
	?>
	<fieldset>
		<div>
 
			<p>
				<label for="wpzoom_testimonial_url" >1. Client's website:</label><br />
				<input style="width: 220px;" type="text" name="wpzoom_testimonial_url" id="wpzoom_testimonial_url" value="<?php echo get_post_meta($post->ID, 'wpzoom_testimonial_url', true); ?>"/>
				<br />
			</p>
			
			<p>
				<label for="wpzoom_testimonial_gravatar" >2. a) Client's email (if supports <a href="http://en.gravatar.com/">Gravatar</a>):</label><br />
				<input style="width: 220px;" type="text" name="wpzoom_testimonial_gravatar" id="wpzoom_testimonial_gravatar" value="<?php echo get_post_meta($post->ID, 'wpzoom_testimonial_gravatar', true); ?>"/>
				<br />
			</p>
			
			<p>
				<label for="wpzoom_testimonial_avatar" >2. b) Client's avatar (image source URL):</label><br />
				<input style="width: 220px;" type="text" name="wpzoom_testimonial_avatar" id="wpzoom_testimonial_avatar" value="<?php echo get_post_meta($post->ID, 'wpzoom_testimonial_avatar', true); ?>"/>
				<br />
			</p>
			
			<p><b>Client's name</b> = post title<br/><b>Testimonial</b> = post content<br/><b>Avatar</b> = Gravatar e-mail(a) or direct link to a image(b).  <br/>  </p>
 
 		</div>
	</fieldset>
	<?php
	}
	
function button_notice_completed(){
  global $post;
  $custom = get_post_custom($post->ID);
  $button_notice_completed = $custom["button_notice_completed"][0];
  ?>
     <p><strong>Button shortcode</strong>: <br /><br /><code><?php print(htmlentities('[button url="http://google.com" size="big"]Google[/button]')); ?></code><br /><br /> 
    
    <strong>Size variations:</strong><br/> <br/><em>Large button</em> - <code>size="big"</code><br /><em>Small button</em> - <code>size="small"</code></p>
   <?php
}

function testimonial_info_completed(){
  global $post;
  $custom = get_post_custom($post->ID);
  $testimonial_info_completed = $custom["testimonial_info_completed"][0];
  ?>
     <p>Visit <a href='widgets.php' target='_blank'>Widgets</a> page, and drag <strong>WPZOOM: Testimonials</strong> widget to a widgetized location.  </p>
   <?php
}


// Regular Posts Options
function wpzoom_post_options() {
	global $post;
	?>
	<fieldset>
		<div>
			 
			<p>
				<label for="wpzoom_post_template" >Choose layout for this post:</label><br />
				<select name="wpzoom_post_template" id="wpzoom_post_template">
					<option<?php selected( get_post_meta($post->ID, 'wpzoom_post_template', true), 'Default' ); ?>>Default</option>
					<option<?php selected( get_post_meta($post->ID, 'wpzoom_post_template', true), 'Sidebar on the left' ); ?>>Sidebar on the left</option>
					<option<?php selected( get_post_meta($post->ID, 'wpzoom_post_template', true), 'Full Width (no sidebar)' ); ?>>Full Width (no sidebar)</option>
				</select>
			</p>
			
  		</div>
	</fieldset>
	<?php
	}

add_action('save_post', 'custom_add_save');

function custom_add_save($postID){
// called after a post or page is saved
if($parent_id = wp_is_post_revision($postID))
{
  $postID = $parent_id;
}

if ($_POST['save'] || $_POST['publish']) {
	update_custom_meta($postID, $_POST['wpzoom_post_embed_code'], 'wpzoom_post_embed_code');
 	update_custom_meta($postID, $_POST['wpzoom_testimonial_url'], 'wpzoom_testimonial_url');
 	update_custom_meta($postID, $_POST['wpzoom_testimonial_gravatar'], 'wpzoom_testimonial_gravatar');
 	update_custom_meta($postID, $_POST['wpzoom_testimonial_avatar'], 'wpzoom_testimonial_avatar');
 	update_custom_meta($postID, $_POST['wpzoom_post_template'], 'wpzoom_post_template');

  }
}

function update_custom_meta($postID, $newvalue, $field_name) {
// To create new meta
if(!get_post_meta($postID, $field_name)){
add_post_meta($postID, $field_name, $newvalue);
}else{
// or to update existing meta
update_post_meta($postID, $field_name, $newvalue);
}
}
 

/*----------------------------------*/
/* Custom Posts Types for Slider	*/
/*----------------------------------*/
add_action('init', 'slideshow_register');

function slideshow_register() {
	$labels = array(
		'name' => _x('Slideshow', 'post type general name'),
		'singular_name' => _x('Slideshow Item', 'post type singular name'),
		'add_new' => _x('Add New', 'slideshow item'),
		'add_new_item' => __('Add New Slideshow Item'),
		'edit_item' => __('Edit Slideshow Item'),
		'new_item' => __('New Slideshow Item'),
		'view_item' => __('View Slideshow Item'),
		'search_items' => __('Search Slideshow'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
 		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'slideshow' , $args );
}
 
 
/*------------------------------------------*/
/* Custom Posts Types for Products/Carousel	*/
/*------------------------------------------*/
add_action('init', 'carousel_register');

function carousel_register() {
	$labels = array(
		'name' => _x('Carousel', 'post type general name'),
		'singular_name' => _x('Carousel Item', 'post type singular name'),
		'add_new' => _x('Add New', 'carousel item'),
		'add_new_item' => __('Add New Carousel Item'),
		'edit_item' => __('Edit Carousel Item'),
		'new_item' => __('New Carousel Item'),
		'view_item' => __('View Carousel Item'),
		'search_items' => __('Search Carousel'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
 		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'carousel' , $args );
}
 
 
/*------------------------------------------*/
/* Custom Posts Types for Testimonials		*/
/*------------------------------------------*/

add_action('init', 'testimonial_register');

function testimonial_register() {
	$labels = array(
		'name' => _x('Testimonials', 'post type general name'),
		'singular_name' => _x('Testimonial Item', 'post type singular name'),
		'add_new' => _x('Add New', 'testimonial item'),
		'add_new_item' => __('Add New Testimonial'),
		'edit_item' => __('Edit Testimonial'),
		'new_item' => __('New Testimonial Item'),
		'view_item' => __('View Testimonial Item'),
		'search_items' => __('Search Testimonial'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
 		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor')
	  ); 
 
	register_post_type( 'testimonial' , $args );
}
 
  

/*----------------------------------------------------------------------------------*/
/* Function that allows to display only exact count of comments, without trackbacks
/*----------------------------------------------------------------------------------*/
 function comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$get_comments = get_comments('post_id=' . $id);
		$comments_by_type = &separate_comments($get_comments);
 		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}
add_filter('get_comments_number', 'comment_count', 0);


 
/*------------------------------------------------*/
/* Fix for timthumb thumbnails in WP Multisite
/*------------------------------------------------*/

function wpzoom_wpmu ($img) {
	global $blog_id;
  $imageParts = explode('/files/', $img);
	if (isset($imageParts[1])) {
		$img = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
	}
	return($img);
}


/*----------------------------------------------------*/
/* Custom function for displaying first image from 
/* post as thumbnail, if Featured Image is missing
/*----------------------------------------------------*/

function catch_that_image ($post_id=0, $width=60, $height=60, $img_script='') {
	global $wpdb;
	if($post_id > 0) {

		 // select the post content from the db

		 $sql = 'SELECT post_content FROM ' . $wpdb->posts . ' WHERE id = ' . $wpdb->escape($post_id);
		 $row = $wpdb->get_row($sql);
		 $the_content = $row->post_content;
		 if(strlen($the_content)) {

			  // use regex to find the src of the image

			preg_match("/<img src\=('|\")(.*)('|\") .*( |)\/>/", $the_content, $matches);
			if(!$matches) {
				preg_match("/<img class\=\".*\" src\=('|\")(.*)('|\") .*( |)\/>/U", $the_content, $matches);
			}
      if(!$matches) {
				preg_match("/<img class\=\".*\" title\=\".*\" src\=('|\")(.*)('|\") .*( |)\/>/U", $the_content, $matches);
			}

			$the_image = '';
			$the_image_src = $matches[2];
			$frags = preg_split("/(\"|')/", $the_image_src);
			if(count($frags)) {
				$the_image_src = $frags[0];
			}

      // if an image isn't found yet
      if(!strlen($the_image_src))
      {
          $attachments = get_children( array( 'post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) );

          if (count($attachments) > 0)
          {
            $q = 0;
          	foreach ( $attachments as $id => $attachment ) {
          	$q++;
          		if ($q == 1) {
          			$thumbURL = wp_get_attachment_image_src( $id, $args['size'] );
          			$the_image_src = $thumbURL[0];
          			break;
          		} // if first image
          	} // foreach
          } // if there are attachments
      } // if no image found yet

		  // if src found, then create a new img tag

			  if(strlen($the_image_src)) {
				   if(strlen($img_script)) {

					    // if the src starts with http/https, then strip out server name

					    if(preg_match("/^(http(|s):\/\/)/", $the_image_src)) {
						     $the_image_src = preg_replace("/^(http(|s):\/\/)/", '', $the_image_src);
						     $frags = split("\/", $the_image_src);
						     array_shift($frags);
						     $the_image_src = '/' . join("/", $frags);
					    }
					    $the_image = '<img alt="" src="' . $img_script . $the_image_src . '" />';
				   }
				   else {
					    $the_image = '<img alt="" src="' . $the_image_src . '" width="' . $width . '" height="' . $height . '" />';
				   }
			  }
			  return $the_image_src;
		 }
	}
}

  
/*----------------------------------*/
/* Get Categories					*/
/*----------------------------------*/

function getCategories($parent) {

	global $wpdb, $table_prefix;

	$tb1 = "$table_prefix"."terms";
	$tb2 = "$table_prefix"."term_taxonomy";

	if ($parent == '1')
	{
	 $qqq = "AND $tb2".".parent = 0";
  }
  else
  {
    $qqq = "";
  }

	$q = "SELECT $tb1.term_id,$tb1.name,$tb1.slug FROM $tb1,$tb2 WHERE $tb1.term_id = $tb2.term_id AND $tb2.taxonomy = 'category' $qqq ORDER BY $tb1.name ASC";
	$q = $wpdb->get_results($q);

  foreach ($q as $cat) {
    	$categories[$cat->term_id] = $cat->name;
    } // foreach
  return($categories);
} // end func




/*----------------------------------*/
/* Get Pages						*/
/*----------------------------------*/

function getPages() {

	global $wpdb, $table_prefix;

	$tb1 = "$table_prefix"."posts";

	$q = "SELECT $tb1.ID,$tb1.post_title FROM $tb1 WHERE $tb1.post_type = 'page' AND $tb1.post_status = 'publish' ORDER BY $tb1.post_title ASC";
	$q = $wpdb->get_results($q);

  foreach ($q as $pag) {
    	$pages[$pag->ID] = $pag->post_title;
    } // foreach
  return($pages);
} // end func


/*----------------------------------*/
/* Breadcrumbs						*/
/*----------------------------------*/

function wpzoom_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $name = __('Home'); //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
     global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . '';
      single_cat_title();
      echo '' . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      if ($cat)
      {
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      }
      echo $currentBefore;
      //the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . __('Search results for &#39;', 'wpzoom') . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . __('Posts tagged &#39;', 'wpzoom');
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . __('Articles posted by ', 'wpzoom') . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . __('Error 404', 'wpzoom') . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  
  }
}
?>