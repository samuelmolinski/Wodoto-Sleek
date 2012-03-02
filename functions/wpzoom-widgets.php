<?php 

/*-----------------------------------------------------------------------------------*/
/* WPZOOM Custom Widgets															 */
/*-----------------------------------------------------------------------------------*/



/*----------------------------------*/
/* WPZOOM: Social Widget			*/
/*----------------------------------*/


function connectWithMe($args) {

  extract($args);
	$settings = get_option( 'widget_social_connect' );

  echo $before_widget;
  echo "$before_title"."$settings[title]"."$after_title";
?>
		<ul class="social">
				<?php if ($settings[ 'rss' ] != '') echo"<li><a href=\"$settings[rss]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/rss.png\" alt=\"$settings[rss_name] \" />$settings[rss_name]<span>$settings[rss_sub]</span></a></li>"; ?>
				<?php if ($settings[ 'email' ] != '') echo"<li><a href=\"mailto:$settings[email]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/email.png\" alt=\"$settings[rss_email] \" />$settings[email_name]<span>$settings[email_sub]</span></a></li>"; ?>
				<?php if ($settings[ 'twitter' ] != '') echo"<li><a href=\"$settings[twitter]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/twitter.png\" alt=\"$settings[rss_twitter] \" />$settings[twitter_name]<span>$settings[twitter_sub]</span></a></li>"; ?>
				<?php if ($settings[ 'tumblr' ] != '') echo"<li><a href=\"$settings[tumblr]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/tumblr.png\" alt=\"$settings[rss_tumblr] \" />$settings[tumblr_name]<span>$settings[tumblr_sub]</span></a></li>"; ?>
				<?php if ($settings[ 'delicious' ] != '') echo"<li><a href=\"$settings[delicious]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/delicious.png\" alt=\"$settings[rss_delicious] \" />$settings[delicious_name]<span>$settings[delicious_sub]</span></a></li>"; ?>
				<?php if ($settings[ 'digg' ] != '') echo"<li><a href=\"$settings[digg]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/digg.png\" alt=\"$settings[rss_digg] \" />$settings[digg_name]<span>$settings[digg_sub]</span></a></li>"; ?>
 				<?php if ($settings[ 'stumble' ] != '') echo"<li><a href=\"$settings[stumble]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/stumble.png\" alt=\"$settings[rss_stumble] \" />$settings[stumble_name]<span>$settings[stumble_sub]</span></a></li>"; ?>
				<?php if ($settings[ 'facebook' ] != '') echo"<li><a href=\"$settings[facebook]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/facebook.png\" alt=\"$settings[rss_facebook] \" />$settings[facebook_name]<span>$settings[facebook_sub]</span></a></li>"; ?>
				<?php if ($settings[ 'linkedin' ] != '') echo"<li><a href=\"$settings[linkedin]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/linkedin.png\" alt=\"$settings[rss_linkedin] \" />$settings[linkedin_name]<span>$settings[linkedin_sub]</span></a></li>"; ?>
  				<?php if ($settings[ 'flickr' ] != '') echo"<li><a href=\"$settings[flickr]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/flickr.png\" alt=\"$settings[rss_flickr] \" />$settings[flickr_name]<span>$settings[flickr_sub]</span></a></li>"; ?>
				<?php if ($settings[ 'picasa' ] != '') echo"<li><a href=\"$settings[picasa]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/picasa.png\" alt=\"$settings[rss_picasa] \" />$settings[picasa_name]<span>$settings[picasa_sub]</span></a></li>"; ?>
				<?php if ($settings[ 'youtube' ] != '') echo"<li><a href=\"$settings[youtube]\"><img src=\"". get_bloginfo('template_directory') ."/images/icons/youtube.png\" alt=\"$settings[rss_youtube] \" />$settings[youtube_name]<span>$settings[youtube_sub]</span></a></li>"; ?>

 		</ul>
		<div class="cleaner">&nbsp;</div>
<?php
  echo $after_widget;

}

