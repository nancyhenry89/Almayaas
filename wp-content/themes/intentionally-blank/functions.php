<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}
//main section
add_action('init', 'main_register');

function main_register() {

	$labels = array(
		'name' => _x('Main', 'post type general name'),
		'singular_name' => _x('main Item', 'post type singular name'),
		'add_new' => _x('Add New', 'main item'),
		'add_new_item' => __('Add New main Item'),
		'edit_item' => __('Edit main Item'),
		'new_item' => __('New main Item'),
		'view_item' => __('View main Item'),
		'search_items' => __('Search main'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title')
	  ); 

	register_post_type( 'main' , $args );
}	
add_action("admin_init", "admin_init");

function admin_init(){
  add_meta_box("credits_meta", "Numbers", "credits_meta", "main", "normal", "low");
}




function credits_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $slide1= $custom["slide1"][0];
  $slide2= $custom["slide2"][0];
  $slide3= $custom["slide3"][0];

  $slide1ar= $custom["slide1ar"][0];
  $slide2ar= $custom["slide2ar"][0];
  $slide3ar= $custom["slide3ar"][0];


  $about1= $custom["about1"][0];
  $about2= $custom["about2"][0];
  $about3= $custom["about3"][0];


  $about1ar= $custom["about1ar"][0];
  $about2ar= $custom["about2ar"][0];
  $about3ar= $custom["about3ar"][0];

  $servicesBanner= $custom["servicesBanner"][0];
  $brandsBanner= $custom["brandsBanner"][0];
  $careersBanner= $custom["careersBanner"][0];

  $servicesBannerar= $custom["servicesBannerar"][0];
  $brandsBannerar= $custom["brandsBannerar"][0];
  $careersBannerar= $custom["careersBannerar"][0];

  $profile= $custom["profile"][0];



  ?>

    <p>


    <p><label>Slider image 1</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "slide1" id = "podcast_file" size = "70" value = "<?php echo $slide1; ?>" />
<input id = "upload_image_button" type = "button" value = "Upload">
</td> </tr> </table> 
<p><label>Slider image 2</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "slide2" id = "podcast_file" size = "70" value = "<?php echo $slide2; ?>" />
<input id = "upload_image_button2" type = "button" value = "Upload">
</td> </tr> </table> 
<p><label>Slider image 3</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "slide3" id = "podcast_file" size = "70" value = "<?php echo $slide3; ?>" />
<input id = "upload_image_button3" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />



<p><label>Slider image 1 Arabic</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "slide1ar" id = "podcast_file" size = "70" value = "<?php echo $slide1ar; ?>" />
<input id = "upload_image_button_ar" type = "button" value = "Upload">
</td> </tr> </table> 
<p><label>Slider image 2 Arabic</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "slide2ar" id = "podcast_file" size = "70" value = "<?php echo $slide2ar; ?>" />
<input id = "upload_image_button2_ar" type = "button" value = "Upload">
</td> </tr> </table> 
<p><label>Slider image 3 Arabic</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "slide3ar" id = "podcast_file" size = "70" value = "<?php echo $slide3ar; ?>" />
<input id = "upload_image_button3_ar" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />



<?php//about start?>

<p><label>About image 1</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "about1" id = "podcast_file" size = "70" value = "<?php echo $about1; ?>" />
<input id = "aupload_image_button" type = "button" value = "Upload">
</td> </tr> </table> 
<p><label>About image 2</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "about2" id = "podcast_file" size = "70" value = "<?php echo $about2; ?>" />
<input id = "aupload_image_button2" type = "button" value = "Upload">
</td> </tr> </table> 
<p><label>About image 3</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "about3" id = "podcast_file" size = "70" value = "<?php echo $about3; ?>" />
<input id = "aupload_image_button3" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />



<p><label>About image 1 Arabic</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "about1ar" id = "podcast_file" size = "70" value = "<?php echo $about1ar; ?>" />
<input id = "aupload_image_button_ar" type = "button" value = "Upload">
</td> </tr> </table> 
<p><label>About image 2 Arabic</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "about2ar" id = "podcast_file" size = "70" value = "<?php echo $about2ar; ?>" />
<input id = "aupload_image_button2_ar" type = "button" value = "Upload">
</td> </tr> </table> 
<p><label>About image 3 Arabic</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "about3ar" id = "podcast_file" size = "70" value = "<?php echo $about3ar; ?>" />
<input id = "aupload_image_button3_ar" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<?php//about end?>






<p><label>Services Banner</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "servicesBanner" id = "podcast_file" size = "70" value = "<?php echo $servicesBanner; ?>" />
<input id = "upload_image_button4" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />


<p><label>Brands Banner</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brandsBanner" id = "podcast_file" size = "70" value = "<?php echo $brandsBanner; ?>" />
<input id = "upload_image_button5" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />


<p><label>Careers Banner</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "careersBanner" id = "podcast_file" size = "70" value = "<?php echo $careersBanner; ?>" />
<input id = "upload_image_button6" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />





<p><label>Services Banner Arabic</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "servicesBannerar" id = "podcast_file" size = "70" value = "<?php echo $servicesBannerar; ?>" />
<input id = "upload_image_button4ar" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />


<p><label>Brands Banner Arabic</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brandsBannerar" id = "podcast_file" size = "70" value = "<?php echo $brandsBannerar; ?>" />
<input id = "upload_image_button5ar" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />


<p><label>Careers Banner Arabic</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "careersBannerar" id = "podcast_file" size = "70" value = "<?php echo $careersBannerar; ?>" />
<input id = "upload_image_button6ar" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />




<p><label>Company Profile</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "profile" id = "podcast_file" size = "70" value = "<?php echo $profile; ?>" />
<input id = "upload_image_button7" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />

  <script type = "text/javascript">


// Uploading files
jQuery("#upload_image_button").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button2").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button3").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button_ar").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button2_ar").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button3_ar").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});

jQuery("#aupload_image_button").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#aupload_image_button2").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#aupload_image_button3").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#aupload_image_button_ar").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#aupload_image_button2_ar").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#aupload_image_button3_ar").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});

jQuery("#upload_image_button4").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button5").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button6").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button7").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button4ar").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button5ar").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button6ar").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});


