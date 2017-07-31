<?php
/**
* Prints the cookies advertise message.
*
* @package Eat_The_Cookie
*/

/**
* Prints the cookies advertise message. Retrieves the message from options page and attach it on footer.
*
* @package Eat_The_Cookie
*/
class Show_Message {

	/**
	* A reference to the class for retrieving the settings values.
	*
	* @access private
	* @var Deserializer
	*/
	private $deserializer;

	/**
	* Inizializes the class by setting a reference to the incoming deserializer.
	*
	* @param Deserializer $deserializer Retrieves a value from the database.
	*/
	public function __construct( $deserializer ) {
		$this->deserializer = $deserializer;
	}

	/**
	* Inizializes the hook responsible for print the cookies advertising with the message saved on the options page.
	*/
	public function init() {
				
		add_action( 'wp_footer', array( $this, 'display' ) );
	}

	/**
	* The function used during the hook to retrieve the advertising message from options page.
	*
	* @return string $message The cookies advertising message.
	*/
	public function display() {
		
		$message = $this->deserializer->get_value( 'etc_adv_msg');

		if( empty( $message ) ) {
			return;
		}

		$message = esc_html( $message );
		$display = '<div id="etc_cookie_msg"><p>'.$message.'<p></div>';

		echo $display;

	}
}