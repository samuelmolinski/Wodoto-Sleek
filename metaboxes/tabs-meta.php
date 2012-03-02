<?php 
	$default_tech = "<div class='icon php' href='http://www.php.net/' target='_blank' title='Programmed with PHP 5'><img title='Programmed with PHP'src='". get_bloginfo("template_url"). "/icons/icon-php.png' /><span>PHP</span></div>\n" .
					"<div class='icon html5' href='http://beta.theexpressiveweb.com/' target='_blank' title='Programmed with HTML 5'><img src='". get_bloginfo("template_url"). "/icons/icon-html5.png' /><span>HTML 5</span></div>\n" .
					"<div class='icon css3' href='http://beta.theexpressiveweb.com/' target='_blank' title='Programmed with CSS 3'><img src='". get_bloginfo("template_url"). "/icons/icon-css3.png' /><span>CSS 3</span></div>\n" .
					"<div class='icon jquery' href='http://jquery.com/' target='_blank' title='Programmed with jQuery'><img src='". get_bloginfo("template_url"). "/icons/icon-jquery.png' /><span>jQuery</span></div>\n" .
					"<div class='icon jqueryui' href='http://jqueryui.com/' target='_blank' title='Programmed with jQuery UI'><img src='". get_bloginfo("template_url"). "/icons/icon-jqueryui.png' /><span>jQuery UI</span></div>\n" .
					"<div class='icon ajax' href='#' target='_blank' title='AJAX Responsiveness'><img src='". get_bloginfo("template_url"). "/icons/icon-ajax.png' /><span>AJAX</span></div>\n" .
					"<div class='icon ai' href='http://www.adobe.com/products/illustrator.html' target='_blank' title='Designed with Adobe Illustrator'><img src='". get_bloginfo("template_url"). "/icons/icon-ai.png' /><span>Adobe Illustrator</span></div>\n" .
					"<div class='icon ps' href='http://www.adobe.com/products/photoshop.html' target='_blank' title='Designed with Adobe Photoshop'><img src='". get_bloginfo("template_url"). "/icons/icon-ps.png' /><span>Adobe Photoshop</span></div>\n" .
					"<div class='icon wp' href='http://wordpress.org/' target='_blank' title='Powered by Wordpress'><img src='". get_bloginfo("template_url"). "/icons/icon-wp.png' /><span>Wordpress</span></div>\n".
					"<div class='icon css3pie' href='http://css3pie.com/' target='_blank' title='Internet Explorer CSS 3 PIE Supplement'><img src='". get_bloginfo("template_url"). "/icons/icon-css3pie.png' /><span>CSS3 PIE</span></div>\n" .
					"<div class='icon mysql' href='http://www.mysql.com/' target='_blank' title='Data Storage provided by MySQL'><img src='". get_bloginfo("template_url"). "/icons/icon-mysql.png' /><span>MySQL</span></div>\n" .
					"<div class='icon facebook' href='http://developers.facebook.com/' target='_blank' title='Facebook integrated Web App'><img src='". get_bloginfo("template_url"). "/icons/icon-facebook.png' /><span>Facebook Web App</span></div>\n" .
					"<div class='icon twitter' href='https://dev.twitter.com/' target='_blank' title='Integrated with Twitter API'><img src='". get_bloginfo("template_url"). "/icons/icon-twitter.png' /><span>Twitter Intergration</span></div>\n" .
					"<div class='icon cssless' href='http://lesscss.org/' target='_blank' title='Impliments Less framework for CSS'><img src='". get_bloginfo("template_url"). "/icons/icon-cssless.png' /><span>Less</span></div>\n" .
                                        "<div class='icon vtex' href='http://www.vtex.com.br/' target='_blank' title='Powered by Vtex'><img src='". get_bloginfo("template_url"). "/icons/icon-vtex.png' /><span>Vtex</span></div>";
	w
?>
<div id="tabMeta" class="my_meta_control">
 
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
	Cras orci lorem, bibendum in pharetra ac, luctus ut mauris.</p>
 
	<label>Technology</label>
 
	<p>
		<?php $metabox->the_field('technology'); ?>
		<?php $val = $metabox->get_the_value();
		if ($val == '') {$tech = $default_tech;} else {$tech = $val;} ?>
		<textarea name="<?php $metabox->the_name(); ?>" rows="20"><?php echo $tech; ?></textarea>
		<span>Summery of technologies used.</span>
	</p>
 
	<label>Innovation &amp; Customization</label>
 
	<p>
		<?php $metabox->the_field('innovation'); ?>
		<textarea name="<?php $metabox->the_name(); ?>" rows="20"><?php $metabox->the_value(); ?></textarea>
		<span>Summery of innovation and customization created.</span>
	</p>

	<label>Problems &amp; Solutions</label>
 
	<p>
		<?php $metabox->the_field('problems'); ?>
		<textarea name="<?php $metabox->the_name(); ?>" rows="20"><?php $metabox->the_value(); ?></textarea>
		<span>Summery of problems and solutions</span>
	</p>

</div>