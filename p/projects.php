<?php

require('../config/db.php');

session_start();
if(!isset($_SESSION["profid"])){
header("Location: login.php");
exit(); } 
else if(isset($_SESSION["profid"])){
   $id = $_SESSION['profid'];
}


    date_default_timezone_set('Africa/Nairobi');



$id = $_SESSION['profid'];
 

$queryTasks = "SELECT * FROM `tasks` WHERE `cstatus`='Taken' or `cstatus`='Closed' AND `prof-id` = '$id'  ORDER by `time-created` DESC";
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
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">My Jobs</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">My Jobs </li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">

                        <?php foreach ( $tasks as $task) :?>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="avatar-md mr-4">
                                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                    <img src="../<?php echo $task['photo'];?>" alt="" height="60"  width="60" class="rounded-circle">
                                                </span>
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-15 text-capitalize"><a href="project-details.php?id=<?php echo base64_encode($task['id']); ?>" class="text-dark"><?php echo $task['title'];?></a></h5>
                                                <p class="text-muted mb-4 text-capitalize"> <span class="font-weight-bold"> County :</span> <?php echo $task['county'];?> <br>
                                                 <span class="font-weight-bold">  Town : </span> <?php echo $task['town'];?><br>
                                                 <span class="font-weight-bold"> Posted On :</span>  <?php echo $task['time-created'];?>
                                                 
                                                  </p>
                                                <p class="text-muted mb-4"></p>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item mr-3">
                                                <span class="badge badge-primary text-uppercase"><?php echo $task['category'];?></span>
                                            </li>
                                     
                                            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Budget">
                                                <i class= "bx bx-comment-dots mr-1"></i>Ksh <?php echo $task['price'];?>
                                            </li>
                                            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Status">
                                                <i class= "bx bx-comment-dots mr-1"></i>Status : <?php 
                                                
                                                if ($task['cstatus'] == 'Open'){
                                                            echo('
                                                            <span class="badge badge-warning text-uppercase">
                                                            '); echo $task['cstatus'];
                                                            echo('</span>');
                                                }else if($task['cstatus'] == 'Closed'){
                                                    echo('
                                                    <span class="badge badge-danger text-uppercase">
                                                    '); echo $task['cstatus'];
                                                    echo('</span>');

                                                }else{
                                                    echo('
                                                    <span class="badge badge-info text-uppercase">
                                                    '); echo $task['cstatus'];
                                                    echo('</span>');
                                                }

                                                ?>
                                                
                                               
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
<?php endforeach ?>
                            
                        </div>
                        <!-- end row -->

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


    </body>
</html>
