// url:simple_message.admin_ajax
jQuery(document).ready(function($) {
    $('#login-form').submit(function(e){
        e.preventDefault()

        var data = {
            action: "simple_message",
            form_field: $("#form_message").val(),
        }
        // console.log(data);
        $.ajax({
            url:simple_message.ajaxurl,
            type: "post",
            data: data,
            
            success:function(resp){
                $('#login-form').prepend('<div class="sec-title-style1 float-left">Success.</div>')
                if(resp){
                    console.log("OK it work by response 1");
                }
            }
        })
    })
})