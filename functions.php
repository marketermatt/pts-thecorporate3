<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */

function thecorporte_enqueue() {
    global $wp_styles;
    wp_enqueue_style( 'themestyle', get_stylesheet_uri() );
    wp_enqueue_style( 'ie', get_template_directory_uri().'/css/ie.css',array('themestyle') );
    $wp_styles->add_data( 'ie', 'conditional', 'IE' );

    wp_enqueue_script( 'customjs', get_stylesheet_directory_uri() . '/custom.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'thecorporte_enqueue' );

// Add a text domain
add_action('init', 'thecorporate_setup');
function thecorporate_setup()
{
    load_theme_textdomain('thecorporate', get_template_directory() . '/languages');
}

// Define Directory Constants
define('PTS_LIB',  get_template_directory() . '/lib');
define('PTS_FUNCTIONS',  get_template_directory() . '/lib/functions');
define('PTS_STYLES',  get_template_directory() . '/lib/styles');
define('PTS_INCLUDES',  get_template_directory() . '/lib/includes');
define('PTS_ADMIN',  get_template_directory() . '/lib/admin');


// Load shortcode plugin install
require_once(PTS_FUNCTIONS . '/prerequisites.php');
// Load Widgets
require_once(PTS_FUNCTIONS . '/widgets.php');
// Load Contact Form
require_once(PTS_FUNCTIONS . '/contact_form.php');
// Load wp-pagenavi
require_once(PTS_INCLUDES . '/wp-pagenavi.php');
// Load Theme Admin interface
require_once(PTS_ADMIN . '/theme-options.php');

add_theme_support( 'automatic-feed-links' );

// Custom page backgrounds for image or solid colours
$args = array(
    'width' => 940,
    'height' => 300,
    'default-image' => '',
    'uploads' => true,
    'header-text' => false,
);
add_theme_support('custom-header', $args);

// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );
	
// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'thecorporate' ),
        'footermenu' => __( 'Footer Menu', 'thecorporate' ),
	) );
// Below is custom read more link for articles
	add_filter( 'the_content_more_link', 'my_more_link', 10, 2 );

function my_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, '<span class="readmore">'.__('Continue Reading...','thecorporate').'</span>', $more_link );
}
// Changes the excerpt ending style
function new_excerpt_more($excerpt) {
	return str_replace('[...]', '...', $excerpt);
}
add_filter('wp_trim_excerpt', 'new_excerpt_more');	


// Make theme available for translation
// Translations can be filed in the /languages/ directory
	// load_theme_textdomain( 'theCorporate', TEMPLATEPATH . '/languages' );

	// $locale = get_locale();
	// $locale_file = TEMPLATEPATH . "/languages/$locale.php";
	// if ( is_readable( $locale_file ) )
		// require_once( $locale_file );

// comments

if ( ! function_exists( 'thecorporate_comment' ) ) :
/**
 * Template for comments and pingbacks.
 * Used as a callback by wp_list_comments() for displaying the comments.
 * Special Thanks to the thecorporate theme for this comments layout
 */
function thecorporate_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">Comments:</span>', 'thecorporate' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'thecorporate' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'thecorporate' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'thecorporate' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'thecorporate' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'thecorporate'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;


add_theme_support('custom-background');

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/promo1.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to thecorporate_header_image_width and thecorporate_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'thecorporate_header_image_width', 610 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'thecorporate_header_image_height', 315 ) );

	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );
	 
	 
// Special thanks to brassblogs.com for their customized text widget which I modified
add_action( 'widgets_init', 'image_and_text' );

function image_and_text() {
register_widget( 'Image_and_Text' ); }

