<?php

require('config/db.php');

session_start();
/**
 * 
 * Get the customer and professionals IDs
 *   
 **/ 

<<<<<<< HEAD


 
$queryTasks = "SELECT * FROM `tasks` where `cstatus`= 'Open' ORDER by RAND() LIMIT 6";
$resultTasks = mysqli_query($db,$queryTasks);
$tasks =  mysqli_fetch_all($resultTasks, MYSQLI_ASSOC);



=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
if(isset($_SESSION["profid"])){
    $profid = $_SESSION['profid'];
    $customerId = 0;

}  else if(isset($_SESSION["id"])){
    $customerId = $_SESSION['id'];
   $profid = 0;

} else if(!isset($_SESSION["id"]) &&  !isset($_SESSION["profid"])){
    $profid =NULL;
    $customerId = NULL;
}

$id = mysqli_real_escape_string($db, $_GET['id']);
$query = 'SELECT * FROM tasks WHERE  id = '.base64_decode($id);
$result = mysqli_query($db,$query);
$project = mysqli_fetch_assoc($result);
$taskid = base64_decode($id);



/**
 * 
 *  if project id unavailable redirect to 404
 * 
 *  */

if( $project['id'] == NULL ){
    header("Location: 404.php");
}else{}



if(isset($_POST['take-job'])){
    $update_id = mysqli_real_escape_string($db, $_POST['update_id']);

    $query = "UPDATE tasks SET  `cstatus` = 'Taken' , `prof-id`=$profid, `time-taken`=now() WHERE id = {$update_id} ";

    $db->query($query);
    if($db->error){
        echo $db->error;
    }else{
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

    }



}

/**
 * 
 * Load comments
 * 
 **/

$queryComment = "SELECT * FROM comments WHERE `task-id` = '$taskid' ORDER BY `id` DESC ";
$resultComment = mysqli_query($db,$queryComment);
$comments = mysqli_fetch_all($resultComment, MYSQLI_ASSOC);

/**
 * Add Comments
 * 
 **/

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
    ($sql);
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    
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
                            <div class="col-lg-8  ">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
<<<<<<< HEAD
=======
                                            <img src="assets/images/companies/img-1.png" alt="" class="avatar-sm mr-4">
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><?php  echo $project['title']; ?></h5>
                                                <title>Job : <?php  echo $project['title']; ?></title>
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
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-success"></i> Period</h5>
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

                                                        if(!isset($_SESSION["profid"])){
                                                            echo(' <button class="btn btn-sm btn-info disabled">Accesible to Professionals only</button> ');
                                                            }
                                                        else if(isset($_SESSION["profid"])){

                                                            if ($project['cstatus'] == 'Open'){
<<<<<<< HEAD
                                                                echo ('<button class="btn btn-sm btn-outline-success" name="take-job">Take Job</button>');
=======
                                                                echo ('<button class="btn btn-sm btn-outline-primary" name="take-job">Take Job</button>');
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                                            }else{
                                                                echo(' <button class="btn btn-sm btn-outline-danger disabled">Job Closed</button> ');
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
                                            <img src="<?php echo $project['photo'];  ?>" alt="" width="100%" height="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-4  ">
<<<<<<< HEAD
                                                       
                                                            <h4 class="card-title"> SIMILAR JOBS</h4><br>
                                                        <div class="row"> 
                                                     

                                                            <?php foreach ( $tasks as $task) :?>


<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
    <a href="project-details.php?id=<?php echo  base64_encode($task['id']); ?>">
    <div class="card ">
        
        <div class="card-body p-2" style="height: 150px;
        background-image: url(<?php echo $task['photo']; ?>);
        background-size: cover;
        background-position: center;
        ">
            
        </div>
        <div class="card-footer shadow">
        <?php echo $task['category']; ?>
        </div>
    </div>
    </a>
</div>
<?php endforeach ?>           
                                                            
                                                        </div>

                                                        


                                



                           <!-- <div class="card">
                                
=======
                            <div class="card">
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Comments</h4>

                                        <form action="" method="post" class="row mb-3">

                                        <?php
                                /**
                                 * 
                                 * Restrict Guests from Posting and catching spams
                                 * 
                                 * * */

                                        if ( $profid == NULL  &&  $customerId == NULL ){
                                            echo(' <button class="btn btn-sm btn-info center w-100"  align="center">Please Log in to comment</button>');
                                        } else if(isset($_SESSION["profid"])  &&  isset($_SESSION["id"])    ){
                                            echo(' <button class="btn btn-sm btn-info center w-100"  align="center">Please Log in to comment</button>');
}else {
    echo('
    <input type="text" placeholder="Add Comment" name="comment" class="form-control w-75 ml-3"> 
<<<<<<< HEAD
    <button class="btn btn-sm btn-success ml-3" type="submit" name="commentAdd">Comment</button>
=======
    <button class="btn btn-sm btn-primary ml-3" type="submit" name="commentAdd">Comment</button>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
    ');
}

                                        ?>
                                       
                                        </form>

                                        <?php foreach ( $comments as $comment) :?>
                                       
                                        <?php

                                        /**
                                         * 
                                         * Display comments with appropriate names and profile pictures
                                         * 
                                         **/
                                               
                                               $queryCommentCustomer = 'SELECT * FROM customer WHERE `id` = '.$comment['customer-id']; 
                                               $resultCommentCustomer = mysqli_query($db,$queryCommentCustomer);
                                               $commentsCustomer = mysqli_fetch_assoc($resultCommentCustomer);
                                       

                                               $queryCommentProf = 'SELECT * FROM prof WHERE `id` ='.$comment['prof-id']; 
                                               $resultCommentProf = mysqli_query($db,$queryCommentProf);
                                               $commentsProf= mysqli_fetch_assoc($resultCommentProf);
                                                                           
                                
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
<<<<<<< HEAD
                                                <span class="text-success small">   <?php echo $comment["date-created"] ; ?></span>
=======
                                                <span class="text-primary small">   <?php echo $comment["date-created"] ; ?></span>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                                            </div>
                                        </div>

                                            
                                      <?php endforeach ?>
        
                                        
                                    </div>
                                </div>
                            </div>
                           

                         
                        </div>
                        <!-- end row -->

                       
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
          
                
                <?php include('u/footer.php'); ?>
                
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
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>
      

    </body>
</html>
