<?php

require('../config/db.php');
/*
$query = 'SELECT * FROM rider ';
$result = mysqli_query($db,$query
*/
    if(isset($_POST['register'])){

        $firstName = mysqli_real_escape_string ( $db, $_POST['firstName']);
        $lastName = mysqli_real_escape_string ( $db, $_POST['lastName']);
      //  $idNumber = mysqli_real_escape_string ($db, $_POST['idNumber']);
       $phone = mysqli_real_escape_string ($db, $_POST['phone']);
       $phone1 = $phone * 1;
       $password = mysqli_real_escape_string ($db, $_POST['password']);
       $occupation = mysqli_real_escape_string ($db, $_POST['occuapation']);
       $email = mysqli_real_escape_string ($db, $_POST['email']);
       $confirmPassword = mysqli_real_escape_string ($db, $_POST['confirmPassword']);
/*
       $cover_photo = $_FILES['uploadfile']['name'];
       $covertmpname = $_FILES['uploadfile']['tmp_name'];
       $folder = 'uploads/';
       //$array1 = explode($_FILES['uploadfile'],['name']);
     //$file_name_extension = $array1;
       $new_file_name = time().rand(1000,9999)."_".$cover_photo;
       $folder="uploads/".date('Y')."/".date('m')."/".date('d');
   
       if(!is_dir($folder)){
           mkdir($folder,0777,true);
           $folder = $folder."/".$new_file_name;
       }else{
           $folder = $folder."/".$new_file_name;
       }
       
   
   
      move_uploaded_file($covertmpname,  $folder);
   
   
   */
   
       if ($password == $confirmPassword) {
   
          //

          $sql = "INSERT INTO `prof` SET 
          `first-name`='$firstName',
          `last-name`='$lastName', 
         ``occupation` = '$occupation'
          `password`='".md5($password)."',
          `phone`='254$phone1',
          `email`='$email' ";
         
      
      
      $db->query($sql);
      if($db->error){
       
      
          echo $db->error;
      }else{
          echo "submitted";
          header("Location: ../p/profile.php");
      }

          
       } else {
           echo ('
           <div class="alert  alert-dismissible  alert-primary" role="alert">
           password dont match
    </div>
         
           
           ');
       }
       
        
           
      
   
   
    }
   
 

 

 ?>

