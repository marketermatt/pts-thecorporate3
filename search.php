<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */

get_header(); ?>


<div id="columns">
    <div id="left">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Column')) :
            _e('Add a widget in this sidebar.','thecorporate');
        endif; ?>
    </div>
    <div id="content" style="width: 760px;">
	<?php if (have_posts()) : ?>

		<h2 class="pagetitle"><?php _e('Search Results','thecorporate'); ?></h2>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<!-- Date Posted by row -->
		<div id="metadata">
			<?php $get_year = get_the_time('Y'); $get_month = get_the_time('m'); ?>
			<?php _e('Posted','thecorporate');?> <a href="<?php echo get_month_link($get_year, $get_month); ?>"><?php the_time(get_option( 'date_format' )) ?></a> <?php _e('by','thecorporate'); ?> <?php the_author_posts_link(); ?>
					<?php if ( count(($categories=get_the_category())) > 1 || $categories[0]->cat_ID != 1 ) : ?>
						 <?php _e('in','thecorporate'); ?> <?php the_category(', ') ?>
					<?php endif; ?>
			<?php _e('with','thecorporate');?> <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?>
		</div>
			
			<div class="entry">
                <?php if ( has_post_thumbnail() ) // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail('thumbnail');
                the_excerpt(); ?>
		</div>	

		<a class="more-link" href="<?php the_permalink(); ?>"><?php _e('Continue...','thecorporate');?></a>
<br /></div>
		<?php endwhile; ?>

		<!--<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; '.__('Older Entries','thecorporate')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries','thecorporate').' &raquo;') ?></div>
		</div>-->
        <?php if (function_exists('wp_pagenavi')) {
            wp_pagenavi();
        }
        else{
            wp_pagenavi_custom();
        }?>

	<?php else : ?>

		<h2 class="center"><?php _e('No posts found. Try a different search?'.'thecorporate'); ?></h2>
		<h2><?php printf( __( 'Search Results for: %s','thecorporate' ), '<span>' . esc_html( get_search_query() ) . '</span>'); ?></h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>
    <div class="clearfix"></div>
</div>
<!-- <div id="group2"> Group two Widgets go here in the Pro version </div> -->

<?php get_footer(); ?>