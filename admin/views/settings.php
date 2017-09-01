<div class="wrap">

	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) )?>">
		<div id="form-msg">
			<h2>Messages</h2>
			<div class="msg">
				<p>
					<label>Number of days until show the message again</label>
					<br />
					<input type="number" name="adv-cookies-days" min="0" max="180" value="<?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_days' ) ); ?>">
				</p>
				<p>
					<label>Cookies advertising message</label>
					<br />
					<textarea rows="4" cols="50" name="adv-cookies-msg"><?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_msg') ); ?></textarea>
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
					<label for="modal-no">NO</label><input id="modal-no" name="adv-cookies-is-modal" type="radio" value="0" <?php checked( '0', $this->deserializer->get_value( 'etc_adv_is_modal' ) ); ?> />
					<label for="modal-yes">YES</label><input id="modal-yes" name="adv-cookies-is-modal" type="radio" value="1" <?php checked( '1', $this->deserializer->get_value( 'etc_adv_is_modal' ) ); ?> />
				</p>
				<p>
					<label>Button text to show full info modal on advertising message</label>
					<br />
					<input type="text" class="etc-is-modal" name="adv-cookies-show-modal" value="<?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_show_btn') ); ?>"  disabled>
				</p>
				<p>
					<label>Cookies full info modal message</label>
					<br />
					<!-- <textarea rows="4" cols="50" class="etc-is-modal" name="adv-cookies-modal-msg" disabled><?php echo esc_attr( $this->deserializer->get_value( 'etc_adv_modal_msg') ); ?></textarea> -->
					<?php wp_editor( $this->deserializer->get_value( 'etc_adv_modal_msg') , 'adv-cookies-modal-msg', $settings = array('textarea_name'=>'adv-cookies-modal-msg') ); ?>
				</p>
			</div><!-- .msg -->
		</div><!-- #form-msg -->

		<?php
			wp_nonce_field( 'etc-settings-save', 'etc-settings-msg' );
			submit_button();
		?>
	</form>

</div><!-- .wrap -->