class Image_and_Text extends WP_Widget {

function Image_and_Text() {
$widget_ops = array( 'classname' => 'image_and_text', 'description' => __('This is an alternative to the default text widget and lets you use a title for the backend here but not show a title on the frontend. Easy to add an image for areas that you do not want a title showing.', 'image_and_text') );

$control_ops = array( 'width' => 500, 'height' => 350, 'id_base' => 'easier-widget' );

$this->WP_Widget( 'easier-widget', __('Image and Text', 'easier_text'), $widget_ops, $control_ops );
}

function widget( $args, $instance ) {
global $post;
extract( $args );

$title = apply_filters('widget_title', $instance['title'] );
$title2 = apply_filters('widget_title2', $instance['title2'] );
$image = $instance['image'];
$link = $instance['link'];
$link_text = $instance['link_text'];
$id = $instance['id'];
$text = $instance['text'];

echo $before_widget;
// This is the original widget title field
// if (!empty($link) && empty($image) && empty($link_text)) {
//echo $before_title . '<a style="font-size:1.1em;" href="' . $link . '">';

// if (!empty($title))
// echo $before_title . $title . $after_title;

// echo '</a>' . $after_title;
// } else {
// echo $before_title . $title . $after_title;
// }

// This will put in the title that shows on the frontend
if (!empty($link) && empty($image) && empty($link_text)) {
echo $before_title . '<a href="' . $link . '">';

if (!empty($title2))
echo $title2;

echo '</a>' . $after_title;
} else {
echo $before_title . $title2 . $after_title;
}

if (!empty($image))
$img = '<img src="' . $image . '" alt="' . $link_text . '" />';

if (!empty($link)) {
echo '<a href="' . $link . '">';

if(!empty($image))
echo $img;
else if(!empty($link_text))
echo $link_text;

echo '</a>';
} else if(!empty($image)) {
echo $img;
}

if (!empty($id)) {
$thispost = get_post($id);
$excerpt = $thispost->post_excerpt;
if($excerpt == '') {
$excerpt = get_post_meta($id, 'page_excerpt_value', true);
}
echo '<p>' . $excerpt;
echo '<a class="more-link" href="' . get_permalink($id) . '"><span class="readmore">'.__('Continue Reading...','thecorporate').'</span></a></p>';
}

if (!empty($text)) {
apply_filters( 'widget_text', $instance['text'] );
echo $instance['filter'] ? wpautop($text) : $text;
}

echo $after_widget;
}

function update( $new_instance, $old_instance ) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title'] );
$instance['title2'] = strip_tags($new_instance['title2'] );
$instance['image'] = strip_tags($new_instance['image']);
$instance['link'] = strip_tags($new_instance['link']);
$instance['link_text'] = strip_tags($new_instance['link_text']);
$instance['id'] = strip_tags($new_instance['id']);
//$instance['$text'] = stripslashes($new_instance['text']);
if ( current_user_can('unfiltered_html') )
$instance['text'] = $new_instance['text'];
else
$instance['text'] = wp_filter_post_kses( $new_instance['text'] );
$instance['filter'] = isset($new_instance['filter']);
return $instance;
}

function form( $instance ) {

$defaults = array( 'title' => '',
'title2' => '',
'image' => '' ,
'link' => '',
'link_text' => '',
'id' => '',
'text' => ''
);
$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title for the admin side only', 'thecorporate'); ?></label>
<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
</p>

<p><label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e('Title for the front of your site - leave blank for no title', 'thecorporate'); ?></label>
<input id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" value="<?php echo $instance['title2']; ?>" style="width:100%;" />
</p>

<p><label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Full path to image', 'thecorporate'); ?></label>
<input id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" style="width:100%;" />
</p>

<p><label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e('Full URL to link image or text to:', 'thecorporate'); ?></label>
<input id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" style="width:100%;" />
</p>

<p><label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php _e('ALT text for the image):', 'thecorporate'); ?></label>
<input id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" value="<?php echo $instance['link_text']; ?>" style="width:100%;" />
</p>

<p><label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e('ID of Page or post you would like the excerpt from:', 'thecorporate'); ?></label>
<input id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo $instance['id']; ?>" style="width:100%;" />
</p>

<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e('If not using an excerpt, then enter in text you would like to display. HTML is allowed.', 'thecorporate'); ?></label>
<textarea class="widefat" rows="7" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $instance['text']; ?></textarea>
</p>

<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked($instance['filter']); ?> /> <label for="<<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs.','thecorporate'); ?></label></p>

<?php
}
}
	 
// Start text widget that lets you have a title for the front end or just the backend
add_action( 'widgets_init', 'custom_no_title' );

function custom_no_title() {
register_widget( 'custom_no_title' ); }

