<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>
<<<<<<< HEAD
    
    <style>

body{font-family: 'Roboto', sans-serif;}

    .vertical-menu {
    background: #007562 !important;
}

.text-success{
    color: #007562 !important;
}

.btn-success{
    background-color: #007562 !important;
}

.navbar-brand-box {
    background: #007562 !important;
}

.avatar-title {
    background-color: #007562;
}

.checkout-tabs .nav-pills .nav-link.active {
    background-color: #007562;
}

</style>
=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

    <body>

        <div class="home-btn d-none d-sm-block">
<<<<<<< HEAD
            <a href="index.php" class="text-dark"><i class="fas fa-home h2"></i></a>
=======
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
<<<<<<< HEAD
                            <div class="bg-soft-success">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-success p-4">
                                            <h5 class="text-success">Welcome Back !</h5>
                                            <p>Sign in to continue to Cetonvale</p>
=======
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue to $$$$$.</p>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="../assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
<<<<<<< HEAD
                                    <a href="index.php">
                                        <div class="d-none avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title  bg-light">
                                               
=======
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="../assets/images/logo.svg" alt="" class="rounded-circle" height="34">
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                <?php
	require('../config/db.php');
    session_start();
    
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($db,$email); //escapes special characters in a string
		$password = md5($_POST['password']);
		$password = mysqli_real_escape_string($db,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin`
		 WHERE email='$email' and
		  password='$password'
		  ";

		$result = mysqli_query($db,$query);
		$cred = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($result);
        if($rows==1){
			session_start();
			$_SESSION['ademail'] = $email;
			$_SESSION['adminid'] =$cred["id"];  

            header("Location: deposits.php");
            
			
            }else{
				echo "<div class='form'><h3>email/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
                                    <form class="form-horizontal"  method="POST" >
<<<<<<< HEAD
         <img src="../assets/images/logo.png" alt="" class="mb-3" height="50">
         
=======
        
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                        <div class="form-group">
                                            <label for="Phone Number">E-mail</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" required>
                                        </div>
                
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                        </div>
                                        
                                        <div class="mt-3">
<<<<<<< HEAD
                                            <button class="btn btn-success btn-block waves-effect waves-light"  name="submit" type="submit">Log In</button>
                                        </div>
            
                                                                                            <div class="mt-4 text-center">
                                            <a href="recoverpw.php" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
=======
                                            <button class="btn btn-primary btn-block waves-effect waves-light"  name="submit" type="submit">Log In</button>
                                        </div>
            
                                                                                            <div class="mt-4 text-center">
                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                        </div>
                                    </form>

                                    <!---->

<br>


<?php } ?>

                                    <!---->
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
<<<<<<< HEAD
                                <p>© <script>document.write(new Date().getFullYear())</script> . Crafted with <i class="mdi mdi-heart text-danger"></i> by Creative Haven</p>
=======
                                <p>© 2020 . Crafted with <i class="mdi mdi-heart text-danger"></i> by $$$$$$$$</p>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="../assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="../assets/js/app.js"></script>
    </body>
</html>
