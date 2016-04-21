<?php
// set global variables for use throughout templates
global $user_login;
global $current_user;
global $user;
$user = new WP_User( $user_ID );
global $templateDirectory;
$templateDirectory = get_bloginfo('template_directory');
global $homeURL;
$homeURL = home_url();
global $home;
$home = false;
global $contact;
$contact = false;
global $events;
$events = false;

// page IDs
global $pageID;
$page = $post->ID;
global $parentID;
$parentID = $post->post_parent;
global $listClass;	
$listClass = '';
/*
global $contactID;
$contactID = 12;
global $eventsID;
$eventsID = 5;
global $menuID;
$menuID = 16;
*/


if(is_front_page()){
	$home = true;
	$listClass = 'home';	
/*
} else if(is_page($contactID)){
	$contact = true;
	$listClass = 'contact';
} else if(is_page($menuID)){
	$menu = true;
	$listClass = 'menu';
} else {
	$default = true;
*/
}
?>