function connectWithMe_admin() {
	$settings = get_option( 'widget_social_connect' );

	if( isset( $_POST[ 'update_social_connect' ] ) ) {
    $settings[ 'title' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_title' ] ) );


	$settings[ 'rss' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_rss' ] ) );
    $settings[ 'rss_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_rss_name' ] ) );
    $settings[ 'rss_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_rss_sub' ] ) );

    $settings[ 'email' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_email' ] ) );
    $settings[ 'email_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_email_name' ] ) );
    $settings[ 'email_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_email_sub' ] ) );

    $settings[ 'twitter' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_twitter' ] ) );
    $settings[ 'twitter_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_twitter_name' ] ) );
    $settings[ 'twitter_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_twitter_sub' ] ) );

    $settings[ 'tumblr' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_tumblr' ] ) );
    $settings[ 'tumblr_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_tumblr_name' ] ) );
    $settings[ 'tumblr_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_tumblr_sub' ] ) );

    $settings[ 'delicious' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_delicious' ] ) );
    $settings[ 'delicious_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_delicious_name' ] ) );
    $settings[ 'delicious_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_delicious_sub' ] ) );

    $settings[ 'digg' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_digg' ] ) );
    $settings[ 'digg_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_digg_name' ] ) );
    $settings[ 'digg_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_digg_sub' ] ) );

    $settings[ 'stumble' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_stumble' ] ) );
    $settings[ 'stumble_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_stumble_name' ] ) );
    $settings[ 'stumble_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_stumble_sub' ] ) );

    $settings[ 'facebook' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_facebook' ] ) );
    $settings[ 'facebook_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_facebook_name' ] ) );
    $settings[ 'facebook_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_facebook_sub' ] ) );

    $settings[ 'linkedin' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_linkedin' ] ) );
    $settings[ 'linkedin_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_linkedin_name' ] ) );
    $settings[ 'linkedin_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_linkedin_sub' ] ) );

    $settings[ 'flickr' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_flickr' ] ) );
    $settings[ 'flickr_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_flickr_name' ] ) );
    $settings[ 'flickr_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_flickr_sub' ] ) );

    $settings[ 'picasa' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_picasa' ] ) );
    $settings[ 'picasa_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_picasa_name' ] ) );
    $settings[ 'picasa_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_picasa_sub' ] ) );

    $settings[ 'youtube' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_youtube' ] ) );
    $settings[ 'youtube_name' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_youtube_name' ] ) );
    $settings[ 'youtube_sub' ] = strip_tags( stripslashes( $_POST[ 'widget_social_connect_youtube_sub' ] ) );

		update_option( 'widget_social_connect', $settings );
	}

?>
	<p>
		<label for="widget_social_connect_title">Widget Title</label><br />
		<input type="text" id="widget_social_connect_title" name="widget_social_connect_title" value="<?php echo $settings['title']; ?>" size="35" /><br />

		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/rss.png" />
		<label for="widget_social_connect_rss"><strong>RSS Feed</strong> URL</label>
		<input type="text" id="widget_social_connect_rss" name="widget_social_connect_rss" value="<?php echo $settings['rss']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_rss">Heading</label><br />
		<input type="text" id="widget_social_connect_rss_name" name="widget_social_connect_rss_name" value="<?php echo $settings['rss_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_rss">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_rss_sub" name="widget_social_connect_rss_sub" value="<?php echo $settings['rss_sub']; ?>" size="30" /><br />
		</p>

		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/email.png" />
		<label for="widget_social_connect_email"><strong>E-mail</strong></label><br />
		<input type="text" id="widget_social_connect_email" name="widget_social_connect_email" value="<?php echo $settings['email']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_email">Heading</label><br />
		<input type="text" id="widget_social_connect_email_name" name="widget_social_connect_email_name" value="<?php echo $settings['email_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_email">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_email_sub" name="widget_social_connect_email_sub" value="<?php echo $settings['email_sub']; ?>" size="30" /><br />
		</p>

		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/twitter.png" />
		<label for="widget_social_connect_twitter"><strong>Twitter</strong> Full URL</label>
		<input type="text" id="widget_social_connect_twitter" name="widget_social_connect_twitter" value="<?php echo $settings['twitter']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_twitter">Heading</label><br />
		<input type="text" id="widget_social_connect_twitter_name" name="widget_social_connect_twitter_name" value="<?php echo $settings['twitter_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_twitter">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_twitter_sub" name="widget_social_connect_twitter_sub" value="<?php echo $settings['twitter_sub']; ?>" size="30" /><br />
		</p>


		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/tumblr.png" />
		<label for="widget_social_connect_tumblr"><strong>Tumblr</strong> Full URL</label>
		<input type="text" id="widget_social_connect_tumblr" name="widget_social_connect_tumblr" value="<?php echo $settings['tumblr']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_tumblr">Heading</label><br />
		<input type="text" id="widget_social_connect_tumblr_name" name="widget_social_connect_tumblr_name" value="<?php echo $settings['tumblr_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_tumblr">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_tumblr_sub" name="widget_social_connect_tumblr_sub" value="<?php echo $settings['tumblr_sub']; ?>" size="30" /><br />
		</p>


		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/delicious.png" />
		<label for="widget_social_connect_delicious"><strong>Delicious</strong> Full URL</label>
		<input type="text" id="widget_social_connect_delicious" name="widget_social_connect_delicious" value="<?php echo $settings['delicious']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_delicious">Heading</label><br />
		<input type="text" id="widget_social_connect_delicious_name" name="widget_social_connect_delicious_name" value="<?php echo $settings['delicious_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_delicious">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_delicious_sub" name="widget_social_connect_delicious_sub" value="<?php echo $settings['delicious_sub']; ?>" size="30" /><br />
		</p>


		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/digg.png" />
		<label for="widget_social_connect_digg"><strong>Digg</strong> Full URL</label>
		<input type="text" id="widget_social_connect_digg" name="widget_social_connect_digg" value="<?php echo $settings['digg']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_digg">Heading</label><br />
		<input type="text" id="widget_social_connect_digg_name" name="widget_social_connect_digg_name" value="<?php echo $settings['digg_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_digg">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_digg_sub" name="widget_social_connect_digg_sub" value="<?php echo $settings['digg_sub']; ?>" size="30" /><br />
		</p>

		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/stumble.png" />
		<label for="widget_social_connect_stumble"><strong>StumbleUpon</strong> Full URL</label>
		<input type="text" id="widget_social_connect_stumble" name="widget_social_connect_stumble" value="<?php echo $settings['stumble']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_stumble">Heading</label><br />
		<input type="text" id="widget_social_connect_stumble_name" name="widget_social_connect_stumble_name" value="<?php echo $settings['stumble_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_stumble">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_stumble_sub" name="widget_social_connect_stumble_sub" value="<?php echo $settings['stumble_sub']; ?>" size="30" /><br />
		</p>


		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/facebook.png" />
		<label for="widget_social_connect_facebook"><strong>Facebook</strong> Full URL</label>
		<input type="text" id="widget_social_connect_facebook" name="widget_social_connect_facebook" value="<?php echo $settings['facebook']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_facebook">Heading</label><br />
		<input type="text" id="widget_social_connect_facebook_name" name="widget_social_connect_facebook_name" value="<?php echo $settings['facebook_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_facebook">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_facebook_sub" name="widget_social_connect_facebook_sub" value="<?php echo $settings['facebook_sub']; ?>" size="30" /><br />
		</p>

		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/linkedin.png" />
		<label for="widget_social_connect_linkedin"><strong>Linkedin</strong> Full URL</label>
		<input type="text" id="widget_social_connect_linkedin" name="widget_social_connect_linkedin" value="<?php echo $settings['linkedin']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_linkedin">Heading</label><br />
		<input type="text" id="widget_social_connect_linkedin_name" name="widget_social_connect_linkedin_name" value="<?php echo $settings['linkedin_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_linkedin">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_linkedin_sub" name="widget_social_connect_linkedin_sub" value="<?php echo $settings['linkedin_sub']; ?>" size="30" /><br />
		</p>


		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/flickr.png" />
		<label for="widget_social_connect_flickr"><strong>Flickr</strong> Full URL</label>
		<input type="text" id="widget_social_connect_flickr" name="widget_social_connect_flickr" value="<?php echo $settings['flickr']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_flickr">Heading</label><br />
		<input type="text" id="widget_social_connect_flickr_name" name="widget_social_connect_flickr_name" value="<?php echo $settings['flickr_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_flickr">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_flickr_sub" name="widget_social_connect_flickr_sub" value="<?php echo $settings['flickr_sub']; ?>" size="30" /><br />
		</p>

		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/picasa.png" />
		<label for="widget_social_connect_picasa"><strong>Picasa</strong> Full URL</label>
		<input type="text" id="widget_social_connect_picasa" name="widget_social_connect_picasa" value="<?php echo $settings['picasa']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_picasa">Heading</label><br />
		<input type="text" id="widget_social_connect_picasa_name" name="widget_social_connect_picasa_name" value="<?php echo $settings['picasa_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_picasa">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_picasa_sub" name="widget_social_connect_picasa_sub" value="<?php echo $settings['picasa_sub']; ?>" size="30" /><br />
		</p>

		<p>
		<img style="float: left; margin-right: 3px;" src="<?php echo bloginfo('template_directory') ?>/images/icons/youtube.png" />
		<label for="widget_social_connect_youtube"><strong>Youtube</strong> Full URL</label>
		<input type="text" id="widget_social_connect_youtube" name="widget_social_connect_youtube" value="<?php echo $settings['youtube']; ?>" size="30" />
		</p>
		<p style="margin-left:34px;">
  		<label for="widget_social_connect_youtube">Heading</label><br />
		<input type="text" id="widget_social_connect_youtube_name" name="widget_social_connect_youtube_name" value="<?php echo $settings['youtube_name']; ?>" size="30" /><br />
 		<label for="widget_social_connect_youtube">Sub-heading</label><br />
		<input type="text" id="widget_social_connect_youtube_sub" name="widget_social_connect_youtube_sub" value="<?php echo $settings['youtube_sub']; ?>" size="30" /><br />
		</p>


	</p>
	<input type="hidden" id="update_social_connect" name="update_social_connect" value="1" />
<?php }

 

 
 
