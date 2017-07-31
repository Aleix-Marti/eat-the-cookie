<?php
/**
* Retrieves information from the database.
*
* @packate Eat_The_Cookie
*/

/**
* Retrieves information form the database.
*
* The information should be specified by a key. An empty string is returned if no there is no key specified or the value is not found.
*
* @package Eat_The_Cookie
*/
class Deserializer {

	/**
	* Retrieves the value for the specified option key. If the value doesn't exist it will return an empty string.
	*
	* @param string $option_key The option key identifier
	* @return string
	*/
	public function get_value( $option_key ) {
		return wp_unslash( get_option( $option_key, '' ) );
	}
}