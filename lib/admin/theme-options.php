<?php
// theme options
$themename = "The Corporate";

$options = array(
// set logo group
    array(
        "name" => "<strong>" . __('Add Custom Logo', 'thecorporate') . "</strong>",
        "desc" => __('Upload image to your media library and add the image path here. Default: 402x53 pixels.', 'thecorporate'),
        "id" => "pts_logo",
        "type" => "text",
        "size" => "40",
        "default" => get_template_directory_uri() . "/images/logo.png",
        "std" => get_template_directory_uri() . "/images/logo.png"),

    array(
        "name" => "<strong>" . __('Logo ALT Description', 'thecorporate') . "</strong>",
        "id" => "pts_alt",
        "desc" => __('Add your ALT tag description with seo keywords for your logo.', 'thecorporate'),
        "type" => "text",
        "size" => "40",
        "default" => "Professional WordPress themes",
        "std" => "Professional WordPress themes"),

// set showcase

    array("name" => "<strong>" . __('Enable the Showcase 1 Group', 'thecorporate') . "</strong>",
        "desc" => __('Select enable or disable the Showcase group on the front page.', 'thecorporate'),
        "id" => "pts_enable_showcase",
        "type" => "select",
        "options" => array("yes", "no"),
        "default" => "no"),

    array("name" => "<strong>" . __('Enable the WordPress Header Feature', 'thecorporate') . "</strong>",
        "desc" => __('Select enable or disable the WordPress header image feature.', 'thecorporate'),
        "id" => "pts_enable_wpheader",
        "type" => "select",
        "options" => array("yes", "no"),
        "default" => "no"),

    array(
        "name" => "<strong>" . __('Showcase Full Width Background Colour', 'thecorporate') . "</strong>",
        "id" => "pts_showcase_bg",
        "desc" => __('Using hexadecimal colours like the default: #000000 which is black.', 'thecorporate'),
        "type" => "text",
        "size" => "7",
        "default" => "#000000"),

    array(
        "name" => "<strong>" . __('Left Side Showcase Widget Background Colour', 'thecorporate') . "</strong>",
        "id" => "pts_scwidget_bg",
        "desc" => __('Using hexadecimal colours like the default: #F5F5F5 which is white.', 'thecorporate'),
        "type" => "text",
        "size" => "7",
        "default" => "#F5F5F5"),

    array(
        "name" => "<strong>" . __('Showcase Widget One Background Colour', 'thecorporate') . "</strong>",
        "id" => "pts_scwidget1_bg",
        "desc" => __('Using hexadecimal colours like the default: #DBB27A which is orange.', 'thecorporate'),
        "type" => "text",
        "size" => "7",
        "default" => "#DBB27A"),

    array(
        "name" => "<strong>" . __('Showcase Widget One Background Colour', 'thecorporate') . "</strong>",
        "id" => "pts_scwidget2_bg",
        "desc" => __('Using hexadecimal colours like the default: #E0C9A9 which is beige.', 'thecorporate'),
        "type" => "text",
        "size" => "7",
        "default" => "#E0C9A9"),

    array(
        "name" => "<strong>" . __('Showcase Widget One Background Colour', 'thecorporate') . "</strong>",
        "id" => "pts_scwidget3_bg",
        "desc" => __('Using hexadecimal colours like the default: #E8DCCC which is tan.', 'thecorporate'),
        "type" => "text",
        "size" => "7",
        "default" => "#E8DCCC"),

    array(
        "name" => "<strong>" . __('Showcase Height', 'thecorporate') . "</strong>",
        "id" => "pts_showcase_height",
        "desc" => __('Set your showcase height in pixels for the image and widgets: default 315px', 'thecorporate'),
        "type" => "text",
        "size" => "6",
        "default" => "315px"),

    array(
        "name" => "<strong>" . __('Page Link Colours', 'thecorporate') . "</strong>",
        "id" => "pts_link_colour",
        "desc" => "Using hexadecimal colours like the default: #BA7A30 which is orange.",
        "type" => "text",
        "size" => "7",
        "default" => "#BA7A30"),

    array("name" => "<strong>" . __('Enable Breadcrumbs', 'thecorporate') . "</strong>",
        "desc" => __('Select enable or disable for breadcrumb navigation.', 'thecorporate'),
        "id" => "pts_enable_breadcrumbs",
        "type" => "select",
        "options" => array("yes", "no"),
        "std" => "yes"),

    array(
        "name" => "<strong>" . __('Breadcrumbs Background Colour', 'thecorporate') . "</strong>",
        "id" => "pts_breadcrumb_bg",
        "desc" => __('Using hexadecimal colours like the default: #585D61 which is grey.', 'thecorporate'),
        "type" => "text",
        "size" => "7",
        "default" => "#585D61"),

    array(
        "name" => "<strong>" . __('Copyright', 'thecorporate') . "</strong>",
        "id" => "pts_copyright",
        "desc" => __('Add your own copyright notice here without html.', 'thecorporate'),
        "type" => "text",
        "size" => "60",
        "default" => "Copyright &copy; 2014 Pixel Theme Studio. All rights reserved."),

    array(
        "name" => "<strong>" . __('Google Analytics Code', 'thecorporate') . "</strong>",
        "id" => "pts_google",
        "desc" => __('Add your Google Analytics code here.', 'thecorporate'),
        "type" => "textarea",
        "size" => "60",
        "std" => ""),

);

