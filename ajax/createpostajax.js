"use strict";
$(document).ready(function(){
		
	//set onchange event on text editor field to collect the value to another element for ajax call. MOVE
	$('#new-post-editor').bind('input propertychange', function(){
		$("#content-fake-element").html($('#new-post-editor').html());
	
	});
	
	
	//Create a new blog post MOVE
	$('#post-completion').click(function(){			
		
		var user = "admin",
			postTitle = $('#create-post-title').val(),
			postContent = $('#content-fake-element').text(),
			postTags = $('#create-post-tags').val();
		
		
		
		$.ajax({
			url: "sendpost.php",
			method: "POST",
			data: {user:user, postTitle:postTitle, postContent:postContent, postTags:postTags},
			success:function(data){
				
				if (data == 'no'){
						console.log("Failed");						
					}else  {
						console.log("Created post successfully");
						window.location.href = "https://www.saakuru.eu/playground/";	
					}
				//console.log("Created post successfully");
				//window.location.href = "https://www.saakuru.eu/playground/";
			}
		})
	});	
	
});