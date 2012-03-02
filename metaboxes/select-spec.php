<?php

$custom_select_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_select_meta',
	'title' => 'Gallery Images',
	'types' => array('portfolio'),
	'template' => get_stylesheet_directory() . '/metaboxes/select-meta.php',
));

/* eof */