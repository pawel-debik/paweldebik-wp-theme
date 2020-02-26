<?php
	
// Add Featured Image option to posts
add_theme_support('post-thumbnails');

// Disable gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);


// Load javascript
function load_javascript(){
	if ( !is_admin() ) {
		wp_dequeue_script('jquery');
		wp_deregister_script('jquery');


		// jquery
		// wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js", false, '3.0.0', true);
		// wp_enqueue_script('jquery');

		// Lazyload with jquery dependency
		/*
		wp_register_script('lazyload', get_bloginfo('template_directory') . '/js/lazyload.jq.min.js', '', '1.0', true);
		wp_enqueue_script('lazyload');
		*/

// Regular files
		// Lazyload without dependencies (is being concatenated with other js into all.js)
		// wp_register_script('lazyload', get_bloginfo('template_directory') . '/js/lazyload.min.js', '', '1.0', true);
		// wp_enqueue_script('lazyload');

		// wp_register_script('actions', get_bloginfo('template_directory') . '/js/actions.min.js', array('lazyload'), '1.0', true);
		// wp_enqueue_script('actions');
// Concatenated file
		wp_register_script('all', get_bloginfo('template_directory') . '/js/all.js', array(), false, true );
		wp_enqueue_script('all');

		// Make a variable available in javascript (in this case, the template directory - so that fetch() in js can find the right php file that's in the template)
		wp_localize_script('all', 'wp_localize_vars', array('get_template_directory_uri' => get_template_directory_uri(),)
		);

		// wp_register_script('cssrefresh', get_bloginfo('template_directory') . '/js/cssrefresh.js', array('actions'), '1.0');
		// wp_enqueue_script('cssrefresh');

		wp_enqueue_style( 'styles', get_stylesheet_directory_uri().'/styles/styles.css', array(), filemtime( get_stylesheet_directory().'/styles/styles.css' ));
	}
}

add_action('init', 'load_javascript');


// Clean up some scripts
function my_deregister_scripts(){
	wp_dequeue_script( 'wp-embed' );
}

add_action( 'wp_footer', 'my_deregister_scripts' );


// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}

add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/* Remove wp emoji https://stackoverflow.com/questions/29960915/strange-text-before-my-header-wordpress  */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );




/* * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/* Remove columns from Posts overview: tags and comments */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * */
if ( is_admin() ) {
	function my_manage_columns( $columns ) {
		unset($columns['tags']);
		unset($columns['comments']);
		return $columns;
	}

	function my_column_init() {
		add_filter( 'manage_posts_columns' , 'my_manage_columns' );
	}
	add_action( 'admin_init' , 'my_column_init' );
}



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/* Set more image sizes for responsive - > this isn't working is it? */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
  add_image_size( 'phone', 300 ); // for breakpoint 420
  add_image_size( 'tablet', 460 ); // for breakpoint 720
  add_image_size( 'screen', 740 ); // for breakpoint 980
  add_image_size( 'desktop', 1020 ); // for breakpoint 1240
  add_image_size( 'extrawide', 1280 ); // for headers and stuff
}



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/* Prepare Google Analytics script                       */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function get_google_analytics() {
	$output = "<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-7188986-2\"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-7188986-2', { 'anonymize_ip': true });
</script>";

	return $output;
}



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/* Logo url                                              */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function logo_url(){
	$output = get_stylesheet_directory_uri() . "/images/pawel-website-logo.png";
	
	return $output;
}


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/* Breadcrumbs bar above main menu                       */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function breadcrumbs(){
	$output = "";

	if ( !is_home() ) {
		$cat = get_the_category();
		if( is_single() ){
			$output = "<span class='nav-dash'> / </span>";
			$output = "<a class=\"cat\" href=\"/".'category/'.strtolower($cat[0]->cat_name) ."\">". $cat[0]->cat_name ."</a>";
			$output = "<span class='nav-dash'> / </span><a class=\"header-title\" href=\"/".get_page_link() ."\" > ". get_the_title() ."</a>";
		} elseif ( is_page() ) {
			$output = "<span class='nav-dash'> / </span><a class=\"header-title cat\" href=\"/".get_page_link() ."\" > ". get_the_title() ."</a>";
		} else {
			$output = "<span class='nav-dash'> / </span><a class=\"header-title cat\" href=\"/".$cat[0]->slug ."\" > ". $cat[0]->cat_name ."</a>";
		}
	}

	return $output;
}



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/* Return proper body class                              */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function get_my_body_class(){
	$output = "";

	if (is_single() || is_category()){
		$cat = get_the_category();
		if ( strtolower($cat[0]->slug) == 'portfolio' ){
			$output = body_class('light-theme theme-color category-'.strtolower($cat[0]->slug));
		} else {
			$output = body_class('light-theme theme-color category-'.strtolower($cat[0]->slug));
		}
	} else if (is_page()){
		$output = body_class('page-about light-theme theme-color');
	} else {
		if (is_home()){
			$output = body_class('category-portfolio light-theme theme-color');
		} else {
			$output = body_class();
		}		
	}

	return $output;
}



