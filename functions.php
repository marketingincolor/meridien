<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 


//ADDITIONAL CUSTOMIZATIONS
//add_filter( 'walker_nav_menu_start_el', 'gt_add_menu_item_description', 10, 4); 
function gt_add_menu_item_description( $item_output, $item, $depth, $args ) {
	$desc = __( $item->post_slug ); 
	return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<small class=\"nav-desc\">{$desc}</small><", $item_output); 
}

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


// ADD SITE OPTIONS VIA ACF
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}


/**
 * Display Posts Shortcode, add custom class to EVERY item
 *
 */
function be_dps_post_type_class( $classes ) {
  $classes[] = 'cell';
  return $classes;
}
add_filter( 'display_posts_shortcode_post_class', 'be_dps_post_type_class' );

// Add breadcrumbs to page via PHP embed: if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs();
function wordpress_breadcrumbs() {
  $delimiter = '&raquo;';
  $name = 'Home'; //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
  if ( !is_home() && !is_front_page() || is_paged() ) {
    echo '<div id="crumbs">';
    global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . 'Archive by category &#39;';
      single_cat_title();
      echo '&#39;' . $currentAfter;
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0]; 
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
    if ( get_query_var('paged') ) {
    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</div>';
  }
}











//THIS IS A NON-WORKING EXAMPLE FROM https://www.advancedcustomfields.com/resources/creating-wp-archive-custom-field-filter/
//
add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);
function my_pre_get_posts( $query )
{
  if( is_admin() ) 
  {
    return;
  }

  $meta_query = $query->get('meta_query');

  if ( isset($_GET['indications']) ) 
  {
    $meta_query = array(
      'key' => 'indications',
      'value' => $_GET['indications'],
      'compare' => '=',
    );
  }
  $query->set('meta_query', $meta_query);
  return;
} 










function get_terms_dropdown_indication($taxonomies, $args){
            $my_indication_terms = get_terms($taxonomies, $args);
            $output ="<select name='indications' id='indications'>"; //CHANGE ME!
            $output .="<option value=''>Indication:</option>"; //CHANGE ME TO YOUR LIKING!
            foreach($my_indication_terms as $term){
                    $root_url = get_bloginfo('url');
                    $term_taxonomy = $term->taxonomy;
                    $term_slug = $term->slug;
                    $term_name = $term->name;
                    $link = $term_slug;
                    $output .="<option value='".$link."'>".$term_name."</option>";
            }
            $output .="</select>";
    return $output;
    }

    function get_terms_dropdown_location($taxonomies, $args){
            $my_location_terms = get_terms($taxonomies, $args);
            $output ="<select name='location' id='location'>"; //CHANGE ME!
            $output .="<option value=''>Location:</option>"; //CHANGE ME TO YOUR LIKING!               
            foreach($my_location_terms as $term){
                    $root_url = get_bloginfo('url');
                    $term_taxonomy = $term->taxonomy;
                    $term_slug = $term->slug;
                    $term_name = $term->name;
                    $link = $term_slug;
                    $output .="<option value='".$link."'>".$term_name."</option>";
            }
            $output .="</select>";
    return $output;
    }








