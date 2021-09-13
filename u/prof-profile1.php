<?php
require('../config/db.php');




    date_default_timezone_set('Africa/Nairobi');



$id = mysqli_real_escape_string($db, $_GET['id']);
$query = 'SELECT * FROM `prof` WHERE  id = '.base64_decode($id);
$result = mysqli_query($db,$query);
$profs = mysqli_fetch_assoc($result);

$profid = base64_decode($id);

$queryCount =" SELECT COUNT(`prof-id`) FROM `tasks` WHERE `cstatus`='Taken' or `cstatus`='Closed' AND `prof-id` ='$profid'";
$resultCount =  mysqli_query($db,$queryCount);
$count = mysqli_fetch_assoc($resultCount);


$queryTasks = "SELECT * FROM `tasks` WHERE `cstatus`='Taken' or `cstatus`='Closed' AND `prof-id` ='$profid'  ORDER by `time-created` DESC";
$resultTasks = mysqli_query($db,$queryTasks);
$tasks =  mysqli_fetch_all($resultTasks, MYSQLI_ASSOC);

   
include('topbar.php');
include('sidebar.php');
    

?>



<style>
    html{
        scroll-behavior: smooth;
    }

.bg-photo{
    background-color: #111;
    height: 30vh; 
    background-image: url('<?php echo $profs ["bgphoto"]; ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-blend-mode: overlay;
    background-position: center;
    

}

.shadow {
    box-shadow: 0 .75rem 1.5rem rgba(101,101,101,0.5)!important;
}


.profile-pic{
    height: 70%;
    position: relative;
    bottom: -30%;
    padding:0;
    margin: 0;
}


.pic{ 
    width: 150px;
    height: 150px;
}

.prof-text{
    position: relative;
    top:50%;
}

.prof-details{
    position: relative;
    bottom: -30px;
    color: white;
    }

.services{

}

.prof-bio ul{
    display: inline;
    padding-left: 15p
}

</style>



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content container">
                <section class="container bg-photo" style="">

<div class="col-12 " ></div>

<div class="row prof-text">
<div class="col-md-12  col-lg-3 col-xl-3 profile-pic" align="center">
    <div class="pic text-center"  align="center" style="">
        <img src="<?php echo $profs ["picture"]; ?>" alt="" width="100%" height="100%" class="rounded-circle">
    </div>
    
</div>
</div>

</section>

<section class="row m-0">
    <div class="col-3"></div>
<div class="col-9  services pt-2" >
  
    <span class="prof-bio d-none pl-3">
        <ul><a href="#about">About</a></ul>
        <ul><a href="#serviceProvided">Services Provided</a></ul>
        <ul><a href="#areasServed">Areas Served</a></ul>
      
    </span>

</div>

</section>


<section class="row m-0 pt-3 container-fluid">
    <div class="col-md-12 col-lg-3 col-xl-3 mt-5" align="center">  
    <br>

    <p class="h4 text-capitalize" ><?php echo $profs ["first-name"]; echo' '; echo $profs ["last-name"];?></p>
<p class="h4 text-capitalize"><?php echo $profs ["county"]; ?></p>
<p class="h4 text-capitalize"><?php echo $profs ["occupation"]; ?></p>
<p class="text-capitalize"><?php echo $profs ["phone"]; ?></p>
<p class=" text-capitalize"><?php echo $profs ["email"]; ?></p>

    </div>

<div class="col-md-12 col-sm-12 col-lg-9 col-xl-9  pl-4">
        
            <div class="col-12 pt-2" id="#about">
                <h4 class="text-success">About</h4>
                <?php echo $profs ["about"]; ?>
            </div>

            <div class="col-12 pt-5" id="#serviceProvided">
                <h4 class="text-success"> Services Provided</h4>
                <?php echo $profs ["services"]; ?>

            <div class="col-12 pt-5" id="#areasServed">
                <h4 class="text-success">Areas Served</h4>
                <?php echo $profs ["areas"]; ?>
            </div>


            <div class="col-12 pt-5">
                <h4 class="text-success">Projects Done</h4>

                <div class="row">

                <?php foreach ( $tasks as $task) :?>


<div class=" col-sm-6 col-md-6 col-lg-4 col-xl-4">
    <a href="project-details.php?id=<?php echo  base64_encode($task['id']); ?>" class="text-success">
    <div class="card ">
        
        <div class="card-body p-2" style="height: 150px;
        background-image: url(<?php echo $task['photo']; ?>);
        background-size: cover;
        background-position: center;
        ">
            
        </div>
        <div class="card-footer shadow text-capitalize">
        <?php echo $task['category']; ?>
        </div>
    </div>
    </a>
</div>
<?php endforeach ?>           



                </div>

            </div>

       
</div>
    
</section>


<section class="container-fluid row m-0" >

<script src="https://use.fontawesome.com/963f9846e6.js"></script>

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
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

        <title>Profesionals Profile</title>
    </body>
</html>
