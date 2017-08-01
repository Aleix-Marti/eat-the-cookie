<?php
/**
* Register and enqueue styles & scripts. 
*
* @package Eat_The_Cookie
*/

/**
* Register and enqueue styles & scripts. 
*
* @package Eat_The_Cookie
*/
class Style_JS_Settings {

	public function init() {
		// Default style for the cookies advertising message
		wp_register_style( 'etc-style', plugin_dir_url( __FILE__ ) . 'includes/etc-style.css' );

		// Script to assign a color picker to plugin color choosers. Enqueued in footer with a WP color picker dependency
		wp_register_script( 'etc-script', plugin_dir_url( __FILE__ ) . 'includes/etc.js', array( 'wp-color-picker' ), false, true );

		wp_register_script( 'etc-script-front', plugin_dir_url( __FILE__ ) . 'includes/etc-front.js', 'jquery-core', false, true );

		// WordPress colorpicker style
		wp_enqueue_style( 'wp-color-picker' );

		// Script to assign a color picker to plugin color choosers
		wp_enqueue_script( 'etc-script' );
	}
}