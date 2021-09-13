<?php

require('../config/db.php');

date_default_timezone_set('Africa/Nairobi');


$getid = mysqli_real_escape_string($db, $_GET['id']);
$id = base64_decode($getid);


$queryjobs = "SELECT * FROM `tasks` WHERE `prof-id`= '$id'  ORDER by `id`DESC";
$resultjobs = mysqli_query($db,$queryjobs);
$jobs =  mysqli_fetch_all($resultjobs, MYSQLI_ASSOC);




$querywithdraw = "SELECT * FROM `withdraw` WHERE `prof-id`= '$id'  ORDER by `id`DESC";
$resultwithdraw = mysqli_query($db,$querywithdraw);
$withdraws =  mysqli_fetch_all($resultwithdraw, MYSQLI_ASSOC);

mysqli_free_result($resultjobs);
mysqli_free_result($resultwithdraw);
mysqli_close($db);





   
include('topbar.php');
include('sidebar.php');

   
?>
<<<<<<< HEAD
<style>

.checkout-tabs .nav-pills .nav-link.active {
    background-color: #2a9d48;
}
</style>
=======

>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c


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
                                    <h4 class="mb-0 font-size-18">Prof Proflile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Professsional</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        
                        <div class="checkout-tabs">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-gen-ques-tab" data-toggle="pill" href="pages-faqs.html#v-pills-gen-ques" role="tab" aria-controls="v-pills-gen-ques" aria-selected="true">
                                            <i class="bx bx-question-mark d-block check-nav-icon mt-4 mb-2"></i>
                                            <p class="font-weight-bold mb-4">Profile</p>
                                        </a>
                                        <a class="nav-link" id="v-pills-privacy-tab" data-toggle="pill" href="pages-faqs.html#v-pills-privacy" role="tab" aria-controls="v-pills-privacy" aria-selected="false"> 
                                            <i class="bx bx-check-shield d-block check-nav-icon mt-4 mb-2"></i>
                                            <p class="font-weight-bold mb-4">Jobs</p>
                                        </a>
                                        <a class="nav-link" id="v-pills-support-tab" data-toggle="pill" href="pages-faqs.html#v-pills-support" role="tab" aria-controls="v-pills-support" aria-selected="false">
                                            <i class="bx bx-support d-block check-nav-icon mt-4 mb-2"></i>
                                            <p class="font-weight-bold mb-4">Withdraw</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                <!-- JOBS POSTED -->
                           
                                    <div class="card " id="jobs" >
                                        <div class="card-body">
                                        <p>JOBS DONE</p>
                                        <div class="table-responsive">
                   <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                           <tr>
                             
                               <th>Job ID</th>
                               <th>Title</th>
                               <th>Category</th>
                               <th>County</th>
                               <th>Town</th>
                               <th>Price</th>
                               <th>Funds Status</th>
                               <th>Status</th>
                               <th>time created</th>
                           </tr>
                       </thead>

                       <tbody>
                       <?php foreach ( $jobs as $job ):  ?>
                           <tr>
                                                    
                           <td class="text-uppercase"><?php echo base64_encode($job['id']); ?></td>
                               <td class="text-capitalize"><?php echo $job['title']; ?></td>
                               <td><?php echo $job['category']; ?></td>
                               <td><?php echo $job['county']; ?></td>
                               <td><?php echo $job['town']; ?></td>
                               <td><?php echo $job['price']; ?></td>
                               <td><?php echo $job['funds-status']; ?></td>
                               <td><?php echo $job['cstatus']; ?></td>
                               <td><?php echo $job['time-created']; ?></td>

                                </tr>
                          
                           <?php endforeach   ?>

                           
                       </tbody>
                   </table>
               </div>
                                        </div>
                                    </div>
                                <!-- END OF JOBS POSTED -->


                                 <!-- WITHDRAW POSTED -->
                                 <div class="card" id="withdraw">
                                        <div class="card-body">
                                        <h5>WITHDRAW MADE</h5>
                                        <div class="table-responsive">
                                        <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                           <tr>
                             
                               <th>Trans ID</th>
                               <th>Amount</th>
                               <th>Service Charge</th>
                               <th>Receive</th>
                               <th>Payment Mode</th>
                               <th>Status</th>
                               <th>Date Created</th>
                               
                           </tr>
                       </thead>

                       <tbody>
                       <?php foreach ( $withdraws as $withdraw ):  ?>
                           <tr>
                                                    
                           <td class="text-uppercase"><?php echo $withdraw['trans-id']; ?></td>
                               <td class="text-capitalize"><?php echo $withdraw['amount']; ?></td>
                               <td><?php echo $withdraw['service-charge']; ?></td>
                               <td><?php echo $withdraw['receive']; ?></td>
                               <td><?php echo $withdraw['payment-mode']; ?></td>
                               <td><?php echo $withdraw['cstatus']; ?></td>
                               <td><?php echo $withdraw['date-created']; ?></td>

                                </tr>
                          
                           <?php endforeach   ?>

                           
                       </tbody>
                   </table>
               </div>


                                        </div>
                                    </div>
                                <!-- END OF WITHDRAW POSTED -->
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>       



                </div>
                <!-- End Page-content -->

                
                <?php include('../u/footer.php'); ?>

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