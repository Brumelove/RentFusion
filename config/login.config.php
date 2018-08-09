<?php
	session_start();
	include "dbConfig.php";

	if(isset($_POST['login'])){
        function clean($input){
            $input = trim($input);
            $input = stripcslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }
        $username = $pwd = "";
        $userErr = $pwdErr = "";
        $success = $failure = "";

        if(empty($_POST['username'])){
            $userErr = "Please enter your username";
        }else{
            $username = clean($_POST['username']);
            if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
                $userErr = "No whitespaces";
            }
        }

        if(empty($_POST['password'])){
            $pwdErr = "Please enter your password";
        }else{
            $pwd = clean($_POST['password']);
        }

        if($userErr == "" && $pwdErr == ""){
            #check if user is in database
            $sql = "SELECT * FROM users WHERE u_user = '$username'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) < 1){
                $failure = "User doesn't exist. <a href='signup.php'>Sign-up</a>";
            }else{
                #check if password is same as in the database
                #first make input safe for database
                $username = mysqli_real_escape_string($conn, $username);
                $pwd = mysqli_real_escape_string($conn, $pwd);

                #get the contents from the database
                $row = mysqli_fetch_assoc($result);

                if($row){
                    #check if password matches the database
                    $checkHashed = password_verify($pwd, $row['u_pwd']);

                    if($checkHashed === TRUE){
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['user'] = $row['u_user'];
                        $_SESSION['email'] = $row['u_email'];
                        $success = "Login successful! Go <a href='index.php'>Home</a>";
                        echo $_SESSION['user'];
                        header("Location: index.php");
                
                    }elseif($checkHashed === FALSE){
                        $pwdErr= "Password is incorrect";
                    }
                }
            }
        }
    }

?>