// Get Short Description
function getShortDescription($text, $cl=false) {
	$words = explode(" ",$text);
	$newText = "";
	$customLength = 350;

	if($cl){
		$customLength = $cl;
	}

	foreach($words as $word) {
		$tmpTest = $newText." ".$word;
		if (strlen($tmpTest)>$customLength) return $newText."...";
		$newText = $tmpTest;
	}

	return $text;
}


// Wrap links around post images that appear on homepage
function wrapLinkOnImg( $content="data", $link="#" ){
	$output    = $content;

	$img_start = "<img";
	$img_end   = "/>";
	$lnk_start = "<a class='img-link' href='".$link."'><img ";
	$lnk_end   = "/></a>";

	$output = str_replace($img_start, $lnk_start, $output);
	$output = str_replace($img_end, $lnk_end, $output);

	return $output;
}



// Generate appropriate Title
function pageTitle(){
	$t = "";
	$test = get_bloginfo('name');

	if (is_archive()){ 
		$t = get_bloginfo('name') . ' - ' . wp_title('') . ' - Blog'; 
	} elseif (is_search()){ 
		$t = get_bloginfo('name') . ' - ' . ' - Search for &quot;' . wp_specialchars($s); 
	} elseif (!(is_404()) && (is_single()) || (is_page())) { 
		$t = wp_title(''); 
	} elseif (is_404()) { 
		$t = get_bloginfo('name') . ' - ' . ' - Not Found'; 
	}

	if (is_home()) { 
		$t = get_bloginfo('name') . ' - ' . get_bloginfo('description'); 
	}

	if ($paged>1) {
		$t = get_bloginfo('name') . ' - ' . 'Page: '. $paged; 
	}

	return $test;
}



// Get content with formatting
function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
$content = get_the_content($more_link_text, $stripteaser, $more_file);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}



// Set Cookies
function _setcookies( $buttonpress = false ){
	$output = "";
	// Get current post category
	$cat = get_the_category();
	$cat = $cat[0]->slug;

	// If there is a category, then set cookie: limit = 1; category = $cat
	if ($cat){
		setcookie('limit_cat', $cat, time()+3600); // <- no one stays on the site longer then an hour anyway :(
	}

	// Remove cookie if user presses button re remove limitations
	// if ( $buttonpress == true )

	return $output;
}



// Remove Paragraph Tags From Around Images
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');



// Add Screen Options to Posts
function p_post_fields() {
	global $post;
	$custom = get_post_custom($post->ID);
	$p_post_source_url = $custom["p_post_source_url"][0];
	?>
	<div class="text">
		<label for="p_post_source_url">Imageshack url:</label><br />
		<input type="text" id="p_post_source_url" name="p_post_source_url" value="<?php echo $p_post_source_url; ?>" />
	</div>
	<?php
}

