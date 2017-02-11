<?php
/*
Plugin Name: OT Courses
Plugin URI: http://oceanthemes.net/
Description: Declares a plugin that will create a custom post type displaying courses.
Version: 1.0
Author: OceanThemes Team
Author URI: http://oceanthemes.net/
License: GPLv2
*/

add_action( 'init', 'register_ocean_courses' );
function register_ocean_courses() {
    
    $labels = array( 
        'name' => __( 'Courses', 'ot-courses' ),
        'singular_name' => __( 'Courses', 'ot-courses' ),
        'add_new' => __( 'Add New Courses', 'ot-courses' ),
        'add_new_item' => __( 'Add New Courses', 'ot-courses' ),
        'edit_item' => __( 'Edit Courses', 'ot-courses' ),
        'new_item' => __( 'New Courses', 'ot-courses' ),
        'view_item' => __( 'View Courses', 'ot-courses' ),
        'search_items' => __( 'Search Courses', 'ot-courses' ),
        'not_found' => __( 'No Courses found', 'ot-courses' ),
        'not_found_in_trash' => __( 'No Courses found in Trash', 'ot-courses' ),
        'parent_item_colon' => __( 'Parent courses:', 'ot-courses' ),
        'menu_name' => __( 'Courses', 'ot-courses' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Courses',
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats' ),
        'taxonomies' => array( 'courses_category','courses_type','study_level' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'courses', $args );
}
add_action( 'init', 'create_Courses_Type_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Courses_Type_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Courses Type', 'ot-courses' ),
    'singular_name' => __( 'Courses Types', 'ot-courses' ),
    'search_items' =>  __( 'Search Types','ot-courses' ),
    'all_items' => __( 'All Types','ot-courses' ),
    'parent_item' => __( 'Parent Types','ot-courses' ),
    'parent_item_colon' => __( 'Parent Types:','ot-courses' ),
    'edit_item' => __( 'Edit Types','ot-courses' ), 
    'update_item' => __( 'Update Types','ot-courses' ),
    'add_new_item' => __( 'Add New Types','ot-courses' ),
    'new_item_name' => __( 'New Types Name','ot-courses' ),
    'menu_name' => __( 'Courses Types','ot-courses' ),
  );     

// Now register the taxonomy

  register_taxonomy('courses_type',array('courses'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'courses-type' ),
  ));

}
add_action( 'init', 'create_Courses_Level_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Courses_Level_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Study Level', 'ot-courses' ),
    'singular_name' => __( 'Study Level', 'ot-courses' ),
    'search_items' =>  __( 'Search Level','ot-courses' ),
    'all_items' => __( 'All Level','ot-courses' ),
    'parent_item' => __( 'Parent Level','ot-courses' ),
    'parent_item_colon' => __( 'Parent Level:','ot-courses' ),
    'edit_item' => __( 'Edit Level','ot-courses' ), 
    'update_item' => __( 'Update Level','ot-courses' ),
    'add_new_item' => __( 'Add New Level','ot-courses' ),
    'new_item_name' => __( 'New Level Name','ot-courses' ),
    'menu_name' => __( 'Study Level','ot-courses' ),
  );     

// Now register the taxonomy
  register_taxonomy('study_level',array('courses'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'study-level' ),
  ));
}

/**
 * Load template file for courses single
 *
 * @since  1.0.0
 *
 * @param  string $template
 *
 * @return string
 */
add_filter( 'template_include', 'include_template2_function', 1 ); 
function include_template2_function( $template_path ) {
    if ( get_post_type() == 'courses' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-courses.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path(__FILE__) . 'template/single-courses.php';
            }
        }
    }
    return $template_path;
}

?>