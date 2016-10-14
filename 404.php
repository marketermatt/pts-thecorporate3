<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */

get_header(); ?>


<div id="columns">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td id="content">
	<h1 class="center"><?php _e('Error 404 - Not Found','thecorporate'); ?></h1>
	<p><?php  printf(__('If you still run into any issues, you can visit <a href="%1$s">Pixel Theme Studio</a> to let us know. The goal is to provide quality based WordPress Themes whether Free or Commercial and want to make sure everything is working 100% so we can offer the <a href="%2$s">best WordPress Themes</a>!','thecorporate'),wp_get_theme()->get('ThemeURI'),wp_get_theme()->get('ThemeURI')); ?> </p>
	</td>
  </tr>
</table>
</div>


<?php get_footer(); ?>