/*------------------------------------------*/
/* WPZOOM: Recent Posts						*/
/*------------------------------------------*/
	
function recent_news($args) {
	
	extract($args);
	$settings = get_option( 'widget_recent_news' );  
	$number = $settings[ 'number' ];
	
  echo $before_widget;
  echo "$before_title"."$settings[title]"."$after_title";
  
?>
<ul>
	<?php
		$recent = new WP_Query( 'caller_get_posts=1&showposts=' . $number );
		while( $recent->have_posts() ) : $recent->the_post(); 
			global $post; global $wp_query;
	?>
	<li>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
		<?php unset($img); 
			if ( current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail() ) {
			$thumbURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
				$img = $thumbURL[0]; }
				else {
					unset($img);
					if ($wpzoom_cf_use == 'Yes') { $img = get_post_meta($post->ID, $wpzoom_cf_photo, true); }
				else {
					if (!$img)  { $img = catch_that_image($post->ID); } }
				}
				if ($img) { $img = wpzoom_wpmu($img);?>
			<img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $img ?>&amp;w=65&amp;h=50&amp;zc=1" alt="<?php the_title(); ?>" /> 
			<?php } ?>
 		</a>
 		<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>  
		<span class="meta"><?php the_time('F j, Y \a\t G:i'); ?></span> 

	</li>
	 
	<?php
		endwhile;
	?>
</ul>
  
<?php
echo $after_widget;
}

/*------------------------------------------*/
/* WPZOOM: Recent Portfolio						*/
/*------------------------------------------*/
	
function recent_portfolio($args) {
	
	extract($args);
	$settings = get_option( 'widget_recent_portfolio' );  
	$number = $settings[ 'number' ];
	
  echo $before_widget;
  echo "$before_title"."$settings[title]"."$after_title";
  
?>
<ul class="widget_recent_portfolio">
	<?php
		$recent = new wp_query( 'post_type=portfolio&caller_get_posts=1&showposts=' . $number );
		while( $recent->have_posts() ) : $recent->the_post(); 
			global $post; global $wp_query;
	?>
	<li>
		<a class="recentPortfolio" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
		<?php unset($img); 
			if ( current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail() ) {
			$thumbURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
				$img = $thumbURL[0]; }
				else {
					unset($img);
					if ($wpzoom_cf_use == 'Yes') { $img = get_post_meta($post->ID, $wpzoom_cf_photo, true); }
				else {
					if (!$img)  { $img = catch_that_image($post->ID); } }
				}
				if ($img) { $img = wpzoom_wpmu($img);?>
			<img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $img ?>&amp;w=65&amp;h=50&amp;zc=1" alt="<?php the_title(); ?>" /> 
			<?php } ?>
 		</a>
 		<div class='metadata'>
	 		<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a><br /> 
			<span class="meta"><?php the_time('F j, Y \a\t G:i'); ?></span> 
		</div>
		<div class="clear"></div>
	</li>
	 
	<?php
		endwhile;
	?>
</ul>
  
<?php
echo $after_widget;
}


