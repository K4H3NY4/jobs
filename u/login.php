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
            <a href="indexphp" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                
                    <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="" align="center" >
                        <a href="#" class=" text-white btn  btn-success">Log in as User</a>
                        <a href="../p/login.php" class=" btn  btn-outline-success">Login in as Professional</a>
                        </div>

                        <div class="card overflow-hidden mt-4">
                      

                            <div class="bg-soft-success">
                                <div class="row">

                                    <div class="col-7">


                                        <div class="text-success p-4">
                                            <h5 class="text-success">Welcome User !</h5>
                                            <p>Sign in to continue to Cetonvale as user.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="../assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="indexphp">
                                        <div class="d-none avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title  bg-light">
                                                <img src="../assets/images/logo.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
      <?php
	require('../config/db.php');

    
if(isset($_SESSION["id"])){
header("Location: profile.php");
 } else {}

    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($db,$email); //escapes special characters in a string
		$password = md5($_POST['password']);
		$password = mysqli_real_escape_string($db,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `customer`
		 WHERE email='$email' and
		  password='$password'
		  ";

		$result = mysqli_query($db,$query) or die;
		$cred = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($result);
        if($rows==1){
			session_start();
			$_SESSION['email'] = $email;
			$_SESSION['id'] =$cred["id"];
			header("Location: index.php"); // Redirect user to index.php
			echo 'success';
            echo $_SESSION['id'];

            header("Location: profile.php");
            
			
            }else{
                
                
                echo('
                
                <form class="form-horizontal"  method="POST" >

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
                                            <button class="btn btn-success btn-block waves-effect waves-light"  name="submit" type="submit">Log In</button>
                                            <br>
                                            
                                            </div>
                                            <br>
                                            <div class="alert alert-danger"><p>E-mail or Password is incorrect.</p></div>
                                    <br> ');
                                   include('google/login.php');
                                   echo('
                                      <input type="button" onclick="window.location='.$loginURL.'";" value="Log In With Google" class="btn btn-danger">

                                     <p class="text-center pt-3">Dont have an account ? <a href="register.php" class="font-weight-medium text-success" > Signup now </a> </p>
                                        
            
                                                                                            <div class="mt-4 text-center">
                                            <a href="recoverpw.php" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                        </div>
                                    </form>
                
                
                ');
                
				echo "";
				}
    }else{
?>
                                    <form class="form-horizontal"  method="POST" >

                                        <div class="form-group">
                                            <label for="Phone Number">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
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
                                            <button class="btn btn-success btn-block waves-effect waves-light"  name="submit" type="submit">Log In</button>
                                            <div class="row col-12 mt-3" align="center">
                                            <span class="col-5 m-0 p-0"><hr></span><span class="col-2 mt-2">OR</span> <span class="col-5 m-0 p-0"><hr></span>
                                            </div>
                                    <br><br><br>
                                    <?php include('google/login.php');?>
                                      <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Continue With Google" class="col-12 btn btn-danger">

                                    
                                            <p class="text-center pt-3">Don't have an account ? <a href="register.php" class="font-weight-medium text-success" > Signup now </a> </p>
                                        </div>
            
                                                                                            <div class="mt-4 text-center">
                                            <a href="recoverpw.php" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                        </div>
                                    </form>
                                <!---->


<?php } ?>

                                    <!---->
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                               
                                <p>© <script>document.write(new Date().getFullYear())</script> . Crafted with <i class="mdi mdi-heart text-danger"></i> by Creative Haven</p>
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
<?php include('topbaru.php');?>
