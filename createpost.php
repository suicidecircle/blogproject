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
	<script src="loginajax.js"></script>
	<script src="createpostajax.js"></script>
  </head> 
  <body>
  
<nav id="top-bar" class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Blog</a>
    </div>
	<div>


		<?
		session_start();	
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
  
  
	<div class="container">	
	<?php 				
		if(isset($_SESSION['Username']) && $_SESSION['Username'] == "admin" ){
	?>
		<div class="col-md-12" id="editor-box">
			<div id="content-title"><h1>New blog post</h1></div>
				<div class="form-group">
					<label id="label-text"><h3>Post header:</h3></label>
					<input type="text" class="form-control" id="create-post-title" placeholder="Write a new post header..">
				</div>	
			
				<div id="new-post-editor" contenteditable="true" placeholder="Write a new post here...";>
					
				</div>
				<div class="form-group">
				<input type="text" id="content-fake-element" class="form-control hiddenElement">
				</div>	
				<div class="form-group">
					<label id="label-text"><h3>Tags:</h3></label>
					<input type="text" class="form-control" id="create-post-tags" placeholder="post tags separated with comma(,)">
				</div>	
		</div>
		<div id="buttons-group">
		<button name="prev"   onclick="location.href = 'https://www.saakuru.eu/playground/';" type="button" class="btn navigation-button" >< Back </button>
		<button name="new-post"  type="button" id="post-completion" class="btn navigation-button" > Create </button>	
		</div>
		<?php }else {?>
		<div class="col-md-12" id="editor-box">No access to create post. You need admin rights to do so.</div>
		<button name="prev"   onclick="location.href = 'https://www.saakuru.eu/playground/';" type="button" class="btn navigation-button" >< Back </button>
		<?php }?>
	</div>		


  </body>
</html>