<?php

require('config/db.php');

date_default_timezone_set('Africa/Nairobi');


session_start();
if(isset($_SESSION["profid"])){
<<<<<<< HEAD
    header("Location: p/jobs.php");

}  else if(isset($_SESSION["id"])){
    header("Location: u/jobs.php");
=======
    header("Location: http://localhost/housing-jobs/p/jobs.php");

}  else if(isset($_SESSION["id"])){
    header("Location: http://localhost/housing-jobs/u/jobs.php");
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

} else {}



$queryTasks = "SELECT * FROM `tasks` WHERE `cstatus` = 'Open' ORDER by `time-created` DESC";
$resultTasks = mysqli_query($db,$queryTasks);
$tasks =  mysqli_fetch_all($resultTasks, MYSQLI_ASSOC);
mysqli_free_result($resultTasks);
   
include('topbar.php');
include('sidebar.php');
   
?>



<style>
    .search-jobs{
        display: none;
    }
</style>


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
<<<<<<< HEAD
                                    <h4 class="mb-0 font-size-18">Jobs Available <span class="ml-5 btn btn-sm btn-outline-success" id="filter">FILTER</span></h4>
=======
                                    <h4 class="mb-0 font-size-18">Jobs Available <span class="ml-5 btn btn-sm btn-outline-primary" id="filter">FILTER</span></h4>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                            <li class="breadcrumb-item active">Jobs Available</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="container-fluid search-jobs" id="filter-section">
                                
                                <div class="table-responsive">
                   <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                           <tr>
                             
                               <th class="text-capitalize">Title</th>
                               <th >Category</th>
                               <th>County</th>
                               <th>Town</th>
                               <th>Budget</th>
                               <th>Time Posted</th>
                               <th>Action</th>
                            

                           </tr>
                       </thead>
                    

                       <tbody>
                       <?php foreach ( $tasks as $task ):  ?>
                           <tr>
                                                    
                           
                                <td class="text-capitalize"><?php echo $task['title']; ?></td>
                               <td class="text-capitalize"><?php echo $task['category']; ?></td>
                               <td class="text-capitalize"><?php echo $task['county']; ?></td>
                               <td class="text-capitalize"><?php echo $task['town']; ?></td>
                               <td class="text-capitalize">Ksh <?php echo $task['price']; ?></td>
                               <td class="text-capitalize"><?php echo $task['time-created']; ?></td>
<<<<<<< HEAD
                               <td><a class="btn btn-sm btn-success" href="project-details.php?id=<?php echo  base64_encode($task['id']); ?>">View Job</a></td>
=======
                               <td><a class="btn btn-sm btn-primary" href="project-details.php?id=<?php echo  base64_encode($task['id']); ?>">View Job</a></td>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                           </tr>
                          
                           <?php endforeach   ?>

                           
                       </tbody>
                   </table>
               </div>

                        </div>

                        <div class="row" id="tasks-section">

                        <?php foreach ( $tasks as $task) :?>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="avatar-md mr-4">
                                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                    <img src="<?php echo $task['photo'];?>" alt="" height="60"  width="60" class="rounded-circle">
                                                </span>
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-15 text-capitalize"><a href="project-details.php?id=<?php echo  base64_encode($task['id']); ?>" class="text-dark"><?php echo $task['title'];?></a></h5>
                                                <p class="text-muted mb-4 text-capitalize"> <span class="font-weight-bold"> County :</span> <?php echo  $task['county'];?> <br> <span class="font-weight-bold">  Town : </span> <?php echo $task['town'];?> </p>
                                                <p class="text-muted mb-4"></p>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item mr-3">
<<<<<<< HEAD
                                                <span class="badge badge-success text-uppercase"><?php echo $task['category'];?></span>
=======
                                                <span class="badge badge-primary text-uppercase"><?php echo $task['category'];?></span>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                            </li>
                                            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Time Posted">
                                                <i class= "bx bx-calendar mr-1"></i> <?php echo $task['time-created'];?>
                                            </li>
                                            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Budget">
                                                <i class= "bx bx-comment-dots mr-1"></i>Ksh <?php echo $task['price'];?>
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

                
                <?php include('u/footer.php'); ?>

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
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
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
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        
        <!-- crypto-wallet init -->
        <script src="assets/js/pages/crypto-wallet.init.js"></script>

        <script src="assets/js/app.js"></script>

        <script> 
    $(document).ready(function() {

$( '#filter' ).click(function () {
$('#filter-section').toggle();
$('#tasks-section').toggle();

    
});




});




</script>

<title>Jobs</title>
    </body>
</html>
