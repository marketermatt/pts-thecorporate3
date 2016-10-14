<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */
?>

<div id="showcase1" class="clearfix">
	<div id="scleft" style="height:<?php echo get_option('pts_showcase_height') ?>; background:<?php echo get_option('pts_scwidget_bg') ?>;">
	<!-- enable or disable the WP header feature-->
		<?php if (get_option('pts_enable_wpheader') === "yes") { ?>
<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
<?php } ?>
<!-- show showcase widget in left side -->
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Showcase Widget')) : ?><?php endif; ?>
	</div>
	
<!-- This is the left side for the changable header feature -->
<div id="scright" style="height:<?php echo get_option('pts_showcase_height') ?>;">

<!-- This is the right side group of widgets -->
<div class="sc1" style="background:<?php echo get_option('pts_scwidget1_bg') ?>;"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Showcase Widget 1')) : ?><h2><?php _e('Professional Website','thecorporate'); ?></h2><div class="textwidget"><img src="<?php get_template_directory_uri(); ?>/images/scwidget1.jpg" class="scimage"><?php _e('A perfect theme for the success of your online business and positive customer experiences...','thecorporate'); ?><a href="#" class="more-link"><span class="readmore"><?php _e('Continue Reading...','thecorporate'); ?></span></a></div><?php endif; ?></div>

<div class="sc2" style="background:<?php echo get_option('pts_scwidget2_bg') ?>;"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Showcase Widget 2')) : ?><h2><?php _e('Professional Blogging','thecorporate'); ?></h2><div class="textwidget"><img src="<?php get_template_directory_uri(); ?>/images/scwidget2.jpg" class="scimage"><?php _e('Great for professional power bloggers from individuals to corporate businesses...','thecorporate'); ?><a href="#" class="more-link"><span class="readmore"><?php _e('Continue Reading...','thecorporate'); ?></span></a></div><?php endif; ?></div>

<div class="sc3" style="background:<?php echo get_option('pts_scwidget3_bg') ?>;"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Showcase Widget 3')) : ?><h2><?php _e('Professional Style','thecorporate'); ?></h2><div class="textwidget"><img src="<?php get_template_directory_uri(); ?>/images/scwidget3.jpg" class="scimage"><?php _e('For serious businesses wanting a professional and visually outstanding website...','thecorporate'); ?><a href="#" class="more-link"><span class="readmore"><?php _e('Continue Reading...','thecorporate'); ?></span></a></div><?php endif; ?></div>
</div>

</div><!-- end showcase1 wrapper -->