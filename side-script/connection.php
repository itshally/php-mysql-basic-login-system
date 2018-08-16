<?php
   session_start();

    /*
        Use this file to connect to the database. 
        My database name for this is "basic_login_users".
        ========================================
        Note: I have another sql server that is why i used 'localhost:3307' as my local server,
              but you can remove ':3307' if it doesn't work for you.
    */

    $db_conn = mysqli_connect("localhost:3307", "root", "", "basic_login_users");
    
    //this variable will specifically hold the errors
    $error_msg = array();


// ------------------- Below is for the login page -------------------

    if(isset($_POST['login'])){

        //declare variable
        $username = mysqli_real_escape_string($db_conn, $_POST['username']);
        $password = mysqli_real_escape_string($db_conn, $_POST['password']);
        
        //validation for empty fields
        if(empty($username) && empty($password)){
            array_push($error_msg, "Username and Password are required.");
        }
        else
            if(empty($username)){
                array_push($error_msg, "Username is required.");
            }
        else
            if(empty($password)){
               array_push($error_msg, "Password is required."); 
           } // end of empty validation
        else{
            // otherwise... 
            $encrypt_password = md5($password);
            $data_query = "SELECT username, password FROM user_tbl WHERE username='$username' AND password='$encrypt_password'";
            $data = mysqli_query($db_conn, $data_query);
            $check_user = mysqli_num_rows($data);
            
            if($check_user == 0 ){
               array_push($error_msg, "You are not yet registered. Please create an account.");
            }
            else{
                 $_SESSION['username'] = $username;
                 header('Location: user.php');
                }
            }
    } //end for login

// ------------------- Below is for the registration page -------------------
     if(isset($_POST['create'])){
        //declare variables
        $firstname = mysqli_real_escape_string($db_conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db_conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($db_conn, $_POST['email']);
        $username = mysqli_real_escape_string($db_conn, $_POST['username']);
        $password = mysqli_real_escape_string($db_conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($db_conn, $_POST['confirm_password']);
        
        //validation for empty field
        if(empty($firstname) && empty($lastname) && empty($email) && empty($username) && empty($password) && empty($confirm_password)){
            array_push($error_msg, "Invalid submission.");
        }
        else{ //if submission is incomplete because some fields are empty and incorrect ...
            
                 //first name validation
                if(empty($firstname)){
                    array_push($error_msg, "First name is empty.");
                }else
                    if(!preg_match("/^[a-zA-Z\s]+$/", $firstname)){
                        array_push($error_msg, "First name must contain letters only.");
                    }

                 //last name validation
                if(empty($lastname)){
                     array_push($error_msg, "Last name is empty.");
                 }else
                    if(!preg_match("/^[a-zA-Z\s]+$/", $lastname)){
                         array_push($error_msg, "Last name must contain letters only.");
                    }

                //validation for username
                if(empty($username)){
                    array_push($error_msg, "Username is empty.");
                }else
                    if(strpos($username, ' ') != false){
                    array_push($error_msg, "Username must not have any spaces.");
                }else{
                        $data_query = "SELECT username FROM user_tbl WHERE username='$username'";
                        $data = mysqli_query($db_conn, $data_query);
                        $check_result = mysqli_num_rows($data);
                            // if username is already used
                            if($check_result > 0){
                                array_push($error_msg, "Username is already existing.");
                            }
                    }
        
            //validation for email
                if(empty($email)){
                    array_push($error_msg, "Email is empty.");
                 }else
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        array_push($error_msg, "Invalid email.");
                    }else  //check if email is already existing
                        {
                        $data_query = "SELECT email FROM user_tbl WHERE email='$email'";
                        $data = mysqli_query($db_conn, $data_query);
                        $check_result = mysqli_num_rows($data);
                            //if email is already used
                            if($check_result > 0){
                                array_push($error_msg, "Email is already existing.");
                                }
                         }
           
                //validation for password
                 if(empty($password)){
                     array_push($error_msg, "Password is empty.");
                 }else
                    if(strpos($password, ' ' != false)){
                     array_push($error_msg, "Password must not have any spaces.");
                 }else
                    if ($password != $confirm_password){
                     array_push($error_msg, "Password did not match.");
                 }else{
                        // nothing to code here
                    }
            }
         
             //if errors not found, data must successfully save to the database
            if(count($error_msg) == 0){
                 $encrypt_password = md5($password); //this will encrypt the password
                 $data_query = "INSERT INTO user_tbl (firstname, lastname, username, email, password, confirm_password) VALUES ('$firstname', '$lastname', '$username', '$email', '$encrypt_password', '$confirm_password')";
                 mysqli_query($db_conn, $data_query);
                    $_SESSION['username'] = $username;
                    header('Location: user.php');
            }
         } //end of create button "if"
        

// ------------------- Below is for the logout button -------------------

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