</script>
  <?php
}
add_action('save_post', 'save_details');
function save_details(){
	global $post;

  update_post_meta($post->ID, "slide1", $_POST["slide1"]);
  update_post_meta($post->ID, "slide2", $_POST["slide2"]);
  update_post_meta($post->ID, "slide3", $_POST["slide3"]);
  update_post_meta($post->ID, "slide1ar", $_POST["slide1ar"]);
  update_post_meta($post->ID, "slide2ar", $_POST["slide2ar"]);
  update_post_meta($post->ID, "slide3ar", $_POST["slide3ar"]);

  update_post_meta($post->ID, "about1", $_POST["about1"]);
  update_post_meta($post->ID, "about2", $_POST["about2"]);
  update_post_meta($post->ID, "about3", $_POST["about3"]);
  update_post_meta($post->ID, "about1ar", $_POST["about1ar"]);
  update_post_meta($post->ID, "about2ar", $_POST["about2ar"]);
  update_post_meta($post->ID, "about3ar", $_POST["about3ar"]);

  update_post_meta($post->ID, "servicesBanner", $_POST["servicesBanner"]);
  update_post_meta($post->ID, "brandsBanner", $_POST["brandsBanner"]);
  update_post_meta($post->ID, "careersBanner", $_POST["careersBanner"]);
  update_post_meta($post->ID, "servicesBannerar", $_POST["servicesBannerar"]);
  update_post_meta($post->ID, "brandsBannerar", $_POST["brandsBannerar"]);
  update_post_meta($post->ID, "careersBannerar", $_POST["careersBannerar"]);

  update_post_meta($post->ID, "profile", $_POST["profile"]);


  }


  add_action("manage_posts_custom_column",  "main_custom_columns");
add_filter("manage_edit-main_columns", "main_edit_columns");

function main_edit_columns($columns){
  $columns = array(
    "cb" => "<input  />",
    "title" => "Main Title",
    "description" => "Description",


  );

  return $columns;
}
function main_custom_columns($column){
  global $post;
  switch ($column) {
    case "description":
    echo $custom["roi"][0];
      break;
    case "roi":
      $custom = get_post_custom();
      echo $custom["roi"][0];
      break;
    case "skills":
      echo get_the_term_list($post->ID, 'Skills', '', ', ','');
      break;
  }

}



//brands section
add_action('init', 'brands_register');

//Add Metabox

//this is to enable media upload
add_action('add_meta_boxes', 'add_upload_file_metaboxes');
function my_admin_load_styles_and_scripts() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'my_admin_load_styles_and_scripts' );
////////


function brands_register() {

	$labels = array(
		'name' => _x('Brands', 'post type general name'),
		'singular_name' => _x('brands Item', 'post type singular name'),
		'add_new' => _x('Add New', 'main item'),
		'add_new_item' => __('Add New main Item'),
		'edit_item' => __('Edit main Item'),
		'new_item' => __('New main Item'),
		'view_item' => __('View main Item'),
		'search_items' => __('Search main'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor')
	  ); 

	register_post_type( 'brands' , $args );
}	
add_action("admin_init", "admin_init_brands");

function admin_init_brands(){
  add_meta_box("credits_meta_brands", "brands", "credits_meta_brands", "brands", "normal", "low");
}

function add_upload_file_metaboxes() {
    add_meta_box('swp_file_upload', 'File Upload', 'swp_file_upload', 'podcasts', 'normal', 'default');
}


function swp_file_upload() {
  // global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="podcastmeta_noncename" id="podcastmeta_noncename" value="'.
    wp_create_nonce(plugin_basename(__FILE__)).
    '" />';
    global $wpdb;
    $strFile = get_post_meta($post -> ID, $key = 'podcast_file', true);
    $media_file = get_post_meta($post -> ID, $key = '_wp_attached_file', true);
    if (!empty($media_file)) {
        $strFile = $media_file;
    } ?>

          <?php
    function admin_scripts() {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }

    function admin_styles() {
        wp_enqueue_style('thickbox');
    }
    add_action('admin_print_scripts', 'admin_scripts');
    add_action('admin_print_styles', 'admin_styles');
}




function credits_meta_brands() {
  global $post;
  $custom = get_post_custom($post->ID);
  $brandName = $custom["brandName"][0];
  $brandText = $custom["brandText"][0];
  $brandTextar = $custom["brandTextar"][0];

  $web = $custom["web"][0];
  $instaLink = $custom["instaLink"][0];
  $brandOrder=$custom["brandOrder"][0];

  $logo = $custom["logo"][0];
  $logoc = $custom["logoc"][0];
  $background = $custom["background"][0];

?>
<p><label>Brand Name</label><br />
  <input type="text" name="brandName" value=<?php echo $brandName; ?>></p>
  <p><label>Brand order</label><br />
  <input type="text" name="brandOrder" value=<?php echo $brandOrder; ?>></p>
  <p><label>brand Description</label><br />
  <textarea type="text" name="brandText"><?php echo $brandText; ?></textarea></p>
  <p><label>brand Arabic Description</label><br />
  <textarea type="text" name="brandTextar"><?php echo $brandTextar; ?></textarea></p>
  <p><label>web</label><br />
  <textarea name="web"><?php echo $web; ?></textarea></p>
  <p><label>instaLink</label><br />
  <textarea type="text" name="instaLink"><?php echo $instaLink; ?></textarea></p>
  <div>

<h3>Logo</h3>
<table>
<tr valign = "top">
<td>
<input type = "text"
name = "logo"
id = "podcast_file"
size = "70"
value = "<?php echo $logo; ?>" />
<input id = "upload_image_button"
type = "button"
value = "Upload">
</td> </tr> </table> <input type = "hidden"
name = "img_txt_id"
id = "img_txt_id"
value = "" />
</div> 

<h3>Logo Colored</h3>
<table>
<tr valign = "top">
<td>
<input type = "text"
name = "logoc"
id = "podcast_file"
size = "70"
value = "<?php echo $logoc; ?>" />
<input id = "upload_image_button3"
type = "button"
value = "Upload">
</td> </tr> </table> <input type = "hidden"
name = "img_txt_id"
id = "img_txt_id"
value = "" />
</div> 

<h3>Background</h3>

<table>
<tr valign = "top">
<td>
<input type = "text"
name = "background"
id = "podcast_file_mobile"
size = "70"
value = "<?php echo $background; ?>" />
<input id = "upload_image_button2"
type = "button"
value = "Upload">
</td> </tr> </table> <input type = "hidden"
name = "img_txt_id"
id = "img_txt_id"
value = "" />
</div>  
<script type = "text/javascript">


jQuery("#upload_image_button").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())})
jQuery("#upload_image_button2").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button3").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
 
 </script>
  <?php
}


