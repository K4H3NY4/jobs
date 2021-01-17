<?php

require('../config/db.php');
require('prof-balance.php');



date_default_timezone_set('Africa/Nairobi');
$profid = $_SESSION['profid'];


$query = "SELECT * FROM `prof` WHERE id = '$profid'";
$result = mysqli_query($db,$query);
$profs = mysqli_fetch_assoc($result);
mysqli_free_result($result);


$queryTrans = "SELECT * FROM `withdraw` WHERE `prof-id` = '$profid' ORDER BY `date-created` DESC ";
$resultTrans = mysqli_query($db,$queryTrans);
$transactions =  mysqli_fetch_all($resultTrans, MYSQLI_ASSOC);
mysqli_free_result($resultTrans);
   
$queryRate = "SELECT * FROM `service_rate` WHERE `id` = '1' ";
$resultRate = mysqli_query($db,$queryRate);
$rates =   mysqli_fetch_assoc($resultRate);
mysqli_free_result($resultRate);




if(isset($_POST['withdraw-funds']) && $_POST['amount'] !=NULL && $available_balance > 0  ){
     
    


    $amount = mysqli_real_escape_string ( $db, $_POST['amount']);
    $paymentmode = mysqli_real_escape_string ($db, $_POST['payment-mode']);
    
    $serviceCharge = $amount * ($rates["service_rate"]/100);
    $receive =$amount * (1 - (($rates["service_rate"]/100)));
  
    if($amount > 0 && $amount <= $available_balance){
        
   $sql = "INSERT INTO `withdraw` SET
   
   `amount`='$amount',
   `trans-id`= 'Pending Verification',
   `cstatus`='Pending',
   `receive`='$receive',
   `service-charge`= '$serviceCharge',
   `payment-mode`='$paymentmode',
   `prof-id`='$profid'  ";

$db->query($sql);

    }else{
        echo('enter abovee 0 and anvailable balance');
    }




  


    if($db->error){
        echo $db->error;
    }else{
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

    }

 }
 




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
                                                <i class="mdi mdi-account-circle text-primary h1"></i>
                                            </div>

                                            <div class="media-body">
                                                <div class="text-muted">
                                                    <h5 class="text-capitalize"><?php echo $profs ["first-name"]; echo ' '; echo $profs['last-name']; ?></h5>
                                                    <p class="mb-1"><?php echo $profs['email'];?></p>
                                                    <p class="mb-0"><?php echo $profs['phone'];?></p>
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
                                        <h4 class="card-title mb-4">Withdraw Cash</h4>

                                        <form method="POST">
                                        
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="formrow-email-input">Amount</label>
                                                        <input type="number" class="form-control"  name ="amount" id="formrow-email-input" min="100" max="<?php  echo  $available_balance ; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="formrow-inputState">Mode Of Payment</label>
                                                        <select id="formrow-inputState" class="form-control" name="payment-mode">
                                                            <option >Choose...</option>
                                                            <option value="m-pesa">M-PESA</option>
                                                            <option value="bank">BANK TRANSFER</option>
                                                            <option value="cash">CASH</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
<hr>
                                  
                                            </div>

                                           
                                            <div class="pl-3">
                                                <button type="submit" class="btn btn-primary w-md pl-1" name="withdraw-funds" >Submit</button>
                                              
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
                                                    <span class=" d-sm-block">Withdraws</span> 
                                                </a>
                                            </li>
                                            
                                            <li class="nav-item">
                                         <a href="wallet.php" class="text-white btn btn-sm btn-primary ">Refresh</a>
                                                </a>
                                            </li>
                                           
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
                               <th>Service Charge</th>
                               <th>Received</th>
                               <th>Status</th>
                               <th>Date Requested</th>

                           </tr>
                       </thead>
                    

                       <tbody>
                       <?php foreach ( $transactions as $transaction ):  ?>
                           <tr>
                                                    
                           <td><?php echo $transaction['trans-id']; ?></td>
                               <td class="text-capitalize"><?php echo $transaction['payment-mode']; ?></td>
                               <td><?php echo $transaction['amount']; ?></td>
                               <td><?php echo $transaction['service-charge']; ?></td>
                               <td><?php echo $transaction['receive']; ?></td>
                               <td><?php echo $transaction['cstatus']; ?></td>
                               <td><?php echo $transaction['date-created']; ?></td>
                           </tr>
                          
                           <?php endforeach   ?>

                           
                       </tbody>
                   </table>
               </div>

           
  
 

                                            </div>
                                            <div class="tab-pane " id="profile1" role="tabpanel">
                                                <p class="mb-0">
                                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                                    single-origin coffee squid. Exercitation +1 labore velit, blog
                                                    sartorial PBR leggings next level wes anderson artisan four loko
                                                    farm-to-table craft beer twee. Qui photo booth letterpress,
                                                    commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                                    vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                                    aesthetic magna delectus.
                                                </p>
                                            </div>
                                            <div class="tab-pane" id="messages1" role="tabpanel">
                                                <p class="mb-0">
                                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                                    sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                                    farm-to-table readymade. Messenger bag gentrify pitchfork
                                                    tattooed craft beer, iphone skateboard locavore carles etsy
                                                    salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                                    Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                                    mi whatever gluten-free carles.
                                                </p>
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
