<?php require 'db_connect.php'; ?>
<?php
session_start();

$url = $_SERVER['REQUEST_URI'];
//echo $url;
$postId = substr($url, strpos($url, "=") + 1);

$sql = "SELECT  post_title, post_body, post_date, post_user, post_tag FROM saakurueonroot.blogs WHERE post_id ='$postId'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);

	
$_SESSION["Title"] = $data['post_title']; 
$_SESSION["Content"] = $data['post_body']; 
$_SESSION["User"] = $data['post_user']; 
$_SESSION["Date"] = $data['post_date']; 
//print_r $_SESSION['Title'];
//echo "test";




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title><?php echo $_SESSION["Title"]; ?></title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="ajax/loginajax.js"></script>
	<script src="ajax/logoutajax.js"></script>
  </head> 
  <body>
  
<nav id="top-bar" class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Blog</a>
    </div>
	<div>


		<?php 
		if(isset($_SESSION['Username'])){
		?>
		<p>logged in as: <?php echo $_SESSION['Username']; ?> <br>  <a href="#" id="logout">Logout</a></p>
		
		<?php 
		}else{		
		?>
		<!-- Trigger -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Login</button>
		<?php	
		}
		?>		
		<!-- Modal -->
		<div id="loginModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
			
			<!-- Modal content -->
				<div class="modal-content">
				  <div class="modal-header">
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				  </div>
				  <div class="modal-body">
					<form class="form">
						<div class="form-group has-success has-feedback">
							<!--<label class="control-label">Username</label>-->
							<input type="text" class="form-control" placeholder="Username" name="username" id="username">						
						</div>
						<div class="form-group">
							<!--<label>Password</label>-->
							<input type="password" class="form-control" placeholder="Password" name="password" id="password">
						</div>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" name="login_button" id="login_button" class="btn btn-primary">Login</button>
					<button type="button" class="btn btn-default" data-dismiss="modal"  >Close</button>
				  </div>
				</div>
			</div>		
		</div>	
		
		</div>
  </div>
  
</nav>
  
  
	<div class="container" id="blog-post-page">			
		<div id="content-title"><h1><?php echo $_SESSION["Title"]; ?></h1></div>
		<div class="col-md-12" id="main-post">
		<?php echo $_SESSION["Content"]; ?>		
		</div>
		<div id="post-date">
		Posted: <?php echo $_SESSION["Date"]; ?>, by <?php echo $_SESSION["User"]; ?>
		</div>
		<button name="prev"   onclick="location.href = 'https://www.saakuru.eu/playground/';" type="button" class="btn navigation-button" >< Back </button>
	</div>

  </body>
</html>
