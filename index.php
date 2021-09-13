<?php

require('config/db.php');




<<<<<<< HEAD

=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
$queryProfs = "SELECT * FROM `occupations` ORDER by RAND() LIMIT 8 ";
$resultProfs = mysqli_query($db,$queryProfs);
$profs =  mysqli_fetch_all($resultProfs, MYSQLI_ASSOC);



$queryCat = "SELECT * FROM `task_category` ORDER by `id` DESC";
$resultCat = mysqli_query($db,$queryCat);
$cats =  mysqli_fetch_all($resultCat, MYSQLI_ASSOC);


$queryTasks = "SELECT * FROM `tasks` where `cstatus`= 'Open' ORDER by RAND() LIMIT 12";
$resultTasks = mysqli_query($db,$queryTasks);
$tasks =  mysqli_fetch_all($resultTasks, MYSQLI_ASSOC);



<<<<<<< HEAD

$queryCounty = "SELECT * FROM `counties` ORDER by `county` ASC";
$resultCounty = mysqli_query($db,$queryCounty);
$counties =  mysqli_fetch_all($resultCounty, MYSQLI_ASSOC);



$queryProfSearch = "SELECT * FROM `occupations` ";
$resultProfSearch = mysqli_query($db,$queryProfSearch);
$profSearchs =  mysqli_fetch_all($resultProfSearch, MYSQLI_ASSOC);


if(isset($_POST['submit'])){

  
  $occupation = mysqli_real_escape_string($db, $_POST['occupation']);
  $county = mysqli_real_escape_string($db, $_POST['county']);
  
  session_start();
			$_SESSION['search_occupation'] =$occupation ;
       $_SESSION['search_county'] =$county ;
       
       header("Location: prof-search.php");

};


=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
mysqli_free_result($resultProfs);
mysqli_close($db);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Housing Jobs</title>
<<<<<<< HEAD
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

</head>

<style>

.text-success{
    color: #007562 !important;
}

.btn-success{
    background-color: #007562 !important;
}




=======
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<style>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
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
<<<<<<< HEAD
    font-family: 'Roboto', sans-serif;
=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
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
<<<<<<< HEAD
    background: #007562 !important;;
}



.col-centered {
    float: none;
    margin: 0 auto;
}

.carousel-control { 
    width: 8%;
    width: 0px;
}
.carousel-control.left,
.carousel-control.right { 
    margin-right: 40px;
    margin-left: 32px; 
    background-image: none;
    opacity: 1;
}
.carousel-control > a > span {
    color: white;
	  font-size: 29px !important;
}

.carousel-col { 
    position: relative; 
    min-height: 1px; 
    padding: 5px; 
    float: left;
 }

 .active > div { display:none; }
 .active > div:first-child { display:block; }

/*xs*/
@media (max-width: 767px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
	.carousel-inner .next        { left:  50%; }
	.carousel-inner .prev		     { left: -50%; }
  .carousel-col                { width: 50%; }
	.active > div:first-child + div { display:block; }
}

/*sm*/
@media (min-width: 768px) and (max-width: 991px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
	.carousel-inner .next        { left:  50%; }
	.carousel-inner .prev		     { left: -50%; }
  .carousel-col                { width: 50%; }
	.active > div:first-child + div { display:block; }
}

/*md*/
@media (min-width: 992px) and (max-width: 1199px) {
  .carousel-inner .active.left { left: -33%; }
  .carousel-inner .active.right { left: 33%; }
	.carousel-inner .next        { left:  33%; }
	.carousel-inner .prev		     { left: -33%; }
  .carousel-col                { width: 33%; }
	.active > div:first-child + div { display:block; }
  .active > div:first-child + div + div { display:block; }
}

/*lg*/
@media (min-width: 1200px) {
  .carousel-inner .active.left { left: -25%; }
  .carousel-inner .active.right{ left:  25%; }
	.carousel-inner .next        { left:  25%; }
	.carousel-inner .prev		     { left: -25%; }
  .carousel-col                { width: 25%; }
	.active > div:first-child + div { display:block; }
  .active > div:first-child + div + div { display:block; }
	.active > div:first-child + div + div + div { display:block; }
}

.block {
	width: 306px;
	height: 230px;
}

.red {background: red;}

.blue {background: blue;}

.green {background: green;}

.yellow {background: yellow;}

.profs{
  display: inline;
}

#search{
  display: none;
}

.d-flex{
  display: flex !important;
}

.card-footer{
  color:  #007562 ;
  font-size: 15px;
  font-weight: 500;
}

