<?php

require('../config/db.php');
require('balance.php');


date_default_timezone_set('Africa/Nairobi');

$query = "SELECT * FROM `customer` WHERE id = '$id'";
$result = mysqli_query($db,$query);
$customers = mysqli_fetch_assoc($result);
mysqli_free_result($result);

$queryTrans = "SELECT * FROM `deposit` WHERE `customer-id` = '$id' ORDER by `date_created` DESC ";
$resultTrans = mysqli_query($db,$queryTrans);
$transactions =  mysqli_fetch_all($resultTrans, MYSQLI_ASSOC);
mysqli_free_result($resultTrans);


$queryCustomerWithdraw = "SELECT * FROM `withdraw` WHERE `customer-id` = '$id' ORDER by `date-created` DESC ";
$resultCustomerWithdraw = mysqli_query($db,$queryCustomerWithdraw);
$customerWithdraws =  mysqli_fetch_all($resultCustomerWithdraw, MYSQLI_ASSOC);
mysqli_free_result($resultCustomerWithdraw);


$queryJobs = "SELECT * FROM `tasks` WHERE `prof-id` !='0' && `customer-id` = '$id'  ORDER by `id` DESC ";
$resultJobs = mysqli_query($db,$queryJobs);
$jobs =  mysqli_fetch_all($resultJobs, MYSQLI_ASSOC);
mysqli_free_result($resultJobs);






if(isset($_POST['top-up']) && $_POST['amount'] != NULL && $_POST['payment-mode'] != NULL){
    $transid = mysqli_real_escape_string ( $db, $_POST['trans-id']);
    $amount = mysqli_real_escape_string ( $db, $_POST['amount']);
    $paymentmode = mysqli_real_escape_string ($db, $_POST['payment-mode']);
  
       
   $sql = "INSERT INTO `deposit` SET
   
    `trans-id`='$transid',
   `amount`='$amount',
   `cstatus`='Pending Verification',
   `payment-mode`='$paymentmode',
   `customer-id`='$id'  ";
  

$db->query($sql);
                                        
if($db->error){

    
 }else{
     /***
         * 
         * your deposit of ksh xxx is being processed. we'll contact you shortly.
         * 
         * * */

        $to = $customers['email'];
        $subject = "ACCOUNT TOP UP";
        $message = "Your top up is of transaction ID: <b>" . $transid . "</b> deposited via <b>" .$paymentmode ."</b>. Ksh "  .$amount. " will be added to your wallet";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
        /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
        
        mail($to,$subject,$message,$headers);
        
    header("Location: wallet.php");
    
 }
 
 
 };

 //mysqli_close($db);
 
?>

 <?php

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
                                    <h4 class="mb-0 font-size-18">Wallet</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">My Wallet</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="media">
                                            <div class="mr-4">
                                                <i class="mdi mdi-account-circle text-success h1"></i>
                                            </div>

                                            <div class="media-body">
                                                <div class="text-muted">
                                                    <h5 class="text-capitalize"> <?php echo $customers ["first-name"]; echo ' '; echo $customers['last-name']; ?></h5>
                                                    <p class="mb-1"><?php echo $customers['email'];?></p>
                                                    <p class="mb-0"><?php echo $customers['phone'];?></p>
                                                </div>
                                                
                                            </div>

                                            <div class="col-sm-6 text-right">
                                                <div>
                                                    <p class="text-muted mb-2">Available Balance</p>
                                                    <h5><?php  echo (" Ksh  $available_balance" ) ; ?></h5>
                                                </div>
                                            </div>

                                  
                                        </div>
                                    </div>
                                
                     
<hr>
                                    <div class="">




                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Top Up Account</h4>

                                        <form method="POST">
                                            <div class="form-group">
                                                <label for="formrow-firstname-input">Transaction ID</label>
                                                <input type="text" class="form-control" name="trans-id" id="formrow-firstname-input" required>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formrow-email-input">Amount</label>
                                                        <input type="number" class="form-control"  name ="amount" min="10" id="formrow-email-input" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="formrow-inputState">Mode Of Payment</label>
                                                        <select id="formrow-inputState" class="form-control" name="payment-mode">
                                                            <option >Choose...</option>
                                                            <option value="m-pesa">M-PESA</option>
                                                            <option value="cash">CASH</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
<hr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <p class="text-justify">For mpesa transaction: <br>
                                                        Enter Till number: $$$  $$$ <br>
                                                        Enter Amount: Ksh $$$$ <br>
                                                        Then enter the mpesa code as Transaction ID</p>
                                                    </div>
                                                </div>
                                                
                                                
                                          
                                                </div>
                                            </div>

                                           
                                            <div class="pl-3">
                                                <button type="submit" class="btn btn-success w-md pl-1" name="top-up" >Submit</button>
                                            </div>
                                        </form>
                                        <?php
                                        

                                        
                                        
                                        ?>
                                    </div>
                                </div>
                            </div>
                                </div>
                       
                            
                            <div class="col-xl-8">
                               
                                <!-- end row -->


                                <!-- test tabs --->

<div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Wallet History</h4>
                                        <p class="card-title-desc"></p>
        
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="wallet.php#home1" role="tab" id="topups" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class=" d-sm-block">Top Ups</span> 
                                                </a>
                                            </li>
                                            <!--
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="wallet.php#profile1" role="tab" id="withdraws" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class=" d-sm-block">Withdraws</span> 
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="wallet.php#messages1" role="tab" id="payouts" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-sm-block">Jobs Paid</span>   
                                                </a>
                                            </li>
