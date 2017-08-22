( function( $ ) {
	// Add Color Picker to all inputs with 'color-field' class
	$(function() {
		$('.etc-color-picker').wpColorPicker();
	});

	// Enable/disable modal content text edition depending on the checkbox value
	$(function() {

		// Check initial value on load page
		$(document).ready(function(){
			if( $('#modal-yes').is(':checked') ){
				$('.etc-is-modal').each(function(){
					$(this).attr( "disabled", false ); 
				});
			}
			if( $('#modal-no').is(':checked') ){
				$('.etc-is-modal').each(function(){
					$(this).attr( "disabled", true ); 
				});
			}
		});

		// Enable/disable edition for modal text fields
		$("input[name='adv-cookies-is-modal']").on('change', function(){
			if( $('#modal-yes').is(':checked') ){
				$('.etc-is-modal').each(function(){
					$(this).attr( "disabled", false ); 
				});
			}
			if( $('#modal-no').is(':checked') ){
				$('.etc-is-modal').each(function(){
					$(this).attr( "disabled", true ); 
				});
			}
		});
	});

})( jQuery );