// Begin functions when saving option changes
function pts_options()
{
    global $options;

    if ('theme_save' == $_REQUEST['action']) {

        foreach ($options as $value) {
            if (!isset($_REQUEST[$value['id']])) {
            } else {
                update_option($value['id'], stripslashes($_REQUEST[$value['id']]));
            }
        }
        if (stristr($_SERVER['REQUEST_URI'], '&saved=true')) {
            $location = $_SERVER['REQUEST_URI'];
        } else {
            $location = $_SERVER['REQUEST_URI'] . "&saved=true";
        }

        header("Location: $location");
        die;

    } else if ('theme_reset' == $_REQUEST['action']) {

        foreach ($options as $value) {
            delete_option($value['id']);
            $location = $_SERVER['REQUEST_URI'] . "&reset=true";
        }

        header("Location: $location");
        die;

    }

    /*
  // delete all options foreach ($options as $default) {
    delete_option($default['id'],$default['default']);
    }
    */

    add_theme_page("Options", "Theme-Options", 'edit_themes', "Theme-Options", 'pts_admin');
}

function pts_admin()
{
    global $options;

    ?>

    <!-- Begin Container for options-->
    <div class="wrap">


    <h2 class="alignleft" style="float: none;"><?php _e('Theme Settings', 'thecorporate'); ?></h2>
    <br/>
    <br/>
    <br clear="all"/>

    <?php
    //Check if settings saved!
    if ($_REQUEST['saved']) {
        ?>
        <div class="updated fade"><p><strong><?php _e('Setting Saved', 'thecorporate'); ?></strong></p></div>
    <?php } ?>
    <div style="width:70%; float: left;">
    <form method="post" id="myForm">
    <!-- begin theme options container -->
    <div class="accordion" id="section1"><?php _e('Logo Settings', 'thecorporate'); ?><span></span></div>
    <div class="container">
        <div class="content">

            <div id="poststuff" class="metabox-holder">
                <div class="stuffbox">

                    <div class="inside">
                        <?php _e('This section lets you use either a text based title using the default WordPress blog title and blog description, or you can choose an image logo.', 'thecorporate'); ?>
                        <table class="form-table" style="width: auto">
                            <?php
                            foreach ($options as $value) {
                                switch ($value['id']) {
                                    case "pts_logo":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>" type="text"
                                                       id="<?php echo $value['id']; ?>"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>

                                        <!-- logo alt -->
                                        <?php break;
                                    case "pts_alt":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>"
                                                       id="<?php echo $value['id']; ?>" type="text"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>

                                        <?php break;
                                }
                            }
                            ?>
                        </table>
                        <input name="theme_save" type="submit" class="button-primary" value="Save changes"/>
                        <input type="hidden" name="action" value="theme_save"/>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="accordion" id="section2"><?php _e('Showcase Settings', 'thecorporate'); ?><span></span></div>
    <div class="container">
        <div class="content">
            <!-- Showcase Group -->
            <div id="poststuff" class="metabox-holder">
                <div class="stuffbox">

                    <div class="inside">
                        <?php _e('This section lets you use the front page showcase group of widgets along with the WordPress built-in Header feature. Keep note that you may need to do some html code for widgets on the right side because I kept this open for anything you want to add in this group, but you do not have to use this option, you can add a slideshow if you want or nothing at all. You will also find some Colour settings below which needs a hex value...at the moment, I do not have a colour function to let you play with various colours but you can use the built-in colour select tool in WordPress by going to <strong>Appearance >> Background</strong> and use the colour selector there (just don\'t click Save there, instead, just copy the value).', 'thecorporate'); ?>
                        <table class="form-table" style="width: auto">
                            <!-- Showcase background colour -->
                            <?php
                            foreach ($options as $value) {
                                switch ($value['id']) {

                                    case "pts_enable_showcase":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <select style="width:60px;" name="<?php echo $value['id']; ?>"
                                                        id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?>
                                                        <option<?php if (get_option($value['id']) == $option) {
                                                            echo ' selected="selected"';
                                                        } elseif ($option == $value['std']) {
                                                            echo ' selected="selected"';
                                                        } ?>><?php echo $option; ?></option><?php } ?></select>
                                            </td>
                                        </tr>

                                        <?php break;
                                    case "pts_enable_wpheader":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <select style="width:60px;" name="<?php echo $value['id']; ?>"
                                                        id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?>
                                                        <option<?php if (get_option($value['id']) == $option) {
                                                            echo ' selected="selected"';
                                                        } elseif ($option == $value['std']) {
                                                            echo ' selected="selected"';
                                                        } ?>><?php echo $option; ?></option><?php } ?></select>
                                            </td>
                                        </tr>

                                        <!-- Showcase container height -->
                                        <?php break;
                                    case "pts_showcase_bg":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>" type="text"
                                                       id="<?php echo $value['id']; ?>"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>
                                        <!-- Showcase Left side background -->
                                        <?php break;
                                    case "pts_scwidget_bg":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>" type="text"
                                                       id="<?php echo $value['id']; ?>"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>

                                        <!-- Showcase Widget 1 background -->
                                        <?php break;
                                    case "pts_scwidget1_bg":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>" type="text"
                                                       id="<?php echo $value['id']; ?>"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>

                                        <!-- Showcase Widget 2 background -->
                                        <?php break;
                                    case "pts_scwidget2_bg":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>" type="text"
                                                       id="<?php echo $value['id']; ?>"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>

                                        <!-- Showcase Widget 3 background -->
                                        <?php break;
                                    case "pts_scwidget3_bg":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>" type="text"
                                                       id="<?php echo $value['id']; ?>"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>

                                        <!-- Showcase container height -->
                                        <?php break;
                                    case "pts_showcase_height":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>"
                                                       id="<?php echo $value['id']; ?>" type="text"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>

                                        <?php break;
                                }


                            }
                            ?>
                        </table>
                        <input name="theme_save" type="submit" class="button-primary" value="Save changes"/>
                        <input type="hidden" name="action" value="theme_save"/>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="accordion" id="section3"><?php _e('Miscellaneous Settings', 'thecorporate'); ?><span></span></div>
    <div class="container">
        <div class="content">
            <!-- begin theme miscellaneous options -->
            <div id="poststuff" class="metabox-holder">
                <div class="stuffbox">

                    <div class="inside">
                        <?php _e('This section lets you set a variety of settings for things like your copyright notice - best to not add html here - Google analytics, and more. You will also find some Colour settings below which needs a hex value...at the moment, I do not have a colour function to let you play with various colours but you can use the built-in colour select tool in WordPress by going to <strong>Appearance >> Background</strong> and use the colour selector there (just don\'t click Save there, instead, just copy the value).', 'thecorporate'); ?>
                        <table class="form-table" style="width: auto">
                            <?php
                            foreach ($options as $value) {
                                switch ($value['id']) {

                                    case "pts_link_colour":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>" type="text"
                                                       id="<?php echo $value['id']; ?>"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>

                                        <?php break;
                                    case "pts_enable_breadcrumbs":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <select style="width:60px;" name="<?php echo $value['id']; ?>"
                                                        id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?>
                                                        <option<?php if (get_option($value['id']) == $option) {
                                                            echo ' selected="selected"';
                                                        } elseif ($option == $value['std']) {
                                                            echo ' selected="selected"';
                                                        } ?>><?php echo $option; ?></option><?php } ?></select>
                                            </td>
                                        </tr>

                                        <?php break;
                                    case "pts_breadcrumb_bg":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>" type="text"
                                                       id="<?php echo $value['id']; ?>"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>

                                        <?php break;
                                    case "pts_copyright":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <input name="<?php echo $value['id']; ?>" type="text"
                                                       id="<?php echo $value['id']; ?>"
                                                       value="<?php get_option($value['id']) ? printf(get_option($value['id'])) : printf($value['default']) ?>"
                                                       size="<?php echo $value['size']; ?>"/>
                                            </td>
                                        </tr>

                                        <!-- logo alt -->
                                        <?php break;
                                    case "pts_google":
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $value['name']; ?>
                                                <br/><?php echo $value['desc']; ?></th>
                                            <td>
                                                <textarea name="<?php echo $value['id']; ?>"
                                                          type="<?php echo $value['type']; ?>" cols="60"
                                                          rows="5"><?php if (get_option($value['id']) != "") {
                                                        echo stripslashes(get_option($value['id']));
                                                    } else {
                                                        echo $value['std'];
                                                    } ?></textarea>
                                            </td>
                                        </tr>

                                        <?php break;
                                }
                            }
                            ?>
                        </table>
                        <input name="theme_save" type="submit" class="button-primary" value="Save changes"/>
                        <input type="hidden" name="action" value="theme_save"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <br/><br/>

    <form method="post">
        <div class="stuffbox" style="padding:3px;">
            <input name="theme_reset" type="submit" class="button-primary" value="Reset"/>
            <input type="hidden" name="action" value="theme_reset"/>
        </div>
    </form>


    </div>

    <div style="width: 25%; min-height: 200px; float: right; margin-top: 10px;">
        <?php echo ptstheme_admin_adverts(); ?>
    </div>

    </div>
    <div style="clear: both;"></div>
    <?php
    if (is_plugin_active('thecorporate/thecorporate.php'))
        get_template_part('lib/includes/shortcodes-demo', 'index');
    ?>