function add_p_post_fields_box() {
	add_meta_box( 'p_post_details', 'Post bg image', 'p_post_fields', 'post', 'side' );
}

function save_p_post_fields() {
	global $post;
	update_post_meta($post->ID, "p_post_source_url", $_POST["p_post_source_url"]);
}

add_action('admin_init',   'add_p_post_fields_box');
add_action('save_post',    'save_p_post_fields');
add_action('publish_post', 'save_p_post_fields');


/* Return post specific image */
function get_post_image() {
$getSpecialImg = get_post_meta($post->ID , 'p_post_source_url');
$headerImage   = $getSpecialImg[0];

	if( $headerImage !=''){
		echo "<img style='position:fixed; z-index:0;' src=" . $headerImage . " alt='' width='100%' />";
	} else {
		$rn=rand(0,5);

		$img = '<div class="full-image-div bg1"></div>';


		if($rn==0){
			$img = '<div class="full-image-div image_'.$rn.' bg'.$rn.'"></div>';
		} else if($rn==1){
			$img = '<div class="full-image-div image_'.$rn.' bg'.$rn.'"></div>';
		} else if($rn==2){
			$img = '<div class="full-image-div image_'.$rn.' bg'.$rn.'"></div>';
		} else if($rn==3){
			$img = '<div class="full-image-div image_'.$rn.' bg'.$rn.'"></div>';
		} else if($rn==4){
			$img = '<div class="full-image-div image_'.$rn.' bg'.$rn.'"></div>';
		} else if($rn==5){
			$img = '<div class="full-image-div image_'.$rn.' bg'.$rn.'"></div>';
		} else if($rn==6){
			$img = '<div class="full-image-div image_'.$rn.' bg'.$rn.'"></div>';
		} else if($rn==7){
			$img = '<div class="full-image-div image_'.$rn.' bg'.$rn.'"></div>';
		}
		echo $img;
	}
}


/* * * * * * * * * * * * * * * * * *  */
/* Change wordpress menu's in backend */
/* * * * * * * * * * * * * * * * * *  */

// Remove ‘Links Menu’ from WordPress Admin
add_action( 'admin_menu', 'my_admin_menu' );
	function my_admin_menu() {
	remove_menu_page('link-manager.php');
}

// Add Appearence -> menu's which went missing
add_theme_support( 'menus' );




/* * * * * * * * * * * * * * * */
/* Add custom post type: dream_log */
/* * * * * * * * * * * * * * * 
add_action( 'init', 'create_dream_log' );
function create_dream_log() {
	$labels = array(
		'name' => _x('Dream Log', 'post type general name'),
		'singular_name' => _x('dream_log Item', 'post type singular name'),
		'add_new' => _x('Add New', 'dream_log Item'),
		'add_new_item' => __('Add New dream_log Item'),
		'edit_item' => __('Edit dream_log Item'),
		'new_item' => __('Nieuw dream_log Item'),
		'view_item' => __('Bekijk dream_log Item'),
		'search_items' => __('Doorzoek dream_log Items'),
		'not_found' =>	__('Geen dream_log Items gevonden'),
		'not_found_in_trash' => __('Geen dream_log Items gevonden in de prullenbak'),
		'parent_item_colon' => ''
	);

	$supports = array('title', 'editor', 'thumbnail', 'page-attributes', 'author');

	register_post_type( 'dream_log',
		array(
			'labels' => $labels,
			'public' => true,
	   		'hierarchical' => true,
			'supports' => $supports
		)
	);
}
*/


/* * * * * * * * * * * * * * * */
/* Add Custom meta box         */
/* * * * * * * * * * * * * * * */

add_action( 'load-post.php', 'next_in_line_post' );
add_action( 'load-post-new.php', 'next_in_line_post' );



/* Meta box setup function. */
function next_in_line_post() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxes' );

	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'smashing_save_post_class_meta', 10, 2 );
}