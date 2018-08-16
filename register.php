<!------------------------------------------------------------------------------------- 
    Author: itshally
    File Name: register.php
    Description: This file is for the registration page.
--------------------------------------------------------------------------------------->
<?php include('header.php'); ?>
       <div class="container-fluid d-flex justify-content-center">
         <form id="register-form" method="post" action="register.php">
              <div class="container-fluid">
            <h1>Register Here:</h1>
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
                    <label>First Name: </label>
                <br>
                    <input type="text" name="firstname">
                </div>           
                <div class="row">
                    <label>Last Name: </label>
                <br>
                    <input type="text" name="lastname">
                </div>
                <div class="row">
                    <label>Username: </label>
                <br>
                    <input type="text" name="username">
                </div>
                <div class="row">
                    <label>Email: </label>
                <br>
                    <input type="text" name="email">
                </div>
                <div class="row">
                    <label>Password: </label>
                <br>
                    <input type="password" name="password">
                </div>
                <div class="row">
                    <label>Confirm Password: </label>
                <br>
                    <input type="password" name="confirm_password">
                </div>
            </div>
             <br>
             <br>
				<button type="submit" class="btn btn-lg" name="create">Create Account</button> <button type="reset" class="btn btn-lg">Clear</button> <a href="index.php"><input type="button" class="btn btn-lg" value="Back"></a>
             </div>
		 </form>
    </div>
<?php include('footer.php');?>