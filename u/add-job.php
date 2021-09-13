<?php
require('../config/db.php');

/*
require_once '../vendor/autoload.php';

session_start();
if(!isset($_SESSION["business-id"])){
header("Location: login");
exit(); } 
else if(isset($_SESSION["business-id"])){
    $business_id = $_SESSION['business-id'];
}

*/
    date_default_timezone_set('Africa/Nairobi');






session_start();
if(!isset($_SESSION["email"])){
header("Location: index.php");
exit(); } 
else if(isset($_SESSION["email"])){
    $email= $_SESSION['email'];
    $id = $_SESSION['id'];


};




    date_default_timezone_set('Africa/Nairobi');



    $queryCat = "SELECT * FROM `task_category` ORDER by `category` ASC";
    $resultCat = mysqli_query($db,$queryCat);
    $cats =  mysqli_fetch_all($resultCat, MYSQLI_ASSOC);
    
    $queryCounty = "SELECT * FROM `counties` ORDER by `county` ASC";
    $resultCounty = mysqli_query($db,$queryCounty);
    $counties =  mysqli_fetch_all($resultCounty, MYSQLI_ASSOC);
    




   
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
                                    <h4 class="mb-0 font-size-18">Add Job</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Add Job</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Job Details</h4>

                                        <form method="POST"  action="../upload.php" enctype="multipart/form-data" >
                                            <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="productname">Title</label>
                                                            <input id="productname" name="title" type="text" class="form-control" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Category</label>
                                                            <select class="form-control " name="category" required>
                                                                <option value="">-- Select --</option>
                                                                <?php foreach ( $cats as $cat) :?>
                                                                <option value="<?php echo $cat['category']; ?>" class="text-capitalize"><?php echo $cat['category']; ?></option>
                                                                <?php endforeach ?>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">County</label>
                                                            <select class="form-control " name="county" required>
                                                                <option> --Select-- </option>
                                                                <?php foreach ( $counties as $county) :?>
                                                                <option value="<?php echo $county['county']; ?>" class="text-capitalize"><?php echo $county['county']; ?></option>
                                                                <?php endforeach ?>
                                                                
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="productname">Town</label>
                                                            <input id="town" name="town" type="text" class="form-control" required>
                                                        </div>


                                                        
                                                    </div>

                                                    <div class="col-sm-6">


                                                        <div class="form-group">
                                                            <label for="productdesc">Description</label>
                                                            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="price">Budget</label>
                                                            <input id="price" name="price" type="text" class="form-control" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="period">Period</label>
                                                            <input id="period" name="period" type="text" class="form-control" required>
                                                        </div>
                                                        

                                                        <div class="form-group ">
                                                            <label for="Image">Image</label>
                                                            <input class="form-control" type="file"name="uploadfile" id="uploaded" accept=".jpg,.jpeg,.png.,">
                                                           </div>

                                                           

                                                    </div>
                                                </div>

                                                <button type="submit" name="submit" class="btn btn-success mr-1 waves-effect waves-light">Save</button>
                                                <button type="submit" class="btn btn-secondary waves-effect">Cancel</button>


                                        </form>
                                    </div>

                                </div> <!-- end card-->
        

                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<?php include('../p/footer.php'); ?>
                
         
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
