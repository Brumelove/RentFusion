<?php

	include "dbConfig.php";

	if(isset($_POST['signup'])){
        #function to clean input
        function clean($input){
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }
        $username = $email = $pwd = $pwd2 = "";
        $userErr = $emailErr = $pwdErr = $pwd2Err = "";
        $success = $failure = $acctExists ="";

        #Error handling server side
        if(empty($_POST['username'])){
            $userErr = "Enter your username";
        }else{
            $username = clean($_POST['username']);
            if(!preg_match("/^[a-zA-z0-9]*$/", $username)){
                $userErr = "No whitespaces";
            }
        }

        if(empty($_POST['email'])){
            $emailErr = "Enter your email";
        }else{
            $email = clean($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid email";
            }
        }

        if(empty($_POST['password'])){
            $pwdErr = "Enter your password";
        }else{
            $pwd = clean($_POST['password']);
        }

        if(empty($_POST['confirm_password'])){
            $pwd2Err = "Enter your password";
        }else{
            $pwd2 = clean($_POST['confirm_password']);
            if($pwd2 !== $pwd){
                $pwd2Err = "Enter the same Passwords";
            }
        }

        #if input is clean
        if($userErr==""&&$emailErr==""&&$pwdErr==""&&$pwd2Err==""){
            #make input safe for database
            $username = mysqli_real_escape_string($conn, $username);
            $email = mysqli_real_escape_string($conn, $email);
            $pwd = mysqli_real_escape_string($conn, $pwd);

            #query the database to know if user exists
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) < 1){
                #hash the password before saving input into database
                $hashed = password_hash($pwd, PASSWORD_DEFAULT);

                #write sql to save to database
                $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed')";
                echo $sql;
                $result = mysqli_query($conn, $sql);
                echo $result;
                #check to see if it was successfully inputed to the database then echo success message
                if($result){
                    $success = "Sign-up successful.";
                    header("Location: welcome.php");
                }else{
                    $failure = "Sign-up unsuccessful, please try again.\r\n".$conn->error;
                }
            }else{
                $acctExists = "User already has an account. <a href='login.php'>Login</a>";
            }
        }

    }

?>