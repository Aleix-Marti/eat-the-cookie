<?php
/**
* Creates the submenu item for the plugin settings.
*
* @package Eat_The_Cookie
*/

/**
* Registers a new menu item under 'Options'.
*
* @package Eat_The_Cookie
*/

class Submenu {
	/**
	* @var Submenu_page
	* @access private
	*/
	private $submenu_page;

	/**
	* Constructor function.
	*/
	public function __construct( $submenu_page ) {
		$this->submenu_page = $submenu_page;
	}

	/**
	* Adds a submenu item under Options (default WordPress menu) .
	*/
	public function init() {
		add_action ('admin_menu', array( $this, 'etc_settings_menu' ) );
	}

	/**
	* Creates a submenu item under Options to access to the plugin settings page.
	*/
	public function etc_settings_menu() {

		// add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );
		add_options_page( 
			'Eat the Cookie Settings', 
			'ETC Settings', 
			'manage_options', 
			'etc-settings',
			array( $this->submenu_page, 'etc_settings_page') 
		);
	}


}