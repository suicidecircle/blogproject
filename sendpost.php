<?php require 'db_connect.php'; ?>
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$user = $_POST['user'];
$title = $_POST['postTitle'];
$content = $_POST['postContent'];
$tags = $_POST['postTags'];
$content = $conn->real_escape_string($content);

if(isset($_SESSION['Username']) && $_SESSION['Username'] == "admin" ){
$sql = $conn -> query("INSERT INTO saakurueonroot.blogs (post_user, post_title, post_body, post_tag) VALUES ('{$user}','{$title}','{$content}','{$tags}')");
	
	if($sql){
		echo "yes";
	}else {
		echo "no";
	}
	
}
	
?>