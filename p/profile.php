<?php
require('../config/db.php');
require('prof-balance.php');
/*
session_start();

if(!isset($_SESSION["profid"])){
header("Location: prof-login.php");
exit(); } 
else if(isset($_SESSION["profid"])){
   $profid = $_SESSION['profid'];
}

*/
    date_default_timezone_set('Africa/Nairobi');



$profid = $_SESSION['profid'];

$query = "SELECT * FROM `prof` WHERE id = '$profid'";
$result = mysqli_query($db,$query);
$profs = mysqli_fetch_assoc($result);
mysqli_free_result($result);

$queryCount =" SELECT COUNT(`prof-id`) FROM `tasks` WHERE `cstatus`='Taken' or `cstatus`='Closed' AND `prof-id` ='$profid'";
$resultCount =  mysqli_query($db,$queryCount);
$count = mysqli_fetch_assoc($resultCount);
mysqli_free_result($resultCount);

$queryPending =" SELECT COUNT(`prof-id`) FROM `tasks` WHERE  `cstatus`='Taken' or  `cstatus`='Closed' AND `funds-status`='Pending'   AND `prof-id` ='$profid'";
$resultPending =  mysqli_query($db,$queryPending);
$pending = mysqli_fetch_assoc($resultPending);
mysqli_free_result($resultPending);


$queryTasks = "SELECT * FROM `tasks` WHERE `cstatus`='Taken' or `cstatus`='Closed' AND `prof-id` ='$profid'  ORDER by `time-created` DESC";
$resultTasks = mysqli_query($db,$queryTasks);
$tasks =  mysqli_fetch_all($resultTasks, MYSQLI_ASSOC);
mysqli_free_result($resultTasks);


mysqli_close($db);


   
include('topbar.php');
include('sidebar.php');
    

?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <style>
                #edit-profile{
                    display: none;
                }
            </style>
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Profile</h4>
                                   

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Dashboard<a href="javascript: void(0);"></a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-soft-primary">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>It will seem like simplified</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="../assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="../<?php echo $profs ["picture"]; ?>" alt="" class="img-thumbnail rounded-circle" style="
    width: 75px;
    height: 75px;
">
                                                </div>
                                                <h5 class="font-size-15 text-truncate"><?php echo $profs ["first-name"]; echo ' '; echo $profs['last-name']; ?></h5>
                                                <p class="text-muted mb-0 text-truncate"><?php echo $profs ["occupation"];?></p>
                                                <p href="" id="editProfile" class="btn btn-primary waves-effect waves-light btn-sm mt-2">Edit Profile <i class="mdi mdi-arrow-right ml-1"></i></p>
                                            </div>

                                            <div class="col-8 pt-3 table-responsive">
                                        
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td><?php echo $profs ["first-name"]; echo' '; echo $profs ["last-name"];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td><?php echo $profs ["phone"];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td><?php echo $profs ["email"];?></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                            
                                             
                                                 
                                        </div>
                                       
                                   
                                    </div>
                                    <span id="edit-profile">

                                    
                                    <hr>
                    <h5 class="pl-3">Change Password</h5>
                                            <table class="table table-nowrap mb-0 pl-3">
                                                <tbody>
                                                <form action="" method="POST">
                                                    <tr>
                                                        <th scope="row">Old Password :</th>
                                                        <td><input type="password" name="oldPassword"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">New Password :</th>
                                                        <td><input type="password" name="newPassword"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ConfirmPassword:</th>
                                                        <td><input type="password" name="confirmPassword"></td>
                                                    </tr>
                                                    <tr>
                                                    <th> <input class="btn btn-sm btn-primary" type="submit" name="changePassword" value="Update"></th>
                                                    
                                                    </tr>
                                                  
                                                    </form>
                                                    
                                                </tbody>
                                            </table>
    <hr>

                                            <h5 class="pl-3">Change Profile Picture</h5>
                                          
                                                <form action="../prof-pic.php" method="POST"  enctype="multipart/form-data" >
                                                
                                                        Upload Photo
                                                     <input class="form-control" type="file" name="uploadfiled" id="uploaded" >
                                                     <input type="hidden" name="update_id" value="<?php echo $profs["id"]; ?>">

                                                     <input class="btn btn-sm btn-primary" type="submit" name="submit-profpic">
                                                    </form>
                                    </span>        
                                                
                                            

                                </div>

                                <!-- end card -->
                                

                               
                             
                                <!-- end card -->
                            </div>         
                            
                            <div class="col-xl-8">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Completed Projects</p>
                                                        <h4 class="mb-0"><?php echo $count['COUNT(`prof-id`)'];?></h4>
                                                    </div>
        
                                                    <div class="mini-stat-icon avatar-sm align-self-center rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-check-circle font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Pending Payments</p>
                                                        <h4 class="mb-0"><?php echo $pending['COUNT(`prof-id`)'];?></h4>
                                                    </div>
        
                                                    <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-hourglass font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Wallet Balance</p>
                                                        <h4 class="mb-0"><?php  echo (" Ksh  $available_balance" ) ; ?></h4>
                                                    </div>
        
                                                    <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-package font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">My Jobs</h4>
                                        <div class="table-responsive">
                                        <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">JOB ID</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Category</th>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">Funds Status</th>
                                                        <th scope="col">Budget</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ( $tasks as $task) :?>
                                                  
                                                    <tr>
                                                    
                                                           
                                                        <th scope="row"><a class="text-dark" href="project-details.php?id=<?php echo  base64_encode($task['id']); ?>"> <?php  echo base64_encode($task['id']); ?> </a></th>
                                                        <td><a class="text-dark text-capitalize" href="project-details.php?id=<?php echo base64_encode($task['id']); ?>"><?php echo ($task["title"] ) ;?></a> </td>
                                                        <td><a class="text-dark text-uppercase" href="project-details.php?id=<?php echo base64_encode($task['id']); ?>"><?php echo ($task["category"] ) ;?></a> </td>
                                                        <td><a class="text-dark" href="project-details.php?id=<?php echo base64_encode($task['id']); ?>"><?php echo ($task["time-created"] ) ;?></a> </td>
                                                        <td><a class="text-dark" href="project-details.php?id=<?php echo base64_encode($task['id']); ?>"><?php echo ($task["funds-status"] ) ;?></a> </td>
                                                        <td><a class="text-dark" href="project-details.php?id=<?php  echo base64_encode($task['id']); ?>"><?php echo $task["price"]  ;?></a></td>
                                                        </a>
                                                    </tr>
                                                    
                                                            <?php endforeach ?>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <?php include('footer.php'); ?>


            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="../assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="../assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="../assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
       <!-- JAVASCRIPT -->
       <script src="../assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Required datatable js -->
        <script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        
        <!-- crypto-wallet init -->
        <script src="../assets/js/pages/crypto-wallet.init.js"></script>

        <script src="../assets/js/app.js"></script>

        <script>
            

$(document).ready(function() {


$( '#editProfile' ).click(function () {
$('#edit-profile').toggle();

});

});


        </script>

    </body>
</html>
