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
			</div><!-- .msg -->
		</div><!-- #form-msg -->
	
		<?php
			wp_nonce_field( 'etc-settings-save', 'etc-settings-msg' );
			submit_button();
		?>
	</form>

</div><!-- .wrap -->