function recent_news_admin() {
	
	$settings = get_option( 'widget_recent_news' );

	if( isset( $_POST[ 'update_recent_news' ] ) ) {
		$settings[ 'title' ] = strip_tags( stripslashes( $_POST[ 'widget_recent_news_title' ] ) );
		$settings[ 'number' ] = strip_tags( stripslashes( $_POST[ 'widget_recent_news_number' ] ) );
		update_option( 'widget_recent_news', $settings );
	}
?>
	<p>
		<label for="widget_recent_news_title">Title</label><br />
		<input type="text" id="widget_recent_news_title" name="widget_recent_news_title" value="<?php echo $settings['title']; ?>" size="40" /><br />
		
		
		<label for="widget_recent_news_number">How many items would you like to display?</label><br />
		<select id="widget_recent_news_number" name="widget_recent_news_number">
			<?php
				$settings = get_option( 'widget_recent_news' );  
				$number = $settings[ 'number' ];
				
				$numbers = array( "1", "2", "3", "4", "5", "6", "7", "8", "9", "10" );
				foreach ($numbers as $num ) {
					$option = '<option value="' . $num . '" ' . ( $number == $num? " selected=\"selected\"" : "") . '>';
						$option .= $num;
					$option .= '</option>';
					echo $option;
				}
			?>
		</select>
	</p>
		<input type="hidden" id="update_recent_news" name="update_recent_news" value="1" />

<?php  }
 
 
function recent_portfolio_admin() {
	
	$settings = get_option( 'widget_recent_portfolio' );

	if( isset( $_POST[ 'update_recent_portfolio' ] ) ) {
		$settings[ 'title' ] = strip_tags( stripslashes( $_POST[ 'widget_recent_portfolio_title' ] ) );
		$settings[ 'number' ] = strip_tags( stripslashes( $_POST[ 'widget_recent_portfolio_number' ] ) );
		update_option( 'widget_recent_portfolio', $settings );
	}
?>
	<p>
		<label for="widget_recent_portfolio_title">Title</label><br />
		<input type="text" id="widget_recent_portfolio_title" name="widget_recent_portfolio_title" value="<?php echo $settings['title']; ?>" size="40" /><br />
		
		
		<label for="widget_recent_portfolio_number">How many items would you like to display?</label><br />
		<select id="widget_recent_portfolio_number" name="widget_recent_portfolio_number">
			<?php
				$settings = get_option( 'widget_recent_portfolio' );  
				$number = $settings[ 'number' ];
				
				$numbers = array( "1", "2", "3", "4", "5", "6", "7", "8", "9", "10" );
				foreach ($numbers as $num ) {
					$option = '<option value="' . $num . '" ' . ( $number == $num? " selected=\"selected\"" : "") . '>';
						$option .= $num;
					$option .= '</option>';
					echo $option;
				}
			?>
		</select>
	</p>
		<input type="hidden" id="update_recent_portfolio" name="update_recent_portfolio" value="1" />

<?php  }
 
/*------------------------------------------*/
/* WPZOOM: Recent Comments (with gravatar)	*/
/*------------------------------------------*/


function dp_recent_comments($no_comments = 10, $comment_len = 75) { 
    global $wpdb; 
	
	$request = "SELECT * FROM $wpdb->comments";
	$request .= " JOIN $wpdb->posts ON ID = comment_post_ID";
	$request .= " WHERE comment_approved = '1' AND post_status = 'publish' AND post_password ='' AND comment_type = ''"; 
	$request .= " ORDER BY comment_date DESC LIMIT $no_comments"; 
		
	$comments = $wpdb->get_results($request);
		
	if ($comments) { 
		foreach ($comments as $comment) { 
			ob_start();
			?>
				<li>
					 <?php echo get_avatar($comment,$size='40' ); ?> 
					<a href="<?php echo get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID; ?>"><?php echo dp_get_author($comment); ?>:</a>
					<?php echo strip_tags(substr(apply_filters('get_comment_text', $comment->comment_content), 0, $comment_len)); ?>
 				</li>
			<?php
			ob_end_flush();
		} 
	} else { 
		echo "<li>No comments</li>";
	}
}

function dp_get_author($comment) {
	$author = "";

	if ( empty($comment->comment_author) )
		$author = __('Anonymous');
	else
		$author = $comment->comment_author;
		
	return $author;
}



function recent_comments($args) {

	extract($args);
	$settings = get_option( 'widget_recent_comments' );  
	$number = $settings[ 'number' ];
	
  echo $before_widget;
  echo "$before_title"."$settings[title]"."$after_title";
 
 
?>
	<ul>
	<?php dp_recent_comments($settings['number_comments']); ?>
	</ul>
	
 <?php
  echo $after_widget;
}

function recent_comments_admin() {
	
	$settings = get_option( 'widget_recent_comments' );
	 
	if( isset( $_POST[ 'update_recent_comments' ] ) ) {
			$settings[ 'title' ] = strip_tags( stripslashes( $_POST[ 'widget_recent_comments_title' ] ) );
			$settings[ 'number_comments' ] = strip_tags( stripslashes( $_POST[ 'widget_recent_comments_number_comments' ] ) );
			update_option( 'widget_recent_comments', $settings );
		}
	
	 
?>	
	<p>
		<label for="widget_recent_comments_title_comments">Title</label><br />
		<input type="text" id="widget_recent_comments_title" name="widget_recent_comments_title" value="<?php echo $settings['title']; ?>" />
	</p>
	
	<p>
		<label for="widget_recent_comments_number_comments">Number of comments</label><br />
		<input type="text" id="widget_recent_comments_number_comments" name="widget_recent_comments_number_comments" value="<?php echo $settings['number_comments']; ?>" />
	</p>
	
<input type="hidden" id="update_recent_comments" name="update_recent_comments" value="1" />
<?php }



