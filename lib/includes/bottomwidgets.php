<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */
?>
<!-- Group with 4 widgets columns -->
<div id="bottomwidgets" class="clearfix">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Widgets')) : ?>
		<!-- demo content -->
		<?php if ( is_front_page() ) { ?>

<!-- remove bottom widgets -->
<div class="four">
<h3><?php _e('Built For WordPress 4','thecorporate'); ?> </h3>
<p><?php _e('The Corporate 3 is based on the older and original Corporate theme but has been completely redesigned and redeveloped for the new WordPress version 4.0+ and begins a new phase for creating more professional themes.','thecorporate'); ?><br>
</p></div>
<div class="four">
<h3><?php _e('Dynamic Width Widgets','thecorporate'); ?> </h3>
<p><?php _e('The Corporate 3 now has dynamic widgets that automatically resize based on how many you publish side-by-side. The widget area you see here has 4 widgets published and have automatically resized with equal spacing.','thecorporate'); ?><br>
</p></div>
<div class="four">
<h3><?php _e('Theme Style Settings','thecorporate'); ?></h3>
<p><?php _e('Style your new website or blog with the built-in control panel which offers several settings to manage how your site will look, including colours, logo, type styles, showcase settings, Google, and other standard features people use.','thecorporate'); ?><br>
</p></div>
<div class="four last">
<h3><?php _e('WP Shortcodes','thecorporate'); ?></h3>
<p><?php _e('After looking at the theme options, I am thinking that we may have to add a few options to make a paid version because there is not much that can be removed. What do you think? Here were some ideas I had.<br/> - Remove footer attribution (explained above)<br/>- Responsive <br/>- Color Picker on theme-options page','thecorporate'); ?><br>
</p></div>
						<div class="clearboth"></div>
<!-- remove to here -->

<?php } else { ?>
<!-- do nothing -->
<?php } ?>

	<?php endif; ?>
</div>

