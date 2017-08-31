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
		wp_enqueue_style( 'etc-style' );			
		wp_enqueue_script( 'etc-script-front' );			
		add_action( 'wp_footer', array( $this, 'display' ) );
	}

	/**
	* The function used during the hook to retrieve the advertising message from options page.
	*
	* @return string $message The cookies advertising message.
	*/
	public function display() {
		
		$days = $this->deserializer->get_value( 'etc_adv_days' );
		$message = $this->deserializer->get_value( 'etc_adv_msg' );
		$button = $this->deserializer->get_value( 'etc_adv_btn' );
		$bg_color = $this->deserializer->get_value( 'etc_adv_bg_color' );
		$text_color = $this->deserializer->get_value( 'etc_adv_text_color' );

		$is_modal = $this->deserializer->get_value( 'etc_adv_is_modal' );
		$show_modal = $this->deserializer->get_value( 'etc_adv_show_btn' );
		$modal_message = $this->deserializer->get_value( 'etc_adv_modal_msg' );
		$modal_button = $this->deserializer->get_value( 'etc_adv_modal_btn' );

		if ( empty( $message ) || empty( $button ) || empty( $bg_color ) || empty( $text_color ) ) {
			return;
		}

		$message = esc_html( $message );
		$button = esc_html( $button );
		$bg_color = esc_html( $bg_color );
		$text_color = esc_html( $text_color );
		$show_modal = esc_html( $show_modal );
	
		if( ! empty( $is_modal ) ) {
			$msg = $message.' <a id="etc_show_modal" class="etc_cookie_msg__show" href="#">'.$show_modal.'</a>.';
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
		
		// $display = '<div id="etc_cookie_msg" class="etc_cookie_msg" style="background-color:'.$bg_color.';color:'.$text_color.';">
		// 				<p>'.$message.'<p>
		// 				<button>'.$button.'</button>';
		// if( ! empty( $is_modal ) ) {
		// 	$display.= '<button id="etc_show_modal" class="etc_show_modal">'.$show_modal.'</button>';
		// }		

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

			/*$modal.= 	'<div id="etc_modal_overlay" class="etc_modal_overlay">
							<div class="etc_modal_box">
								<p>'.$modal_message.'</p>
								<button id="etc_modal_close">'.$modal_button.'</button>
							</div>
						</div>';*/
		}

		echo $display.$modal;

		?>
		<script>
			jQuery(document).ready(function(){
				
				// console.dir(Cookies.get('cookie-name'));
				// console.dir(Cookies.get('cookie-sema'));
				/*Cookies.set('name', { foo: 'bar' });
				console.log('hola');
				console.dir(Cookies.get());
				console.dir(Cookies.get('cookie-name'));
				console.dir(Cookies.get('name'));
				console.dir(Cookies.getJSON('name'));
				console.dir(Cookies.getJSON());



				Cookies.remove('cookie-name');
				Cookies.remove('name');*/
				
				if(Cookies.get('etc-show') == 'show-message'){
					jQuery('.etc_cookie_msg').removeClass('show').addClass('close');
				}else{
					jQuery('.etc_cookie_msg').removeClass('close').addClass('show');
				}

				jQuery('#etc_cookie').on('click', function(){
					Cookies.set('etc-show', 'show-message', { expires: <?php echo $days; ?> });
					jQuery('.etc_cookie_msg').removeClass('show').addClass('close');
				});
				
				console.dir(Cookies.get());
			});
		</script>
		<?php

	}
}