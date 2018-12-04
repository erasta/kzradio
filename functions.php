<?php
/*
All the functions are in the PHP files in the `functions/` folder.
*/

require get_template_directory() . '/functions/cleanup.php';
require get_template_directory() . '/functions/setup.php';
require get_template_directory() . '/functions/enqueues.php';
require get_template_directory() . '/functions/navbar.php';
require get_template_directory() . '/functions/widgets.php';
require get_template_directory() . '/functions/search-widget.php';
require get_template_directory() . '/functions/index-pagination.php';
require get_template_directory() . '/functions/single-split-pagination.php';
require get_template_directory() . '/functions/shows-filter.php';
require get_template_directory() . '/functions/check-schedule.php';

include_once ("player-functions.php");

function header_scripts() {
	wp_enqueue_style('home', get_template_directory_uri() . '/style-home.css', false);
	wp_enqueue_style('basic', get_template_directory_uri() . '/theme/css/basic.css', false);
	wp_enqueue_style('css1', get_template_directory_uri() . '/theme/css/css1.css', false);
}
add_action('wp_enqueue_scripts', 'header_scripts', 100);
add_image_size( 'dj_img', 240, 240, true );
add_image_size( 'next_shows', 620, 300, true );

function footer() {

}
add_action('wp_footer', 'footer');

function load_admin_styles() {
	wp_enqueue_style('admin-style', get_template_directory_uri() . '/theme/css/admin-style.css', array(), filemtime(get_stylesheet_directory().'/theme/css/admin-style.css'));
}
add_action('admin_enqueue_scripts', 'load_admin_styles');

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


/**
*  Disables WordPress Rest API for external requests
*/
function restrict_rest_api_to_localhost() {
    $whitelist = array('127.0.0.1', "::1");

    if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
        die('REST API is disabled.');
    }
}
add_action( 'rest_api_init', 'restrict_rest_api_to_localhost', 1 );



/**
*  Fetch last time "options" page was saved.
*/
$options = 'options';
$lastTimeKey = 'field_5b8ea90632530';
function my_acf_save_post($options) {
	// bail early if no ACF data
    if( empty($_POST['acf']) ) {     
        return;
    }
    $currTime = date_create('Y-m-d H:i:s');
    update_field($lastTimeKey, $currTime, $options);
}
add_action('acf/save_post', 'my_acf_save_post', 1);


/**
*  Post Types
*/

function new_post_type() {
	$labels = array(
		'name'					=> _x( 'פרקים', 'Post Type General Name', 'kzradio' ),
		'singular_name'			=> _x( 'פרק', 'Post Type Singular Name', 'kzradio' ),
		'menu_name'				=> __( 'פרקים', 'kzradio' ),
		'parent_item_colon'		=> __( 'פריט אב:', 'kzradio' ),
		'all_items'				=> __( 'כל הפרקים', 'kzradio' ),
		'view_item'				=> __( 'צפו בפרק', 'kzradio' ),
		'add_new_item'			=> __( 'הוסיפו פרק חדש', 'kzradio' ),
		'add_new'				=> __( 'הוסיפו חדש', 'kzradio' ),
		'edit_item'				=> __( 'ערכו פרק', 'kzradio' ),
		'update_item'			=> __( 'עדכנו פרק', 'kzradio' ),
		'search_items'			=> __( 'חפשו פרק', 'kzradio' ),
		'not_found'				=> __( 'לא נמצא', 'kzradio' ),
		'not_found_in_trash'	=> __( 'לא נמצא בפח', 'kzradio' ),
	);
	$args = array(
		'label'					=> __( 'פרק', 'kzradio' ),
		'description'			=> __( 'Post Type Description', 'kzradio' ),
		'labels'				=> $labels,
		'supports'				=> array('title', 'thumbnail', 'revisions', 'editor'),
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 4,
		'can_export'			=> true,
		'rewrite'				=> array('slug'=>'shows'),
		'has_archive'			=> false,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'taxonomies' 			=> array('post_tag'),
		'capability_type'		=> 'page',
	);
	register_post_type( 'show', $args );
}
add_action( 'init', 'new_post_type', 0 );

