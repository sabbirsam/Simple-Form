jQuery(document).ready(function($) {
$(document).ready(function(){
	$('#list').dataTable() // 
	// $('.delete_ticket').click(function(){
		$('#list').on('click','.delete_ticket',function (){
		Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) =>  {
			if (result.isConfirmed) {

			var data_id_val = $(this).attr('data-id');
			var nonce = $(this).data('nonce');
		
			var data = {
				df_delete_data: data_id_val,
				nonce: nonce,
				action: "simple_message_delete_form",
			};
			$.ajax({
				url: simple_message_delete_form.ajaxurl, 
				data: data,
				type: "post",
				success:function(resp){
					Swal.fire({
						// position: 'top-end',
						position: 'center',
						icon: 'success',
						title: 'Your Form has been saved',
						showConfirmButton: false,
						timer: 1500
					})
					$("#success").show();

					setTimeout(function() {
						location.reload();
					}, 800);

					
				}
			})
		}

		});
	    
		})
	})

	/**
	 * modalBox start 
	 */
	$("a[data-modal-id]").click(function(e) {
	
	var appendthis = ("<div class='modal-overlay js-modal-close'></div>");

        e.preventDefault();
        $("body").append(appendthis);
        $(".modal-overlay").fadeTo(500, 0.7);
        //$(".js-modalbox").fadeIn(500);
        var modalBox = $(this).attr('data-modal-id');
        $("#" + modalBox).fadeIn($(this).data());

		$(".js-modal-close, .modal-overlay").click(function() {
			$(".modal-box, .modal-overlay").fadeOut(500, function() {
				$(".modal-overlay").remove();
	
	
				setTimeout(function() {
					location.reload();
				}, 800);
	
			});
		});
	
		$(window).resize(function() {
			$(".modal-box").css({
				top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
				left: ($(window).width() - $(".modal-box").outerWidth()) / 2
			});
		});
	
		$(window).resize();
	});
	
});