</style>
<body>

    <section>




    <div class="container-fluid row m-0  " style="
       z-index:  9999;
       height:  60px;
       padding-top: 15px;
       padding-bottom: 20px;
       
       background-color: #ffffff24;
       ">  
           <span class="col-2 text-dark">
               <a href="/housing-jobs" class="logo logo-dark">
                             
                               <span class="logo-lg pl-3" style="position: relative;
    top: -7px;">
                                   <img src="assets/images/logo-dark.png" alt="" height="" width="100">
                               </span>
                           </a>
                           
                         </span>

           <span class="col-7 text-center">
           <span align="center" >
           <a href="https://housing.pacisvorgel.co.ke" class="pr-3 mt-4 text-success" style="font-size: 0.9rem !important; font-weight:600;"> Properties </a>
               <a href="jobs.php" class="pr-3 mt-4 text-success" style="font-size: 0.9rem !important; font-weight:600;">Jobs </a>
              <a href="professionals.php" class="pr-3 mt-4 text-success" style="font-size: 0.9rem !important; font-weight:600;">Professionals  </a>
              </span>
        
           </span>

           <span class="col-3 text-white text-right ">
         
           
              
              <span class=""> <a href="u/login.php" class="text-success" style="font-size: 0.9rem !important !important; font-weight:600;" >Sign In  |  </a></span> 
               <span >  <a href="u/register.php" class="text-success" style="font-size: 0.9rem !important; font-weight:600;"> Register</a></span>
               


</span>
      </div>
      <div class="pl-5 ml-3" style="
                            position: absolute;
                            top:20%;
                            font-size: 4.5vw;
                            color:#fff;
                            font-weight: 600;
                            z-index: 999;
                            
                            ">
                        <p>  Get Professionals <br>  & Jobs </p>
                            </div>
  <!-- Swiper -->
  <div class="swiper-container swiper-container-initialized swiper-container-horizontal" style="height: 75vh;">

    <div class="swiper-wrapper" id="swiper-wrapper-513b54ed3a8d204b" aria-live="off" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
   
   <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 10" style="height:75vh; width: 1740px; margin-right: 30px;
       background-image: url(uploads/welder.jpg);
       background-position: center;
       background-repeat: no-repeat;
       background-size:cover;
       
        ">                                            
    </div>

      <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 10" style="height:75vh; width: 1740px; margin-right: 30px;
      background-image: url(uploads/angle-grinder.jpg);background-position: center;
       background-repeat: no-repeat;        background-size:cover;
">
                              
    </div>

      <div class="swiper-slide" role="group" aria-label="3 / 10" style="height:75vh; width: 1740px; margin-right: 30px;
       background-image: url(uploads/welder.jpg); background-position: center;
       background-repeat: no-repeat;        background-size:cover;
">
    </div>

      <div class="swiper-slide" role="group" aria-label="4 / 10" style=" height:75vh; width: 1740px; margin-right: 30px;
       background-image: url(uploads/josue.jpg); background-position: center;
       background-repeat: no-repeat;       background-size:cover;
">
    </div>
      
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 7"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 8"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 9"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 10"></span></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-513b54ed3a8d204b" aria-disabled="false"></div>
    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-513b54ed3a8d204b" aria-disabled="true"></div>
  <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

 




       </section>

=======
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
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

    <section class="row m-0 p-0" style="z-index: 99;">
        <div class=" container">
            <span class="row pt-4 font-weight-bold h5">
<<<<<<< HEAD
          <div class="col-4 text-center text-success" >GET IDEAS</div>
          <div class="col-4 text-center text-success"><a href="professionals.php" class="text-success">   FIND PROFESSIONALS</a></div>
          <div class="col-4 text-center"> <a href="jobs.php" class="text-success"> FIND JOBS</a></div>
=======
          <div class="col-4 text-center text-primary" >GET IDEAS</div>
          <div class="col-4 text-center text-primary"><a href="http://localhost/housing-jobs/professionals.php">   FIND PROFESSIONALS</a></div>
          <div class="col-4 text-center"> <a href="http://localhost/housing-jobs/jobs.php"> FIND JOBS</a></div>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
        </div>
    </span>
    </section >
<hr>

<<<<<<< HEAD
<div class="row" id="search">
<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4"></div>
<div class=" col-sm-12 col-md-12 col-lg-4 col-xl-4 card "  style="
background-color:#fff;
z-index:9999;
">
  <form action="" method="post">



  <div class="m-5">
    SELECT THE OCCUPATION OF THE PROFESSIONAL 
    <select class="form-control " name="occupation" required>
                                                                <option value="">-- Select --</option>
                                                                <?php foreach ( $profSearchs as $profSearch) :?>
                                                                <option value="<?php echo $profSearch['occupation']; ?>" class="text-capitalize"><?php echo $profSearch['occupation']; ?></option>
                                                                <?php endforeach ?>
                                                                <option value="Others">Others</option>
                                                            </select>

  </div>
  <div class="m-5">
    SELECT THE COUNTY
    <select class="form-control " name="county" required>
                                                                <option value="*"> --Select-- </option>
                                                                <?php foreach ( $counties as $county) :?>
                                                                <option value="<?php echo $county['county']; ?>" class="text-capitalize"><?php echo $county['county']; ?></option>
                                                                <?php endforeach ?>
                                                                
                                                            </select>
  </div>
<button type="submit" name="submit" class="btn btn-success ml-5 mb-5">FIND PROFESSION</button>  <span href="" class="btn btn-outline-danger ml-5 mb-5" id="exit">EXIT</span>
  </form> </div>
