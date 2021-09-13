<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Recover Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

                                    
    <body>
        <div class="home-btn d-none d-sm-block">
            <a href="index.php" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-success">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-success p-4">
                                            <h5 class="text-success"> Reset Password</h5>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.php">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title bg-light">
                                                <img src="../assets/images/logo.png " alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="p-2">
<?php
    require('../config/db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST["submit"])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($db,$email); //escapes special characters in a string
		
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `prof`
		 WHERE email='$email' 
		  ";

		$result = mysqli_query($db,$query) or die;
		$cred = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($result);
        if($rows==1){
            function password_generate($chars) 
        {
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$*%`?[]{};<>?.,_-()abcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
    }

 $id = $cred['id'];
 
 $pass = password_generate(12);


 $query = "UPDATE `customer` SET `password` ='".md5($pass)."'  WHERE id = '$id' ";

 $db->query($query);
 if($db->error){
     echo $db->error;
 }else{

        $to = $email;
        $subject = "RESET PASSWORD";
        $message = "Your new password is <b>" . $pass ."<b>";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
        /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
        
        mail($to,$subject,$message,$headers);
        
            echo ' <div class="alert alert-success text-center mb-4" role="alert">
            Your new Password has been sent to you. Check your email.
        </div>' ;
       
  
 }

        
			
            }else{
				echo ' <div class="alert alert-danger text-center mb-4" role="alert">
                Email not found in the system
            </div>
            <form class="form-horizontal" action="" method="post">
            
            <div class="form-group">
                <label for="useremail">Email</label>
                <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter email">
            </div>

            <div class="form-group row mb-0">
                <div class="col-12 text-right">
                    <button class="btn btn-success w-md waves-effect waves-light" type="submit" name="submit">Reset</button>
                </div>
            </div>

        </form>
            <div class="mt-5 text-center">
            <p>Remember It ? <a href="login.php" class="font-weight-medium text-success"> Sign In here</a> </p>
            <p><a href="recoverpw.php" class="font-weight-medium text-success"> Try Again </a> </p>
        </div>

            ' ;
				}
    }else{
       
?>
                                    
                                    <form class="form-horizontal" action="" method="post">
            
                                        <div class="form-group">
                                            <label for="useremail">Email</label>
                                            <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter email">
                                        </div>
                    
                                        <div class="form-group row mb-0">
                                            <div class="col-12 text-right">
                                                <button class="btn btn-success w-md waves-effect waves-light" type="submit" name="submit">Reset</button>
                                            </div>
                                        </div>
    
                                    </form>
                                    <div class="mt-5 text-center">
                            <p>Remember It ? <a href="login.php" class="font-weight-medium text-success"> Sign In here</a> </p>
                            <p><a href="recoverpw.php" class="font-weight-medium text-success"> Try Again </a> </p>
                        </div>
                                </div>
                                <?php
                              }
                              ?>
                            </div>

                          
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>
</html>
<?php include('topbarp.php');?>