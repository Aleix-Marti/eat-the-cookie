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

		add_action( 'wp_loaded', array( $this, 'etc_register_scripts_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'etc_enqueue_scripts_styles' ) );
		add_action( 'wp_footer', array( $this, 'display' ) );

	}

	public function etc_register_scripts_styles() { 

		wp_register_style( 'etc-style', plugin_dir_url( __FILE__ ) . 'includes/etc-style.css' );
		wp_register_script( 'etc-script-front', plugin_dir_url( __FILE__ ) . 'includes/etc-front.js', 'jquery-core', false, true );
		
	}

	public function etc_enqueue_scripts_styles() {

		wp_enqueue_style( 'etc-style' );
		wp_enqueue_script( 'etc-script-front' );

	}

	/**
	* The function used during the hook to retrieve the advertising message from options page.
	*
	* @return string $message The cookies advertising message.
	*/
	public function display() {

		$days = $this->deserializer->get_value( 'etc_adv_days' );
		$message = $this->deserializer->get_value( 'etc_adv_msg' );
		$bg_color = $this->deserializer->get_value( 'etc_adv_bg_color' );
		$text_color = $this->deserializer->get_value( 'etc_adv_text_color' );

		$is_modal = $this->deserializer->get_value( 'etc_adv_is_modal' );
		$show_modal = $this->deserializer->get_value( 'etc_adv_show_btn' );
		$modal_message = $this->deserializer->get_value( 'etc_adv_modal_msg' );
		$modal_button = $this->deserializer->get_value( 'etc_adv_modal_btn' );

		if ( empty( $message ) || empty( $show_modal ) || empty( $bg_color ) || empty( $text_color ) ) {
			return;
		}

		// $message = esc_html( $message );
		$message = html_entity_decode( $message );
		$bg_color = esc_html( $bg_color );
		$text_color = esc_html( $text_color );
		$show_modal = esc_html( $show_modal );

		if( ! empty( $is_modal ) ) {
			$msg = $message.' <a id="etc_show_modal" class="etc_cookie_msg__show" style="color:'.$text_color.';" href="#">'.$show_modal.'</a>.';
		}else{
			$msg = $message;
		}

		$display = '<div id="etc_cookie_msg" class="etc_cookie_msg" style="background-color:'.$bg_color.';color:'.$text_color.';">
						<p class="etc_cookie_msg__text">'.$msg.'</p>
						<button id="etc_cookie" class="etc_close etc_close-top">
							<span class="etc_close_icon etc_close_icon-one"></span>
							<span class="etc_close_icon etc_close_icon-two"></span>
					  	</button>
					</div>';

		$modal = '';

		if( ! empty( $is_modal ) ) {
			$modal.= 	'<div id="etc_modal_overlay" class="etc_modal_overlay">
							<div id="etc_modal_condiciones" class="popup popup--inactive">
								<button id="etc_modal_close" class="etc_close">
									<span class="etc_close_icon etc_close_icon-one"></span>
									<span class="etc_close_icon etc_close_icon-two"></span>
							  	</button>
								<div class="popup__scroll-content">'.$modal_message.'</div>
							</div>
						</div>';
		}

		echo $display.$modal;

		?>
		<script>
			jQuery(document).ready(function() {

				if(Cookies.get('etc-show') == 'show-message'){
					jQuery('.etc_cookie_msg').removeClass('etc_show').addClass('etc_close');
				}else{
					jQuery('.etc_cookie_msg').removeClass('etc_close').addClass('etc_show');
				}

				jQuery('#etc_cookie').on('click', function(){
					Cookies.set('etc-show', 'show-message', { expires: <?php echo $days; ?> });
					jQuery('.etc_cookie_msg').removeClass('etc_show').addClass('etc_close');
				});
			});
		</script>
		<?php

	}
}
