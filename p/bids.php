<?php

require('../config/db.php');


date_default_timezone_set('Africa/Nairobi');

session_start();
if(!isset($_SESSION["profid"])){
header("Location: login.php");
exit(); } 
else if(isset($_SESSION["profid"])){
   $id = $_SESSION['profid'];
}


$queryBids = "SELECT * FROM `bids` WHERE   `prof-id`='$id' AND `status`='1' ";
$resultBids = mysqli_query($db,$queryBids);
$bids =  mysqli_fetch_all($resultBids, MYSQLI_ASSOC);
mysqli_free_result($resultBids);




   
include('topbar.php');
include('sidebar.php');
   
?>
<style>
  
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
                                    <h4 class="mb-0 font-size-18">My Bids</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">My Bids</a></li>
                                            <li class="breadcrumb-item active">Placed Bids</li>
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



                       <?php
  

                       
                       foreach ( $bids as $bid):   ?>  
                           <tr>
                                                    
                           
                                <td class="text-capitalize">
                            <?php    
                                $queryTask = 'SELECT * FROM tasks WHERE `id` = '.$bid["task-id"]; 
                                               $resultTask = mysqli_query($db,$queryTask);
                                               $task = mysqli_fetch_assoc($resultTask);
                                               mysqli_free_result($resultTask);

echo $task['title']; ?>

</td>
                               <td class="text-capitalize"><?php echo $task['category']; ?></td>
                               <td class="text-capitalize"><?php echo $task['county']; ?></td>
                               <td class="text-capitalize"><?php echo $task['town']; ?></td>
                               <td class="text-capitalize">Ksh <?php echo $task['price']; ?></td>
                               <td class="text-capitalize"><?php echo $task['time-created']; ?></td>
                               <td><a class="btn btn-sm btn-success" href="project-details.php?id=<?php echo  base64_encode($task['id']); ?>">View Job</a></td>
                           </tr>
                          
                           <?php endforeach  ?>

                           
                       </tbody>
                   </table>
               </div>

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

$( '#filter' ).click(function () {
$('#filter-section').toggle();
$('#tasks-section').toggle();

    
});




});




</script>




    </body>
</html>
