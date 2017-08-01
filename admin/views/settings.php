<div class="wrap">

	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) )?>">
		<div id="form-msg">
			<h2>Messages</h2>
			<div class="msg">
				<p>
					<label>Cookies advertising message</label>
					<br />	
					<textarea rows="4" cols="50" name="adv-cookies-msg"><?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_msg') ); ?></textarea>
				</p>
				<p>
					<label>Accept button text for advertising message</label>
					<br />	
					<input type="text" name="adv-cookies-btn" value="<?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_btn') ); ?>">
				</p>
				<p>
					<label>Background color</label>
					<br />
					<input type="text" name="adv-cookies-bg-color" value="<?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_bg_color') ); ?>" class="etc-color-picker">
				</p>
				<p>
					<label>Text color</label>
					<br />
					<input type="text" name="adv-cookies-text-color" value="<?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_text_color') ); ?>" class="etc-color-picker">
				</p>
				<p>
					<label>Do you want to show full info on a modal box?</label>
					<br />
					<input type="checkbox" id="adv-cookies-is-modal" name="adv-cookies-is-modal" value="<?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_is_modal') ); ?>">
				</p>
				<p>
					<label>Button text to show full info modal on advertising message</label>
					<br />	
					<input type="text" class="etc-is-modal" name="adv-cookies-show-modal" value="<?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_show_btn') ); ?>" disabled>
				</p>
				<p>
					<label>Cookies full info modal message</label>
					<br />	
					<textarea rows="4" cols="50" class="etc-is-modal" name="adv-cookies-modal-msg" disabled><?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_modal_msg') ); ?></textarea>
				</p>
				<p>
					<label>Accept button text for modal message</label>
					<br />	
					<input type="text" class="etc-is-modal" name="adv-cookies-modal-btn" value="<?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_modal_btn') ); ?>" disabled>
				</p>
			</div><!-- .msg -->
		</div><!-- #form-msg -->
	
		<?php
			wp_nonce_field( 'etc-settings-save', 'etc-settings-msg' );
			submit_button();
		?>
	</form>

</div><!-- .wrap -->

