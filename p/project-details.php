<?php

require('../config/db.php');
<<<<<<< HEAD
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

session_start();

if(!isset($_SESSION["profid"])){
      header("Location: login.php");
    exit(); }

else if(isset($_SESSION["profid"])){
    $profid = $_SESSION['profid'];
    $customerId = 0;
}


$id = mysqli_real_escape_string($db, $_GET['id']);
$query = 'SELECT * FROM tasks WHERE  id = '.base64_decode($id);
$result = mysqli_query($db,$query);
$project = mysqli_fetch_assoc($result);
$taskid = base64_decode($id);
mysqli_free_result($result);

<<<<<<< HEAD

$_SESSION['taskid'] = $taskid;

$customerquery = 'SELECT * FROM customer WHERE  id = '.$project['customer-id'];
$customerresult = mysqli_query($db,$customerquery);
$customerDetails = mysqli_fetch_assoc($customerresult);
mysqli_free_result($customerresult);


$queryBids = "SELECT * FROM `bids` WHERE  `task-id`='$taskid' AND `prof-id`='$profid' ORDER by `id` DESC";
$resultBids = mysqli_query($db,$queryBids);
$bids = mysqli_fetch_assoc($resultBids);
mysqli_free_result($resultBids);
=======
$profquery = 'SELECT * FROM customer WHERE  id = '.$project['customer-id'];
$profresult = mysqli_query($db,$profquery);
$profDetails = mysqli_fetch_assoc($profresult);
mysqli_free_result($profresult);

>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
/**
 * 
 * If there is no project with that id redirect to 404 page
 * and if the professional didn't take the job it will redirect to 404
 * 
 *  */

