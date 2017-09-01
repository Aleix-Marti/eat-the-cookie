<?php
/**
 *
 * @since             1.0.0
 * @package           Eat_The_Cookie
 *
 * @wordpress-plugin
 * Plugin Name:       Eat the Cookie
 * Plugin URI:        https://github.com/js-cookie/js-cookie
 * Description:       Customizable Cookies notification.
 * Version:           1.0.0
 * Author:            Aleix Martí Carmona
 * Author URI:        --
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Notes:			  The structure code is based on this tutorial https://code.tutsplus.com/series/creating-custom-wordpress-administration-pages--cms-1062
 */


if ( ! defined( 'WPINC' ) ) {
	die;
}
// Include the shared dependency.
include_once( plugin_dir_path( __FILE__ ) . 'shared/class-deserializer.php' );
include_once( plugin_dir_path( __FILE__ ) . 'public/class-show-message.php' );

// Include the dependencies needed to instantiate the plugin.
foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
	include_once $file;
}

add_action( 'plugins_loaded', 'eat_the_cookie_settings' );

function eat_the_cookie_settings() {

	$settings = new Style_JS_Settings();
	$settings->init();

	$serializer = new Serializer();
	$serializer->init();

	$deserializer = new Deserializer();

	$plugin = new Submenu ( new Submenu_Page( $deserializer ) );
	$plugin->init();

	$public = new Show_Message ( $deserializer );
	$public->init();


}
