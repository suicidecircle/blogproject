<?php require 'db_connect.php'; ?>


<?php


$sql = "SELECT post_id, post_title, post_body, post_date, post_tag FROM saakurueonroot.blogs";
$result = mysqli_query($conn,$sql);

echo "<script type='text/javascript'>
		var headers = [];
		var bodies = [];
		var ids = [];
		var dates = [];
		var tags = [];
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
		
		headers.push(postTitle);
		bodies.push(postBody);
		ids.push(postId);
		dates.push(postDate);
		tags.push(postTag);
		</script>
		";
	

} 


 ?>