<<<<<<< HEAD
if( $project['id'] == NULL  ){   
=======
if( $project['id'] == NULL || $project['prof-id'] != 0 ){   
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
header("Location: ../404.php");
}else {};

/**
 * 
 * The professional can take the project 
 * the project will be assigned to the professional
 * 
 * ** */

if(isset($_POST['take-job'])){
    $update_id = mysqli_real_escape_string($db, $_POST['update_id']);
    $query = "UPDATE tasks SET  `cstatus` = 'Taken' , `prof-id`=$profid, `time-taken`=now() WHERE id = {$update_id} ";

    $db->query($query);
    if($db->error){
        echo $db->error;
    }else{
<<<<<<< HEAD

        /***
         * 
         * send email to user task taken
         * 
         * */

$to = $customerDetails['email'];
$subject = "TASK TAKEN";
$message = "Task with title : <b>" . $project['title'] . "</b>  has been TAKEN login into your account for more details";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
/*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/

mail($to,$subject,$message,$headers);




        header("Location: https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
=======
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
    }
}




/**
 * 
 * The professional can cancel the project 
 * the project will be open and available of the open jobs listings
 * 
 * ** */

if(isset($_POST['cancel-job'])){
    $update_id = mysqli_real_escape_string($db, $_POST['update_id']);
    $query = "UPDATE tasks SET  `cstatus` = 'Open' ,`prof-id`='0', `time-taken`=now() WHERE id = {$update_id} ";

    $db->query($query);
    if($db->error){
        echo $db->error;
    }else{
<<<<<<< HEAD
        /***
         * 
         * send email to user task canceled 
         * 
         * ** */

        $to = $customerDetails['email'];
        $subject = "TASK CANCELED";
        $message = "Task with title : <b>" . $project['title'] . "</b>  has been CANCELED by the professional login into your account for more details";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
        /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
        
        mail($to,$subject,$message,$headers);
        
        


        header("Location: https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
 }
}

if(isset($_POST['bid-job'])){
  
    $query = "INSERT INTO `bids` SET
`prof-id`='$profid' ,
`task-id`='$taskid' ,
`status`='1'  ";

    $db->query($query);
    if($db->error){
        echo $db->error;
    }else{
        /***
         * 
         * send email to user task canceled 
         * 
         * ** */

        $to = $customerDetails['email'];
        $subject = "Bid Added";
        $message = "Task with title : <b>" . $project['title'] . "</b>  has a new bid by the professional login into your account for more details";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
        /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
        
        mail($to,$subject,$message,$headers);
        
        


        header("Location: https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
 }
}

if(isset($_POST['cancel-bid'])){
    $update_id1 = mysqli_real_escape_string($db, $_POST['update_id']);

    $query = "UPDATE bids SET  `status` = '0'  WHERE id = {$update_id1} ";
   

    $db->query($query);
    if($db->error){
        echo $db->error;
    }else{
        /***
         * 
         * send email to user task canceled 
         * 
         * ** */

        $to = $customerDetails['email'];
        $subject = "Bid Canceled";
        $message = "Bid on Task with title : <b>" . $project['title'] . "</b>  has been canceled by the professional login into your account for more details";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
        /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
        
        mail($to,$subject,$message,$headers);
        
        


        header("Location: https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
 }
}
=======
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    }
}

>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c





$queryComment = "SELECT * FROM comments WHERE `task-id` = '$taskid' ORDER BY `id` DESC ";
$resultComment = mysqli_query($db,$queryComment);
$comments = mysqli_fetch_all($resultComment, MYSQLI_ASSOC);
mysqli_free_result($resultComment);



if(isset($_POST['commentAdd']) && $_POST['comment'] != NULL) {

    $comment = mysqli_real_escape_string($db, $_POST['comment']);

    $sql = "INSERT INTO `comments` SET
    `task-id` = '$taskid',
    `comment`='{$_POST['comment']}' ,
    `prof-id`= '$profid',
    `customer-id`='$customerId' ";
    
    
    $db->query($sql);
    if($db->error){
    echo $db->error;
    }else{
<<<<<<< HEAD
    
        header("Location: https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    
        
    }
    
    
    }else if(isset($_POST['commentDelete'])){


        $commentDeleteId = mysqli_real_escape_string($db, $_POST['commentDeleteId']);
    
        $sql = " DELETE FROM `comments` WHERE `id` = '$commentDeleteId'";
        
        
        
        
        $db->query($sql);
        if($db->error){
        echo $db->error;
        }else{
            
            header("Location: https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    
        }
        
    }
        
=======
    ($sql);
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    
    }
    
    
    }
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c






    
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
                                    <h4 class="mb-0 font-size-18">Projects Overview</h4>

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
                                        <div class="media">
<<<<<<< HEAD
=======
                                            <img src="assets/images/companies/img-1.png" alt="" class="avatar-sm mr-4">
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-15 text-capitalize"><?php  echo $project['title']; ?></h5>
                                                <p class="text-muted"> <span class="font-weight-bold"> CATEGORY : </span>  <?php echo $project['category'] ?> <span class="font-weight-bold pl-3"> COUNTY : </span> <?php echo $project['county'] ?> <span class="font-weight-bold pl-3"> TOWN : </span> <?php echo $project['town'] ?></p>
                                               
                                            </div>
                                        </div>

<<<<<<< HEAD
                                        <div class="row task-dates">
                                            <div class="col-sm-3 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar mr-1 text-success"></i> Date Posted</h5>
                                                    <p class="text-muted mb-0"><?php  echo $project['time-created'] ?></p>
                                                </div>
                                            </div>

                                            <div class="col-sm-2 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-success"></i>Period</h5>
                                                    <p class="text-muted mb-0"><?php echo $project['period']; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-sm-2 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-success"></i> Budget</h5>
=======
                                        <h5 class="font-size-15 mt-4">Description :</h5>

                                        <p class="text-muted"><?php echo $project['description'];  ?></p>

                                       
                                        
                                        <div class="row task-dates">
                                            <div class="col-sm-3 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar mr-1 text-primary"></i> Start Posted</h5>
                                                    <p class="text-muted mb-0"><?php  echo $project['time-created'] ?></p>
                                                </div>
                                            </div>
    
                                            <div class="col-sm-3 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-primary"></i> Budget</h5>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                    <p class="text-muted mb-0"><?php echo $project['price']; ?></p>
                                                </div>
                                            </div>

<<<<<<< HEAD
                                            <div class="col-sm-2 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-success"></i> Status</h5>
=======
                                            <div class="col-sm-3 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-primary"></i> Status</h5>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                    <p class="text-muted mb-0"><?php echo $project['cstatus']; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 col-6">
                                                <div class="mt-4">
<<<<<<< HEAD
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-success"></i> Action</h5>
=======
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-primary"></i> Action</h5>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                    <p class="text-muted mb-0">
                                                    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"  >

                                                            <input type="hidden" name="update_id" value="<?php echo $project["id"]; ?>">

                                                        <?php
                                                        /*******
                                                        Restrict jobs to be taken only by professionals

                                                         *******/

<<<<<<< HEAD
                                                        if(!isset($_SESSION["profid"])  ){
=======
                                                        if(!isset($_SESSION["profid"])){
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                            echo(' <button class="btn btn-sm btn-info disabled">Accesible to Professionals only</button> ');
                                                            }
                                                        else if(isset($_SESSION["profid"])){

                                                            if ($project['cstatus'] == 'Open' ){
<<<<<<< HEAD
                                                           
                                                                echo ('<button class="btn btn-sm btn-outline-success" name="take-job">Take Job</button>');
                                                                    if($bids['status']==0){
                                                                echo ('<button class="btn btn-sm btn-success ml-2" name="bid-job">Bid Job</button>'); }else{
                                                                    echo('<input type="hidden" name="update_id" value="');echo $bids["id"]; echo('">');
                                                                    echo ('<button class="btn btn-sm btn-danger ml-2" name="cancel-bid">Cancel Job</button>');}

                                                            }else if( $project['cstatus'] == 'Closed'){

                                                             echo(' <button class="btn btn-sm btn-outline-warning disabled" >Job Closed </button> ');

                                                            }else if($project['cstatus'] == 'Canceled'){
                                                                echo(' <button class="btn btn-sm btn-warning disabled" >Job Canceled</button> ');

                                                            }else if( $project['prof-id']  != $_SESSION['profid']  && $project['cstatus'] == 'Taken'  ){
                                                                echo(' <button class="btn btn-sm btn-dark" >Job Taken</button> ');}
=======
                                                                echo ('<button class="btn btn-sm btn-outline-primary" name="take-job">Take Job</button>');
                                                            }else if( $project['cstatus'] == 'Closed'  ){

                                                             echo(' <button class="btn btn-sm btn-outline-warning disabled" >Job Closed </button> ');

                                                            }else if($project['cstatus'] == 'Canceled' ){
                                                                echo(' <button class="btn btn-sm btn-warning disabled" >Job Canceled</button> ');
                                                            }
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                            
                                                            else{
                                                                echo(' <button class="btn btn-sm btn-outline-danger" name="cancel-job">Cancel Job</button> ');
                                                            };
                                                        }

                                                        ?>


                                                    </form>

                                                    </p>
                                                </div>
                                            </div>

                                        </div>

<<<<<<< HEAD
                                        <h5 class="font-size-15 mt-4">Description :</h5>

                                        <p class="text-muted"><?php echo $project['description'];  ?></p>

                                       
                                        
                                       

=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                        <div class="text-muted mt-4" >
                                            <img src="../<?php echo $project['photo'];  ?>" alt="" width="100%" height="100%">
                                        </div>
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

                                        if( $project['cstatus'] == 'Taken' || $project['cstatus'] == 'Closed'  ){
                                        
                                        echo('
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-4">Customer Details</h4>

                                                    <div class="media mb-4">
                                                        <div class="col-4">
<<<<<<< HEAD
                                                            <img class="media-object rounded-circle avatar-xs" alt="" src="../'); echo($customerDetails["picture"]);
=======
                                                            <img class="media-object rounded-circle avatar-xs" alt="" src="../'); echo($profDetails["picture"]);
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                            echo('"> 
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="font-size-13 mb-1 text-capitalize"> ');
                                                            
<<<<<<< HEAD
                                                echo($customerDetails["first-name"]);

                                                echo(' ');
                                                        
                                                        echo( $customerDetails["last-name"]);
=======
                                                echo($profDetails["first-name"]);

                                                echo(' ');
                                                        
                                                        echo( $profDetails["last-name"]);
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

                                                        echo('
                                                            
                                                    </h5>
                                                            <p class="text-muted mb-1 text-dark"> Tel : ');

<<<<<<< HEAD
                                                            echo($customerDetails["phone"]);
=======
                                                            echo($profDetails["phone"]);
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

                                                            echo('   
                                                            </p>

                                                            <p class="text-muted mb-1 text-dark"> E-mail : ');

<<<<<<< HEAD
                                                        echo( $customerDetails["email"] );
=======
                                                        echo( $profDetails["email"] );
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

                                                        echo(' 
                                                            </p>
                                                <br>
                                                </div>   </div>  </div>  </div>

                                            ');
                                        }else { };
                                            ?>

<div class="card">
                                    <div class="card-body">
<<<<<<< HEAD
                                        <h4 class="card-title mb-4">Chat</h4>

                                        <form action="" method="post" class="row mb-3">
                                        <textarea name="comment" class="form-control" id="" cols="30" rows="4"></textarea>
                                        
                                        <button class="btn btn-sm btn-success col-12 mt-3" type="submit" name="commentAdd">Send</button>
                                        </form>

                                        <div id="div_refresh"></div>
=======
                                        <h4 class="card-title mb-4">Comments</h4>

                                        <form action="" method="post" class="row mb-3">
                                        <input type="text" placeholder="Add Comment" name="comment" class="form-control w-75 ml-3"> 
                                        <button class="btn btn-sm btn-primary ml-3" type="submit" name="commentAdd">Comment</button>
                                        </form>

                                        <?php foreach ( $comments as $comment) :?>
                                       
                                        <?php
                                               
                                               $queryCommentCustomer = 'SELECT * FROM customer WHERE `id` = '.$comment['customer-id']; 
                                               $resultCommentCustomer = mysqli_query($db,$queryCommentCustomer);
                                               $commentsCustomer = mysqli_fetch_assoc($resultCommentCustomer);
                                               mysqli_free_result($resultCommentCustomer);

                                               $queryCommentProf = 'SELECT * FROM prof WHERE `id` ='.$comment['prof-id']; 
                                               $resultCommentProf = mysqli_query($db,$queryCommentProf);
                                               $commentsProf= mysqli_fetch_assoc($resultCommentProf);
                                               mysqli_free_result($resultCommentProf);
                                
                                                ?>


                                             <div class="media mb-4">
                                            <div class="mr-3">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="font-size-13 mb-1 text-capitalize">
                                                <?php
                                                if ($comment['customer-id'] > 0  && $comment['prof-id'] == 0 ){
                                                    echo $commentsCustomer["first-name"] ;
                                                    echo(' ');
                                                    echo $commentsCustomer["last-name"] ; 

                                                }else if ($comment['prof-id'] > 0  && $comment['customer-id'] == 0 ){
                                                    echo $commentsProf["first-name"] ;
                                                    echo(' ');
                                                    echo $commentsProf["last-name"] ; 

                                                }else{}                                          

                                                ?>
                                                </h5>
                                                <p class="text-muted mb-1">
                                                    <?php echo $comment["comment"] ; ?>
                                                </p>
                                            </div>
                                            <div class="ml-3">
                                                <span class="text-primary small">   <?php echo $comment["date-created"] ; ?></span>
                                            </div>
                                        </div>

                                            
                                      <?php endforeach ?>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
        
                                        
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

                
                <?php 
                mysqli_close($db);
                 include('footer.php'); ?>
                
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
        <script>
   $(document).ready(function(){

sendRequest();

function sendRequest(){
    $.ajax({
      url: "comments.php",
      success: 
        function(data){
         $('#div_refresh').html(data); //insert text of test.php into your div
         
      },

      complete: function() {
     // Schedule the next request when the current one's complete
     setInterval(sendRequest, 30000); // The interval set to 5 seconds
   }

  });

};

});
        </script>

=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
    </body>
</html>
