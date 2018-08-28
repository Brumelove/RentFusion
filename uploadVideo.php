<?php  include_once ("welcome.php")?>


<div class="containar">
 	<div style="background:rgba(0,0,0,.5);margin-bottom: 2%; height:10vh; width:100%;"class="d-flex justify-content-center flex-column text-white ">
				<h1 class=" display-5 ">upload video</h1>
			</div>
			 <div class="container text-center">
<form action="uploadVideo.php" method='post' enctype="multipart/form-data" class="mx-auto design">
	<div class="form-group">
Description of Video: <input type="text" name="description_entered" class="mb-2 form-control"/><br>
</div>
<input type="file" name="file" class="mb-2 form-control"/><br>
 <button class="btn btn-primary btn-sm mt-3" name="submit">upload</button>

</form>
</div>
   
               
                   
	<?php 
	$email=$_SESSION['user'];
	
if(isset($_POST['submit'])){
$name = $_FILES['file']['name']; 

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];
$position= strpos($name, "."); 
$fileextension= substr($name, $position + 1);
$fileextension= strtolower($fileextension);

$description= $_POST['description_entered'];
$success= -1;
$descript= 0;
if (empty($description))
{
$descript= 1;
}

if (isset($name)) {

$path= 'Uploads/videos/';

if (!empty($name)){
	if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm")&& ($fileextension !== "jpg")){
	$success=0;
	echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";

	}
	else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm")||($fileextension == "jpg")){

	$success=1;
	
	
		if (move_uploaded_file($tmp_name, $path.$name)) {

	

			#ini_set('memory_limit','1000M');

		$location=$path.$name;
		$video_process=new userDash("","","","","","",$email,$description,$name,$location,"");
		$video_process->createvideo();
		$video_process->insertvideo();
		

		}
	}

}
}
}
?>




				

