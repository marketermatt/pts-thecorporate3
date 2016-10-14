<?php
/**
 * Template Name: Main + Left Column
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */

get_header(); ?>

    <div id="columns">
            <div id="left">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Column')) : ?>
                    <?php _e('Add a widget in this sidebar.','thecorporate'); ?>
                <?php endif; ?>
            </div>
        <div id="content" style="width: 760px;">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="post" id="post-<?php the_ID(); ?>">
                    <h1><?php the_title(); ?></h1>

                    <div class="entry">
                        <?php the_content(); ?>
                        <div class="clearboth"></div>

                    </div>
                    <?php wp_link_pages('before=<div id="page-links">'.__('Pages:','thecorporate').' &after=</div>'); ?>
                </div>
            <?php endwhile; endif; ?>
            <!-- Comments -->
            <div id="commentswrapper">
                <?php comments_template(); ?>
            </div>
        </div>
        <?php get_template_part( 'lib/includes/bottomwidgets', 'index' ); ?>
    </div>

<?php get_footer(); ?>