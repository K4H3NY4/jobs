<?php

require('../config/db.php');


$queryProfs = "SELECT * FROM `occupations` ORDER by RAND() LIMIT 8 ";
$resultProfs = mysqli_query($db,$queryProfs);
$profs =  mysqli_fetch_all($resultProfs, MYSQLI_ASSOC);



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
                                            <p>Get your free $$$$$$ account now.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="../assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="../assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                
                                    <form class="form-horizontal"   action="../u/prof-reg.php"  method="POST">

                                    <div class="form-group">
                                            <label for="username">First Name</label>
                                            <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Last Name</label>
                                            <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                                        </div>

                                       

                                        <div class="form-group">
                                            <label for="useremail">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter email" required>        
                                        </div>
                
                                        <div class="form-group">
                                            <label for="username">Phone</label>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">+254</span>

                                            
                                            <input type="telephone" class="form-control" name="phone" placeholder="Enter phone" required>
                                        </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                            <label class="control-label">Occupation</label>
                                                            <select class="form-control " name="occupation" required>
                                                                <option value="">-- Select --</option>
                                                                <?php foreach ( $profs as $prof) :?>
                                                                <option value="<?php echo $prof['occupation']; ?>" class="text-capitalize"><?php echo $prof['occupation']; ?></option>
                                                                <?php endforeach ?>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </div>


                                    
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter password">        
                                        </div>
                    

                                        <div class="form-group">
                                        <label for=""> Confirm Password</label><br>
        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password">
                                        </div>

                                        

                              <div class="mt-4">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" name="register" type="submit">Register</button>
                                        </div>

                                      
                
                                        <div class="mt-4 text-center">
                                            <p class="mb-0">By registering you agree to the $$$$$ <a href="dashboard/login.php" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>Already have an account ? <a href="login.php" class="font-weight-medium text-primary"> Login</a> </p>
                                <p>© 2020. Crafted with <i class="mdi mdi-heart text-danger"></i> by $$$$$$$</p>
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
