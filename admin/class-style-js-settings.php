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

		add_action( 'wp_loaded', array( $this, 'etc_register_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'etc_enqueue_admin' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'etc_enqueue_scripts' ) );

	}

	public function etc_register_scripts() {
		// Styles for settings page
		wp_register_style( 'etc-admin-style', plugin_dir_url( __FILE__ ) . 'includes/etc-admin-style.css' );
		// Default style for the cookies advertising message
	// wp_register_style( 'etc-style', plugin_dir_url( __FILE__ ) . 'includes/etc-style.css' );
		// Script to assign a color picker to plugin color choosers. Enqueued in footer with a WP color picker dependency
		wp_register_script( 'etc-script', plugin_dir_url( __FILE__ ) . 'includes/etc-admin.js', array( 'wp-color-picker' ), false, true );
		// Script to set the cookie to hide the cookies message
		wp_register_script( 'js-cookie-script', plugin_dir_url( __FILE__ ) . 'includes/js-cookie.js', array(), false, true );

	// wp_register_script( 'etc-script-front', plugin_dir_url( __FILE__ ) . 'includes/etc-front.js', 'jquery-core', false, true );
	}

	public function etc_enqueue_scripts() {

		//wp_enqueue_style( 'etc-style' );
		wp_enqueue_script( 'js-cookie-script' );
		//wp_enqueue_script( 'etc-script-front' );

	}

	public function etc_enqueue_admin() {
		// WordPress colorpicker style
		wp_enqueue_style( 'wp-color-picker' );
		// WordPress colorpicker style
		wp_enqueue_style( 'etc-admin-style' );
		// Script to assign a color picker to plugin color choosers and manage settings page
		wp_enqueue_script( 'etc-script' );
	}
}
