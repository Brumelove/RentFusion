<?php 
  session_start();
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
    
        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>-->
    
        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    
        <!-- Custom styles for this template -->
        <link href="css/creative.min.css" rel="stylesheet" type="text/css">
        <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"> </script>
        -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/popper.js"></script>



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


    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">We've got what you need!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">Rentfusion is a full-service Movie Rental Company offering nationwide rental, 
                service and support for corporate events, such as: trade shows, corporate user conferences, 
                seminars &amp; training, and other short-term business projects. Our customers range from fortune 1000 
                companies to small businesses in virtually all industry sectors. We carry a large inventory pool of constantly
                 updated standards based technology products in the way of computers, video walls, digital signage displays,
                  tablets &amp; mobile devices. Our technology consultants &amp; certified technicians are geared to deliver optimum
                 technology solutions tailored to our customer specific needs for each and every project we undertake!</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="services.html">Get Started!</a>
          </div>
        </div>
      </div>
    </section>



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
            <p>234-8136-915-46</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="brumelovee@gmail.com">brumelovee@gmail.com</a> 
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>
