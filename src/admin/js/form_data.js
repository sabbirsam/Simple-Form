jQuery(document).ready(function($) {
    $(document).ready(function(){
        $('#list').dataTable() // 
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
        
    });
    
    