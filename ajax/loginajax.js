"use strict";
$(document).ready(function(){
	//login
	$('#login_button').click(function(){
		var username = $('#username').val();
		var password = $('#password').val();		
				
		if (username != '' && password != ''){
			console.log("ok");
			$.ajax({
				url:"login.php",
				method: "POST",
				data:{username:username, password:password},
				success:function(data){
					$('#loginModal').hide();
					console.log("success");
					location.reload();						
					},
				error: function(data){
					alert("Failed login");
					}	
								
			});			
		}else {
			alert("both fields are required");
		}		
	});	
	

	
});