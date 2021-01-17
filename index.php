<?php

require('config/db.php');




$queryProfs = "SELECT * FROM `occupations` ORDER by RAND() LIMIT 8 ";
$resultProfs = mysqli_query($db,$queryProfs);
$profs =  mysqli_fetch_all($resultProfs, MYSQLI_ASSOC);



$queryCat = "SELECT * FROM `task_category` ORDER by `id` DESC";
$resultCat = mysqli_query($db,$queryCat);
$cats =  mysqli_fetch_all($resultCat, MYSQLI_ASSOC);


$queryTasks = "SELECT * FROM `tasks` where `cstatus`= 'Open' ORDER by RAND() LIMIT 12";
$resultTasks = mysqli_query($db,$queryTasks);
$tasks =  mysqli_fetch_all($resultTasks, MYSQLI_ASSOC);



mysqli_free_result($resultProfs);
mysqli_close($db);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Housing Jobs</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<style>
.col-sm-6{
    width: auto;
}

.shadow {
    box-shadow: 0 .75rem 1.5rem rgba(101,101,101,0.5)!important;
}

.col-sm-6 {
    width: 50%;
}

body{
    background-color: #f8f8fb;
}

::-webkit-scrollbar{
    width: 10px;
    
}

::-webkit-scrollbar-track{
    background: #111;
}

::-webkit-scrollbar-thumb{
    background: #555;
}

::-webkit-scrollbar-thumb:hover{
    background: lime;
}
</style>
<body>
    <section class="row m-0 p-0" style="
    background-image: url(uploads/farm-image-6.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: bottom;
    height: 80vh;
    ">   
        <div class="container-fluid row m-0 d-fixed" style="
       
        z-index:  9999;
        height:  60px;
        padding-top: 15px;
        background-color: #ffffff24;
        ">  
            <span class="col-2 text-dark">
                <a href="/housing-jobs" class="logo logo-dark">
                              
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="" width="100">
                                </span>
                            </a>

                          </span>

            <span class="col-5"></span>

            <span class="col-5  text-right text-white " align="right"><span class=""> <a href="u/login.php" class="btn btn-sm btn-primary">Login</a></span> <span >  <a href="p/login.php" class="btn btn-sm btn-outline-success"> Login as Pro</a></span></span>
       </div>

       <div class="pl-5 ml-3" style="
       position: relative;
       top:25%;
       font-size: 4.5vw;
       color:#f8f8fb;
      
       ">
<p>
    Get Professionals
    <br>
    & Jobs
</p>

       </div>


    </section>

    <section class="row m-0 p-0" style="z-index: 99;">
        <div class=" container">
            <span class="row pt-4 font-weight-bold h5">
          <div class="col-4 text-center text-primary" >GET IDEAS</div>
          <div class="col-4 text-center text-primary"><a href="http://localhost/housing-jobs/professionals.php">   FIND PROFESSIONALS</a></div>
          <div class="col-4 text-center"> <a href="http://localhost/housing-jobs/jobs.php"> FIND JOBS</a></div>
        </div>
    </span>
    </section >
<hr>

    <section  class="row m-0 p-0 pt-4"  style="z-index: 9;">
            <div class="container"  style="z-index: 9;">
                
                <span class="row">
                <span class="col-6 h3 font-weight-bold " >FIND PROFESSIONALS</span>
                <span class="col-6 text-right font-weight-bold"> <a href="http://localhost/housing-jobs/professionals.php"> SEE ALL </a></span>
                </span>
                <br><br>
                <div class="row">
                <?php foreach ( $profs as $prof) :?>


<div class=" col-sm-6 col-md-6 col-lg-3 col-xl-3">
    <div class="card ">
        <div class="card-body p-2" style="height: 150px;
        background-image: url(<?php echo $prof['photo']; ?>);
        background-size: cover;
        background-position: center;
        ">
            
        </div>
        <div class="card-footer shadow">
        <?php echo $prof['occupation']; ?>
        </div>
    </div>
</div>
<?php endforeach ?>

   

             

                </div>
        </div>
    </section>


    <section  class="row m-0 p-0 pt-5">
        <div class="container">
            <hr>
            <span class="row">
                <span class="col-6 h3 font-weight-bold " >FIND JOBS</span>
                <span class="col-6 text-right font-weight-bold">  <a href="http://localhost/housing-jobs/jobs.php">SEE ALL</a></span>
                </span>
            <br>
            <div class="row">
            <?php foreach ( $tasks as $task) :?>


                <div class=" col-sm-6 col-md-6 col-lg-3 col-xl-3">
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
    </div>
</section>


<footer>
    <hr>
    footer
</footer>

    
</body>
</html>