function custom_taxonomy() {
	$labels1 = array(
		'name'							=> _x( 'שדרנים', 'Taxonomy General Name', 'kzradio' ),
		'singular_name'					=> _x( 'שדרן', 'Taxonomy Singular Name', 'kzradio' ),
		'menu_name'						=> __( 'שדרנים', 'kzradio' ),
		'all_items'						=> __( 'כל השדרנים', 'kzradio' ),
		'parent_item'					=> __( 'פריט אב', 'kzradio' ),
		'parent_item_colon'				=> __( 'פריט אב:', 'kzradio' ),
		'new_item_name'					=> __( 'שם פריט חדש', 'kzradio' ),
		'add_new_item'					=> __( 'הוסף פריט חדש', 'kzradio' ),
		'edit_item'						=> __( 'ערוך פריט', 'kzradio' ),
		'update_item'					=> __( 'עדכן פריט', 'kzradio' ),
		'view_item'						=> __( 'צפה בפריט', 'kzradio' ),
		'separate_items_with_commas'	=> __( 'Separate items with commas', 'kzradio' ),
		'add_or_remove_items'			=> __( 'Add or remove items', 'kzradio' ),
		'choose_from_most_used'			=> __( 'Choose from the most used', 'kzradio' ),
		'popular_items'					=> __( 'Popular Items', 'kzradio' ),
		'search_items'					=> __( 'Search Items', 'kzradio' ),
		'not_found'						=> __( 'Not Found', 'kzradio' ),
		'items_list'					=> __( 'Items list', 'kzradio' ),
		'items_list_navigation'			=> __( 'Items list navigation', 'kzradio' ),
	);
	$args1 = array(
		'labels'			=> $labels1,
		'hierarchical'		=> true,
		'public'			=> true,
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'show_in_nav_menus'	=> true,
		'show_tagcloud'		=> true,
		'rewrite'           => array('slug' => 'djs', 'with_front' => true)
	);
	register_taxonomy( 'djs', 'show', $args1 );
	$labels2 = array(
		'name'							=> _x( 'סוגי תוכנית', 'Taxonomy General Name', 'kzradio' ),
		'singular_name'					=> _x( 'סוג תוכנית', 'Taxonomy Singular Name', 'kzradio' ),
		'menu_name'						=> __( 'סוגי תוכנית', 'kzradio' ),
		'all_items'						=> __( 'כל סוגי התוכניות', 'kzradio' ),
		'parent_item'					=> __( 'פריט אב', 'kzradio' ),
		'parent_item_colon'				=> __( 'פריט אב:', 'kzradio' ),
		'new_item_name'					=> __( 'שם פריט חדש', 'kzradio' ),
		'add_new_item'					=> __( 'הוסף פריט חדש', 'kzradio' ),
		'edit_item'						=> __( 'ערוך פריט', 'kzradio' ),
		'update_item'					=> __( 'עדכן פריט', 'kzradio' ),
		'view_item'						=> __( 'צפה בפריט', 'kzradio' ),
		'separate_items_with_commas'	=> __( 'Separate items with commas', 'kzradio' ),
		'add_or_remove_items'			=> __( 'Add or remove items', 'kzradio' ),
		'choose_from_most_used'			=> __( 'Choose from the most used', 'kzradio' ),
		'popular_items'					=> __( 'Popular Items', 'kzradio' ),
		'search_items'					=> __( 'Search Items', 'kzradio' ),
		'not_found'						=> __( 'Not Found', 'kzradio' ),
		'items_list'					=> __( 'Items list', 'kzradio' ),
		'items_list_navigation'			=> __( 'Items list navigation', 'kzradio' ),
	);
	$args2 = array(
		'labels'			=> $labels2,
		'hierarchical'		=> true,
		'public'			=> true,
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'show_in_nav_menus'	=> true,
		'show_tagcloud'		=> true,
	);
	register_taxonomy( 'show_type', 'show', $args2 );
	$labels3 = array(
		'name'							=> _x( 'תוכניות', 'Taxonomy General Name', 'kzradio' ),
		'singular_name'					=> _x( 'תוכנית', 'Taxonomy Singular Name', 'kzradio' ),
		'menu_name'						=> __( 'תוכניות', 'kzradio' ),
		'all_items'						=> __( 'כל התוכניות', 'kzradio' ),
		'parent_item'					=> __( 'פריט אב', 'kzradio' ),
		'parent_item_colon'				=> __( 'פריט אב:', 'kzradio' ),
		'new_item_name'					=> __( 'שם פריט חדש', 'kzradio' ),
		'add_new_item'					=> __( 'הוסף פריט חדש', 'kzradio' ),
		'edit_item'						=> __( 'ערוך פריט', 'kzradio' ),
		'update_item'					=> __( 'עדכן פריט', 'kzradio' ),
		'view_item'						=> __( 'צפה בפריט', 'kzradio' ),
		'separate_items_with_commas'	=> __( 'Separate items with commas', 'kzradio' ),
		'add_or_remove_items'			=> __( 'Add or remove items', 'kzradio' ),
		'choose_from_most_used'			=> __( 'Choose from the most used', 'kzradio' ),
		'popular_items'					=> __( 'Popular Items', 'kzradio' ),
		'search_items'					=> __( 'Search Items', 'kzradio' ),
		'not_found'						=> __( 'Not Found', 'kzradio' ),
		'items_list'					=> __( 'Items list', 'kzradio' ),
		'items_list_navigation'			=> __( 'Items list navigation', 'kzradio' ),
	);
	$args3 = array(
		'labels'			=> $labels3,
		'hierarchical'		=> true,
		'public'			=> true,
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'show_in_nav_menus'	=> true,
		'show_tagcloud'		=> true,
		'rewrite'           => array('slug' => 'shows', 'with_front' => true)
		
	);
	register_taxonomy( 'shows', 'show', $args3 );
}
add_action( 'init', 'custom_taxonomy', 0 );

add_action( 'init', 'stop_heartbeat', 1 );
function stop_heartbeat() {
wp_deregister_script('heartbeat');
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// define the wpseo_opengraph_image callback 
/*function filter_wpseo_opengraph_image( $img ) { 
    if( get_post_type() == 'show' ) {
		$queried_object = get_queried_object();
		$taxonomy = $queried_object->taxonomy;
		$term_id = $queried_object->term_id;
		$thumbnail_id = get_field('show_image', $taxonomy . '_' . $term_id);
		$thumbnail = wp_get_attachment_image_src($thumbnail_id ,'full')[0];
		$img = $thumbnail;
	}
    return $img; 
};*/ 
         
// add the filter 
//add_filter( 'wpseo_opengraph_image', 'filter_wpseo_opengraph_image', 10, 1 ); 