add_action('save_post', 'save_details_brands','save_podcasts_meta');
function save_details_brands(){
  global $post;
  update_post_meta($post->ID, "brandOrder", $_POST["brandOrder"]);

    update_post_meta($post->ID, "brandName", $_POST["brandName"]);
  update_post_meta($post->ID, "brandText", $_POST["brandText"]);
  update_post_meta($post->ID, "brandTextar", $_POST["brandTextar"]);

	update_post_meta($post->ID, "web", $_POST["web"]);
    update_post_meta($post->ID, "instaLink", $_POST["instaLink"]);
    update_post_meta($post->ID, "logo", $_POST["logo"]);
    update_post_meta($post->ID, "logoc", $_POST["logoc"]);

    update_post_meta($post->ID, "background", $_POST["background"]);

    

}


    add_action("manage_posts_custom_column",  "brands_custom_columns");
    add_filter("manage_edit-brands_columns", "brands_edit_columns");

function brands_edit_columns($columns){
  $columns = array(
    "cb" => "<input  />",
    "title" => "brandsTitle",
    "description" => "Description",


  );

  return $columns;
}
function brands_custom_columns($column){
  global $post;
  switch ($column) {
    case "description":
    echo $custom["text"][0];
      break;

  }

}







//Our Story
add_action('init', 'story_register');

//Add Metabox




function story_register() {
  add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'your post type';
    remove_post_type_support( $post_type, 'editor');
}
	$labels = array(
		'name' => _x('story', 'post type general name'),
		'singular_name' => _x('story Item', 'post type singular name'),
		'add_new' => _x('Add New', 'main item'),
		'add_new_item' => __('Add New main Item'),
		'edit_item' => __('Edit main Item'),
		'new_item' => __('New main Item'),
		'view_item' => __('View main Item'),
		'search_items' => __('Search main'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor')
	  ); 

	register_post_type( 'story' , $args );
}	
add_action("admin_init", "admin_init_story");

function admin_init_story(){
  add_meta_box("credits_meta_story", "story", "credits_meta_story", "story", "normal", "low");
}




function credits_meta_story() {
  global $post;
  $custom = get_post_custom($post->ID);
  $blueBox = $custom["blueBox"][0];
  $blueBoxAR = $custom["blueBoxAR"][0];
  $coImg = $custom["coImg"][0];
  $valImg = $custom["valImg"][0];
  $teamImg = $custom["teamImg"][0];
  $capImg = $custom["capImg"][0];

  ?>
  <p><label>Blue Box</label><br />
<textarea rows="8" cols="50" type="text" name="blueBox"> <?php echo $blueBox; ?></textarea></p>
<p><label>Blue Box Arabic</label><br />
<textarea rows="8" cols="50" type="text" name="blueBoxAR"> <?php echo $blueBoxAR; ?></textarea></p>
<h3>Co Founder Image</h3>
<table><tr valign = "top"><td><input type = "text" name = "coImg" id = "podcast_file" size = "70"value = "<?php echo $coImg; ?>" />
<input id = "upload_image_button"type = "button"value = "Upload"></td> </tr> </table> <input type = "hidden" name = "img_txt_id" id = "img_txt_id"value = "" />  
<p><h1>Our Story</h1>
  <?php
  $content = get_post_meta($post->ID, 'story_text_box' , true ) ;
  wp_editor( htmlspecialchars_decode($content), 'story_text_box', array("media_buttons" => false) );
  ?>
    <p><h1>Our Story Arabic</h1>
  <?php
  $contentar = get_post_meta($post->ID, 'story_text_box_ar' , true ) ;
  wp_editor( htmlspecialchars_decode($contentar), 'story_text_box_ar', array("media_buttons" => false) );
  ?>
  <p><h1>About</h1>
  <?php
  $content1 = get_post_meta($post->ID, 'about_text_box' , true ) ;
  wp_editor( htmlspecialchars_decode($content1), 'about_text_box', array("media_buttons" => false) );
  ?>
    <p><h1>About Arabic</h1>
  <?php
  $content1ar = get_post_meta($post->ID, 'about_text_box_ar' , true ) ;
  wp_editor( htmlspecialchars_decode($content1ar), 'about_text_box_ar', array("media_buttons" => false) );
  ?>
  <p><h1>Our Values</h1>
  <?php
  $content2 = get_post_meta($post->ID, 'values_text_box' , true ) ;
  wp_editor( htmlspecialchars_decode($content2), 'values_text_box', array("media_buttons" => false) );
  ?>
    <p><h1>Our Values Arabic</h1>
  <?php
  $content2ar = get_post_meta($post->ID, 'values_text_box_ar' , true ) ;
  wp_editor( htmlspecialchars_decode($content2ar), 'values_text_box_ar', array("media_buttons" => false) );
  ?>
  <p><h1>Capabilities</h1>
  <?php
  $content3 = get_post_meta($post->ID, 'cap_text_box' , true ) ;
  wp_editor( htmlspecialchars_decode($content3), 'cap_text_box', array("media_buttons" => false) );
  ?>
    <p><h1>Capabilities Arabic</h1>
  <?php
  $content3ar = get_post_meta($post->ID, 'cap_text_box_ar' , true ) ;
  wp_editor( htmlspecialchars_decode($content3ar), 'cap_text_box_ar', array("media_buttons" => false) );
  ?>
  <p><h1>Our Team</h1>
  <?php
  $content4 = get_post_meta($post->ID, 'team_text_box' , true ) ;
  wp_editor( htmlspecialchars_decode($content4), 'team_text_box', array("media_buttons" => false) );
?>
  <p><h1>Our Team Arabic</h1>
  <?php
  $content4ar = get_post_meta($post->ID, 'team_text_box_ar' , true ) ;
  wp_editor( htmlspecialchars_decode($content4ar), 'team_text_box_ar', array("media_buttons" => false) );
?>
<h3>Our Values Image</h3>
<table><tr valign = "top"><td><input type = "text" name = "valImg" id = "podcast_file" size = "70"value = "<?php echo $valImg; ?>" />
<input id = "upload_image_button1"type = "button"value = "Upload"></td> </tr> </table> <input type = "hidden" name = "img_txt_id" id = "img_txt_id"value = "" />  

<h3>Our Team Image</h3>
<table><tr valign = "top"><td><input type = "text" name = "teamImg" id = "podcast_file" size = "70"value = "<?php echo $teamImg; ?>" />
<input id = "upload_image_button2"type = "button"value = "Upload"></td> </tr> </table> <input type = "hidden" name = "img_txt_id" id = "img_txt_id"value = "" />  

<h3>Capabilities Image</h3>
<table><tr valign = "top"><td><input type = "text" name = "capImg" id = "podcast_file" size = "70"value = "<?php echo $capImg; ?>" />
<input id = "upload_image_button3"type = "button"value = "Upload"></td> </tr> </table> <input type = "hidden" name = "img_txt_id" id = "img_txt_id"value = "" />  

<script type = "text/javascript">

jQuery("#upload_image_button").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button1").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button2").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button3").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});


    </script>
  <?php
}


