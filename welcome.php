
<?php
include 'config/login.config.php';
//session_start();
include 'classes/User.php';
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WELCOME</title>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

    
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>-->

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet" type="text/css">
    <link href="css/mdb.css" rel="stylesheet" type="text/css">  
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"> </script>
    -->
		</head>
		<body>
			 <?php if (isset($_SESSION['user'])) {?>
			<div class="header">
				
				<div class="head navbar-brand color"> <?php echo ($_SESSION['user'])."'s Dashboard Space ";?> </div>
			</div>
			<div class="main">
			<div class="sidebar">
				<img class="img-responsive rounded-circle" src="https://res.cloudinary.com/brume/image/upload/v1530804730/logo.png">
				
				<ul id="nav">
					<li><a href="createProfile.php">Create profile</a></li>
					<li><a href="updateProfile.php">Update profile</a></li>
					<li><a href="viewProfile.php">View profile</a></li>
					<li><a href="uploadVideo.php">Upload A video</a></li>
			
					
				</ul>
				<form action="index.php" method="post">
				<button name="logout" class="btn btn-sm btn-success BTN" >logout</button>	
				</form>
			</div>
		
			
			 <?php if (isset($_POST['logout'])) {
		         $logout=new login();
		         $logout->logout();
		         }?>   
            
		
			 <?php }else{ ?>  

			 	<div class="display-4"> Login Please <a href="login.php" class="btn btn-sm btn-success BTN" role="button">Login</a></div>

			 	<?php 
			 	exit();
			 }
			 ?>
       </div>
		</body>
		<!-- Plugin JavaScript -->
		<script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>  
    <script src="js/bootstrap.js"></script>
    <script src="js/mdb.js"></script>    
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/contact.js"></script>
    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>