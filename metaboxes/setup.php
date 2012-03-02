<?php

include_once WP_CONTENT_DIR . '/plugins/wpalchemy/MetaBox.php';
include_once WP_CONTENT_DIR . '/plugins/wpalchemy/MediaAccess.php';
 
// global styles for the meta boxes
if (is_admin()) wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/metaboxes/meta.css');

/* eof */

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

$portfolio_mb = new WPAlchemy_MetaBox(
Array(
	'id' => '_custom_meta',
	'title' => 'Gallery Images',
	'types' => array('portfolio'),
	'template' => get_stylesheet_directory() . '/metaboxes/repeating_fields_meta.php'
));
