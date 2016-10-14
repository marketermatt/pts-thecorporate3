<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php
    if (is_singular() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');

    wp_head();
    ?>
    <?php
    global $options;
    foreach ($options as $value) {
        if (get_option($value['id']) === FALSE) {
            $$value['id'] = $value['std'];
        } else {
            $$value['id'] = get_option($value['id']);
        }
    }
    ?>

    <style type="text/css">
        <!--
        a, a:visited, a:focus, #menu a:hover,
        #menu ul li.current_page_item > a,
        #menu ul li.current-menu-ancestor > a,
        #menu ul li.current-menu-item > a,
        #menu ul li.current-menu-parent > a,
        * html #menu ul li.current_page_item a,
        * html #menu ul li.current-menu-ancestor a,
        * html #menu ul li.current-menu-item a,
        * html #menu ul li.current-menu-parent a,
        * html #menu ul li a:hover {
            color: <?php echo get_option('pts_link_colour') ?>;
        }

        -->
    </style>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">

    <div id="topr">
        <div id="topl">
            <div id="topm"></div>
        </div>
    </div>

    <div id="glowleft">
        <div id="glowright">
            <div id="cwrapper">
                <div id="topwrapper">
                    <div id="logowrapper" class="clearfix">
                        <!-- custom logo function -->
                        <?php if ($pts_logo) { ?>
                            <?php echo "<a href='".home_url()."' alt='Home'>'<div id=\"logo\"><h1><img src=\"$pts_logo\" alt=\"$pts_alt\" /></h1></div></a>"; ?>
                        <?php } else { ?>
                            <div id="defaultlogo">
                                <h1><?php bloginfo('name'); ?></h1>

                                <h2><?php bloginfo('description'); ?></h2>
                            </div>
                        <?php } ?>
                        <!-- end -->
                        <div id="topcaption">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top')) : ?>
                                This top caption area is ideal for helping you provide the user with extra information or perhaps adding a description to each page.
                            <?php endif; ?></div>
                    </div>
                </div>

                <div id="menuwrapper" class="clearfix">
                    <div
                        id="menu"><?php wp_nav_menu(array('container_class' => 'menu-header', 'theme_location' => 'primary')); ?></div>
                </div>
                <div id="showcasewrapper" style="background:<?php echo get_option('pts_showcase_bg') ?>;">
                    <?php if (is_front_page()) { ?>
                        <!-- if front page load showcase 1 here if enabled -->
                        <?php if (get_option('pts_enable_showcase') === "yes") { ?>
                            <?php get_template_part('lib/includes/showcase1', 'index'); ?>

                        <?php } ?>
                    <?php } else { ?>
                        <!-- do nothing -->
                    <?php } ?>
                    <!-- load Showcase 2 for slideshows and full width header media -->
                    <?php get_template_part('lib/includes/showcase2', 'index'); ?>

                </div>
                <div id="bcwrapper" style="background:<?php echo get_option('pts_breadcrumb_bg') ?>;">
                    <?php
                        get_template_part('lib/includes/breadcrumbs', 'index');
                    ?>
                </div>