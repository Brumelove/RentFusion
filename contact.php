<?php 
  session_start();

?>
<!doctype html>

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
    

    

   
    

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>123-456-6789</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="brumelovee@gmail.com">brumelovee@gmail.com</a> 
            </p>
          </div>
        </div>
        
          
          
          <div class="row">
                                                    

                                                                <div class="col-lg-2">
                                                                        <!-- Form contact -->
                                                                        <!-- Form contact -->
                                                                      </div>

                                                        <!--Grid column-->
                                                        <div class="col-lg-8">
                                                                <!-- Form contact -->
                                                                `<?php if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) ): ?>
                         <?php
        
                         //Import your Class here;
                         include "classes/ContactUs.php";
                         ContactUs::process($_POST);
                         ?>
                         <div align="center">
                             <h1>Thank You For Contacting Us!</h1>
                             <p>An email has been forwarded to you.</p>
                             <br>
                             <a href="contact.php">Contact Us</a>
                         </div>
                         

 <?php else: ?>
                                                                    <form class="p-5" action = "contact.php" method = "post">
                                                            <div class="md-form form-sm" id="testoo"> <span class="orange-text" data-feather="user"></span>
                                            <input type="text" id="name" name="name" class="form-control form-control-sm inp" placeholder="Your name">
                                                <span id="name_error">
                                                                       
                                                                      
                                                                        
                                                                </span>
                                                                
                                                                    </div>
                                                                    <div class="md-form form-sm em" id="goody"> <span class="orange-text" data-feather="at-sign"></span>
                    <input type="email" id="email" name="email" class="form-control form-control-sm ema inp" placeholder="Email Address">
                        <!--<div class="suc_err_div"></div>-->
                                            <span id="email_error"></span>
                                                                        
                                                                    </div>
                                                                    
                                                                    <div class="md-form form-sm"> <span class="orange-text" data-feather="edit-3"></span>
                                                   <textarea type="text" name="message" id="message" class="md-textarea form-control form-control-sm inp" rows="4" placeholder="Message"></textarea>
                                            <span id="message_error"></span>
                                                                    </div>
                                                                    <div class="mt-4 text-center">
                                                                    <button class="btn btn-sm btn-success BTN" name = "submit" id="submitForm"> Submit</button>
                                                                       
                                                                    </div>
                                                                        
                                                                    </form>
                                                                    </div><?php endif; ?>
                                                                    
                                                                    <div class="text-center">
                                                                            <select class="custom-select" id="animation_speed" name="sellist1" style="width: 230px; background-color: blue;color:white;">
                                                                                    <option selected value="200"> Select Speed </option>
                                                                                    <option value="1000">Extra Slow</option>
                                                                                    <option value="500">Slow</option>
                                                                                    <option value="150">Normal</option>
                                                                                    <option value="50">Fast</option>
                                                                                    <option value="10">Very Fast</option>
                                                                                    <option value="1">Extra Fast</option>
                                                                                  </select>
                                                                      </div>
                                                                    <div class="text-center">
                                                                            <button class="btn btn-sm btn-danger BTN" id="side_animation"> Side To Side Animation</button>
                                                                            <button class="btn btn-sm btn-danger BTN" id="blink_animation"> Blink Animation</button>
                                                                            <button class="btn btn-sm btn-success BTN" id="hide_animation"> Hide/Show Animation</button>
                                                                    </div>

                                                                    <div class="text-center">
                                                                          <button class="btn btn-sm btn-success BTN" id="clear_animation"> Clear Animations</button>
                                                                    </div>
                                                                    
                                                                <!-- Form contact -->
                                                              </div>


                                                              <div class="col-lg-2">
                                                              
                                                                    <!-- Form contact -->
                                                                    
                                                                    <!-- Form contact -->
                                                                  </div>
                                                        <!--Grid column-->
                                                    
                                                        <!--Grid column-->
                                                                                    
                                                        <!--Grid column-->
                                                    
                                                       
                                                        

    </section>

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
