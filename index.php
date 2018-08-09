<?php 
  session_start();
  include "config/logout.config.php";
?>

<?php 
class Leap{
    public function returnLeapYear($startYear,$endYear){
    $stringValue="";
    $leapCount=0;
    //"<tr><td>Mary</td><td>Moe</td></tr><tr><td>July</td><td>Dooley</td></tr>";
    for($count=$startYear;$count<=$endYear;$count++){
        $leapClass = $this->checkLeapYear($count)?"bg-dark":"bg-light text-dark";
        $leapStatus = $this->checkLeapYear($count)?"Leap Year":"Ordinary Year";
        $leapCount += $this->checkLeapYear($count)?1:0;
        $stringValue.="<tr><td>".$count."</td><td class='".$leapClass."'>".$leapStatus."</td></tr>";
    }
    $stringValue.="<tr><td>Number of Leap Years</td><td>".$leapCount."</td></tr>";
    return $stringValue;
    }
    private function checkLeapYear($year){
       return ($year % 4===0 && $year % 100!==0)||$year%400===0;
    }
    public function returnYearRange($startYear,$endYear){
        $years="";
        for($count=$startYear;$count<=$endYear;$count++)
        $years.="<option value='$count'>$count</option>";
        return $years;
    }
    
}
$leap = new Leap();
$leapYears = $leap->returnLeapYear(1980,2018);
$yearRange = $leap->returnYearRange(1900,2018);
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RENTFUSION</title>
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

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="https://res.cloudinary.com/brume/image/upload/v1530804730/logo.png"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="signup.php">Sign Up</a>
            </li>
            <?php
            if(isset($_SESSION['id'])){
              echo '
                  <li class="nav-item">
                    <form action="index.php" method="post">
                    <button type="submit" class="btn btn-primary" name="logout">Logout</button>
                    </form>
                  </li>
              ';
            }else{
              echo '
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
                  </li>
              ';
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Your Favorite Site for Renting Movies</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5"> What are you waiting for?</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="about.html">Find Out More</a>
          </div>
        </div>
      </div>
    </header>
    
      
      
      <main class="mt-5">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-2">
                                                </div>
                                            <div class="col-md-8">
                                                    <table class="table table-dark table-hover">
                                                            <thead>
                                                              <tr>
                                                                <th style="font-weight:bold;">Year</th>
                                                                <th style="font-weight:bold;">Type of Year</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <?php echo $leapYears; ?>
                                                            </tbody>
                                                          </table>
                                                          <!--Use a simple if/else statement-->
					<?php if (isset($_POST['email']) && isset($_POST['name']) ): ?>
		 				<?php
		 
		 				//Import your Class here;
		 				include "classes/Subscribe.php";
		 
		 				//Execute with the custom static function;
		 				Subscribe::process($_POST);
		 
		 				?>
		 				
		 				<div align="center" style="margin-top: 1em;">
		 					<h1>Subscribed!</h1>
		 					<p>Check your mail!</p>
		 					<br>
		 					<a href="index.php">Subscribe &rarr;</a>
		 				</div>
		 
		 			<?php else: ?>

					<h3 class="newsletter-heading">Sign Up for your Newsletter!</h3>
					

	 				<form class="form-inline" action="index.php" method="POST">
	 					
	 					<div class="md-form form-sm" id="testoo">
		 						<input type="text" class="form-control form-control-sm inp" id="name" name="name" placeholder="Your name" required>
		 				</div>
	 					<div class="md-form form-sm em" id="goody"><span class="orange-text" data-feather="at-sign">
	 						<input type="email" class="form-control form-control-sm ema inp" id="email" aria-describedby="user-mail" name="email" placeholder="Your email" required>
	 					</div>

	 					<button id="submitForm" class="btn btn-sm btn-success BTN">Subscribe</button>
	 				</form>
	 			 <?php endif; ?>

                                            </div>
                                            <div class="col-md-2">
                                                </div>
                                                <div class="get-started">
					
										
				</div>	
                                        </div>
                                        
                                        </div>
                                    </main>

    

    

    

    

    <!-- Bootstrap core JavaScript -->
    

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
