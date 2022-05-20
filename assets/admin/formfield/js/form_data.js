jQuery(document).ready(function($) {
$(document).ready(function(){
	$('#list').dataTable() // 
	$('.delete_ticket').click(function(){
	    _conf("Are you sure to delete this ticket?","delete_ticket",[$(this).attr('data-id')])
	})
	})
	// function delete_ticket($id){
	// 	start_load()
	// 	$.ajax({
	// 		url:'ajax.php?action=delete_ticket',
	// 		method:'POST',
	// 		data:{id:$id},
	// 		success:function(resp){
	// 			if(resp==1){
	// 				alert_toast("Data successfully deleted",'success')
	// 				setTimeout(function(){
	// 					location.reload()
	// 				},1500)

	// 			}
	// 		}
	// 	})
	// }
});