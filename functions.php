<?php

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
		'supports'              => array( 'title', 'editor', 'page-attributes',),
		'hierarchical'          => true,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'team', $args );
}
add_action( 'init', 'register_team', 0 );


?>
