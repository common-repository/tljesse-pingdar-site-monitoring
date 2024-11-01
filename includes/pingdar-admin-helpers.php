<?php
/**
 * @file
 *	Contains helper functions for the plugin
 */

/**
 * Check which scripts have been loaded and print to the page
 *
function wpa54064_inspect_scripts() {
    global $wp_scripts;
    foreach( $wp_scripts->queue as $handle ) :
        echo $handle . ' | ';
    endforeach;
}
add_action( 'wp_print_scripts', 'wpa54064_inspect_scripts' );
*/

 /**
 * Allows the use of console.log with php for debuging
 *
 * @param object $data
 *		Data to output to the console, could be any data type
 *
if (!function_exists('debug_to_console')){
	function debug_to_console( $data ) {

		if ( gettype( $data ) == 'array' ) {
	    $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		}
		else {
	  	$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
		}

		echo $output;
	}
}

/**
 * Sanatizes the path of the current directory so it can be used as a reference
 *
if (!function_exists('get_abs_path')) {
	function get_abs_path() {
		return str_replace('\\', '/', ABSPATH);
	}
}*/