add_action('save_post', 'save_details_story','save_podcasts_meta');
function save_details_story(){
	global $post;
    update_post_meta($post->ID, "blueBox", $_POST["blueBox"]);
    update_post_meta($post->ID, "blueBoxAR", $_POST["blueBoxAR"]);

    update_post_meta($post->ID, "coImg", $_POST["coImg"]);
    update_post_meta($post->ID, "valImg", $_POST["valImg"]);
    update_post_meta($post->ID, "teamImg", $_POST["teamImg"]);
    update_post_meta($post->ID, "capImg", $_POST["capImg"]);

	  update_post_meta($post->ID, "sectionLabel", $_POST["sectionLabel"]);
	  update_post_meta($post->ID, "text", $_POST["text"]);
    update_post_meta($post->ID, "linkText", $_POST["linkText"]);
    update_post_meta($post->ID, "link", $_POST["link"]);
    update_post_meta($post->ID, "podcast_file_mobile", $_POST["podcast_file_mobile"]);
    $storyText=htmlspecialchars($_POST['story_text_box']);
    update_post_meta($post->ID, 'story_text_box', $storyText );
    $storyText=htmlspecialchars($_POST['story_text_box_ar']);
    update_post_meta($post->ID, 'story_text_box_ar', $storyText );
    $aboutText=htmlspecialchars($_POST['about_text_box']);
    update_post_meta($post->ID, 'about_text_box', $aboutText );
    $aboutText=htmlspecialchars($_POST['about_text_box_ar']);
    update_post_meta($post->ID, 'about_text_box_ar', $aboutText );
    $valuesText=htmlspecialchars($_POST['values_text_box']);
    update_post_meta($post->ID, 'values_text_box', $valuesText );
    $valuesText=htmlspecialchars($_POST['values_text_box_ar']);
    update_post_meta($post->ID, 'values_text_box_ar', $valuesText );

    
    $capText=htmlspecialchars($_POST['cap_text_box']);
    update_post_meta($post->ID, 'cap_text_box', $capText );
        
    $capText=htmlspecialchars($_POST['cap_text_box_ar']);
    update_post_meta($post->ID, 'cap_text_box_ar', $capText );
    $teamText=htmlspecialchars($_POST['team_text_box']);
    update_post_meta($post->ID, 'team_text_box', $teamText );
    $teamText=htmlspecialchars($_POST['team_text_box_ar']);
    update_post_meta($post->ID, 'team_text_box_ar', $teamText );
    

}
    add_action("manage_posts_custom_column",  "story_custom_columns");
    add_filter("manage_edit-story_columns", "story_edit_columns");

function story_edit_columns($columns){
  $columns = array(
    "cb" => "<input  />",
    "title" => "story Title",
    "description" => "Description",


  );

  return $columns;
}
function story_custom_columns($column){
  global $post;
  switch ($column) {
    case "description":
   echo $custom["text"][0];
      break;

  }

}


//home end









//careers section
add_action('init', 'careers_register');

//Add Metabox


