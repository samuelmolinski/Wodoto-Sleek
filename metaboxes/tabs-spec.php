<?php

$tabs_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_tabs_meta',
	'title' => 'Tabs Meta',
	'types' => array('portfolio'), // added only for pages and to custom post type "events"
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => get_stylesheet_directory() . '/metaboxes/tabs-meta.php'
));

/* eof */