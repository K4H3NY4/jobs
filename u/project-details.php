<?php

require('../config/db.php');
include('balance.php');
//error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//session_start();
if(!isset($_SESSION["id"])){
header("Location: login.php");
exit(); } 
else if(isset($_SESSION["id"])){
   $customerId = $_SESSION['id'];
   $profid = 0;
}





$id = mysqli_real_escape_string($db, $_GET['id']);
$query = 'SELECT * FROM tasks  WHERE  id = '.base64_decode($id);
$result = mysqli_query($db,$query);
$project = mysqli_fetch_assoc($result);
mysqli_free_result($result);
<<<<<<< HEAD
$taskid = base64_decode($id);


$_SESSION['taskid'] = $taskid;

=======

$taskid = base64_decode($id);
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

$profquery = 'SELECT * FROM prof WHERE  id = '.$project['prof-id'];
$profresult = mysqli_query($db,$profquery);
$profDetails = mysqli_fetch_assoc($profresult);
mysqli_free_result($profresult);


<<<<<<< HEAD
$queryBids = "SELECT * FROM `bids` WHERE  `task-id`='$taskid' AND `status`='1' ORDER by `id` DESC";
$resultBids = mysqli_query($db,$queryBids);
$bids =  mysqli_fetch_all($resultBids, MYSQLI_ASSOC);

=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

/**
 * 
 * If there is no project with that id redirect to 404 page
 * and if the customer didn't post the job it will redirect to 404
 * 
 *  */

if( $project['id'] == NULL ){
    header("Location: ../404.php");
}else if ( $project['customer-id'] != $customerId){
    header("Location: ..404.php");

}




/**
 * 
 * Release Funds and Close task
 * To  professionals wallet
 * 
 * ** */


if(isset($_POST['release'])){
    $update_id = mysqli_real_escape_string($db, $_POST['update_id']);
    $query = "UPDATE tasks SET  `cstatus` = 'Closed' , `funds-status`='Paid', `time-taken`=now() WHERE id = {$update_id} ";

    $db->query($query);
    if($db->error){
        echo $db->error;
    }else{
<<<<<<< HEAD
        /**
         * 
         * send email to prof funds released
         * ** */

        $to = $profDetails['email'];
        $subject = "FUNDS RELEASED";
        $message = "Funds from task title : <b>" . $project['title'] . "</b>  have been released";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
        /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
        
        mail($to,$subject,$message,$headers);
        
        

=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    }
}


if(isset($_POST['cancel'])){
    $update_id = mysqli_real_escape_string($db, $_POST['update_id']);
    $query = "UPDATE tasks SET  `cstatus` = 'Canceled' , `funds-status`='Canceled',  `prof-id`='0' ,`time-taken`=now() WHERE id = {$update_id} ";

    $db->query($query);
    if($db->error){
        echo $db->error;
    }else{
<<<<<<< HEAD
        /**
         * send email to professional if job cancel
         * 
         * * */
        $to = $profDetails['email'];
        $subject = "TASK CANCELED";
        $message = "Task title : <b>" . $project['title'] . "</b>  has been canceled by the Customer";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
        /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
        
        mail($to,$subject,$message,$headers);
        


=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    }
}


/****
 * 
 * Comments Start
 * Get comments from database
 * 
 * ** */

$queryComment = "SELECT * FROM comments WHERE `task-id` = '$taskid' ORDER BY `id` DESC ";
$resultComment = mysqli_query($db,$queryComment);
$comments = mysqli_fetch_all($resultComment, MYSQLI_ASSOC);
mysqli_free_result($resultComment);


/***
 * 
 * Insert comments to database
 * 
 */

if(isset($_POST['commentAdd']) && $_POST['comment'] != NULL) {

    $comment = mysqli_real_escape_string($db, $_POST['comment']);

    $sql = "INSERT INTO `comments` SET
    `task-id` = '$taskid',
    `comment`='$comment' ,
    `prof-id`= '$profid',
    `customer-id`='$customerId' ";
    
    
    $db->query($sql);
    if($db->error){
    echo $db->error;
    }else{
<<<<<<< HEAD
    
        header("Location: project-details.php?id=$id");
=======
    ($sql);
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
    
    }
    
    
<<<<<<< HEAD
    }else if(isset($_POST['commentDelete'])){


    $commentDeleteId = mysqli_real_escape_string($db, $_POST['commentDeleteId']);

    $sql = " DELETE FROM `comments` WHERE `id` = '$commentDeleteId'";
    
    
    
    
    $db->query($sql);
    if($db->error){
    echo $db->error;
    }else{
        
        header("Location: project-details.php?id=$id");
    }
    
}
    

=======
    }
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

    /****
     * 
     * End of Comment section
     * 
     */

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
                                                    <h5 class="font-size-14"><i class="bx bx-calendar mr-1 text-success"></i>Date Posted</h5>
=======
                                        <h5 class="font-size-15 mt-4">Description :</h5>

                                        <?php 

?>


                                        <p class="text-muted"><?php echo $project['description'];  ?></p>

                                       
                                        
                                        <div class="row task-dates">
                                            <div class="col-sm-3 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar mr-1 text-primary"></i> Start Posted</h5>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                    <p class="text-muted mb-0"><?php  echo $project['time-created'] ?></p>
                                                </div>
                                            </div>
    
<<<<<<< HEAD
                                            <div class="col-sm-2 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-success"></i> Period</h5>
                                                    <p class="text-muted mb-0"><?php echo $project['period']; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-sm-2 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-success"></i> Budget</h5>
