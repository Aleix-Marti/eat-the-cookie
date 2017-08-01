( function( $ ) {
	// Add Color Picker to all inputs with 'color-field' class
	$(function() {
		$('.etc-color-picker').wpColorPicker();
	});

	// Enable/disable modal content text edition depending on the checkbox value
	$(function() {
		$('#adv-cookies-is-modal').on('change', function(){
			var status = !$(this).is(':checked');
			$('.etc-is-modal').each(function(){
				$(this).attr( "disabled", status ); 
			});
		});

		$('#etc_show_modal').on('click', function(){ alert();
			$('#etc_modal_overlay').css('display:block');
		})
	});

})( jQuery );