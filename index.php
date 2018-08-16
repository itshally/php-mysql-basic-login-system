<!------------------------------------------------------------------------------------- 
    Author: itshally
    File Name: index.php
    Description: This file is the main page where the user must login to their account.
--------------------------------------------------------------------------------------->
<?php include('header.php'); ?>
       <div class="container-fluid d-flex justify-content-center">
         <form method="post" action="index.php">
             <div class="container-fluid">
             <h1>Please Login</h1>
             <!----------- here will show the error message(s) ----------->
                 <div class="alert alert-dismissible fade show" role="alert">
                     <?php
                        foreach($error_msg as $notification){
                            echo "$notification <br>";
                        }
                     ?>
                 </div>
             <!---------------------------- end ---------------------------->
            <div class="col">
                <div class="row">
                    <label>Username: </label>
                <br>
                    <input type="text" name="username" placeholder="Enter Username">
                </div>
                <div class="row">
                    <label>Password: </label>
                <br>
                    <input type="password" name="password" placeholder="Enter Password">
                </div>
            </div>
                <hr>
             <div class="col">
             Don't have account yet? <a href="register.php" class="click-link">Register Here</a>
             </div>
             <br>
             <br>
             <button type="submit" class="btn btn-lg" name="login">Login</button>
            </div>
         </form>
          
       </div>
<?php include('footer.php');?>