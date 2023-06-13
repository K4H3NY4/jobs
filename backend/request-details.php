<?php

require('../config/db.php');


$id = mysqli_real_escape_string($db, $_GET['id']);
$query = 'SELECT * FROM withdraw WHERE  id =  '.$id ;
$result = mysqli_query($db,$query);
$project = mysqli_fetch_assoc($result);
$taskid = base64_decode($id);
mysqli_free_result($result);

$profquery = 'SELECT * FROM prof WHERE  id = '.$project['prof-id'];
$profresult = mysqli_query($db,$profquery);
$profDetails = mysqli_fetch_assoc($profresult);
mysqli_free_result($profresult);


$customerquery = 'SELECT * FROM customer WHERE  id = '.$project['customer-id'];
$customerresult = mysqli_query($db,$customerquery);
$customerDetails = mysqli_fetch_assoc($customerresult);
mysqli_free_result($customerresult);


/**
 * 
 * If there is no project with that id redirect to 404 page
 * and if the professional didn't take the job it will redirect to 404
 * 
 *  */

 /*

if( $project['id'] == NULL ){
    header("Location: ../404.php");
}else{}

*/


if(isset($_POST['completeTrans']) && $_POST['transId'] != NULL) {

    $transid = mysqli_real_escape_string($db, $_POST['transId']);
    $update_id = mysqli_real_escape_string($db, $_POST['update_id']);

    $sql =  "UPDATE withdraw SET  `cstatus` = 'Complete' ,`trans-id`='$transid', `date-paid`=now() WHERE id = {$update_id} ";

    
    $db->query($sql);
    if($db->error){
    echo $db->error;
    }else{
    
            /**
             * send mail to customer
             **/
            $to = $profDetails["email"];
            $subject = "WITHDRAW REQUEST SUCCESSFUL";
            $message = "Your withdraw request of transaction ID: <b>" . $transid . "</b>was successful login in to view more details.";
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";

            mail($to,$subject,$message,$headers);
            
   header("Location: request-details.php?id=$id");

    
    }
    
    
    }
    
         

   // mysqli_close($db);
    

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
                                    <h4 class="mb-0 font-size-18">Withdraw Request Details</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                            <li class="breadcrumb-item active">Projects Overview</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                
                                 <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Amount :</th>
                                                        <td><?php echo $project ["amount"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Service Charge :</th>
                                                        <td><?php echo $project ["service-charge"];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Receive:</th>
                                                        <td><?php echo $project ["receive"];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">Payment Mode:</th>
                                                        <td><?php echo $project ["payment-mode"];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Date Requested:</th>
                                                        <td><?php echo $project ["date-created"];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">Status:</th>
                                                        <td><?php echo $project ["cstatus"];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">Transaction ID:</th>
                                                        <td><?php echo $project ["trans-id"];?></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>

                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-4">


                                                                    <?php

                                        /*** 
                                        * 
                                        * Professional Details be displayed if the task is 
                                        * taken or closed but hide when open
                                        * 
                                        * 
                                        */

                                        if( $project['prof-id']  !='0'){
                                        
                                        echo('
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-4">Professional Details</h4>

                                                    <div class="media mb-4">
                                                        <div class="col-4">
                                                            <img class="media-object rounded-circle avatar-xs" alt="" src="../');
                                                            echo($profDetails["picture"]);
                                                            echo('">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="font-size-13 mb-1 text-capitalize"> ');
                                                            
                                                echo($profDetails["first-name"]);

                                                echo(' ');
                                                        
                                                        echo( $profDetails["last-name"]);

                                                        echo('
                                                            
                                                    </h5>
                                                            <p class="text-muted mb-1 text-dark"> Tel : ');

                                                            echo($profDetails["phone"]);

                                                            echo('   
                                                            </p>

                                                            <p class="text-muted mb-1 text-dark"> E-mail : ');

                                                        echo( $profDetails["email"] );

                                                        echo(' 
                                                            </p>
                                                <br>
                                                </div>   </div>  </div>  </div>

                                            ');
                                        } else if( $project['customer-id'] != '0') { 
                                           
                                            echo('
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-4">User Details</h4>

                                                    <div class="media mb-4">
                                                        <div class="col-4">
                                                            <img class="media-object rounded-circle avatar-xs" alt="" src="assets/images/users/avatar-2.jpg">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="font-size-13 mb-1 text-capitalize"> ');
                                                            
                                                echo($customerDetails["first-name"]);

                                                echo(' ');
                                                        
                                                        echo( $customerDetails["last-name"]);

                                                        echo('
                                                            
                                                    </h5>
                                                            <p class="text-muted mb-1 text-dark"> Tel : ');

                                                            echo($customerDetails["phone"]);

                                                            echo('   
                                                            </p>

                                                            <p class="text-muted mb-1 text-dark"> E-mail : ');

                                                        echo( $customerDetails["email"] );

                                                        echo(' 
                                                            </p>
                                                <br>
                                                </div>   </div>  </div>  </div>

                                            ');






                                        };
                                            
                                            ?>



                                    <?php 
                                    if( $project['trans-id'] == 'Pending Verification'){
                                        echo('
                                        <div class="card">
                                         <div class="card-body">
                                        <h4 class="card-title mb-4">Transaction ID</h4>

                                        <form action="" method="post" class="row mb-3">
                                        <input type="hidden" name="update_id" value="');
                                        
                                        echo $project["id"]; 
                                        
                                      echo('">
                                        <input type="text" placeholder="Enter Transaction ID" name="transId" class="form-control w-75 ml-3"> 
                                        <button class="btn btn-sm btn-success ml-3" type="submit" name="completeTrans">Update</button>
                                        </form>
                                        </div>
                                        </div>

                                  '); }else{} ?>
                                        
                                   
                            </div>
                                
                            </div>

                         
                        </div>
                        <!-- end row -->

                       
                        <!-- end row -->

                    </div> <!-- container-fluid -->
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

    </body>
</html>