/*----------------------------------------------------------------------------------*/
/*  WPZOOM: Flickr Widget	
/*	 			
/*  Plugin URI: http://kovshenin.com/wordpress/plugins/quick-flickr-widget/
/*  Author: Konstantin Kovshenin
/*  Modified by WPZOOM
/*
/*----------------------------------------------------------------------------------*/

$flickr_api_key = "d348e6e1216a46f2a4c9e28f93d75a48"; // You can use your own if you like

function widget_quickflickr($args) {
	extract($args);

	$options = get_option("widget_quickflickr");
	if( $options == false ) {
		$options["title"] = "Flickr Photos";
		$options["rss"] = "";
		$options["items"] = 3;
		$options["target"] = "";
		$options["username"] = "";
		$options["user_id"] = "";
		$options["error"] = "";
	}

	$title = $options["title"];
	$items = $options["items"];
	$view = "_s";
	$before_item = "<li>";
	$after_item = "</li>";
	$before_flickr_widget = "<ul class=\"gallery\">";
	$after_flickr_widget = "</ul>";
	$more_title = $options["more_title"];
	$target = $options["target"];
	$username = $options["username"];
	$user_id = $options["user_id"];
	$error = $options["error"];
	$rss = $options["rss"];
	$tester = 0;

	if (empty($error))
	{
		$target = ($target == "checked") ? "target=\"_blank\"" : "";

		$flickrformat = "php";

		if (empty($items) || $items < 1 || $items > 20) $items = 3;

		// Screen name or RSS in $username?
		if (!ereg("http://api.flickr.com/services/feeds", $username))
			$url = "http://api.flickr.com/services/feeds/photos_public.gne?id=".urlencode($user_id)."&format=".$flickrformat."&lang=en-us".$tags;
		else
			$url = $username."&format=".$flickrformat.$tags;

      eval("?>". file_get_contents($url) . "<?");
			$photos = $feed;

			if ($photos)
			{
			 $out .= $before_flickr_widget;

        foreach($photos["items"] as $key => $value)
				{
				  $tester++;

					if (--$items < 0) break;

					$photo_title = $value["title"];
					$photo_link = $value["url"];
					ereg("<img[^>]* src=\"([^\"]*)\"[^>]*>", $value["description"], $regs);
					$photo_url = $regs[1];

					//$photo_url = $value["media"]["m"];
					$photo_medium_url = str_replace("_m.jpg", ".jpg", $photo_url);
					$photo_url = str_replace("_m.jpg", "$view.jpg", $photo_url);

					if ($tester == 3)
					{
					  $before_item = '<li class="last">';
					  $tester = 0;
          }
          else
          {
            $before_item = '<li>';
          }

//					$photo_title = ($show_titles) ? "<div class=\"qflickr-title\">$photo_title</div>" : "";
					$out .= $before_item . "<a $target href=\"$photo_link\"><img class=\"flickr_photo\" alt=\"$photo_title\" title=\"$photo_title\" src=\"$photo_url\" /></a>" . $after_item;

				}
				$flickr_home = $photos["url"];
				$out .= $after_flickr_widget;
			}
			else
			{
				$out = "Something went wrong with the Flickr feed! Please check your configuration and make sure that the Flickr username or RSS feed exists";
			}

		?>
<!-- Quick Flickr start -->
	<?php echo $before_widget; ?>
		<?php if(!empty($title)) { $title = apply_filters('localization', $title); echo $before_title . $title . $after_title; } ?>
		<?php echo $out ?>
		<?php if (!empty($more_title) && !$javascript) echo "<a href=\"" . strip_tags($flickr_home) . "\">$more_title</a>"; ?>
	<?php echo $after_widget; ?>
<!-- Quick Flickr end -->
	<?php
	}
	else // error
	{
		$out = $error;
	}
}

