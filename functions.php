<?php 

// include the wp rest api urls for the blog posts.
require get_theme_file_path('/inc/blogs.php');

// add featured support to the theme posts and pages
add_theme_support( 'post-thumbnails' );

function university_post_types() {
    
    
    // Event Post Type
    register_post_type('event', array(
    //   'capability_type' => 'event',
    //   'map_meta_cap' => true,
      'show_in_rest' => true,
      'supports' => array('title', 'editor', 'excerpt'),
      'rewrite' => array('slug' => 'events'),
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'Events',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'all_items' => 'All Events',
        'singular_name' => 'Event'
      ),
      'menu_icon' => 'dashicons-calendar'
    ));
  
    
  }
  
  add_action('init', 'university_post_types');