<?php
/**
 * Creates the submenu page for the plugin.
 *
 * @package Eat_The_Cookie
 */
 
/**
 * Creates the submenu page for the plugin.
 *
 * Provides the functionality necessary for rendering the page corresponding
 * to the submenu with which this page is associated.
 *
 * @package Eat_The_Cookie
 */
class Submenu_Page {

	public function __construct( $deserializer ) {
		$this->deserializer = $deserializer;
	}
 
    /**
     * This function renders the contents of the page associated with the Submenu
     * that invokes the etc_settings_page method. In the context of this plugin, this is the
     * Submenu class.
     */
    public function etc_settings_page() {
        include_once( 'views/settings.php' );
    }
}