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



$queryProfs = "SELECT * FROM `prof` ORDER by `id` DESC";
$resultProfs = mysqli_query($db,$queryProfs);
$profs =  mysqli_fetch_all($resultProfs, MYSQLI_ASSOC);
mysqli_free_result($resultProfs);



mysqli_close($db);

   
include('topbar.php');
include('sidebar.php');
   
?>

<style>
<<<<<<< HEAD
    .profs-section{
=======
    .search-jobs{
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
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
                                    <h4 class="mb-0 font-size-18">Professionals Available </h4>
=======
                                    <h4 class="mb-0 font-size-18">Professionals Available <span class="ml-5 btn btn-sm btn-outline-primary" id="filter">FILTER</span></h4>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                            <li class="breadcrumb-item active">Professionals Available</li>
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
                             
<<<<<<< HEAD
                               <th class="text-capitalize">Profile Photo</th>
                               <th class="text-capitalize">Name</th>
=======
                               <th class="text-capitalize">First Name</th>
                               <th class="text-capitalize">Last Name</th>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                               <th class="text-capitalize">Occupation</th>
                               <th class="text-capitalize">County</th>
                               <th>Action</th>
                               
                            

                           </tr>
                       </thead>
                    

                       <tbody>
                       <?php foreach ( $profs as $prof ):  ?>
                           <tr>
                                                    
                           
<<<<<<< HEAD
                                <td class="text-capitalize"> <img src="../<?php echo $prof ["picture"]; ?>" alt="" class="img-thumbnail" style="
    width: 75px;
    height: 75px;
">
</td>
                               <td class="text-capitalize"><?php  echo $prof['first-name']; echo ' '; echo $prof['last-name'];?></td>
                               <td class="text-capitalize"><?php echo $prof['occupation']; ?></td>
                               <td class="text-capitalize"><?php echo $prof['county']; ?></td>
                               <td><a class="btn btn-sm btn-success" href="prof-profile.php?id=<?php echo  base64_encode($prof['id']); ?>">View Profile</a></td>
=======
                                <td class="text-capitalize"><?php echo $prof['first-name']; ?></td>
                               <td class="text-capitalize"><?php echo $prof['last-name']; ?></td>
                               <td class="text-capitalize"><?php echo $prof['occupation']; ?></td>
                               <td class="text-capitalize"><?php echo $prof['county']; ?></td>
                               <td><a class="btn btn-sm btn-primary" href="prof-profile.php?id=<?php echo  base64_encode($prof['id']); ?>">View Profile</a></td>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                           </tr>
                          
                           <?php endforeach   ?>

                           
                       </tbody>
                   </table>
               </div>

                        </div>

<<<<<<< HEAD
                      
=======
                        <div class="row" id="profs-section">
                                               
                        <?php foreach ( $profs as $prof) :?>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-16">
                                                D
                                            </span>
                                        </div>
                                        <h5 class="font-size-15"> <a href="prof-profile.php?id=<?php echo  base64_encode($prof['id']); ?>" class="text-dark text-capitalize"><?php echo $prof['first-name'] ,' ' ,$prof['last-name']; ?> </a></h5>
                                        <p class="text-muted text-capitalize"><?php echo $prof['occupation']; ?></p>

                                        <div>
                                        <a href="prof-profile.php?id=<?php echo  base64_encode($prof['id']); ?>" class="badge badge-primary font-size-11 m-1"><?php echo $prof['county']; ?></a>
                                          
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            
                                            <div class="flex-fill">
                                            <a href="prof-profile.php?id=<?php echo  base64_encode($prof['id']); ?>"data-toggle="tooltip" data-placement="top" title="" data-original-title="Profile"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
<?php endforeach ?>
                            
                        </div>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
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

        
<<<<<<< HEAD
        
=======
        <script> 
    $(document).ready(function() {

$( '#filter' ).click(function () {
$('#filter-section').toggle();
$('#profs-section').toggle();

    
});




});




</script>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

    </body>
</html>