=======
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
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-success"></i>Status</h5>
=======
                                            <div class="col-sm-3 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-primary"></i>Status</h5>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                    <p class="text-muted mb-0"><?php echo $project['cstatus']; ?></p>
                                                </div>
                                            </div>

                                            
                                           
                                            <div class="col-sm-3 col-6">
                                                <div class="mt-4">
                                                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"  >
                                                <?php
                                                 if ($project['customer-id'] == $customerId  ){
                                                
                                                echo ('
<<<<<<< HEAD
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-success"></i>Funds Status</h5> ');
=======
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-primary"></i>Funds Status</h5> ');
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                 }else{}


                                                 echo('

                                                <input type="hidden" name="update_id" value="');  echo $project["id"];  echo('">');
                                                 

                                                    if ($project['cstatus'] == 'Taken' && $project['customer-id'] == $customerId && $project['price'] < $available_balance){
<<<<<<< HEAD
                                                    echo('<button class="btn btn-sm btn-success" name="release">Release Funds</button>  ');
=======
                                                    echo('<button class="btn btn-sm btn-primary" name="release">Release Funds</button>  ');
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                    echo('<button class="btn btn-sm btn-danger" name="cancel">Cancel Job</button>  ');
                                                      }  else if ($project['cstatus'] == 'Closed' && $project['customer-id'] == $customerId){
                                                          echo('<button class="btn btn-sm btn-success disabled">Paid</button>  ');
                                                      } else if ($project['cstatus'] == 'Open' && $project['customer-id'] == $customerId){
                                                        echo('<button class="btn btn-sm btn-danger" name="cancel">Cancel Job</button>  ');
                                                      }else if ($project['cstatus'] == 'Canceled' && $project['customer-id'] == $customerId){
                                                        echo('<button class="btn btn-sm btn-outline-danger disabled">JOB CANCELED </button>  ');
                                                      } else if($project['price'] > $available_balance && $project['customer-id'] == $customerId  && $project['cstatus'] == 'Taken' ){
                                                        echo('<button class="btn btn-sm btn-dark  ">Insufficent Funds </button>  ');
                                                      }

                                                   echo('

                                                    </form>
                                                 
                                                </div>
                                            </div>

                                        </div>
                                        ');?>

<<<<<<< HEAD
                                        <h5 class="font-size-15 mt-4">Description :</h5>

                                        <?php 

?>


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
<<<<<<< HEAD
                                        <h4 class="card-title mb-4">Professional Assigned Job</h4>
=======
                                        <h4 class="card-title mb-4">Prof Details</h4>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

                                        <div class="media mb-4">
                                            <div class="col-4">
                                                <img class="media-object rounded-circle avatar-xs" alt="" src="../'); echo($profDetails["picture"]);echo('">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="font-size-13 mb-1"> ');
                                                
                                       echo($profDetails["first-name"]);

                                       echo(' ');
                                            
                                               echo( $profDetails["last-name"]);

                                               echo('
                                                  
                                          </h5>
                                                <p class="text-muted mb-1"> ');

                                                echo($profDetails["phone"]);

                                                echo('   
                                                </p>

                                                <p class="text-muted mb-1"> ');

                                               echo( $profDetails["email"] );

                                               echo(' 
                                                </p>
                                    <br>
                                    </div>   </div>  </div>  </div>

                                ');
                            }else { };
                                ?>

<<<<<<< HEAD

                                <!--- Bids --->

                              
                             
                             
                               <div class="card">
                                   <div class="card-body">
                                       <h4 class="card-title mb-4">Available Bids</h4>
                                       <div class="container-fluid search-jobs" id="filter-section">
                                
                                <div class="table-responsive">
                   <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                           <tr>
                             
                               <th class="text-capitalize">Name</th>
                           
                               <th>Action</th>
                               
                            

                           </tr>
                       </thead>
                    

                       <tbody>
                       <?php foreach ( $bids as $bid ):  ?>
                           <tr>
                                                    
                           
             
                               <td class="text-capitalize"><?php  
                               
                               $queryProfBid = 'SELECT * FROM prof WHERE `id` ='.$bid['prof-id']; 
                               $resultProfBid = mysqli_query($db,$queryProfBid);
                               $profBid= mysqli_fetch_assoc($resultProfBid);
                               mysqli_free_result($resultProfBid);
                               
                               echo $profBid['first-name']; echo ' '; echo $profBid['last-name'];
                               ?></td>
                             
                               <td><a class="btn btn-sm btn-success" href="prof-profile.php?id=<?php echo  base64_encode($bid['prof-id']); ?>">View Profile</a></td>
                           </tr>
                          
                           <?php endforeach   ?>

                           
                       </tbody>
                   </table>
               </div>

                        </div>

                                        </div> 
                                     </div>                               

<div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Chat</h4>

                                        <form action="" method="post" class="row mb-3">
                                        <textarea class="form-control"  name="comment" id="" cols="20" rows="3"></textarea>
                                      <br> 
                                        <button class="btn btn-sm btn-success mt-3 col-12" type="submit" name="commentAdd">Send</button>
                                        </form>

                 
                                       
                                      <div id="div_refresh"></div>

                                                                    
                                </div>
=======
<div class="card">
                                    <div class="card-body">
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
                        <!-- end row -->

                       
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <?php
                
mysqli_close($db);
 include('../p/footer.php'); ?>
                
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
