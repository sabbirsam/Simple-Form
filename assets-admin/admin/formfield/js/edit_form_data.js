jQuery(function($) {
    $("a[data-modal-id]").click(function(e) {
        var data_id_val = $(this).attr('data-id');
        var data_id_name = $(this).attr('data-name');
        var data = {
            result: data_id_val,
            form_name : data_id_name,
            action: "edit_data_id",
        };
        console.log(data);

        $.ajax({
            url: edit_data_id.ajaxurl,
            data: data,
            type: "post",
            success: function(result) {
                const fbEditor = document.getElementById('build-wrap')
                const formData = result
                const formBuilder = $(fbEditor).formBuilder({ formData })
                document.getElementById('saveData').addEventListener('click', function() {
                    Swal.fire({
                        text: "Please confirm below!",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Save!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            const allData = formBuilder.actions.getData();
                            var updatedata = {
                                update_results: allData,
                                id: data_id_val,
                                f_name: data_id_name,
                                action: "simple_message_form_submission",
                            }
                            console.log(updatedata);
                            $.ajax({
                                url: simple_message_form_submission.ajaxurl,
                                data: updatedata,
                                type: "post",
                                success: function(results) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Your Form has been saved',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                    location.href ='admin.php?page=form_data';
                                }
                            });
                        }
                    });
                });
            },
        });
    var appendthis = ("<div class='modal-overlay js-modal-close'></div>");

    e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.3);
    //$(".js-modalbox").fadeIn(500);
    var modalBox = $(this).attr('data-modal-id');
    $("#" + modalBox).fadeIn($(this).data());

    });

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
            top: ($(window).height() - $(".modal-box").outerHeight()) / 12,
            left: ($(window).width() - $(".modal-box").outerWidth()) / 3
        });
    });

    $(window).resize();

});
