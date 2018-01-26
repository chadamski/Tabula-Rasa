<?php
/* enqueueing scripts */
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', get_template_directory_uri(). "/assets/js/vendor/jquery-2.2.4.min.js", false, null);
   wp_register_script('base', get_template_directory_uri(). "/assets/js/base.js", false, null);
   wp_register_script('plugins', get_template_directory_uri(). "/assets/js/plugins.js", false, null);
   wp_enqueue_script('jquery');
   wp_enqueue_script('plugins');
   wp_enqueue_script('base');
}

show_admin_bar( false );		
		
// Add Menu Support
add_theme_support( 'menus' );

//Remove Version
function remove_version() {
return '';
}
add_filter('the_generator', 'remove_version');	

//Featured Image Support
add_theme_support( 'post-thumbnails' ); 

// GF unrequire
class gfunrequire {
    var $_args = null;
    public function __construct( $args = array() ) { 
        $this->_args = wp_parse_args( $args, array(
            'admins_only' => true,
            'require_query_param' => true
        ) );
        add_filter( 'gform_pre_validation', array( $this, 'unrequire_fields' ) );
    }
    function unrequire_fields( $form ) {
        if( $this->_args['admins_only'] && ! current_user_can( 'activate_plugins' ) )
            return $form;
        if( $this->_args['require_query_param'] && ! isset( $_GET['gfunrequire'] ) )
            return $form;
        foreach( $form['fields'] as &$field ) {
            $field['isRequired'] = false;
        }
        return $form;
    }    
}
#   requires that the user be logged in as an admin and that a 'gfunrequire' parameter be added to the query string
#   http://youurl.com/your-form-page/?gfunrequire=1
new GFunrequire();

// custom login Logo
/*
function my_custom_login_logo() {
    echo '<style type="text/css">
    body{background-color:white;}
		.login form {
			background:none;
			-webkit-box-shadow:none;
			box-shadow:none;	
		}
		#login{
			padding: 100px 0px 0px;
		}
		.login #login_error{
			-webkit-box-shadow:none;
			box-shadow:none;
			text-align: center;
			background-color: #eeeeee;
		}
		#login_error, .login .message{
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			text-align: center;
			background-color: #eeeeee;
			-webkit-box-shadow:none;
			box-shadow:none;
		}  
		h1 a { background-image:url('.get_bloginfo('template_directory').'/assets/images/ui/logo.png) !important; background-size:107px 115px !important; width:107px!important; height:115px!important; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');
*/

