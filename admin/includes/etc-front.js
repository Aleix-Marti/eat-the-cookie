
jQuery(function ($) {

	// Show the modal boxt to display full cookies info
	$(function() {

		// Open
		$('#etc_show_modal').on('click', function(){
			$('.etc_modal_overlay').css('display','block');
		});

		// Close modal
		$('#etc_modal_close').on('click', function(){
			$('.etc_modal_overlay').css('display','none');
		});	
			
	});
});