class custom_no_title extends WP_Widget {

function custom_no_title() {
$widget_ops = array( 'classname' => 'custom_no_title', 'description' => __('This is an alternative to the default text widget that allows no titles to show on the frontend.', 'thecorporate') );

$control_ops = array( 'width' => 500, 'height' => 350, 'id_base' => 'custom-widget' );

$this->WP_Widget( 'custom-widget', __('Custom Text Without Title', 'thecorporate'), $widget_ops, $control_ops );
}

function widget( $args, $instance ) {
global $post;
extract( $args );

$title = apply_filters('widget_title', $instance['title'] );
$title2 = apply_filters('widget_title2', $instance['title2'] );
$text = $instance['text'];

echo $before_widget;
// This is the original widget title field
// if (!empty($link) && empty($image) && empty($link_text)) {
//echo $before_title . '<a style="font-size:1.1em;" href="' . $link . '">';

// if (!empty($title))
// echo $before_title . $title . $after_title;

// echo '</a>' . $after_title;
// } else {
// echo $before_title . $title . $after_title;
// }

// This will put in the title that shows on the frontend
if (!empty($link) && empty($image) && empty($link_text)) {
echo $before_title . '<a style="font-size:1.1em;" href="' . $link . '">';

if (!empty($title2))
echo $title2;

echo '</a>' . $after_title;
} else {
echo $before_title . $title2 . $after_title;
}

if (!empty($text)) {
apply_filters( 'widget_text', $instance['text'] );
echo $instance['filter'] ? wpautop($text) : $text;
}

echo $after_widget;
}

function update( $new_instance, $old_instance ) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title'] );
$instance['title2'] = strip_tags($new_instance['title2'] );
//$instance['$text'] = stripslashes($new_instance['text']);
if ( current_user_can('unfiltered_html') )
$instance['text'] = $new_instance['text'];
else
$instance['text'] = wp_filter_post_kses( $new_instance['text'] );
$instance['filter'] = isset($new_instance['filter']);
return $instance;
}

function form( $instance ) {

$defaults = array( 'title' => '',
'title2' => '',
'text' => ''
);
$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title for the admin side only', 'thecorporate'); ?></label>
<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
</p>

<p><label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e('Title for the front of your site - leave blank for no title', 'thecorporate'); ?></label>
<input id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" value="<?php echo $instance['title2']; ?>" style="width:100%;" />
</p>

<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e('HTML is allowed here but be gentle.', 'thecorporate'); ?></label>
<textarea class="widefat" rows="7" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $instance['text']; ?></textarea>
</p>

<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked($instance['filter']); ?> /> <label for="<<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs.','thecorporate'); ?></label></p>

<?php
}
}


/// This is for the breadcrumbs without the need of a plugin
function the_breadcrumb() {
    if (!is_home()) {
        echo '<a href="';
        echo home_url();
        echo '">';
        _e('Home','ga');

        echo "</a> ";
        if (is_category() || is_single()) {
            single_cat_title();
            if (is_single()) {
                echo " | ";
                the_title();
            }
        } elseif (is_page()) {
            echo " | ";
            the_title();
        }
    }
}

function no_inset_width()
{
    if(!is_active_sidebar('inset-col')){
        return 'no-inset';
    }
    else{
       return 'no';
    }
}

//hides the personal options
function hide_personal_options(){
    echo "\n" . '<script type="text/javascript">jQuery(document).ready(function($) {
$(\'form#your-profile > h3:first\').hide();
$(\'form#your-profile > table:first\').hide();
$(\'form#your-profile\').show();

$(\'label[for=url], input#url\').hide();
});

</script>' . "\n";
}
add_action('admin_head','hide_personal_options');


if (!isset($content_width)) $content_width = 560;

function my_theme_add_editor_styles()
{
    add_editor_style(get_stylesheet_directory_uri() . '/editor.css');
}



function change_excerpt($content) {
    $newHTML = '...<br/><br/><a href="'.get_permalink().'" class="more-link"><span class="readmore">'.__('Continue Reading...','thecorporate').'</span></a>';
    $content = substr_replace($content,$newHTML,-15);
    $content = strip_tags($content,'<p><br><a><span>'); // remove HTML
    return $content;
}
add_filter('the_excerpt','change_excerpt');
?>