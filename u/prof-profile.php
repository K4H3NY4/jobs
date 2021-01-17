<?php
require('../config/db.php');




    date_default_timezone_set('Africa/Nairobi');



$id = mysqli_real_escape_string($db, $_GET['id']);
$query = 'SELECT * FROM `prof` WHERE  id = '.base64_decode($id);
$result = mysqli_query($db,$query);
$profs = mysqli_fetch_assoc($result);

$profid = base64_decode($id);

$queryCount =" SELECT COUNT(`prof-id`) FROM `tasks` WHERE `cstatus`='Taken' or `cstatus`='Closed' AND `prof-id` ='$profid'";
$resultCount =  mysqli_query($db,$queryCount);
$count = mysqli_fetch_assoc($resultCount);


$queryTasks = "SELECT * FROM `tasks` WHERE `cstatus`='Taken' or `cstatus`='Closed' AND `prof-id` ='$profid'  ORDER by `time-created` DESC";
$resultTasks = mysqli_query($db,$queryTasks);
$tasks =  mysqli_fetch_all($resultTasks, MYSQLI_ASSOC);

   
include('topbar.php');
include('sidebar.php');
    

?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Professsional Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Dashboard<a href="javascript: void(0);"></a></li>
                                            <li class="breadcrumb-item active">Professional Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" >
                            <div class="col-xl-4" >
                                <div class="card overflow-hidden">
                                    <div class="bg-soft-primary">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Professional Details</h5>
                                                    <p>Summary </p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="../<?php echo $profs ["picture"]; ?>" alt="" class="img-thumbnail rounded-circle">
                                                </div>                       
                                            </div>                                        
                                        </div>
                                       
                                        <div class=" pt-0 table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td class="text-capitalize"><?php echo $profs ["first-name"]; echo' '; echo $profs ["last-name"];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Profession :</th>
                                                        <td class="text-capitalize"><?php echo $profs ["occupation"]; ?></td>
                                                    </tr>
                                                  
                                                    <tr>
                                                        <th scope="row">County:</th>
                                                        <td><?php echo $profs ["county"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Phone :</th>
                                                        <td><?php echo $profs ["phone"]; ?></td>
                                                    </tr>
                                                   
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                               
                             
                                <!-- end card -->
                            </div>         
                            
                            <div class="col-xl-8">

                                <div class="row">
                                
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
        <script src="../assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/node-waves/waves.min.js"></script>

        <script src="../assets/js/app.js"></script>


    </body>
</html>