// no emoji's Please :(
function disable_emoji_dequeue_script() {
	wp_dequeue_script( 'emoji' );
}
add_action( 'wp_print_scripts', 'disable_emoji_dequeue_script', 100 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts','print_emoji_detection_script');	


/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/


// Team CPT
function register_team() {
	$labels = array(
		'name'                  => _x( 'Team', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Team', 'text_domain' ),
		'name_admin_bar'        => __( 'Team', 'text_domain' ),
		'archives'              => __( 'Team Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Teammates', 'text_domain' ),
		'add_new_item'          => __( 'Add New Teammate', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Teammate', 'text_domain' ),
		'edit_item'             => __( 'Edit Teammate', 'text_domain' ),
		'update_item'           => __( 'Update Teammate', 'text_domain' ),
		'view_item'             => __( 'View Teammate', 'text_domain' ),
		'search_items'          => __( 'Search Team', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Team', 'text_domain' ),
		'description'           => __( 'The Team', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'page-attributes','editor','thumbnail'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'team',		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' => array( 'slug' => 'team', 'with_front' => true ),
	);

	register_post_type( 'team', $args );
}
add_action( 'init', 'register_team', 0 );
// Team Taxonomy
function team_type_tax() {
	$labels = array(
		'name'                       => _x( 'Departments', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Departments', 'text_domain' ),
		'all_items'                  => __( 'All Department Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Department Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Department Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Department Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Department Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Department Type', 'text_domain' ),
		'update_item'                => __( 'Update Department Type', 'text_domain' ),
		'view_item'                  => __( 'View Department Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Department Types with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove department types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Department Types', 'text_domain' ),
		'search_items'               => __( 'Search Department Types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Department Types', 'text_domain' ),
		'items_list'                 => __( 'Department Types list', 'text_domain' ),
		'items_list_navigation'      => __( 'Department Types list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite' => array( 'slug' => 'department', 'with_front' => true ),
	);
	register_taxonomy( 'team_type', array( 'team' ), $args );

}
add_action( 'init', 'team_type_tax', 0 );

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function tabularasa_pagination()
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
add_action('init', 'tabularasa_pagination');


// Example Pre-post-get functions
/*
// Alter query for portfolio taxonomies 
add_action('pre_get_posts','tax_alter_query');
function tax_alter_query($query){
	if( $query->is_main_query() && is_tax() && !is_admin() ){
		$query->set( 'post_type', 'project' );
		$query->set('posts_per_page', 6);
		$query->set('order','ASC');
		$query->set('orderby','title');
	}
}

// Alter query for news archives
add_action('pre_get_posts','news_alter_query');
function news_alter_query($query){
	if( $query->is_main_query() && is_home() && !is_admin() ){
		$query->set('posts_per_page', 3);
	}
}
*/

// ACF Pro Include
// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf/';
    // return
    return $path;
}
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';
    // return
    return $dir;
}
// 3. Hide ACF field group menu item
// add_filter('acf/settings/show_admin', '__return_false');
// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );

//ACF Pro Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
// ACF Pro turn off hiding WP custom fields
add_filter('acf/settings/remove_wp_meta_box', '__return_false');


if( function_exists('acf_add_local_field_group') ):

// Localized Global Options Custom Fields

acf_add_local_field_group(array(
	'key' => 'group_5a0b3fa2d7f14',
	'title' => 'Options',
	'fields' => array(
		array(
			'key' => 'field_5a0b3fcb19633',
			'label' => 'Sitewide Alert',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5a0b3fad19631',
			'label' => 'Sitewide Banner Text',
			'name' => 'sitewide_banner_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0b3fb819632',
			'label' => 'Sitewide Banner Link',
			'name' => 'sitewide_banner_link',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baebd22534',
			'label' => 'Hours',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5a0baed122535',
			'label' => 'Monday Open',
			'name' => 'monday_open',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baedc22536',
			'label' => 'Monday Close',
			'name' => 'monday_close',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf0022537',
			'label' => 'Tuesday Open',
			'name' => 'tuesday_open',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf0622538',
			'label' => 'Tuesday Close',
			'name' => 'tuesday_close',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf0c22539',
			'label' => 'Wednesday Open',
			'name' => 'wednesday_open',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf122253a',
			'label' => 'Wednesday Close',
			'name' => 'wednesday_close',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf172253b',
			'label' => 'Thursday Open',
			'name' => 'thursday_open',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf1d2253c',
			'label' => 'Thursday Close',
			'name' => 'thursday_close',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf232253d',
			'label' => 'Friday Open',
			'name' => 'friday_open',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf372253e',
			'label' => 'Friday Close',
			'name' => 'friday_close',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf462253f',
			'label' => 'Saturday Open',
			'name' => 'saturday_open',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf4a22540',
			'label' => 'Saturday Close',
			'name' => 'saturday_close',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf4e22541',
			'label' => 'Sunday Open',
			'name' => 'sunday_open',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a0baf5222542',
			'label' => 'Sunday Close',
			'name' => 'sunday_close',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a257401db133',
			'label' => 'Social Info',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5a25740adb134',
			'label' => 'Instagram URL',
			'name' => 'instagram_url',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5a257428db135',
			'label' => 'Facebook Url',
			'name' => 'facebook_url',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5a257431db136',
			'label' => 'Yelp Url',
			'name' => 'yelp_url',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5a4535253974a',
			'label' => 'YouTube URL',
			'name' => 'youtube_url',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a4535353974b',
			'label' => 'Twitter URL',
			'name' => 'twitter_url',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a4535433974c',
			'label' => 'Houzz URL',
			'name' => 'houzz_url',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a2575feddce3',
			'label' => 'Contact Info',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5a25760dddce4',
			'label' => 'Address',
			'name' => 'address',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a259c151d200',
			'label' => 'Main Phone Number',
			'name' => 'main_phone_number',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a25a3c0d4fa8',
			'label' => 'Email Address',
			'name' => 'email_address',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5a257688e976e',
			'label' => 'Google Maps URL',
			'name' => 'google_maps_url',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

?>