<?php
}

add_action('admin_menu', 'pts_options');

add_action('admin_init', 'corptheme_add_init');
function corptheme_add_init()
{
    $file_dir = get_template_directory_uri();
    wp_enqueue_style("adminstyle", $file_dir . "/lib/admin/css/admin_style.css", false, "1.0", "all");
    wp_enqueue_script("arcordion", $file_dir . "/lib/admin/js/jquery.arcordion.js", array('jquery'), "1.3.1", true);
    wp_enqueue_script("themeoptions ", $file_dir . "/lib/admin/js/themeoptions.js", array('jquery'), "1.0", true);
}

function ptstheme_admin_adverts()
{
    $file_dir = get_template_directory_uri();
    $adv = array();
    $adv[] = array(
        'image' => 'http://pixelthemestudio.ca/wp-content/ads/ad1.jpg',
        'url' => 'http://pixelthemestudio.ca/ads/ad1/'
    );
    $adv[] = array(
        'image' => 'http://pixelthemestudio.ca/wp-content/ads/ad2.jpg',
        'url' => 'http://pixelthemestudio.ca/ads/ad2/'
    );

    $return = '';
    foreach ($adv as $ad) {
        $return .= '<a href="' . $ad['url'] . '" target="_blank"> <img src="' . $ad['image'] . '" class="admin-advert"></a>';
    }

    return $return;
}

?>