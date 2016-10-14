<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */

get_header(); ?>

    <div id="columns">

        <div id="contentarea">
            <div id="content">

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h1><a href="<?php the_permalink() ?>" rel="bookmark"
                               title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                        <!-- Date Posted by row -->
                        <div class="metadata"><span>
			<?php $get_year = get_the_time('Y'); ?>
                                    <a href="<?php echo get_month_link($get_year, $get_month); ?>"><?php the_time(get_option( 'date_format' )) ?></a> by <?php the_author_posts_link(); ?>
                                <?php if (count(($categories = get_the_category())) > 1 || $categories[0]->cat_ID != 1) : ?>
                                    <?php _e('in', 'thecorporate'); ?> <?php the_category(', ') ?>
                                <?php endif; ?>
                                <?php _e('with', 'thecorporate'); ?> <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span>
                        </div>
                        <!-- Post Content -->
                        <div class="entry clearfix">
                            <?php if ( has_post_thumbnail() ) // check if the post has a Post Thumbnail assigned to it.
                                the_post_thumbnail('thumbnail');
                            the_excerpt(); ?>
                            <!-- uncomment if you want paging for index blog page <br />
<?php // wp_link_pages('before=<div id="page-links">Pages: &after=</div>'); ?>
-->
                        </div>

                        </div>
                    <?php endwhile; ?>

                    <!-- Post navigation -->
                    <?php if (function_exists('wp_pagenavi')) {
                        wp_pagenavi();
                    }
                    else{
                        wp_pagenavi_custom();
                    }?>

                <?php else : ?>
                    <h2 class="center"><?php _e('Not Found', 'thecorporate'); ?></h2>
                    <p class="center"><?php _e('Sorry, but you are looking for something that is not here.', 'thecorporate'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>

                <!-- Comments -->
                <div id="commentswrapper">
                    <?php comments_template(); ?>
                </div>
            </div>
            <?php if (is_active_sidebar('inset-col')): ?>
                <div id="inset">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Inset Column')) : ?><?php endif; ?>
                </div>
            <?php endif; ?>
            <div id="right" class="<?php echo no_inset_width(); ?>">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Column')) : ?>
                    <!-- demo content -->
                    <div class="widget">
                        <h3><?php _e('Welcome To The Corporate 3', 'thecorporate'); ?></h3>
                        <?php _e('Welcome to the Corporate 3 Theme for WordPress which marks a new phase in theme development for me. Corporate 3 moves into a new phase of design and development with cleaner and more professional looking concepts for power bloggers and serious businesses wanting to stand out with the popular WordPress blogging platform and is built for WP 4.0+.', 'thecorporate'); ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>
        <?php get_template_part( 'lib/includes/bottomwidgets', 'index' ); ?>
    </div>





<?php get_footer(); ?>