function careers_register() {

	$labels = array(
		'name' => _x('Careers', 'post type general name'),
		'singular_name' => _x('careers Item', 'post type singular name'),
		'add_new' => _x('Add New', 'main item'),
		'add_new_item' => __('Add New main Item'),
		'edit_item' => __('Edit main Item'),
		'new_item' => __('New main Item'),
		'view_item' => __('View main Item'),
		'search_items' => __('Search main'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title')
	  ); 

	register_post_type( 'careers' , $args );
}	
add_action("admin_init", "admin_init_careers");

function admin_init_careers(){
  add_meta_box("credits_meta_careers", "careers", "credits_meta_careers", "careers", "normal", "low");
}


function credits_meta_careers() {
  global $post;
  $custom = get_post_custom($post->ID);
  $title = $custom["title"][0];
  $desc= $custom["desc"][0];
  $titlear = $custom["titlear"][0];
  $descar= $custom["descar"][0];

?>
<p><label>Job Title</label><br />
  <input type="text" name="title" value=<?php echo $title; ?>></p>
  <p><label>Job Description</label><br />
  <textarea type="text" name="desc"><?php echo $desc; ?></textarea></p>
  <p><label>Job Title Arabic</label><br />
  <textarea name="titlear"><?php echo $titlear; ?></textarea></p>
  <p><label>Job Description Arabic</label><br />
  <textarea type="text" name="descar"><?php echo $descar; ?></textarea></p>


  
  <?php
}


  add_action('save_post', 'save_details_careers','save_podcasts_meta','wo_save_postdata');
  function save_details_careers(){
    global $post;
      update_post_meta($post->ID, "title", $_POST["title"]);
    update_post_meta($post->ID, "desc", $_POST["desc"]);
    update_post_meta($post->ID, "titlear", $_POST["titlear"]);
      update_post_meta($post->ID, "descar", $_POST["descar"]);

  
    }


    add_action("manage_posts_custom_column",  "careers_custom_columns");
    add_filter("manage_edit-careers_columns", "careers_edit_columns");

function careers_edit_columns($columns){
  $columns = array(
    "cb" => "<input  />",
    "title" => "careers Title",
    "description" => "Description",


  );

  return $columns;
}
function aboutUS_custom_columns($column){
  global $post;
  switch ($column) {
    case "description":
    echo $custom["text"][0];
      break;

  }

}


//careers end








//services section
add_action('init', 'services_register');

//Add Metabox




function services_register() {

	$labels = array(
		'name' => _x('Services', 'post type general name'),
		'singular_name' => _x('services Item', 'post type singular name'),
		'add_new' => _x('Add New', 'main item'),
		'add_new_item' => __('Add New main Item'),
		'edit_item' => __('Edit main Item'),
		'new_item' => __('New main Item'),
		'view_item' => __('View main Item'),
		'search_items' => __('Search main'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title')
	  ); 

	register_post_type( 'services' , $args );
}	
add_action("admin_init", "admin_init_services");

function admin_init_services(){
  add_meta_box("credits_meta_services", "services", "credits_meta_services", "services", "normal", "low");
}


function credits_meta_services() {
  global $post;
  $custom = get_post_custom($post->ID);

  $service1 = $custom["service1"][0];
  $service2 = $custom["service2"][0];
  $service3 = $custom["service3"][0];
  $service4 = $custom["service4"][0];
  $service5 = $custom["service5"][0];
  $service6 = $custom["service6"][0];


  $service1_title = $custom["service1_title"][0];
  $service2_title = $custom["service2_title"][0];
  $service3_title = $custom["service3_title"][0];
  $service4_title = $custom["service4_title"][0];
  $service5_title = $custom["service5_title"][0];
  $service6_title = $custom["service6_title"][0];

  //arabic
  $service1ar = $custom["service1ar"][0];
  $service2ar = $custom["service2ar"][0];
  $service3ar = $custom["service3ar"][0];
  $service4ar = $custom["service4ar"][0];
  $service5ar = $custom["service5ar"][0];
  $service6ar = $custom["service6ar"][0];


  $service1ar_title = $custom["service1ar_title"][0];
  $service2ar_title = $custom["service2ar_title"][0];
  $service3ar_title = $custom["service3ar_title"][0];
  $service4ar_title = $custom["service4ar_title"][0];
  $service5ar_title = $custom["service5ar_title"][0];
  $service6ar_title = $custom["service6ar_title"][0];
  //arabic end 

?>

<p><label>Service 1 title</label><br />
<textarea name="service1_title" rows="1" cols="40"><?php echo $service1_title; ?></textarea></p>
  <p><label>Service 1 text</label><br />
  <textarea name="service1" rows="8" cols="50"><?php echo $service1; ?></textarea></p><br/>

  <p><label>Service 2 title</label><br />
  <textarea name="service2_title" rows="1" cols="40"><?php echo $service2_title; ?></textarea></p>
  <p><label>Service 2 text</label><br />
  <textarea type="service2" rows="8" cols="50" name="service2"><?php echo $service2; ?></textarea></p><br/>



  <p><label>Service 3 title</label><br />
  <textarea name="service3_title" rows="1" cols="40"><?php echo $service3_title; ?></textarea></p>
  <p><label>Service 3 text</label><br />
  <textarea type="service3" rows="8" cols="50" name="service3"><?php echo $service3; ?></textarea></p><br/>

  <p><label>Service 4 title</label><br />
  <textarea name="service4_title" rows="1" cols="40"><?php echo $service4_title; ?></textarea></p>
  <p><label>Service 4 text</label><br />
  <textarea type="service4" rows="8" cols="50" name="service4"><?php echo $service4; ?></textarea></p><br/>

  <p><label>Service 5 title</label><br />
  <textarea name="service5_title" rows="1" cols="40"><?php echo $service5_title; ?></textarea></p>
  <p><label>Service 5 text</label><br />
  <textarea type="service5" rows="8" cols="50" name="service5"><?php echo $service5; ?></textarea></p><br/>

  <p><label>Service 6 title</label><br />
  <textarea name="service6_title" rows="1" cols="40"><?php echo $service6_title; ?></textarea></p>
  <p><label>Service 6 text</label><br />
  <textarea type="service6" rows="8" cols="50" name="service6"><?php echo $service6; ?></textarea></p><br/>

</br>
<h1>Arabic</h1>
</br>

<p><label>Service 1 title</label><br />
<textarea type="service1ar_title"   name="service1ar_title" rows="1" cols="40"><?php echo $service1ar_title;  ?></textarea></p>
  <p><label>Service 1 text</label><br />
  <textarea name="service1ar" rows="8" cols="50"><?php echo $service1ar; ?></textarea></p><br/>

  <p><label>Service 2 title</label><br />
  <textarea type="service2ar_title"   name="service2ar_title" rows="1" cols="40"><?php echo $service2ar_title;  ?></textarea></p>
  <p><label>Service 2 text</label><br />
  <textarea type="service2ar" rows="8" cols="50" name="service2ar"><?php echo $service2ar; ?></textarea></p><br/>



  <p><label>Service 3 title</label><br />
  <textarea type="service3ar_title"   name="service3ar_title" rows="1" cols="40"><?php echo $service3ar_title;  ?></textarea></p>
  <p><label>Service 3 text</label><br />
  <textarea type="service3ar" rows="8" cols="50" name="service3ar"><?php echo $service3ar; ?></textarea></p><br/>

  <p><label>Service 4 title</label><br />
  <textarea type="service4ar_title"   name="service4ar_title" rows="1" cols="40"><?php echo $service4ar_title;  ?></textarea></p>
  <p><label>Service 4 text</label><br />
  <textarea type="service4ar" rows="8" cols="50" name="service4ar"><?php echo $service4ar; ?></textarea></p><br/>

  <p><label>Service 5 title</label><br />
  <textarea type="service5ar_title"   name="service5ar_title" rows="1" cols="40"><?php echo $service5ar_title;  ?></textarea></p>
  <p><label>Service 5 text</label><br />
  <textarea type="service5ar" rows="8" cols="50" name="service5ar"><?php echo $service5ar; ?></textarea></p><br/>

  <p><label>Service 6 title</label><br />
  <textarea type="service6ar_title"   name="service6ar_title" rows="1" cols="40"><?php echo $service6ar_title;  ?></textarea></p>
  <p><label>Service 6 text</label><br />
  <textarea type="service6ar" rows="8" cols="50" name="service6ar"><?php echo $service6ar; ?></textarea></p><br/>




  <?php
}


add_action('save_post', 'save_details_services','save_podcasts_meta','wo_save_postdata');
function save_details_services(){
	global $post;
	  update_post_meta($post->ID, "service1", $_POST["service1"]);
    update_post_meta($post->ID, "service2", $_POST["service2"]);
    update_post_meta($post->ID, "service3", $_POST["service3"]);
    update_post_meta($post->ID, "service4", $_POST["service4"]);
    update_post_meta($post->ID, "service5", $_POST["service5"]);
    update_post_meta($post->ID, "service6", $_POST["service6"]);
    update_post_meta($post->ID, "service1_title", $_POST["service1_title"]);
    update_post_meta($post->ID, "service2_title", $_POST["service2_title"]);
    update_post_meta($post->ID, "service3_title", $_POST["service3_title"]);
    update_post_meta($post->ID, "service4_title", $_POST["service4_title"]);
    update_post_meta($post->ID, "service5_title", $_POST["service5_title"]);
    update_post_meta($post->ID, "service6_title", $_POST["service6_title"]);
    

//arabic
    update_post_meta($post->ID, "service1ar", $_POST["service1ar"]);
    update_post_meta($post->ID, "service2ar", $_POST["service2ar"]);
    update_post_meta($post->ID, "service3ar", $_POST["service3ar"]);
    update_post_meta($post->ID, "service4ar", $_POST["service4ar"]);
    update_post_meta($post->ID, "service5ar", $_POST["service5ar"]);
    update_post_meta($post->ID, "service6ar", $_POST["service6ar"]);
    update_post_meta($post->ID, "service1ar_title", $_POST["service1ar_title"]);
    update_post_meta($post->ID, "service2ar_title", $_POST["service2ar_title"]);
    update_post_meta($post->ID, "service3ar_title", $_POST["service3ar_title"]);
    update_post_meta($post->ID, "service4ar_title", $_POST["service4ar_title"]);
    update_post_meta($post->ID, "service5ar_title", $_POST["service5ar_title"]);
    update_post_meta($post->ID, "service6ar_title", $_POST["service6ar_title"]);
    


    }


    add_action("manage_posts_custom_column",  "services_custom_columns");
    add_filter("manage_edit-services_columns", "services_edit_columns");

function services_edit_columns($columns){
  $columns = array(
    "cb" => "<input  />",
    "title" => "services Title",
    "description" => "Description",


  );

  return $columns;
}
function services_custom_columns($column){
  global $post;
  switch ($column) {
    case "description":
    echo $custom["text"][0];
      break;

  }

}


//services end







//contact start
add_action('init', 'contact_register');

function contact_register() {

	$labels = array(
		'name' => _x('Contact', 'post type general name'),
		'singular_name' => _x('contact Item', 'post type singular name'),
		'add_new' => _x('Add New', 'contact item'),
		'add_new_item' => __('Add New contact Item'),
		'edit_item' => __('Edit contact Item'),
		'new_item' => __('New contact Item'),
		'view_item' => __('View contact Item'),
		'search_items' => __('Search contact'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title')
	  ); 

	register_post_type( 'contact' , $args );
}	
add_action("admin_init", "admin_init_contact");

function admin_init_contact(){
  add_meta_box("credits_meta_contact", "Contact Details", "credits_meta_contact", "contact", "normal", "low");
}




function credits_meta_contact() {
  global $post;
  $custom = get_post_custom($post->ID);
  $phone= $custom["phone"][0];
  $email= $custom["email"][0];
  $add= $custom["add"][0];
  $addar= $custom["addar"][0];

  ?>

    <p>


    <p><label>Phone number</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "phone" id = "phone" size = "70" value = "<?php echo $phone; ?>" />
</td> </tr> </table> 
<p><label>Email</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "email" id = "email" size = "70" value = "<?php echo $email; ?>" />
</td> </tr> </table> 
<p><label>Address</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "add" id = "add" size = "70" value = "<?php echo $add; ?>" />
</td> </tr> </table> 
<p><label>Address Arabic</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "addar" id = "addar" size = "70" value = "<?php echo $addar; ?>" />
</td> </tr> </table> 

  <?php
}
add_action('save_post', 'save_details_contact');
function save_details_contact(){
	global $post;

  update_post_meta($post->ID, "phone", $_POST["phone"]);
  update_post_meta($post->ID, "email", $_POST["email"]);
  update_post_meta($post->ID, "add", $_POST["add"]);
  update_post_meta($post->ID, "addar", $_POST["addar"]);


  }


  add_action("manage_posts_custom_column",  "contact_custom_columns");
add_filter("manage_edit-contact_columns", "contact_edit_columns");

function contact_edit_columns($columns){
  $columns = array(
    "cb" => "<input  />",
    "title" => "contact Title",
    "description" => "Description",


  );

  return $columns;
}
function contact_custom_columns($column){
  global $post;
  switch ($column) {
    case "description":
    echo $custom["roi"][0];
      break;
    case "roi":
      $custom = get_post_custom();
      echo $custom["roi"][0];
      break;
    case "skills":
      echo get_the_term_list($post->ID, 'Skills', '', ', ','');
      break;
  }

}

//contact end



















//home section
add_action('init', 'home_register');

//Add Metabox




function home_register() {

	$labels = array(
		'name' => _x('Home', 'post type general name'),
		'singular_name' => _x('Home Item', 'post type singular name'),
		'add_new' => _x('Add New', 'main item'),
		'add_new_item' => __('Add New main Item'),
		'edit_item' => __('Edit main Item'),
		'new_item' => __('New main Item'),
		'view_item' => __('View main Item'),
		'search_items' => __('Search main'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title')
	  ); 

	register_post_type( 'home' , $args );
}	
add_action("admin_init", "admin_init_home");

function admin_init_home(){
  add_meta_box("credits_meta_home", "home", "credits_meta_home", "home", "normal", "low");
}


function credits_meta_home() {
  global $post;
  $custom = get_post_custom($post->ID);

  $exp1 = $custom["exp1"][0];
  $exp2 = $custom["exp2"][0];
  $exp3 = $custom["exp3"][0];
  $exp4 = $custom["exp4"][0];
  $exp5 = $custom["exp5"][0];
  $exp6 = $custom["exp6"][0];


  $exp1img = $custom["exp1img"][0];
  $exp2img = $custom["exp2img"][0];
  $exp3img = $custom["exp3img"][0];
  $exp4img = $custom["exp4img"][0];
  $exp5img = $custom["exp5img"][0];
  $exp6img = $custom["exp6img"][0];


  $exp1dec = $custom["exp1dec"][0];
  $exp2dec = $custom["exp2dec"][0];
  $exp3dec = $custom["exp3dec"][0];
  $exp4dec = $custom["exp4dec"][0];
  $exp5dec = $custom["exp5dec"][0];
  $exp6dec = $custom["exp6dec"][0];



  $brand1 = $custom["brand1"][0];
  $brand2 = $custom["brand2"][0];
  $brand3 = $custom["brand3"][0];
  $brand4 = $custom["brand4"][0];
  $brand5 = $custom["brand5"][0];


  $brand1ar = $custom["brand1ar"][0];
  $brand2ar = $custom["brand2ar"][0];
  $brand3ar = $custom["brand3ar"][0];
  $brand4ar = $custom["brand4ar"][0];
  $brand5ar = $custom["brand5ar"][0];


  $brand1img = $custom["brand1img"][0];
  $brand2img = $custom["brand2img"][0];
  $brand3img = $custom["brand3img"][0];
  $brand4img = $custom["brand4img"][0];
  $brand5img = $custom["brand5img"][0];



  //arabic
  $exp1ar = $custom["exp1ar"][0];
  $exp2ar = $custom["exp2ar"][0];
  $exp3ar = $custom["exp3ar"][0];
  $exp4ar = $custom["exp4ar"][0];
  $exp5ar = $custom["exp5ar"][0];
  $exp6ar = $custom["exp6ar"][0];


  $exp1decar = $custom["exp1decar"][0];
  $exp2decar = $custom["exp2decar"][0];
  $exp3decar = $custom["exp3decar"][0];
  $exp4decar = $custom["exp4decar"][0];
  $exp5decar = $custom["exp5decar"][0];
  $exp6decar = $custom["exp6decar"][0];




  $brand1ar = $custom["brand1ar"][0];
  $brand2ar = $custom["brand2ar"][0];
  $brand3ar = $custom["brand3ar"][0];
  $brand4ar = $custom["brand4ar"][0];
  $brand5ar = $custom["brand5ar"][0];
  $brand6ar = $custom["brand6ar"][0];



  //arabic end 

?>

<p><label>Experience 1 title</label><br />
<textarea name="exp1" rows="1" cols="40"><?php echo $exp1; ?></textarea></p>
  <p><label>Experience 1 text</label><br />
  <textarea name="exp1dec" rows="8" cols="50"><?php echo $exp1dec; ?></textarea></p><br/>

  <p><label>Experience 1 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "exp1img" id = "podcast_file" size = "70" value = "<?php echo $exp1img; ?>" />
<input id = "upload_image_button1" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>


  <p><label>Experience 2 title</label><br />
<textarea name="exp2" rows="1" cols="40"><?php echo $exp2; ?></textarea></p>
  <p><label>Experience 2 text</label><br />
  <textarea name="exp2dec" rows="8" cols="50"><?php echo $exp2dec; ?></textarea></p><br/>

  <p><label>Experience 2 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "exp2img" id = "podcast_file" size = "70" value = "<?php echo $exp2img; ?>" />
<input id = "upload_image_button2" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>

<p><label>Experience 3 title</label><br />
<textarea name="exp3" rows="1" cols="40"><?php echo $exp3; ?></textarea></p>
  <p><label>Experience 3 text</label><br />
  <textarea name="exp3dec" rows="8" cols="50"><?php echo $exp3dec; ?></textarea></p><br/>

  <p><label>Experience 3 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "exp3img" id = "podcast_file" size = "70" value = "<?php echo $exp3img; ?>" />
<input id = "upload_image_button3" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>



  <p><label>Experience 4 title</label><br />
<textarea name="exp4" rows="1" cols="40"><?php echo $exp4; ?></textarea></p>
  <p><label>Experience 4 text</label><br />
  <textarea name="exp4dec" rows="8" cols="50"><?php echo $exp4dec; ?></textarea></p><br/>

  <p><label>Experience 4 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "exp4img" id = "podcast_file" size = "70" value = "<?php echo $exp4img; ?>" />
<input id = "upload_image_button4" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>


  <p><label>Experience 5 title</label><br />
<textarea name="exp5" rows="1" cols="40"><?php echo $exp5; ?></textarea></p>
  <p><label>Experience 5 text</label><br />
  <textarea name="exp5dec" rows="8" cols="50"><?php echo $exp5dec; ?></textarea></p><br/>

  <p><label>Experience 5 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "exp5img" id = "podcast_file" size = "70" value = "<?php echo $exp5img; ?>" />
<input id = "upload_image_button5" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>


  <p><label>Experience 6 title</label><br />
<textarea name="exp6" rows="1" cols="40"><?php echo $exp6; ?></textarea></p>
  <p><label>Experience 6 text</label><br />
  <textarea name="exp6dec" rows="8" cols="50"><?php echo $exp6dec; ?></textarea></p><br/>

  <p><label>Experience 6 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "exp6img" id = "podcast_file" size = "70" value = "<?php echo $exp6img; ?>" />
<input id = "upload_image_button6" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>



</br>
<h1>Arabic</h1>
</br>
<p><label>Experience 1 title</label><br />
<textarea name="exp1ar" rows="1" cols="40"><?php echo $exp1ar; ?></textarea></p>
  <p><label>Experience 1 text</label><br />
  <textarea name="exp1decar" rows="8" cols="50"><?php echo $exp1decar; ?></textarea></p><br/>

  <p><label>Experience 2 title</label><br />
<textarea name="exp2ar" rows="1" cols="40"><?php echo $exp2ar; ?></textarea></p>
  <p><label>Experience 2 text</label><br />
  <textarea name="exp2decar" rows="8" cols="50"><?php echo $exp2decar; ?></textarea></p><br/>



<p><label>Experience 3 title</label><br />
<textarea name="exp3ar" rows="1" cols="40"><?php echo $exp3ar; ?></textarea></p>
  <p><label>Experience 3 text</label><br />
  <textarea name="exp3decar" rows="8" cols="50"><?php echo $exp3decar; ?></textarea></p><br/>

  <p><label>Experience 4 title</label><br />
<textarea name="exp4ar" rows="1" cols="40"><?php echo $exp4ar; ?></textarea></p>
  <p><label>Experience 4 text</label><br />
  <textarea name="exp4decar" rows="8" cols="50"><?php echo $exp4decar; ?></textarea></p><br/>

  <p><label>Experience 5 title</label><br />
<textarea name="exp5ar" rows="1" cols="40"><?php echo $exp5ar; ?></textarea></p>
  <p><label>Experience 5 text</label><br />
  <textarea name="exp5decar" rows="8" cols="50"><?php echo $exp5decar; ?></textarea></p><br/>


  <p><label>Experience 6 title</label><br />
<textarea name="exp6ar" rows="1" cols="40"><?php echo $exp6ar; ?></textarea></p>
  <p><label>Experience 6 text</label><br />
  <textarea name="exp6decar" rows="8" cols="50"><?php echo $exp6decar; ?></textarea></p><br/>

</br>


<h1>Brands</h1>
<p><label>Brand 1 title</label><br />
<textarea name="brand1" rows="1" cols="40"><?php echo $brand1; ?></textarea></p>
<p><label>Brand 1 title Arabic</label><br />
<textarea name="brand1ar" rows="1" cols="40"><?php echo $brand1ar; ?></textarea></p>
  <p><label>Brand 1 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brand1img" id = "podcast_file" size = "70" value = "<?php echo $brand1img; ?>" />
<input id = "brand_upload_image_button1" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>


  <p><label>Brand 2 title</label><br />
<textarea name="brand2" rows="1" cols="40"><?php echo $brand2; ?></textarea></p>
<p><label>Brand 2 title Arabic</label><br />
<textarea name="brand2ar" rows="1" cols="40"><?php echo $brand2ar; ?></textarea></p>
  <p><label>Brand 2 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brand2img" id = "podcast_file" size = "70" value = "<?php echo $brand2img; ?>" />
<input id = "brand_upload_image_button2" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>

<p><label>Brand 3 title</label><br />
<textarea name="brand3" rows="1" cols="40"><?php echo $brand3; ?></textarea></p>
<p><label>Brand 3 title Arabic</label><br />
<textarea name="brand3ar" rows="1" cols="40"><?php echo $brand3ar; ?></textarea></p>
  <p><label>Brand 3 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brand3img" id = "podcast_file" size = "70" value = "<?php echo $brand3img; ?>" />
<input id = "brand_upload_image_button3" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>



  <p><label>Brand 4 title</label><br />
<textarea name="brand4" rows="1" cols="40"><?php echo $brand4; ?></textarea></p>
<p><label>Brand 4 title Arabic</label><br />
<textarea name="brand4ar" rows="1" cols="40"><?php echo $brand4ar; ?></textarea></p>
  <p><label>Brand 4 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brand4img" id = "podcast_file" size = "70" value = "<?php echo $brand4img; ?>" />
<input id = "brand_upload_image_button4" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>


  <p><label>Brand 5 title</label><br />
<textarea name="brand5" rows="1" cols="40"><?php echo $brand5; ?></textarea></p>
<p><label>Brand 5 title Arabic</label><br />
<textarea name="brand5ar" rows="1" cols="40"><?php echo $bran5ar; ?></textarea></p>
  <p><label>Brand 5 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brand5img" id = "podcast_file" size = "70" value = "<?php echo $brand5img; ?>" />
<input id = "brand_upload_image_button5" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>


<script type = "text/javascript">

jQuery("#upload_image_button1").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button2").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button3").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button4").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button5").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#upload_image_button6").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});




jQuery("#brand_upload_image_button1").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#brand_upload_image_button2").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#brand_upload_image_button3").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#brand_upload_image_button4").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#brand_upload_image_button5").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});

</script>

  <?php
}

add_action('save_post', 'save_details_home','save_podcasts_meta','wo_save_postdata');
function save_details_home(){
	global $post;
	  update_post_meta($post->ID, "exp1", $_POST["exp1"]);
    update_post_meta($post->ID, "exp2", $_POST["exp2"]);
    update_post_meta($post->ID, "exp3", $_POST["exp3"]);
    update_post_meta($post->ID, "exp4", $_POST["exp4"]);
    update_post_meta($post->ID, "exp5", $_POST["exp5"]);
    update_post_meta($post->ID, "exp6", $_POST["exp6"]);

	  update_post_meta($post->ID, "exp1img", $_POST["exp1img"]);
    update_post_meta($post->ID, "exp2img", $_POST["exp2img"]);
    update_post_meta($post->ID, "exp3img", $_POST["exp3img"]);
    update_post_meta($post->ID, "exp4img", $_POST["exp4img"]);
    update_post_meta($post->ID, "exp5img", $_POST["exp5img"]);
    update_post_meta($post->ID, "exp6img", $_POST["exp6img"]);

    update_post_meta($post->ID, "brand1", $_POST["brand1"]);
    update_post_meta($post->ID, "brand2", $_POST["brand2"]);
    update_post_meta($post->ID, "brand3", $_POST["brand3"]);
    update_post_meta($post->ID, "brand4", $_POST["brand4"]);
    update_post_meta($post->ID, "brand5", $_POST["brand5"]);


    update_post_meta($post->ID, "brand1ar", $_POST["brand1ar"]);
    update_post_meta($post->ID, "brand2ar", $_POST["brand2ar"]);
    update_post_meta($post->ID, "brand3ar", $_POST["brand3ar"]);
    update_post_meta($post->ID, "brand4ar", $_POST["brand4ar"]);
    update_post_meta($post->ID, "brand5ar", $_POST["brand5ar"]);


	  update_post_meta($post->ID, "brand1img", $_POST["brand1img"]);
    update_post_meta($post->ID, "brand2img", $_POST["brand2img"]);
    update_post_meta($post->ID, "brand3img", $_POST["brand3img"]);
    update_post_meta($post->ID, "brand4img", $_POST["brand4img"]);
    update_post_meta($post->ID, "brand5img", $_POST["brand5img"]);
    update_post_meta($post->ID, "brand6img", $_POST["brand6img"]);


    update_post_meta($post->ID, "exp1dec", $_POST["exp1dec"]);
    update_post_meta($post->ID, "exp2dec", $_POST["exp2dec"]);
    update_post_meta($post->ID, "exp3dec", $_POST["exp3dec"]);
    update_post_meta($post->ID, "exp4dec", $_POST["exp4dec"]);
    update_post_meta($post->ID, "exp5dec", $_POST["exp5dec"]);
    update_post_meta($post->ID, "exp6dec", $_POST["exp6dec"]);
    

//arabic
update_post_meta($post->ID, "exp1ar", $_POST["exp1ar"]);
update_post_meta($post->ID, "exp2ar", $_POST["exp2ar"]);
update_post_meta($post->ID, "exp3ar", $_POST["exp3ar"]);
update_post_meta($post->ID, "exp4ar", $_POST["exp4ar"]);
update_post_meta($post->ID, "exp5ar", $_POST["exp5ar"]);
update_post_meta($post->ID, "exp6ar", $_POST["exp6ar"]);
update_post_meta($post->ID, "exp1decar", $_POST["exp1decar"]);
update_post_meta($post->ID, "exp2decar", $_POST["exp2decar"]);
update_post_meta($post->ID, "exp3decar", $_POST["exp3decar"]);
update_post_meta($post->ID, "exp4decar", $_POST["exp4decar"]);
update_post_meta($post->ID, "exp5decar", $_POST["exp5decar"]);
update_post_meta($post->ID, "exp6decar", $_POST["exp6decar"]);
    


    }


    add_action("manage_posts_custom_column",  "home_custom_columns");
    add_filter("manage_edit-home_columns", "home_edit_columns");

function home_edit_columns($columns){
  $columns = array(
    "cb" => "<input  />",
    "title" => "home Title",
    "description" => "Description",


  );

  return $columns;
}
function home_custom_columns($column){
  global $post;
  switch ($column) {
    case "description":
    echo $custom["text"][0];
      break;

  }

}


//home end
