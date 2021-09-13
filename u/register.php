<?php

require('../config/db.php');
/*
$query = 'SELECT * FROM rider ';
$result = mysqli_query($db,$query
*/
    if(isset($_POST['register'])){

        $firstName = mysqli_real_escape_string ( $db, $_POST['firstName']);
        $lastName = mysqli_real_escape_string ( $db, $_POST['lastName']);
      //  $idNumber = mysqli_real_escape_string ($db, $_POST['idNumber']);
       $phone = mysqli_real_escape_string ($db, $_POST['phone']);
       $phone1 = $phone  * 1;
       $password = mysqli_real_escape_string ($db, $_POST['password']);
       $email = mysqli_real_escape_string ($db, $_POST['email']);
       $confirmPassword = mysqli_real_escape_string ($db, $_POST['confirmPassword']);
/*
       $cover_photo = $_FILES['uploadfile']['name'];
       $covertmpname = $_FILES['uploadfile']['tmp_name'];
       $folder = 'uploads/';
       //$array1 = explode($_FILES['uploadfile'],['name']);
     //$file_name_extension = $array1;
       $new_file_name = time().rand(1000,9999)."_".$cover_photo;
       $folder="uploads/".date('Y')."/".date('m')."/".date('d');
   
       if(!is_dir($folder)){
           mkdir($folder,0777,true);
           $folder = $folder."/".$new_file_name;
       }else{
           $folder = $folder."/".$new_file_name;
       }
       
   
   
      move_uploaded_file($covertmpname,  $folder);
   
   */
   
   
       if ($password == $confirmPassword) {
   
        $sql = "INSERT INTO `customer` SET
       
        `first-name`='$firstName',
       `last-name`='$lastName',
       `password`='".md5($password)."',
      
       `phone`= '254$phone1',
       `email`='$email' ";
      
   
   
   $db->query($sql);
   if($db->error){
    
       echo $db->error;
   }else{
<<<<<<< HEAD
       $to = $email;
       $subject = "ACCOUNT CREATED";
       $message = "You have successful open an acount" ;
       
       // Always set content-type when sending HTML email
       $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
       
       // More headers
       $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
       /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
       
       mail($to,$subject,$message,$headers);
=======
       echo "submitted";
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
       header("Location: profile.php");
   }      
       } else   {
        echo ('
                <style>
                #pswd {
                    display: inline !important;


                }
                
                </style>

     
      
        
        ');
    } }
?>

  

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Register</title>
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
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
            

                <div class="row ">
                <div class="col-12" align="center">
                <div class="d-inline justify-content-center center" >
                        <a href="" class=" text-white btn  btn-success">Register as User</a>
                        <a href="../p/register.php" class=" btn  btn-outline-success">Register as Professionals</a>
                        </div>
                
<h2 class="mt-4">Create a user account</h2>
<br>
<h4>
Sign up to use your dashboard—it's fast and free. Showcase your brand, enhance your listings and much more. 
Learn more about your dashboard. Visit our Support Site
</h4>
<br>
<br>
                </div>
                    <div class="col-md-8 col-lg-4 col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-success">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="d-none text-success p-4">
                                            <h5 class="text-success">Free Register</h5>
                                            <p>Get your free Cetonvale account now.</p>
                                        </div>
                                    </div>
                                    <div class="d-none col-5 align-self-end">
=======
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Free Register</h5>
                                            <p>Get your free Cetonvale account now.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                        <img src="../assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
<<<<<<< HEAD
                                    <a href="index.php">
                                        <div class="d-none avatar-md  profile-user-wid mb-4">
                                            <span class="d-none avatar-title  bg-light">
                                                <img src="../assets/images/logo.png" alt="" class="rounded-circle" height="34">
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
                                
                                    <form class="form-horizontal"   action="<?php $_SERVER['PHP_SELF']; ?>"  method="POST">
<<<<<<< HEAD
                                    <img src="../assets/images/logo.png" alt="" class=" mb-3 "  height="50">


                                    <div class="form-group">
                                            <label for="username">First Name</label>
                                            <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
=======

                                    <div class="form-group">
                                            <label for="username">First Name</label>
                                            <input type="text" class="form-control" name="firstName" placeholder="Enter phone" required>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Last Name</label>
<<<<<<< HEAD
                                            <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
=======
                                            <input type="text" class="form-control" name="lastName" placeholder="Enter phone" required>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                        </div>

                                  
                                        <div class="form-group">
<<<<<<< HEAD
                                            <label for="useremail">E-mail</label>
=======
                                            <label for="useremail">Email</label>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                            <input type="email" class="form-control" name="email" placeholder="Enter email" required>        
                                        </div>
                
                                        <div class="form-group">
                                            <label for="username">Phone</label>
                                            <input type="telephone" class="form-control" name="phone" placeholder="Enter phone" required>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter password">        
                                        </div>
                    

                                        <div class="form-group">
                                        <label for=""> Confirm Password</label><br>
        <input type="password" class="form-control" name="confirmPassword">
                                        </div>

                                        

                              <div class="mt-4">
<<<<<<< HEAD
                                            <button class="btn btn-success btn-block waves-effect waves-light" name="register" type="submit">Register</button>
                                            <br>
                                            <p class="text-center pt-3">Already have an account ? <a href="login.php" class="font-weight-medium text-success"> Login</a> </p>

=======
                                            <button class="btn btn-primary btn-block waves-effect waves-light" name="register" type="submit">Register</button>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                        </div>

                                      
                
                                        <div class="mt-4 text-center">
<<<<<<< HEAD
                                            <p class="mb-0">By registering you agree to the Cetonvale <a href="#" class="text-success">Terms of Use</a></p>
=======
                                            <p class="mb-0">By registering you agree to the Cetonvale <a href="dashboard/login.php" class="text-primary">Terms of Use</a></p>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
<<<<<<< HEAD
                                <p>© <script>document.write(new Date().getFullYear())</script>. Crafted with <i class="mdi mdi-heart text-danger"></i> by Creative Haven</p>
=======
                                <p>Already have an account ? <a href="login.php" class="font-weight-medium text-primary"> Login</a> </p>
                                <p>© 2020. Crafted with <i class="mdi mdi-heart text-danger"></i> by Cetonvale</p>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                            </div>
                        </div>

                    </div>
<<<<<<< HEAD
<div class="col-8" align="center">



    <iframe class="pt-5" width="720" height="500" src="https://www.youtube.com/embed/jSracKB8rwc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


</div>

=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
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
<?php include('topbaru.php');?>
=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
