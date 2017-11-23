<?php require 'db_connect.php'; ?>


<?php

//get last 10 posts
$sql = "SELECT post_id, post_title, post_body, post_date, post_tag FROM saakurueonroot.blogs order by post_id desc limit 10";
$result = mysqli_query($conn,$sql);


echo "<script type='text/javascript'>
	var blogStuff = {
		headers : [],
		bodies : [],
		ids : [],
		dates : [],
		tags : []
	};
		</script>
	";
while($row = mysqli_fetch_assoc($result)){
	
	$bodyy = $row['post_body'];

	$title = $row['post_title'];
	$id = $row['post_id'];
	
	$datee = $row['post_date'];
	$tagg = $row['post_tag'];
	
	  echo "<script type='text/javascript'>
	 
		var postTitle = '".$title."';
		var postBody = '".addslashes($bodyy)."';	
		var postId = '".$id."';
		var postDate = '".$datee."';
		var postTag = '".$tagg."';
		
		blogStuff.headers.push(postTitle);
		blogStuff.bodies.push(postBody);
		blogStuff.ids.push(postId);
		blogStuff.dates.push(postDate);
		blogStuff.tags.push(postTag);
		
		
		</script>
		";
	

} 


 ?>
