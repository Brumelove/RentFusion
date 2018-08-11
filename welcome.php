<?php 
  session_start();
?>
<?php

  include "config/login.config.php";

?>






<!doctype html>

<html lang="en">

<head>

 <meta charset="UTF-8">

 <link rel="stylesheet" type="text/css" href="css/style.css" >

 <title>Welcome</title>

</head>

<body>

 <div id="container">

  <ul>



   <li><a href="index.php">Home</a></li>




  </ul>

  <h1>Welcome <?php echo $username, '!'; ?></h1><!-- This will say welcome sunny! for example -->

 </div>

</body>

</html>
