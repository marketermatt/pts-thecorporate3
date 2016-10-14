<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */

get_header(); ?>

    <div id="columns">
<?php if(is_active_sidebar('left-col')): ?>
        <div id="left">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Column')) : ?><?php endif; ?>
        </div>
    <?php endif; ?>
        <div id="content" <?php if(is_active_sidebar('left-col')): ?> style="width: 360px !important;"<?php endif; ?>>
            <?php if (have_posts()) : ?>

                <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                <?php /* If this is a category archive */
                if (is_category()) { ?>
                    <h2 class="pagetitle"><?php _e('Archive for the','thecorporate'); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','thecorporate'); ?></h2>
                    <?php /* If this is a tag archive */
                } elseif (is_tag()) { ?>
                    <h2 class="pagetitle"><?php _e('Posts Tagged','thecorporate'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
                    <?php /* If this is a daily archive */
                } elseif (is_day()) { ?>
                    <h2 class="pagetitle"><?php _e('Archive for','thecorporate'); ?> <?php the_time(get_option( 'date_format' )); ?></h2>
                    <?php /* If this is a monthly archive */
                } elseif (is_month()) { ?>
                    <h2 class="pagetitle"><?php _e('Archive for','thecorporate'); ?> <?php the_time(get_option( 'date_format' )); ?></h2>
                    <?php /* If this is a yearly archive */
                } elseif (is_year()) { ?>
                    <h2 class="pagetitle"><?php _e('Archive for','thecorporate'); ?> <?php the_time(get_option( 'date_format' )); ?></h2>
                    <?php /* If this is an author archive */
                } elseif (is_author()) { ?>
                    <h2 class="pagetitle"><?php _e('Author Archive','thecorporate'); ?></h2>
                    <?php /* If this is a paged archive */
                } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                    <h2 class="pagetitle"><?php _e('Blog Archives','thecorporate'); ?></h2>
                <?php } ?>

                <?php while (have_posts()) : the_post(); ?>
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark"
                           title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <!-- Date Posted by row -->
                    <div id="metadata">
                        <div>
                            <?php $get_year = get_the_time('Y');
                            $get_month = get_the_time('m'); ?>
                            Posted <a
                                href="<?php echo get_month_link($get_year, $get_month); ?>"><?php the_time(get_option( 'date_format' )) ?></a>
                            by <?php the_author_posts_link(); ?>
                            <?php if (count(($categories = get_the_category())) > 1 || $categories[0]->cat_ID != 1) : ?>
                                in <?php the_category(', ') ?>
                            <?php endif; ?>
                            with <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?>
                        </div>
                    </div>
                    <!-- Post Content -->
                    <div class="entry">
                        <?php if ( has_post_thumbnail() ) // check if the post has a Post Thumbnail assigned to it.
                            the_post_thumbnail('thumbnail');
                        the_excerpt(); ?>
                    </div>


                <?php endwhile; ?>

                <!-- Post navigation -->
                <?php if (function_exists('wp_pagenavi')) {
                    wp_pagenavi();
                }
                else{
                    wp_pagenavi_custom();
                }?>
            <?php
            else :

                if (is_category()) { // If this is a category archive
                    echo "<h2 class='center'>";
                    printf(__('Sorry, but there are no posts in the %s category yet.','thecorporate'), single_cat_title('', false));
                    echo "</h2>";
                } else if (is_date()) { // If this is a date archive
                    echo '<h2>';
                    _e('Sorry, but there are no posts with this date.','thecorporate');
                    echo '</h2>';
                } else if (is_author()) { // If this is a category archive
                    $userdata = get_userdatabylogin(get_query_var('author_name'));
                    echo '<h2 class="center">';
                    printf(__('Sorry, but there are no posts by %s yet.','thecorporate'), $userdata->display_name);
                    echo '</h2>';
                } else {
                    echo '<h2 class="center">';
                    _e('No posts found.', 'thecorporate');
                    echo '</h2>';
                }
                get_search_form();

            endif;
            ?>
        </div>
        <?php if (is_active_sidebar('inset-col')): ?>
            <div id="inset">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Inset Column')) : ?><?php endif; ?>
            </div>
        <?php endif; ?>
        <div id="right" class="<?php echo no_inset_width(); ?>">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Column')) : ?><?php endif; ?>
        </div>
    </div>
<div class="clearfix"></div>

<?php get_footer(); ?>