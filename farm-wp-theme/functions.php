<?php


add_action( 'wp_enqueue_scripts', 'forest_style' );
add_action( 'wp_enqueue_scripts', 'farm_scripts' );
function forest_style() {
	wp_enqueue_style( 'libs-style', get_template_directory_uri() . '/assets/css/libs.min.css' );
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

}


function farm_scripts() {

    wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js' );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'libs-script', get_template_directory_uri() .'/assets/js/libs.min.js', array(), null, true );
	wp_enqueue_script( 'main-script', get_template_directory_uri() .'/assets/js/main.js', array(), null, true );
}