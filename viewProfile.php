<?php  include_once ("welcome.php")?>

<?php

	$usermail=$_SESSION['user'];
	$username=$_SESSION['username'];
	$detail_process=new userDash("","","","","","",$usermail,"","","","");
	$detail_process->viewprofile();
	$address=strlen($_SESSION['address'])>0? $_SESSION['address']: "N/A";
	$movie=strlen($_SESSION['favourite_movie'])>0? $_SESSION['favourite_movie']: "N/A";
	$city=strlen($_SESSION['city'])>0? $_SESSION['city'] : "N/A";
	$states=strlen($_SESSION['state'])>0? $_SESSION['state']: "N/A";
	$age=strlen($_SESSION['age'])>0? $_SESSION['age']: "N/A";
	$email=strlen($_SESSION['mailaddress'])>0?$_SESSION['mailaddress']:"N/A";
 ?>
 <div class="containar">
 	<div style="background:rgba(0,0,0,.5); height:10vh; width:100%;"class="d-flex justify-content-center flex-column text-white ">
				<h1 class=" display-5 ">view profile</h1>
			</div>
	<div class="profileContent">
		<div class="profileTitle">user profile</div>
	<?php if ($email=="N/A") {
		echo "You have to create profile first";exit;
	}else{
	?>
	<div class="content ">
		<div class="profile ">
			<label for="movie">Favourite Movie: </label>
			<p ><?php echo "&nbsp;".$movie;?></p>
		</div>
		<div class="profile ">
			<label for="movie">Address:</label>
			<p ><?php echo "&nbsp;". $address;?></p>
		</div>
		<div class="profile ">
			<label for="movie" >City:</label>
			<p ><?php echo "&nbsp;". $city;?></p>
		</div>
		<div class="profile ">
			<label for="movie" >State:</label>
			<p ><?php echo"&nbsp;". $states;?></p>
		</div>
		<div class="profile ">
			<label for="movie" >Age:</label>
			<p ><?php echo"&nbsp;". $age;?></p>
		</div>
		<div class="profile ">
			<label for="movie" >Email:</label>
			<p ><?php echo"&nbsp;".$email;?></p>
		</div>

			 	<div class="display-4">  <a href="updateProfile.php" class="btn btn-info" role="button">Update </a></div>
	</div>
 </div>
 <div>
 	
 </div>
<?php } ?>
<div class="profileContent">
		<div class="profileTitle">uploaded videos</div>
		<?php 
		$display_videos=new userDash();
		$detail_process->viewvideo();

		?>

</div>

</div>