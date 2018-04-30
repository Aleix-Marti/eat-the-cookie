
jQuery(function ($) {

	// Show the modal boxt to display full cookies info
	$(function() {

		// Open
		$('#etc_show_modal').on('click', function(){
			$('.etc_modal_overlay').addClass('active');
			$('#etc_modal_condiciones').removeClass('popup--inactive').addClass('popup--active');
			$('body').addClass('etc_modal_open');
		});

		// Close modal
		$('#etc_modal_close').on('click', function(){
			$('.etc_modal_overlay').removeClass('active');
			$('#etc_modal_condiciones').removeClass('popup--active').addClass('popup--inactive');
			$('body').removeClass('etc_modal_open');
		});	
			
	});
	
});
