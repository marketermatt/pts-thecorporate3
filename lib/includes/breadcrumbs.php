<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */
?>

<div id="breadcrumbs">
    <?php if (get_option('pts_enable_breadcrumbs') === "yes") { ?>
        <?php if (is_front_page()) {

        } else {
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb();
            } else {

                the_breadcrumb();

            }
        } ?>

        <?php // To add breadcrumbs to frontpage, delete the above php and uncomment the first two slashes below
// <?php the_breadcrumb();
        ?>
    <?php } ?>
</div>



