
jQuery(function ($) {

	// Show the modal boxt to display full cookies info
	$(function() {

		// Open
		$('#etc_show_modal').on('click', function(){
			$('.etc_modal_overlay').css('display','block');
			$('#etc_modal_condiciones').removeClass('popup--inactive');
			$('#etc_modal_condiciones').addClass('popup--active');
			$('body').addClass('modal-open');
		});

		// Close modal
		$('#etc_modal_close').on('click', function(){
			$('.etc_modal_overlay').css('display','none');
			$('#etc_modal_condiciones').removeClass('popup--active');
			$('#etc_modal_condiciones').addClass('popup--inactive');
			$('body').removeClass('modal-open');
		});	


		function openPopup(popup) {
			$('#' + popup).removeClass('popup--inactive');
			$('#' + popup).addClass('popup--active');
			$('.section-contacte').removeClass('page-wrapper__overlay--inactive');
			$('.section-contacte').addClass('page-wrapper__overlay--active');
		}
		
		function closePopup(popup) {
			$('#' + popup).removeClass('popup--active');
			$('#' + popup).addClass('popup--inactive');
			$('.section-contacte').removeClass('page-wrapper__overlay--active');
			$('.section-contacte').addClass('page-wrapper__overlay--inactive');
		}
			
	});

	

	
});
