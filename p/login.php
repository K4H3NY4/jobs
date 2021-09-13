<<<<<<< HEAD


=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
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
<<<<<<< HEAD
                    <div class="" align="center" >
                        <a href="../u/login.php" class=" text-white btn  btn-success">Log in as User</a>
                        <a href="#" class=" btn  btn-outline-success">Login in as Professional</a>
                        </div>
                        <div class="card overflow-hidden mt-4">
                            <div class="bg-soft-success">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-success p-4">
                                            <h5 class="text-success">Welcome Back !</h5>
                                            <p>Sign in to continue to Cetonvale as a Professional.</p>
=======
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue to Cetonvale.</p>
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
                                            <span class="avatar-title  bg-white">
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
    if(isset($_SESSION["profid"])){
        header("Location: profile.php");
         } else {}
    
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($db,$email); //escapes special characters in a string
		$password = md5($_POST['password']);
		$password = mysqli_real_escape_string($db,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `prof`
		 WHERE email='$email' and
		  password='$password'
		  ";

		$result = mysqli_query($db,$query);
		$cred = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($result);
        if($rows==1){
			session_start();
			$_SESSION['profemail'] = $email;
			$_SESSION['profid'] =$cred["id"];
			
			echo 'success';
            echo $_SESSION['profid'];

            header("Location: profile.php");
            
			
            }else{
<<<<<<< HEAD
                
                echo(' <form class="form-horizontal"  method="POST" >

                                        <div class="form-group">
                                            <label for="Phone Number">E-mail</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" required>
                                        </div>
                                        <div class="alert alert-danger"><p>E-mail Password is incorrect.</p></div>
                
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                        </div>
                                        
                                        <div class="mt-3">
                                            <button class="btn btn-success btn-block waves-effect waves-light"  name="submit" type="submit">Log In</button>

                                            <br>
                                            <p class="pt-3 text-center">Dont have an account ? <a href="register.php" class="font-weight-medium text-success"> Signup now </a> </p>

                                        </div>
            
                                                                                            <div class="mt-4 text-center">
                                            <a href="recoverpw.php" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                        </div>
                                    </form>');
				echo "";
=======
				echo "<div class='form'><h3>email/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
				}
    }else{
?>
                                    <form class="form-horizontal"  method="POST" >
<<<<<<< HEAD

                                        <div class="form-group">
                                            <label for="Phone Number">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
=======
        
                                        <div class="form-group">
                                            <label for="Phone Number">E-mail</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
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
                                            <div class="row col-12 mt-3" align="center">
                                            <span class="col-5 m-0 p-0"><hr></span><span class="col-2 mt-2">OR</span> <span class="col-5 m-0 p-0"><hr></span>
                                            </div>

                                            <br><br><br>
                                             <?php include('google/login.php');?>
                                      <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Continue With Google" class="btn btn-danger">

                                            <p class="pt-3 text-center">Don't have an account ? <a href="register.php" class="font-weight-medium text-success"> Signup now </a> </p>

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
                                <p>Don't have an account ? <a href="register.php" class="font-weight-medium text-primary"> Signup now </a> </p>
                                <p>© 2020 . Crafted with <i class="mdi mdi-heart text-danger"></i> by Cetonvale</p>
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
<<<<<<< HEAD
<?php include('topbarp.php');?>
=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
