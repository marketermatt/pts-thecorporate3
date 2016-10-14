<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */

get_header();

$main_content_width = 960;

if (is_active_sidebar('left-col'))
    $main_content_width = $main_content_width - 200;

if (is_active_sidebar('inset-col'))
    $main_content_width = $main_content_width - 200;

if (is_active_sidebar('right-col'))
    $main_content_width = $main_content_width - 200;
?>



    <div id="columns">

        <?php if (is_active_sidebar('left-col')): ?>
            <div id="left">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Column')) : ?><?php endif; ?>
            </div>
        <?php endif; ?>
        <div id="content" style="width: <?php echo $main_content_width; ?>px;">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1><a href="<?php the_permalink() ?>" rel="bookmark"
                       title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <!-- Date Posted by row -->
                <div class="metadata"><span>
			<?php $get_year = get_the_time('Y');
            $get_month = get_the_time('m'); ?>
                        <?php _e('Posted', 'thecorporate'); ?> <a
                            href="<?php echo get_month_link($get_year, $get_month); ?>"><?php the_time(get_option( 'date_format' )) ?></a> by <?php the_author_posts_link(); ?>
                        <?php if (count(($categories = get_the_category())) > 1 || $categories[0]->cat_ID != 1) : ?>
                            <?php _e('in', 'thecorporate'); ?> <?php the_category(', ') ?>
                        <?php endif; ?>
                        <?php _e('with', 'thecorporate'); ?> <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span>
                </div>
                <!-- Post Content -->
                <div class="entry">
                    <?php the_post_thumbnail('full'); ?>
                    <?php the_content(); ?>
                </div>
                <!-- multi pages -->
                <?php wp_link_pages('before=<div id="page-links">' . __('Pages', 'thecorporate') . ': &after=</div>'); ?>

                <div class="meta">
		<span class="tags">
		<?php the_tags('<strong>' . __('Tags', 'thecorporate') . '</strong>: <em>', '</em>, <em>', '</em>'); ?>
		</span>
                    <?php if (count(($categories = get_the_category())) > 1 || $categories[0]->cat_ID != 1) : ?>
                        <strong><?php _e('Categories:', 'thecorporate'); ?></strong>
                        <?php the_category(', ') ?>
                    <?php endif; ?>
                    <?php edit_post_link('Edit', '&nbsp;&nbsp;(&nbsp;&nbsp;', '&nbsp;&nbsp;)&nbsp;&nbsp;'); ?>
                    <br/><span><strong><?php _e('Trackback URL for this post:', 'thecorporate'); ?></strong><span
                            class="trackback"> <?php trackback_url(); ?></span></span>
                </div>

                <div id="comments">
                    <?php comments_template(); ?>
                </div>
            <?php endwhile;
            else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'thecorporate'); ?></p>
            <?php endif; ?>
        </div>
        <?php if (is_active_sidebar('inset-col')): ?>
            <div id="inset">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Inset Column')) : ?><?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if (is_active_sidebar('right-col')): ?>
            <div id="right">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Column')) : ?>
                    <!-- demo content -->
                    <div class="widget">
                        <h3><?php _e('Welcome To The Corporate 3', 'thecorporate'); ?></h3>
                        <?php _e('Welcome to the Corporate 3 Theme for WordPress which marks a new phase in theme development for me. Corporate 3 moves into a new phase of design and development with cleaner and more professional looking concepts for power bloggers and serious businesses wanting to stand out with the popular WordPress blogging platform and is built for WP 4.0+.', 'thecorporate'); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php get_template_part( 'lib/includes/bottomwidgets', 'index' ); ?>
    </div>


<?php get_footer(); ?>