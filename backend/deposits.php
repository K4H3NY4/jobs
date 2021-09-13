<?php

require('../config/db.php');

date_default_timezone_set('Africa/Nairobi');

$queryProfs = "SELECT * FROM `deposit` ORDER by `id` DESC";
$resultProfs = mysqli_query($db,$queryProfs);
$profs =  mysqli_fetch_all($resultProfs, MYSQLI_ASSOC);
mysqli_free_result($resultProfs);

if(isset($_POST['complete'])){   

    $update_id = mysqli_real_escape_string($db, $_POST['update_id']);
    $customerEmail = mysqli_real_escape_string($db, $_POST['customerEmail']);
    $amount = mysqli_real_escape_string($db, $_POST['amount']);
    $transid = mysqli_real_escape_string($db, $_POST['trans-id']);
    $paymentmode = mysqli_real_escape_string($db, $_POST['payment-mode']);

    $query = "UPDATE deposit SET  `cstatus` = 'Complete'  WHERE id = {$update_id} ";

    $db->query($query);
    if($db->error){
        echo $db->error;
    }else{
            /**
             * send mail to customer
             **/
            $to = $customerEmail;
            $subject = "DEPOSIT SUCCESSFUL";
            $message = "Your top up is of transaction ID: <b>" . $transid . "</b> deposited via <b>" .$paymentmode ."</b>. Ksh "  .$amount. " was successful";
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
            /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
            
            mail($to,$subject,$message,$headers);
 
header('Location: '.$_SERVER['PHP_SELF']);  
}
}

   
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
                                    <h4 class="mb-0 font-size-18">Deposits</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Finance</a></li>
                                            <li class="breadcrumb-item active">Deposits</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                        <div class="table-responsive">
                   <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                           <tr>
                             
                               
                               <th>Transaction ID</th>
                               <th>Amount</th>
                               <th>Payment Mode</th>
                               <th>Status</th>
                               <th>Date Paid</th>
                               <th>Action</th>
                           </tr>
                       </thead>

                       <tbody>
                       <?php foreach ( $profs as $prof ):  ?>
                           <tr>
                           <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"  >

                           <?php
                            $query = "SELECT * FROM `customer` WHERE id =".$prof['customer-id'];
                            $result = mysqli_query($db,$query);
                            $customers = mysqli_fetch_assoc($result);
                            mysqli_free_result($result);
                            ?>
                 
                           <input type="hidden" name="update_id" value="<?php echo $prof["id"]; ?>">
                           <input type="hidden" name="trans-id" value="<?php echo $prof["trans-id"]; ?>">
                           <input type="hidden" name="amount" value="<?php echo $prof["amount"]; ?>">
                           <input type="hidden" name="payment-mode" value="<?php echo $prof["payment-mode"]; ?>">
                           <input type="hidden" value="<?php echo($customers['email']);?>" name="customerEmail">

                               <td class="text-capitalize"><?php echo $prof['trans-id']; ?></td>
                               <td><?php echo $prof['amount']; ?></td>
                               <td class="text-capitalize"><?php echo $prof['payment-mode']; ?></td>
                               <td><?php echo $prof['cstatus']; ?></td>
                               <td><?php echo $prof['date_created']; ?></td>
                               <td><?php if( $prof['cstatus'] == 'Pending Verification'){
                                   echo ('<button class="btn btn-sm btn-success" name="complete">Complete</button>');
                               }   else if($prof['cstatus'] == 'Complete'){
                                   echo('<button class="btn btn-sm btn-success disabled">Verifed</button>');

                               }    ?>                      
                               
                                </td>
                                
                                
                           </form>
                           </tr>
                          
                           <?php endforeach   ?>

                           
                       </tbody>
                   </table>
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