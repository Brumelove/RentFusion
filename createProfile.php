<?php  include_once ("welcome.php")?>


<?php 
$email=strlen($_SESSION['mailaddress'])>0?$_SESSION['mailaddress']:"N/A";
if (isset($_POST['submit'])) {
	$address=$_POST['address'];
	$favourite=$_POST['favourite_movie'];
	$city=$_POST['city'];
	$State=$_POST['state'];
	$zipcode=$_POST['zip'];
	$ages=$_POST['age'];
	$mail=$_SESSION['user'];
	$detail_process=new User($address,$favourite,$city,$State,$zipcode,$ages,$mail,"","","","");
	$detail_process->createTable();
	$detail_process->insert();

	}
	

?> <div class="containar">
 	<div style="background:rgba(0,0,0,.5); height:10vh; width:100%;"class="d-flex justify-content-center flex-column text-white ">
				<h1 class=" display-5">Create profile</h1>
			</div>
 <?php if($email!="N/A"){?>

  <div>profile already created you can only update!</div>
<?php  }else{?>
		<form action="createProfile.php" method="post" class="justify-content-center w-75 mx-auto mt-5">
			<div class="form-group">
			    <label for="inputAddress">Address</label>
			    <input type="text" class="form-control" name="address" placeholder="House Address">
  			</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="favMovie">Favourite Movie</label>
      <input type="text" class="form-control" name="favourite_movie" placeholder="Favourite Movie">
    </div>
   
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="city" placeholder="City">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <input type="text" class="form-control" name="state" placeholder="State">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" name="zip">
    </div>
  </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Age</label>
      <input type="number" class="form-control" name="age" placeholder="Age">
    </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Submit Form</button>
</form>
</div>
<?php  }?>