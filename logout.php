<?php require 'db_connect.php'; ?>
<?php
session_start();
	//logout
if (isset($_POST["action"])){
	unset($_SESSION["Username"]);
	}
	
?>