function widget_quickflickr_control() {
	$options = $newoptions = get_option("widget_quickflickr");
	if( $options == false ) {
		$newoptions["title"] = "Flickr Gallery";
		$newoptions["error"] = "Your Quick Flickr Widget needs to be configured";
	}
	if ( $_POST["flickr-submit"] ) {
		$newoptions["title"] = strip_tags(stripslashes($_POST["flickr-title"]));
		$newoptions["items"] = strip_tags(stripslashes($_POST["rss-items"]));
		$newoptions["more_title"] = strip_tags(stripslashes($_POST["flickr-more-title"]));
		$newoptions["target"] = strip_tags(stripslashes($_POST["flickr-target"]));
		$newoptions["username"] = strip_tags(stripslashes($_POST["flickr-username"]));

		if (!empty($newoptions["username"]) && $newoptions["username"] != $options["username"])
		{
			if (!ereg("http://api.flickr.com/services/feeds", $newoptions["username"])) // Not a feed
			{
				global $flickr_api_key;
				$str = @file_get_contents("http://api.flickr.com/services/rest/?method=flickr.people.findByUsername&api_key=".$flickr_api_key."&username=".urlencode($newoptions["username"])."&format=rest");
				ereg("<rsp stat=\\\"([A-Za-z]+)\\\"", $str, $regs); $findByUsername["stat"] = $regs[1];

				if ($findByUsername["stat"] == "ok")
				{
					ereg("<username>(.+)</username>", $str, $regs);
					$findByUsername["username"] = $regs[1];

					ereg("<user id=\\\"(.+)\\\" nsid=\\\"(.+)\\\">", $str, $regs);
					$findByUsername["user"]["id"] = $regs[1];
					$findByUsername["user"]["nsid"] = $regs[2];

					$flickr_id = $findByUsername["user"]["nsid"];
					$newoptions["error"] = "";
				}
				else
				{
					$flickr_id = "";
					$newoptions["username"] = ""; // reset

					ereg("<err code=\\\"(.+)\\\" msg=\\\"(.+)\\\"", $str, $regs);
					$findByUsername["message"] = $regs[2] . "(" . $regs[1] . ")";

					$newoptions["error"] = "Flickr API call failed! (findByUsername returned: ".$findByUsername["message"].")";
				}
				$newoptions["user_id"] = $flickr_id;
			}
			else
			{
				$newoptions["error"] = "";
			}
		}
		elseif (empty($newoptions["username"]))
			$newoptions["error"] = "Flickr RSS or Screen name empty. Please reconfigure.";
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option("widget_quickflickr", $options);
	}
	$title = wp_specialchars($options["title"]);
	$items = wp_specialchars($options["items"]);
	if ( empty($items) || $items < 1 ) $items = 3;

	$more_title = wp_specialchars($options["more_title"]);

	$target = wp_specialchars($options["target"]);
	$flickr_username = wp_specialchars($options["username"]);

	?>
	<p><label for="flickr-title"><?php _e("Title:"); ?> <input class="widefat" id="flickr-title" name="flickr-title" type="text" value="<?php echo $title; ?>" /></label></p>
	<p><label for="flickr-username"><?php _e("Flickr RSS URL or Screen name:"); ?> <input class="widefat" id="flickr-username" name="flickr-username" type="text" value="<?php echo $flickr_username; ?>" /></label></p>
	<p><label for="flickr-items"><?php _e("How many items?"); ?> <select class="widefat" id="rss-items" name="rss-items"><?php for ( $i = 1; $i <= 20; ++$i ) echo "<option value=\"$i\" ".($items==$i ? "selected=\"selected\"" : "").">$i</option>"; ?></select></label></p>
	<p><label for="flickr-more-title"><?php _e("More link anchor text:"); ?> <input class="widefat" id="flickr-more-title" name="flickr-more-title" type="text" value="<?php echo $more_title; ?>" /></label></p>
	<p><label for="flickr-target"><input id="flickr-target" name="flickr-target" type="checkbox" value="checked" <?php echo $target; ?> /> <?php _e("Target: _blank"); ?></label></p>
	<input type="hidden" id="flickr-submit" name="flickr-submit" value="1" />
	<?php
}


  
/*------------------------------------
WPZOOM: Features Widget
-------------------------------------*/

// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'wpzoom_features_widgets' );


// Register widget.
function wpzoom_features_widgets() {
	register_widget( 'TZ_Smallscreenshots_Widget' );
}


