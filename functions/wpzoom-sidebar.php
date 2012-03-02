<?php 
/*-----------------------------------------------------------------------------------*/
/* Initializing Widgetized Areas (Sidebars)																			 */
/*-----------------------------------------------------------------------------------*/
 
 
/*----------------------------------*/
/* Sidebar							*/
/*----------------------------------*/
 
 register_sidebar(array(
'name'=>'Sidebar',
'id' => 'sidebar',
'before_widget' => '<div class="widget %1$s" id="%2$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));


/*----------------------------------*/
/* Homepage widgetized areas		*/
/*----------------------------------*/
 
register_sidebar(array(
'name'=>'Homepage Widgets (below carousel)',
'id' => 'home',
'before_widget' => '<div class="widget %1$s" id="%2$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
 
register_sidebar(array(
'name'=>'Homepage Widgets (left column)',
'id' => 'home_col_1',
'before_widget' => '<div class="widget %1$s" id="%2$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

register_sidebar(array(
'name'=>'Homepage Widgets (right column)',
'id' => 'home_col_2',
'before_widget' => '<div class="widget %1$s" id="%2$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
 
 register_sidebar(array(
'name'=>'Homepage Widgets (bottom)',
'id' => 'home_bottom',
'before_widget' => '<div class="widget %1$s" id="%2$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

 register_sidebar(array(
'name'=>'Homepage Widgets (sidebar)',
'id' => 'home_sidebar',
'before_widget' => '<div class="widget %1$s" id="%2$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));


/*----------------------------------*/
/* Footer widgetized areas		*/
/*----------------------------------*/

register_sidebar(array('name'=>'Footer: Column 1',
'before_widget' => '<div class="widget %1$s" id="%2$s">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

register_sidebar(array('name'=>'Footer: Column 2',
'before_widget' => '<div class="widget %1$s" id="%2$s">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

register_sidebar(array('name'=>'Footer: Column 3',
'before_widget' => '<div class="widget %1$s" id="%2$s">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

register_sidebar(array('name'=>'Footer: Column 4',
'before_widget' => '<div class="widget %1$s" id="%2$s">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
 
?>