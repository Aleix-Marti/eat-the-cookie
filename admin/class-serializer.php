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
		if ( ! ($this->has_valid_nonce() && current_user_can( 'manage_options') ) ) {
			// TODO: display an error message.
		}		

		if ( ( null !== wp_unslash( $_POST['adv-cookies-msg'] ) ) && 
			( null !== wp_unslash( $_POST['adv-cookies-btn'] ) ) && 
			( null !== wp_unslash( $_POST['adv-cookies-bg-color'] ) ) &&
			( null !== wp_unslash( $_POST['adv-cookies-text-color'] ) ) &&
			( null !== wp_unslash( $_POST['adv-cookies-is-modal'] ) ) &&			
			( null !== wp_unslash( $_POST['adv-cookies-show-modal'] ) ) &&			
			( null !== wp_unslash( $_POST['adv-cookies-modal-msg'] ) ) &&
			( null !== wp_unslash( $_POST['adv-cookies-modal-btn'] ) ) ) {

			$value_msg = sanitize_textarea_field( $_POST['adv-cookies-msg'] );
			update_option( 'etc_adv_msg', $value_msg );

			$value_btn = sanitize_text_field( $_POST['adv-cookies-btn'] );
			update_option( 'etc_adv_btn', $value_btn );			

			$value_bg_color = sanitize_text_field( $_POST['adv-cookies-bg-color'] );
			if ( ! ( $this->check_color( $value_color ) ) ) {
				// TODO: display an error message.
			}
			update_option( 'etc_adv_bg_color', $value_bg_color );

			$value_text_color = sanitize_text_field( $_POST['adv-cookies-text-color'] );
			if ( ! ( $this->check_color( $value_text_color ) ) ) {
				// TODO: display an error message.
			}
			update_option( 'etc_adv_text_color', $value_text_color );

			$value_is_modal = sanitize_textarea_field( $_POST['adv-cookies-is-modal'] );
			update_option( 'etc_adv_is_modal', $value_is_modal );

			$value_show_btn = sanitize_textarea_field( $_POST['adv-cookies-show-modal'] );
			update_option( 'etc_adv_show_btn', $value_show_btn );

			$value_modal_msg = sanitize_textarea_field( $_POST['adv-cookies-modal-msg'] );
			update_option( 'etc_adv_modal_msg', $value_modal_msg );


			$value_modal_btn = sanitize_textarea_field( $_POST['adv-cookies-modal-btn'] );
			update_option( 'etc_adv_modal_btn', $value_modal_btn );
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
		if ( ! isset( $_POST['etc-settings-msg'] ) ) {
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
		if ( ! isset( $_POST['_wp_http_referer'] ) ) {
			$_POST['_wp_http_referer'] = wp_login_url();
		}

		// Sanitize the value
		$field = wp_unslash( $_POST['_wp_http_referer'] );
		$url = sanitize_textarea_field( $field );

		// Redirect to the admin page
		wp_safe_redirect( urldecode($url) );

		exit;
	}

	/**
	* Validate if user has inserted a HEX color width #.
	*
	* @access private
	*
	* @param string $color HEX color.
	*
	* @return boolean TRUE if $color is a valid HEX color; otherwise return FALSE.
	*/	
	private function check_color( $color ) { 
     
	    if ( preg_match( '/^#[a-f0-9]{6}$/i', $color ) ) { // if user insert a HEX color with #     
	        return true;
	    }
     
	    return false;
	}
}