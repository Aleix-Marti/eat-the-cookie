<?php 
/**
* Sanitize all the form values before to put them in the database.
*
* @package Eat_The_Cookie
*/

/**
* Sanitize all the form values before to put them in the database.
*
* @package Eat_The_Cookie
*/
class Serializer {

	public function init() {
		add_action( 'admin_post', array( $this, 'save' ) );				
	}

	public function save() {

		// Validate the nonce and the user permission to save
		if( ! ($this->has_valid_nonce() && current_user_can( 'manage_options') ) ) {
			// TODO: display an error message.
		}

		if ( null !== wp_unslash( $_POST['adv-cookies-msg'] ) ) {

			$value = sanitize_textarea_field( $_POST['adv-cookies-msg'] );
			update_option( 'etc_adv_msg', $value );
		}

		$this->redirect_prev();

	}

	/**
	* Check if the nonce variable is valid.
	*
	* @access private
	*
	* @return boolean False if the field isn't set or the value is not valid; otherwise, true.
	*/
	private function has_valid_nonce() {

		// The field is invalid if it isn't in the $_POST
		if( ! isset( $_POST['etc-settings-msg'] ) ) {
			return false;
		}

		$field = wp_unslash( $_POST['etc-settings-msg'] );
		$action = 'etc-settings-save';

		return wp_verify_nonce( $field, $action );
	}

	/**
	* Redirect to the previous page. If the referred isn't set, the redirection will be to the login page.
	*
	* @access private
	*/
	private function redirect_prev() {

		// Initialize the value
		if( ! isset( $_POST['_wp_http_referer'] ) ) {
			$_POST['_wp_http_referer'] = wp_login_url();
		}

		// Sanitize the value
		$field = wp_unslash( $_POST['_wp_http_referer'] );
		$url = sanitize_textarea_field( $field );

		// Redirect to the admin page
		wp_safe_redirect( urldecode($url) );

		exit;
	}
}