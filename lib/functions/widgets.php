<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage theCorporate 2.0
 */
 
// Check for widgets in widget-ready areas http://wordpress.org/support/topic/190184?replies=7#post-808787
// Thanks to Chaos Kaizer http://blog.kaizeku.com/
  
      function is_sidebar_active( $index = 1){
       $sidebars = wp_get_sidebars_widgets();
       $key  = (string) 'sidebar-'.$index;
       return (isset($sidebars[$key]));
      }
 
// Left Column	
if(function_exists('register_sidebar'))
  register_sidebar(array(
  'name' => 'Left Column', // The sidebar name to register
  'id'   => 'left-col',
  'description'   => 'Left column',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
));
// Inset Column
if(function_exists('register_sidebar'))
  register_sidebar(array(
  'name' => 'Inset Column', // The sidebar name to register
  'id'            => 'inset-col',
  'description'   => 'Inset Column',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>',
));
// Right Column
if(function_exists('register_sidebar'))
  register_sidebar(array(
  'name' => 'Right Column', // The sidebar name to register
  'id' => 'right-col',
  'description'   => 'Right Column',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>',
));
// Top
if(function_exists('register_sidebar'))
  register_sidebar(array(
  'name' => 'Top',
  'description'   => 'Top right corner of your page for caption text or more',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '',
  'after_title' => '',
));
// Showcase Widget
if(function_exists('register_sidebar'))
  register_sidebar(array(
  'name' => 'Showcase Widget',
  'description'   => 'This is the big area to the left side of the widget 1 group if you wish to add something other than a static image.',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '<div><h2>',
  'after_title' => '</h2></div>',
));
// Showcase Widget 1
if(function_exists('register_sidebar'))
  register_sidebar(array(
  'name' => 'Showcase Widget 1',
  'description'   => 'This is the top widget in the right showcase 1 column.',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
));
// Showcase Widget 2
if(function_exists('register_sidebar'))
  register_sidebar(array(
  'name' => 'Showcase Widget 2',
  'description'   => 'This is the middle widget in the right showcase 1 column.',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
));
// Showcase Widget 3
if(function_exists('register_sidebar'))
  register_sidebar(array(
  'name' => 'Showcase Widget 3',
  'description'   => 'This is the bottom widget in the right showcase 1 column.',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
));
// Showcase2 Header
if(function_exists('register_sidebar')) {
  register_sidebar(array(
  'name' => 'Showcase 2',
  'description'   => 'This is a Showcase header for you to use for full width images, media, or even slideshows',
  'before_widget' => '<div id="showcase2">',
  'after_widget' => '</div>',
  'before_title' => '',
  'after_title' => '',
));

// // Special thanks to shibashake.com for this multi-column widget which I modified for this theme
$bottomwidgets_sidebar = register_sidebar(array('name'=>'Bottom Widgets',
  'description'   => 'This puts 1, 2, 3, or 4 widgets side-by-side in the bottom area of your page above the footer and will automatically resize based on how many widgets are published.',
  'before_widget' => '<div class="four">',
  'after_widget' => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>',
));
 
$sidebars_widgets = wp_get_sidebars_widgets();
$num_bottomwidgets_widgets = count($sidebars_widgets[$bottomwidgets_sidebar]);
}
function bottomwidgets_style() {
	global $num_bottomwidgets_widgets;
?>
<style type="text/css">
#bottomwidgets div.four {float: left;padding-left:0px;}
#bottomwidgets div.four {  
	<?php 
		switch ($num_bottomwidgets_widgets) {
		case 1:
			echo "width: 100%;";
			echo "margin:0;";   
			break;
		case 2:
			echo "width: 460px;";
			echo "margin:0 0 0 40px;";   
			break;
		case 3:
			echo "width: 290px;";
			echo "margin:0 0 0 45px;";   
			break;
		default:
			echo "width: 210px;";
			echo "margin:0 0 0 40px;";   
			break;
		}		
	 ?>
}
#bottomwidgets div.four:first-child {margin-left:0;}
</style>
<?php
}
add_action('wp_head', 'bottomwidgets_style');

// Footer
if(function_exists('register_sidebar'))
  register_sidebar(array(
  'name' => 'Footer',
  'description'   => __('Use this for a footer menu or other content','thecorporate'),
  'before_widget' => '<div id="footer"><div class="widget">',
  'after_widget' => '</div></div>',
  'before_title' => '<h4>',
  'after_title' => '</h4>',
));
?>