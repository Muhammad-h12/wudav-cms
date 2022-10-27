<?php 

// This file Contains the blog posts wp REST api urls

// register the api using the hook/event 

add_action('rest_api_init', 'blogs');

function blogs(){
    // using the wp functioin to register the api route
    // wudav/v1 is the namespace and posts is the parameter that we are looking for

    register_rest_route('cms/v1/','posts',array(
        'methods'=> WP_REST_SERVER::READABLE,
        'callback' =>'allPosts'
    ));
}

function allPosts(){
    $posts = new WP_QUERY(array(
        'post_type'=>'post'
    ));
   
    $postResults = array();

    while($posts->have_posts()){
        $posts->the_post();

        // array_push($postResults, get_the_title());
        array_push($postResults, array(
            'title'=> get_the_title(),
            'description'=> get_the_content(),
            'author'=> the_author(),
            'post-image'=>get_the_post_thumbnail_url(),
            'summary'=>get_the_excerpt(),
            'published_date'=>get_the_date(),
            'modified_date'=>get_the_modified_date(),
            'tags'=>get_the_tags() 
        ));
        
    }

    return $postResults;
    
}