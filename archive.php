<?php require 'db_connect.php'; ?>
<?php 

$sql = "SELECT post_id, post_title, post_body, post_date, post_dm, post_tag FROM saakurueonroot.blogs ORDER BY post_id desc";
$result = mysqli_query($conn,$sql);

echo "<script type='text/javascript'>
	var cont = {
		allHeaders : [],
		allIds : [],
		archiveTime : []
		};
		</script>
	";


while($row = mysqli_fetch_assoc($result)){
	
	
	$headers = $row['post_title'];
	$postIds = $row['post_id'];
	$postDate = $row['post_dm'];
	
	
	  echo "<script type='text/javascript'>
	
		var postTitles = '".$headers."';
		var postIds = '".$postIds."';
		var postDates = '".$postDate."';
		
		cont.allHeaders.push(postTitles);
		cont.allIds.push(postIds);
		cont.archiveTime.push(postDates);
		
		</script>
		";
	

} 



?>