-->
                                        </ul>
        
                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                     
                                   
   
   

           
               <div class="table-responsive">
                   <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                           <tr>
                             
                               <th>Transaction ID</th>
                               <th>Payment Mode</th>
                               <th>Amount</th>
                               <th>Status</th>
                               <th>Date Paid</th>
                           </tr>
                       </thead>

                       <tbody>
                       <?php foreach ( $transactions as $transaction ):  ?>
                           <tr>
                                                    
                           <td class="text-uppercase"><?php echo $transaction['trans-id']; ?></td>
                               <td class="text-capitalize"><?php echo $transaction['payment-mode']; ?></td>
                               <td><?php echo $transaction['amount']; ?></td>
                               <td><?php echo $transaction['cstatus']; ?></td>
                               <td><?php echo $transaction['date_created']; ?></td>
                           </tr>
                          
                           <?php endforeach   ?>

                           
                       </tbody>
                   </table>
               </div>

           
  
 

                                            </div>
                                            <div class="tab-pane " id="profile1" role="tabpanel">
                                            <div class="table-responsive">
                   <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                           <tr>
                             
                               <th>Transaction ID</th>
                               <th>Payment Mode</th>
                               <th>Amount</th>
                               <th>Service Charge</th></th>
                               <th>Status</th>
                               <th>Date Paid</th>
                           </tr>
                       </thead>

                       <tbody>
                       <?php foreach ( $customerWithdraws as $customerWithdraw ):  ?>
                           <tr>
                                                    
                           <td class="text-uppercase"><?php echo $customerWithdraw['trans-id']; ?></td>
                               <td class="text-capitalize"><?php echo $customerWithdraw['payment-mode']; ?></td>
                               <td><?php echo $customerWithdraw['amount']; ?></td>
                               <td><?php echo $customerWithdraw['service-charge']; ?></td>
                               <td><?php echo $customerWithdraw['cstatus']; ?></td>
                               <td><?php echo $customerWithdraw['date-created']; ?></td>
                           </tr>
                          
                           <?php endforeach   ?>

                           
                       </tbody>
                   </table>
               </div>

                                            </div>
                                            <div class="tab-pane" id="messages1" role="tabpanel">
                                            <div class="table-responsive">
                   <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                           <tr>
                             
                               <th>Job ID</th>
                               <th>Title</th>
                               <th>Amount</th>
                               <th>Funds</th>
                               <th>Status</th>
                               <th>Date Posted</th>
                           </tr>
                       </thead>

                       <tbody>
                       <?php foreach ( $jobs as $job ):  ?>
                           <tr>
                                                    
                           <td><a class="text-dark" href="project-details.php?id=<?php echo  base64_encode($job['id']); ?>"> <?php echo  base64_encode($job['id']); ?></a></td>
                               <td class="text-capitalize"><a class="text-dark" href="project-details.php?id=<?php echo  base64_encode($job['id']); ?>"><?php echo $job['title']; ?></a></td>
                               <td><a class="text-dark" href="project-details.php?id=<?php echo  base64_encode($job['id']); ?>"><?php echo $job['price']; ?></a></td>
                               <td><a class="text-dark" href="project-details.php?id=<?php echo  base64_encode($job['id']); ?>"><?php echo $job['funds-status']; ?></a></td>
                               <td><a class="text-dark" href="project-details.php?id=<?php echo  base64_encode($job['id']); ?>"><?php echo $job['cstatus']; ?></a></td>
                               <td><a class="text-dark" href="project-details.php?id=<?php echo  base64_encode($job['id']); ?>"><?php echo $job['time-created']; ?></a></td>
                           </tr>
                          
                           <?php endforeach   ?>

                           
                       </tbody>
                   </table>
               </div>
                                            </div>
                                            <div class="tab-pane" id="settings1" role="tabpanel">
                                                <p class="mb-0">
                                                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                                    art party before they sold out master cleanse gluten-free squid
                                                    scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                                    art party locavore wolf cliche high life echo park Austin. Cred
                                                    vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                                    farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                                    mustache readymade keffiyeh craft.
                                                </p>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>


<!--- end tabs --->

                             
                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                       
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

        <script>
    $(document).ready(function() {

    $( '#topups' ).click(function () {
    $('#home1').addClass('active');
    $('#profile1').removeClass('active');
    $('#messages1').removeClass('active');
 
    
        
    });

    $( '#withdraws' ).click(function () {
    $('#home1').removeClass('active');
    $('#profile1').addClass('active');
    $('#messages1').removeClass('active');
 
    
        
    });

    $( '#payouts' ).click(function () {
    $('#home1').removeClass('active');
    $('#profile1').removeClass('active');
    $('#messages1').addClass('active');
 
    
        
    });

    $( '#btn4' ).click(function () {
    $('.welcome').toggle();
    $('.signin-form').hide();
    $('.signup-form').hide();
    $('.recover').hide();

    });

    $( '#btn5' ).click(function () {
    $('.recover').toggle();
    $('.welcome').show();
    $('.signin-form').hide();
    $('.signup-form').hide();

});
    


    });



   
</script>


    </body>
</html>
