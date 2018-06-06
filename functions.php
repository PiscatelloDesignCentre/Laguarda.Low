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

  wp_enqueue_style( 'projects', get_template_directory_uri() . '/css/projects.css',false,'1.1','all');
  wp_enqueue_style( 'video-homepage', get_template_directory_uri() . '/css/video-homepage.css',false,'1.1','all');
  
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

	// function is_page( $page = 'oct-bay' ) {
 //    global $wp_query;
 
 //    if ( ! isset( $wp_query ) ) {
 //        _doing_it_wrong( __FUNCTION__, __( 'Conditional query tags do not work before the query is run. Before then, they always return false.' ), '3.1.0' );
 //        return false;
 //    }
 
 //    return $wp_query->is_page( $page );
	// }


	// function hasClass(element, className) {
 //    return element.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(element.className);
	// }

	// var myDiv = document.getElementById('MyDiv');

	// hasClass(myDiv, 'active');
