"use strict";
$(document).ready(function(){	
	
	//logout 
	$('#logout').click(function(){
		var action = "logout";
		$.ajax({
			url: "logout.php",
			method: "POST",			
			data: {action:action},
			success:function(data){
				location.reload();
			}			
		})		
	});
	
});	