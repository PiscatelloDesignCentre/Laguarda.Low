<?php
	// Stylesheet
	// function laguardalow_resources() {
	// 	wp_enqueue_style('style', get_stylesheet_uri());
	// }
	// add_action('wp_enqueue_scripts', 'laguardalow_resources');

	// Navigation menus
  register_nav_menus(array(
		'primary' => __( 'Primary Menu'),
		'footer' => __( 'Footer Menu'),
	));

	add_filter( 'nav_menu_css_class', 'add_parent_url_menu_class', 10, 2 );

	function add_parent_url_menu_class( $classes = array(), $item = false ) {
		// Get current URL
		$current_url = current_url();
	
		// Get homepage URL
		$homepage_url = trailingslashit( get_bloginfo( 'url' ) );
	
		// Exclude 404 and homepage
		if( is_404() or $item->url == $homepage_url ) return $classes;
	
		if ( strstr( $current_url, $item->url) ) {
			// Add the 'parent_url' class
			$classes[] = 'current-menu-item';
		}
	
		return $classes;
	}

	$my_current_lang = apply_filters( 'wpml_current_language', NULL );

	function current_url() {
		// Protocol
		$url = ( 'on' == $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
		$url .= $_SERVER['SERVER_NAME'];
	
		// Port
		$url .= ( '80' == $_SERVER['SERVER_PORT'] ) ? '' : ':' . $_SERVER['SERVER_PORT'];
		$url .= $_SERVER['REQUEST_URI'];
		return trailingslashit( $url );
	}

  wp_enqueue_style( 'projects', get_template_directory_uri() . '/css/projects.css',false,'1.1','all');
  wp_enqueue_style( 'video-homepage', get_template_directory_uri() . '/css/video-homepage.css',false,'1.1','all');
  wp_enqueue_style( 'expertise', get_template_directory_uri() . '/css/expertise.css',false,'1.1','all');
  wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css',false,'1.1','all');
  wp_enqueue_style( 'mobile', get_template_directory_uri() . '/css/mobile.css',false,'1.1','all');

  function people_init() {
		// create a new taxonomy
		register_taxonomy(
			'people',
			'post',
			array(
				'label' => __( 'People' ),
				'rewrite' => array( 'slug' => 'person' ),
				'capabilities' => array(
					'assign_terms' => 'edit_guides',
					'edit_terms' => 'publish_guides'
				)
			)
		);
	}
	add_action( 'init', 'people_init' );
	add_theme_support( 'post-thumbnails' );
	
	$post_type = "post";

	function my_rest_prepare_post($data, $post, $request) {
		$_data = $data->data;

		$fields = get_fields($post->ID);

		foreach ($fields as $key => $value){
			$_data[$key] = get_field($key, $post->ID);
		}

		$data->data = $_data;
		return $data;
	}

	add_filter("rest_prepare_{$post_type}", 'my_rest_prepare_post', 10, 3);
	set_post_thumbnail_size( 800 );

	add_action( 'rest_api_init', 'wp_rest_insert_tag_links' );

function wp_rest_insert_tag_links(){

    register_rest_field( 'post',
        'post_categories',
        array(
            'get_callback'    => 'wp_rest_get_categories_links',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'post',
        'post_tags',
        array(
            'get_callback'    => 'wp_rest_get_tags_links',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function wp_rest_get_categories_links($post){
    $post_categories = array();
    $categories = wp_get_post_terms( $post['id'], 'category', array('fields'=>'all') );

foreach ($categories as $term) {
    $term_link = get_term_link($term);
    if ( is_wp_error( $term_link ) ) {
        continue;
    }
    $post_categories[] = array('term_id'=>$term->term_id, 'name'=>$term->name, 'link'=>$term_link);
}
    return $post_categories;

}
function wp_rest_get_tags_links($post){
    $post_tags = array();
    $tags = wp_get_post_terms( $post['id'], 'post_tag', array('fields'=>'all') );
    foreach ($tags as $term) {
        $term_link = get_term_link($term);
        if ( is_wp_error( $term_link ) ) {
            continue;
        }
        $post_tags[] = array('term_id'=>$term->term_id, 'name'=>$term->name, 'link'=>$term_link);
    }
    return $post_tags;
}

add_image_size( 'slider-small', 1920, 1080, true );