// Widget class.
class tz_smallscreenshots_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function TZ_Smallscreenshots_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tz_smallscreenshots_widget', 'description' => __('A widget that displays features with a icon.', 'wpzoom') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tz_smallscreenshots_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'tz_smallscreenshots_widget', __('WPZOOM: Features Widget', 'wpzoom'), $widget_ops, $control_ops );
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* Our variables from the widget settings. */
		$image_title = $instance['image_title'];
		$image_title2 = $instance['image_title2'];
		$image_title3 = $instance['image_title3'];
		$image_title4 = $instance['image_title4'];
		
		$image_thumb = $instance['image_thumb'];
		$image_thumb2 = $instance['image_thumb2'];
		$image_thumb3 = $instance['image_thumb3'];
		$image_thumb4 = $instance['image_thumb4'];
		
		$feat_url = $instance['feat_url'];
		$feat_url2 = $instance['feat_url2'];
		$feat_url3 = $instance['feat_url3'];
		$feat_url4 = $instance['feat_url4'];
		
		$desc  = $instance['desc'];
		$desc2 = $instance['desc2'];
		$desc3 = $instance['desc3'];
		$desc4 = $instance['desc4'];

		/* Display Widget */
		?> 
			
			<div class="features">
			
 				<?php if ( $title ) {	echo '<h3>'.$title.'</h3>'; } ?>
				
				<?php if($image_title != '') : ?>
				
				<div class="item">
					<?php if($feat_url != '') { ?><a href="<?php echo $feat_url; ?>"><?php } ?><img class="thumb" src="<?php echo $image_thumb; ?>" alt="<?php echo $image_title; ?>"/><?php if($feat_url != '') { ?></a><?php } ?>
					 
					<div class="f_content">
						<h4><?php if($feat_url != '') { ?><a href="<?php echo $feat_url; ?>"><?php } ?><?php echo $image_title; ?><?php if($feat_url != '') { ?></a><?php } ?></h4>
						<p><?php echo $desc; ?></p>
					 </div> 
					
				</div><!--item-->
				
				<?php endif; ?>
				
				<?php if($image_title2 != '') : ?>
				
				<div class="item">
					<?php if($feat_url2 != '') { ?><a href="<?php echo $feat_url2; ?>"><?php } ?><img class="thumb" src="<?php echo $image_thumb2; ?>" alt="<?php echo $image_title2; ?>"/><?php if($feat_url2 != '') { ?></a><?php } ?>
					 
					<div class="f_content">
						<h4><?php if($feat_url2 != '') { ?><a href="<?php echo $feat_url2; ?>"><?php } ?><?php echo $image_title2; ?><?php if($feat_url2 != '') { ?></a><?php } ?></h4>
						<p><?php echo $desc2; ?></p>
					 </div> 
					
				</div><!--item-->
				
				<?php endif; ?>
				
				<?php if($image_title3 != '') : ?>
				
				<div class="item">
					<?php if($feat_url3 != '') { ?><a href="<?php echo $feat_url3; ?>"><?php } ?><img class="thumb" src="<?php echo $image_thumb3; ?>" alt="<?php echo $image_title3; ?>"/><?php if($feat_url3 != '') { ?></a><?php } ?>
					 
					<div class="f_content">
						<h4><?php if($feat_url3 != '') { ?><a href="<?php echo $feat_url3; ?>"><?php } ?><?php echo $image_title3; ?><?php if($feat_url3 != '') { ?></a><?php } ?></h4>
						<p><?php echo $desc3; ?></p>
					 </div> 
					
				</div><!--item-->
				
				<?php endif; ?>
				
				<?php if($image_title4 != '') : ?>
				
				<div class="item">
					<?php if($feat_url4 != '') { ?><a href="<?php echo $feat_url4; ?>"><?php } ?><img class="thumb" src="<?php echo $image_thumb4; ?>" alt="<?php echo $image_title4; ?>"/><?php if($feat_url4 != '') { ?></a><?php } ?>
					 
					<div class="f_content">
						<h4><?php if($feat_url4 != '') { ?><a href="<?php echo $feat_url4; ?>"><?php } ?><?php echo $image_title4; ?><?php if($feat_url4 != '') { ?></a><?php } ?></h4>
						<p><?php echo $desc4; ?></p>
					 </div> 
					
				</div><!--item-->
				
				<?php endif; ?>
				<div class="clear"></div>
 			</div>
 			
		<?php

 	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		$instance['image_title']  = strip_tags( $new_instance['image_title'] );
		$instance['image_title2'] = strip_tags( $new_instance['image_title2'] );
		$instance['image_title3'] = strip_tags( $new_instance['image_title3'] );
		$instance['image_title4'] = strip_tags( $new_instance['image_title4'] );
				
		$instance['image_thumb'] = strip_tags( $new_instance['image_thumb'] );
		$instance['image_thumb2'] = strip_tags( $new_instance['image_thumb2'] );
		$instance['image_thumb3'] = strip_tags( $new_instance['image_thumb3'] );
		$instance['image_thumb4'] = strip_tags( $new_instance['image_thumb4'] );
				
		$instance['feat_url'] = strip_tags( $new_instance['feat_url'] );
		$instance['feat_url2'] = strip_tags( $new_instance['feat_url2'] );
		$instance['feat_url3'] = strip_tags( $new_instance['feat_url3'] );
		$instance['feat_url4'] = strip_tags( $new_instance['feat_url4'] );
				
		$instance['desc'] = stripslashes( $new_instance['desc'] );
		$instance['desc2'] = stripslashes( $new_instance['desc2'] );
		$instance['desc3'] = stripslashes( $new_instance['desc3'] );
		$instance['desc4'] = stripslashes( $new_instance['desc4'] );

		/* No need to strip tags for.. */

		return $instance;
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		
		'title' => 'Features',
		
		'image_title' => '',
		'desc' => '',
		'image_thumb' => '',
		'feat_url' => '',
		
		'image_title2' => '',
		'desc2' => '',
		'image_thumb2' => '',
		'feat_url2' => '',
		
		'image_title3' => '',
		'desc3' => '',
		'image_thumb3' => '',
		'feat_url3' => '',
		
		'image_title4' => '',
		'desc4' => '',
		'image_thumb4' => '',
		'feat_url4' => ''
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Widget Title:', 'wpzoom'); ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>
		
		<hr>
		 
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image_title' ); ?>"><strong><?php _e('Feature Title 1: ', 'wpzoom') ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image_title' ); ?>" name="<?php echo $this->get_field_name( 'image_title' ); ?>" value="<?php echo $instance['image_title']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Description:', 'wpzoom') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?></textarea>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb' ); ?>"><?php _e('Icon or image:', 'wpzoom') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image_thumb' ); ?>" name="<?php echo $this->get_field_name( 'image_thumb' ); ?>" value="<?php echo $instance['image_thumb']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'feat_url' ); ?>"><?php _e('Link:', 'wpzoom') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'feat_url' ); ?>" name="<?php echo $this->get_field_name( 'feat_url' ); ?>" value="<?php echo $instance['feat_url']; ?>" />
		</p>
        
        <hr>
        
        
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_title2' ); ?>"><strong><?php _e('Feature Title 2: ', 'wpzoom') ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image_title2' ); ?>" name="<?php echo $this->get_field_name( 'image_title2' ); ?>" value="<?php echo $instance['image_title2']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc2' ); ?>"><?php _e('Description:', 'wpzoom') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'desc2' ); ?>" name="<?php echo $this->get_field_name( 'desc2' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['desc2'] ), ENT_QUOTES)); ?></textarea>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb2' ); ?>"><?php _e('Icon or image:', 'wpzoom') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image_thumb2' ); ?>" name="<?php echo $this->get_field_name( 'image_thumb2' ); ?>" value="<?php echo $instance['image_thumb2']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'feat_url2' ); ?>"><?php _e('Link:', 'wpzoom') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'feat_url2' ); ?>" name="<?php echo $this->get_field_name( 'feat_url2' ); ?>" value="<?php echo $instance['feat_url2']; ?>" />
		</p>
        
        <hr>
        
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_title3' ); ?>"><strong><?php _e('Feature Title 3: ', 'wpzoom') ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image_title3' ); ?>" name="<?php echo $this->get_field_name( 'image_title3' ); ?>" value="<?php echo $instance['image_title3']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc3' ); ?>"><?php _e('Description:', 'wpzoom') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'desc3' ); ?>" name="<?php echo $this->get_field_name( 'desc3' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['desc3'] ), ENT_QUOTES)); ?></textarea>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb3' ); ?>"><?php _e('Icon or image:', 'wpzoom') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image_thumb3' ); ?>" name="<?php echo $this->get_field_name( 'image_thumb3' ); ?>" value="<?php echo $instance['image_thumb3']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'feat_url3' ); ?>"><?php _e('Link:', 'wpzoom') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'feat_url3' ); ?>" name="<?php echo $this->get_field_name( 'feat_url3' ); ?>" value="<?php echo $instance['feat_url3']; ?>" />
		</p>
        
        <hr>
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_title4' ); ?>"><strong><?php _e('Feature Title 4: ', 'wpzoom') ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image_title4' ); ?>" name="<?php echo $this->get_field_name( 'image_title4' ); ?>" value="<?php echo $instance['image_title4']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc4' ); ?>"><?php _e('Description:', 'wpzoom') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'desc4' ); ?>" name="<?php echo $this->get_field_name( 'desc4' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['desc4'] ), ENT_QUOTES)); ?></textarea>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'image_thumb4' ); ?>"><?php _e('Icon or image:', 'wpzoom') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image_thumb4' ); ?>" name="<?php echo $this->get_field_name( 'image_thumb4' ); ?>" value="<?php echo $instance['image_thumb4']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'feat_url4' ); ?>"><?php _e('Link:', 'wpzoom') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'feat_url4' ); ?>" name="<?php echo $this->get_field_name( 'feat_url4' ); ?>" value="<?php echo $instance['feat_url4']; ?>" />
		</p>
        
        <hr>
	
	<?php
	}
}


 