<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4"> </div>
</div>

    <section  class="row m-0 p-0 pt-4 profs"  style="z-index: 9;">

            <div class="container"  style="z-index: 9;">
                
                <span class="row">
                <span class="col-6 h3 font-weight-bold text-success " >FIND PROFESSIONALS</span>
                <span class="col-6 text-right font-weight-bold"> <a href="professionals.php" class="text-success"> SEE ALL </a></span>
=======
    <section  class="row m-0 p-0 pt-4"  style="z-index: 9;">
            <div class="container"  style="z-index: 9;">
                
                <span class="row">
                <span class="col-6 h3 font-weight-bold " >FIND PROFESSIONALS</span>
                <span class="col-6 text-right font-weight-bold"> <a href="http://localhost/housing-jobs/professionals.php"> SEE ALL </a></span>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
                </span>
                <br><br>
                <div class="row">
                <?php foreach ( $profs as $prof) :?>


<<<<<<< HEAD
<div class=" col-sm-6 col-md-6 col-lg-3 col-xl-3 prof" id="prof">
  <a href="prof-search.php?occupation=<?php echo  $prof['occupation']; ?>">
=======
<div class=" col-sm-6 col-md-6 col-lg-3 col-xl-3">
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
    <div class="card ">
        <div class="card-body p-2" style="height: 150px;
        background-image: url(<?php echo $prof['photo']; ?>);
        background-size: cover;
        background-position: center;
        ">
            
        </div>
<<<<<<< HEAD
        <div class="card-footer shadow" id="prof">
        <?php echo $prof['occupation']; ?>
        </div>
    </div>
    </a>
=======
        <div class="card-footer shadow">
        <?php echo $prof['occupation']; ?>
        </div>
    </div>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
</div>
<?php endforeach ?>

   

             

                </div>
        </div>
    </section>


    <section  class="row m-0 p-0 pt-5">
        <div class="container">
            <hr>
            <span class="row">
<<<<<<< HEAD
                <span class="col-6 h3 font-weight-bold text-success" >FIND JOBS</span>
                <span class="col-6 text-right font-weight-bold" >  <a href="jobs.php" class="text-success">SEE ALL</a></span>
=======
                <span class="col-6 h3 font-weight-bold " >FIND JOBS</span>
                <span class="col-6 text-right font-weight-bold">  <a href="http://localhost/housing-jobs/jobs.php">SEE ALL</a></span>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
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


<<<<<<< HEAD


<br><br><br><br><br>
<script src="https://use.fontawesome.com/963f9846e6.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.js" integrity="sha512-yo/DGaftoLvI3LRwd6sVDlo4zu1AhQg+ej3UruAEzwWuzmNZglbF3luwTif1l9wvHZmLRp8Wyiv8wloA9JsVyA==" crossorigin="anonymous"></script>
<footer class="footer m-0 text-white mt-5" style="background-color: #666; height: 150px; left: 0;" align="center">
<br>
<br>
                 
<div class="container-fluid">
                        <div class="row">
                           
                        <div class="container">
		

                      

<a href="https://housing.pacisvorgel.co.ke/about/" class="text-white"> ABOUT US</a> | 
<a href="https://housing.pacisvorgel.co.ke/contact/"  class="text-white">CONTACT US</a>
<br><br>

		<div class="footer-social">

	
		<span>
		<a class="btn-facebook text-white ml-2" target="_blank" href="#">
        <i class="fab fa-facebook-f mr-2"></i> Facebook </a>
	</span>
	
		<span>
		<a class="btn-twitter text-white ml-2" target="_blank" href="#">
		<i class="fab fa-twitter mr-2"></i> Twitter		</a>
	</span>
	
	
		<span>
		<a class="btn-linkedin text-white ml-2" target="_blank" href="#">
		<i class="fab fa-linkedin-in mr-2"></i> Linkedin		</a>
	</span>
	
		<span>
		<a class="btn-instagram text-white ml-2" target="_blank" href="#">
		<i class="fab fa-instagram mr-2"></i> Instagram		</a>
	</span>
	
		<span>
		<a class="btn-youtube text-white ml-2" target="_blank" href="#">
		<i class="fab fa-youtube mr-2"></i> Youtube		</a>
	</span>
	
  <br><br>

</div>


		 <div class="footer-copyright text-white ">
	© Cetonvale Properties - All rights reserved- Designed By Creative Haven</div>
  
  
  <!-- footer-copyright -->

	</div>
</section>



                        </div>
                    </div>
                </footer>

                


 <!-- Swiper JS -->
 <script src="swiper-bundle.min.js."></script>
 <script src="assets/libs/jquery/jquery.min.js"></script>

<!-- Initialize Swiper -->
<script>

          
$(document).ready(function() {
/*
$( '.prof' ).click(function () {
$('.profs').hide();
$('#search').show();
$('#search').addClass('d-flex');


    
});

$( '#exit' ).click(function () {
$('#search').hide();
$('.profs').show();
$('#search').removeClass('d-flex');
    
});
*/

});


$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})

  var swiper = new Swiper('.swiper-container', {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>
=======
<footer>
    <hr>
    footer
</footer>
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

    
</body>
</html>