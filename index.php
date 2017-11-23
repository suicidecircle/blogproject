<?php require 'fetch_post.php'; 
include 'archive.php';
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
	
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>blog</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.js"></script>	
	<script src="js/contentPagination.js"></script>
	<script src="ajax/loginajax.js"></script>
	<script src="ajax/logoutajax.js"></script>
	<script src="ajax/createpostajax.js"></script>
	
  </head> 
  <body>
 
<nav id="top-bar" class="navbar navbar-inverse">
  <div class="container-fluid">
		
		<div class="navbar-header">
		  <a class="navbar-brand" href="https://www.saakuru.eu/playground/">Blog</a>
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
		<button type="button" class="btn btn-primary" id="login-button" data-toggle="modal" data-target="#loginModal">Login</button>
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
  
	<div class="container">			 
		<div class="row">		
			<div id="left-window" class="col-md-3">	
				<div id="left-window-header">
				<h1>Archive</h1>
				<noscript>Sorry, your browser does not support JavaScript!</noscript> 
				</div>	
				<div id="links-left">				
				</div>	
				<?php 				
				if(isset($_SESSION['Username']) && $_SESSION['Username'] == "admin" ){
				?>
					<form action="https://www.saakuru.eu/playground/createpost.php">
					<button type="submit" class="btn" id="create-post">New Post</button>
					</form>
				<?php 
				}	
				?>	
			</div>	
				<!--Main content -->
				<div id="right-window" class="col-md-8"> 				
					<div id="right-contents">
					<noscript>Sorry, your browser does not support JavaScript!</noscript> 
					</div>			
					<button name="prev" id="previousPage" type="button" class="btn hiddenButton navigation-button" > < </button>
					<button name="next" id="nextPage" type="button" class="btn hiddenButton navigation-button" > > </button></button>
					
				</div>		
		</div>	
	</div>
	
	

  </body>
</html>