/*------------------------------------
WPZOOM: Testimonials Widget
-------------------------------------*/

// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'testimonial_widgets' );


// Register widget.
function testimonial_widgets() {
	register_widget( 'Testimonial_Widget' );
}


// Widget class.
class testimonial_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function Testimonial_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'testimonial_widgets', 'description' => __('A widget that displays testimonials.', 'wpzoom') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'testimonial_widgets' );

		/* Create the widget. */
		$this->WP_Widget( 'testimonial_widgets', __('WPZOOM: Testimonials', 'wpzoom'), $widget_ops, $control_ops );
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* Our variables from the widget settings. */
		$testimonial_posts = $instance['testimonial_posts'];
		$testimonial_sort = $instance['testimonial_sort'];
	
		
	  if ($testimonial_sort == 'rand')
	  {
		$sort = $testimonial_sort;
	  }
	  elseif ($testimonial_sort == 'date')
	  {
		$sort = $testimonial_sort;
	  }
	  
	  
		/* Display Widget */
		?> 
			
			<?php if ( $title ) {	echo '<h3>'.$title.'</h3>'; } ?>
			
			<div class="testimonials">
			
 				<?php $loop = new WP_Query( array( 'post_type' => 'testimonial', 'orderby' => $sort, 'posts_per_page' => $testimonial_posts ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); 
 
				$custom = get_post_custom($post->ID);  
				
				$testimonial_url = "". $custom["wpzoom_testimonial_url"][0];   
				$testimonial_gravatar = "". $custom["wpzoom_testimonial_gravatar"][0];   
				$testimonial_avatar = "". $custom["wpzoom_testimonial_avatar"][0];   
				
				?>
				
 				<div class="item">
					<div class="thumb"><?php if($testimonial_url != '') { ?><a href="<?php echo $testimonial_url; ?>"><?php } ?><?php if ($testimonial_gravatar != '') { echo get_avatar( $testimonial_gravatar, $size = '65', $default = '<path_to_url>' ); } else { echo "<img src=\"$testimonial_avatar\" />"; } ?><?php if($testimonial_url != '') { ?></a><?php } ?></div>
					 
					<div class="f_content">
 						<?php the_content(); ?>
						<span class="author"><?php if($testimonial_url != '') { ?><a href="<?php echo $testimonial_url; ?>"><?php } ?><?php the_title(); ?><?php if($testimonial_url != '') { ?></a><?php } ?></span>
					 
					 </div> 
					
				</div><!--item-->
				
				<?php endwhile; ?>
				
 				<div class="clear"></div>
 			</div>
 			
		<?php

 	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		$instance['testimonial_posts']  = strip_tags( $new_instance['testimonial_posts'] );
		$instance['testimonial_sort']  = strip_tags( $new_instance['testimonial_sort'] );
  
		/* No need to strip tags for.. */

		return $instance;
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		
		'title' => 'Testimonials',
		
		'testimonial_posts' => '4',
		'testimonial_sort' => 'rand',
 		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Widget Title:', 'wpzoom'); ?></strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>
	 
		 
		<p>
			<label for="<?php echo $this->get_field_id('testimonial_sort'); ?>"><?php _e('Testimonials Order:', 'wpzoom'); ?></label>
			<select id="<?php echo $this->get_field_id('testimonial_sort'); ?>" name="<?php echo $this->get_field_name('testimonial_sort'); ?>" style="width:90%;">
			<option value="date"<?php if ($instance['testimonial_sort'] == 'date') { echo ' selected="selected"';} ?>>By date</option>
			<option value="rand"<?php if ($instance['testimonial_sort'] == 'rand') { echo ' selected="selected"';} ?>>Random</option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'testimonial_posts' ); ?>"><?php _e('Number of testimonials ', 'wpzoom') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'testimonial_posts' ); ?>" name="<?php echo $this->get_field_name( 'testimonial_posts' ); ?>" value="<?php echo $instance['testimonial_posts']; ?>" style="width:90%;" />
		</p>

 
	<?php
	}
}

register_sidebar_widget( 'WPZOOM: Recent News', 'recent_news' );
register_widget_control( 'WPZOOM: Recent News', 'recent_news_admin', 300, 200 );

register_sidebar_widget( 'WPZOOM: Recent Portfolio', 'recent_portfolio' );
register_widget_control( 'WPZOOM: Recent Portfolio', 'recent_portfolio_admin', 300, 200 );

register_sidebar_widget( 'WPZOOM: Recent Comments', 'recent_comments' );
register_widget_control( 'WPZOOM: Recent Comments', 'recent_comments_admin', 300, 200 );

register_sidebar_widget( 'WPZOOM: Social Widget', 'connectWithMe' );
register_widget_control( 'WPZOOM: Social Widget', 'connectWithMe_admin', 300, 200 );

register_widget_control( 'WPZOOM: Flickr Widget', "widget_quickflickr_control");
register_sidebar_widget( 'WPZOOM: Flickr Widget', "widget_quickflickr");

?>