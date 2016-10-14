<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */
?>

	</div>

	<div id="footerwrapper">
      <div id="footer">
	  <?php wp_nav_menu(array('menu' => 'footermenu', 'sort_column' => 'menu_order', 'depth' => '1')); ?>
	  </div>


      <div id="copyright"><?php echo stripslashes(get_option('pts_copyright')) ?> <?php echo __('Designed by','thecorporate').' <a href="'.wp_get_theme()->get('ThemeURI').'" alt="Pixel Theme Studios">Pixel Theme Studios.</a></div>'; ?>
	</div>

      </div>
  </div>

    <div id="bottomr">
      <div id="bottoml"><div id="bottomm"></div></div>
    </div>

</div>
<?php wp_footer(); ?>
<?php echo stripslashes(get_option('pts_google')) ?>
</body>
</html>