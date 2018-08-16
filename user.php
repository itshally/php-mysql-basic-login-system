<!------------------------------------------------------------------------------------- 
    Author: itshally
    File Name: register.php
    Description: This file is the home page for the user.
--------------------------------------------------------------------------------------->
<?php include ('header.php'); ?>
       <div class="container-fluid d-flex justify-content-center">
           <div class="container" id="home-page">
               <div class="row">
                    <h1 id="home-h1">You have successfully logged in! 
                        <a href="side-script/logout.php"><input type="submit" name="logout" class="btn btn-lg home-btn" value="Logout"></a> </h1>
               </div>
               <br>
               <div class="row home-content">
                Welcome <?php echo $_SESSION['username']; ?>
                   <br><img src="img/giphy.gif" style="margin:auto; width:25%; height:auto;">
               </div>
               <!-- these will show the information of the user -->
               <p class="user-info">
                   <!-- start of php tag --> 
                    <?php
                        $username = $_SESSION['username'];
                        $data_query = "SELECT * FROM user_tbl WHERE username='$username'";
                        $data = mysqli_query($db_conn, $data_query);
                        $get_result = mysqli_fetch_array($data);
                       
                            if($get_result){
                                
                            ?>
                           <h2 style="text-align:center;">Your Information:</h2>
                           <table class="table">

                                <tr>
                                    <td class="label">First Name:</td>
                                    <td><?php echo $get_result['firstname']; ?></td>
                               </tr>
                               <tr>
                                    <td class="label">Last Name:</td>
                                    <td><?php echo $get_result['lastname']; ?></td>
                               </tr>
                               <tr>
                                    <td class="label">Username:</td>
                                    <td><?php echo $get_result['username']; ?></td>
                               </tr>
                               <tr>
                                    <td class="label">Email:</td>
                                    <td><?php echo $get_result['email']; ?></td>
                               </tr>
                           </table>
                    <?php } ?> <!-- end for php tag --> 
               </p>
           </div>
       </div>
<?php include('footer.php'); ?>