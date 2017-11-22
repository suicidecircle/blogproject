<?php require 'db_connect.php'; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	session_start();	

	//login
	
	$user = $_POST['username'];
	$pass = $_POST['password'];
			
	$sql =  $conn->prepare("SELECT * FROM saakurueonroot.users WHERE username = ? AND password = ?");
	//$result = mysqli_query($conn,$sql);		
	$sql->bind_param('ss', $user, $pass);
	$sql->execute();
	$result = $sql->get_result();
	
	while($rows = $result->fetch_assoc()){
		$_SESSION['Username'] = $user;	
	}

	$sql->close();
	
?>

