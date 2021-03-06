<?php
// Register menus
register_nav_menus(
	array(
		'main-nav'		=> __( 'The Main Menu', 'jointswp' ),		// Main nav in header
		'offcanvas-nav'	=> __( 'The Off-Canvas Menu', 'jointswp' ),	// Off-Canvas nav
		'footer-links'	=> __( 'Footer Links', 'jointswp' )			// Secondary nav in footer
	)
);

// The Top Menu
function joints_top_nav() {
	$menu_classes = is_front_page() ? 'medium-horizontal align-center menu' : 'medium-horizontal menu';
	//$search_link = '<img src="' . get_template_directory_uri() . '/assets/images/meridien-search-icon.svg" class="search-icon">';
	//$search_link = '<button data-toggle="search-dropdown" class="search-dropdown-button"><img src="' . get_template_directory_uri() . '/assets/images/meridien-search-icon.svg" class="search-icon"></button><div class="dropdown-pane" id="search-dropdown" data-dropdown data-auto-focus="true"><form role="search"><div class="grid-container"><div class="grid-x grid-margin-x"><div class="cell medium-12"><input type="text" placeholder="Search" name="s"></div></div></div></form></div>';
	
	$OLDsearch_link = is_front_page() ? '' : '<li id="menu-search" class="menu-item"><button id="search-button" data-toggle="search-dropdown" style="display:none;"><img src="' . get_template_directory_uri() . '/assets/images/meridien-search-icon.svg" class="search-icon"></button><div class="dropdown-pane" id="search-dropdown" data-dropdown data-auto-focus="true"><form role="search" class="drop-search"><div class="grid-container"><div class="grid-x grid-margin-x"><div class="cell medium-12"><input type="text" placeholder="Search" name="s"></div></div></div></form></div></li>';

	$search_link = '<li id="menu-search" class="menu-item"><form method="get" class="search-form" action=" '. get_site_url() . ' " id="inline-search" role="search"><input type="text" name="s" placeholder="Search Site"></form></li>';



	wp_nav_menu(array(
		'container'			=> false,						// Remove nav container
		'menu_id'			=> 'main-nav',					// Adding custom nav id
		'menu_class'		=> $menu_classes,	// Adding custom nav class
		'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s'.$search_link.'</ul>',
		'theme_location'	=> 'main-nav',					// Where it's located in the theme
		'depth'				=> 5,							// Limit the depth of the nav
		'fallback_cb'		=> false,						// Fallback function (see below)
		'walker'			=> new Topbar_Menu_Walker()
	));
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"menu\">\n";
	}
}

// The Off Canvas Menu
function joints_off_canvas_nav() {
	wp_nav_menu(array(
		'container'			=> false,							// Remove nav container
		'menu_id'			=> 'offcanvas-nav',					// Adding custom nav id
		'menu_class'		=> 'vertical menu accordion-menu',	// Adding custom nav class
		'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
		'theme_location'	=> 'offcanvas-nav',					// Where it's located in the theme
		'depth'				=> 5,								// Limit the depth of the nav
		'fallback_cb'		=> false,							// Fallback function (see below)
		'walker'			=> new Off_Canvas_Menu_Walker()
	));
}

class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu\">\n";
	}
}

// The Footer Menus
function joints_footer_links() {
    wp_nav_menu(array(
    	'container' => 'false',                         // Remove nav container
    	'menu' => __( 'Footer Links', 'jointswp' ),   	// Nav name
    	'menu_class' => 'menu',      					// Adding custom nav class
    	'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
    	'fallback_cb' => ''  							// Fallback function
	));
} 

function joints_footer_links_two() {
    wp_nav_menu(array(
        'container' => 'false',                         // Remove nav container
        'menu' => __( 'Footer Links Two', 'jointswp' ),     // Nav name
        'menu_class' => 'menu',                         // Adding custom nav class
        'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
        'fallback_cb' => ''                             // Fallback function
    ));
}

function joints_footer_links_three() {
    wp_nav_menu(array(
        'container' => 'false',                         // Remove nav container
        'menu' => __( 'Footer Links Three', 'jointswp' ),     // Nav name
        'menu_class' => 'menu',                         // Adding custom nav class
        'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
        'fallback_cb' => ''                             // Fallback function
    ));
} /* End Footer Menus */

// Header Fallback Menu
function joints_main_nav_fallback() {
	wp_page_menu( array(
		'show_home'		=> true,
		'menu_class'	=> '',		// Adding custom nav class
		'include'		=> '',
		'exclude'		=> '',
		'echo'			=> true,
		'link_before'	=> '',		// Before each link
		'link_after'	=> ''		// After each link
	));
}

// Footer Fallback Menu
function joints_footer_links_fallback() {
	/* You can put a default here if you like */
}

// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
	if ( $item->current == 1 || $item->current_item_ancestor == true ) {
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );