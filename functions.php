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

// Create 1 Custom Post type for demo called Events
function event_cpt() {
		$labels = array(
			'name'                => 'Events',
			'singular_name'       => 'Event',
			'menu_name'           => 'Events',
			'name_admin_bar'      => 'Events',
			'parent_item_colon'   => 'Parent Event:',
			'all_items'           => 'All Events',
			'add_new_item'        => 'Add New Event',
			'add_new'             => 'Add New',
			'new_item'            => 'New Event',
			'edit_item'           => 'Edit Event',
			'update_item'         => 'Update Event',
			'view_item'           => 'View Event',
			'search_items'        => 'Search Event',
			'not_found'           => 'Not found',
			'not_found_in_trash'  => 'Not found in Trash',
		);
		$args = array(
			'label'               => 'events',
			'description'         => 'Custom post type for event',
			'labels'              => $labels,
			'supports'            => array( 'title', 'revisions', 'thumbnail' ),
			'taxonomies'          => array( 'event-categories' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-calendar-alt',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => array('slug' => 'events','with_front' => false),
			'capability_type'     => 'post',
		);
		register_post_type( 'event', $args );
	}
	add_action( 'init', 'event_cpt', 0 );
	function event_taxonomy() {
		$labels = array(
			'name'                       => 'Categories',
			'singular_name'              => 'Category',
			'menu_name'                  => 'Categories',
			'all_items'                  => 'All Categories',
			'parent_item'                => 'Parent Category',
			'parent_item_colon'          => 'Parent Category:',
			'new_item_name'              => 'New Category Name',
			'add_new_item'               => 'Add New Category',
			'edit_item'                  => 'Edit Category',
			'update_item'                => 'Update Category',
			'view_item'                  => 'View Category',
			'separate_items_with_commas' => 'Separate categories with commas',
			'add_or_remove_items'        => 'Add or remove categories',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular Categories',
			'search_items'               => 'Search Categories',
			'not_found'                  => 'Not Found',
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => false,
		);
		register_taxonomy( 'event-categories', array( 'event' ), $args );
	}
	add_action( 'init', 'event_taxonomy', 0 );


?>
