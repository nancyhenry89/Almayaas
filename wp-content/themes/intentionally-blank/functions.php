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
		'name' => _x('Story and About', 'post type general name'),
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
  $aboutImg = $custom["aboutImg"][0];


  ?>

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


<h3>About Image</h3>
<table><tr valign = "top"><td><input type = "text" name = "aboutImg" id = "podcast_file" size = "70"value = "<?php echo $aboutImg; ?>" />
<input id = "upload_image_button1"type = "button"value = "Upload"></td> </tr> </table> <input type = "hidden" name = "img_txt_id" id = "img_txt_id"value = "" />  


<script type = "text/javascript">

jQuery("#upload_image_button1").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});


    </script>
  <?php
}


add_action('save_post', 'save_details_story','save_podcasts_meta');
function save_details_story(){
	global $post;
    update_post_meta($post->ID, "aboutImg", $_POST["aboutImg"]);


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














//services section
add_action('init', 'services_register');

//Add Metabox











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
		'name' => _x('Services', 'post type general name'),
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
  add_meta_box("credits_meta_home", "Services", "credits_meta_home", "home", "normal", "low");
}


function credits_meta_home() {
  global $post;
  $custom = get_post_custom($post->ID);





  $brand1 = $custom["brand1"][0];
  $brand2 = $custom["brand2"][0];
  $brand3 = $custom["brand3"][0];
  $brand4 = $custom["brand4"][0];


  $brand1ar = $custom["brand1ar"][0];
  $brand2ar = $custom["brand2ar"][0];
  $brand3ar = $custom["brand3ar"][0];
  $brand4ar = $custom["brand4ar"][0];


  $brand1img = $custom["brand1img"][0];
  $brand2img = $custom["brand2img"][0];
  $brand3img = $custom["brand3img"][0];
  $brand4img = $custom["brand4img"][0];





  //arabic end 

?>


<h1>Services</h1>
<p><label>Service 1 title</label><br />
<textarea name="brand1" rows="1" cols="40"><?php echo $brand1; ?></textarea></p>
<p><label>Service1 title Arabic</label><br />
<textarea name="brand1ar" rows="1" cols="40"><?php echo $brand1ar; ?></textarea></p>
  <p><label>Service 1 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brand1img" id = "podcast_file" size = "70" value = "<?php echo $brand1img; ?>" />
<input id = "brand_upload_image_button1" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>


  <p><label>Service 2 title</label><br />
<textarea name="brand2" rows="1" cols="40"><?php echo $brand2; ?></textarea></p>
<p><label>Service 2 title Arabic</label><br />
<textarea name="brand2ar" rows="1" cols="40"><?php echo $brand2ar; ?></textarea></p>
  <p><label>Service 2 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brand2img" id = "podcast_file" size = "70" value = "<?php echo $brand2img; ?>" />
<input id = "brand_upload_image_button2" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>

<p><label>Service 3 title</label><br />
<textarea name="brand3" rows="1" cols="40"><?php echo $brand3; ?></textarea></p>
<p><label>Service 3 title Arabic</label><br />
<textarea name="brand3ar" rows="1" cols="40"><?php echo $brand3ar; ?></textarea></p>
  <p><label>Service 3 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brand3img" id = "podcast_file" size = "70" value = "<?php echo $brand3img; ?>" />
<input id = "brand_upload_image_button3" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>



  <p><label>Service 4 title</label><br />
<textarea name="brand4" rows="1" cols="40"><?php echo $brand4; ?></textarea></p>
<p><label>Service 4 title Arabic</label><br />
<textarea name="brand4ar" rows="1" cols="40"><?php echo $brand4ar; ?></textarea></p>
  <p><label>Service 4 image</label><br />
    <table>
<tr valign = "top">
<td>
<input type = "text" name = "brand4img" id = "podcast_file" size = "70" value = "<?php echo $brand4img; ?>" />
<input id = "brand_upload_image_button4" type = "button" value = "Upload">
</td> </tr> </table> 
<input type = "hidden" name = "img_txt_id" id = "img_txt_id" value = "" />
<br/>




<script type = "text/javascript">




jQuery("#brand_upload_image_button1").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#brand_upload_image_button2").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#brand_upload_image_button3").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});
jQuery("#brand_upload_image_button4").on("click",function(t){var e;t.preventDefault();var o=jQuery(this);console.log(o),e?e.open():(console.log("1",o),e=wp.media.frames.file_frame=wp.media({title:jQuery(this).data("uploader_title"),button:{text:jQuery(this).data("uploader_button_text")},multiple:!1}),console.log("2",o),e.on("select",function(){attachment=e.state().get("selection").first().toJSON();var t=attachment.url,a=o.prev()[0];console.log("3",o),a.value=t}),e.open())});

</script>

  <?php
}

add_action('save_post', 'save_details_home','save_podcasts_meta','wo_save_postdata');
function save_details_home(){
	global $post;


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


  
    


    }


    add_action("manage_posts_custom_column",  "home_custom_columns");
    add_filter("manage_edit-home_columns", "home_edit_columns");

function home_edit_columns($columns){
  $columns = array(
    "cb" => "<input  />",
    "title" => "Services",
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
