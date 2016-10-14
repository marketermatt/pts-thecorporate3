<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */

get_header(); ?>




    <div id="columns">
        <div id="content" style="width: 100%;">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="post" id="post-<?php the_ID(); ?>">
                    <h1><?php the_title(); ?></h1>
                    <div class="entry">
                        <?php the_content(); ?>
                        <div class="clearboth"></div>

                    </div>
                    <?php wp_link_pages('before=<div id="page-links">Pages: &after=</div>'); ?>
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