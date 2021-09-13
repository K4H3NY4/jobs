<?php

require('../config/db.php');

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

   
       if ( $password == $confirmPassword ) {

          $sql = "INSERT INTO `prof` SET 
          `first-name`='$firstName',
          `last-name`='$lastName', 
         `occupation` = '$occupation',
          `password`='".md5($password)."',
          `phone`='254$phone1',
          `email`='$email' ";
      
      $db->query($sql);
        if($db->error){
       
      
          echo $db->error;
      }else{
        $to = $email;
       $subject = "ACCOUNT CREATED";
       $message = "You have successful open an acount" ;
       
       // Always set content-type when sending HTML email
       $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
       
       // More headers
       $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
       /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
       
       mail($to,$subject,$message,$headers);
          header("Location: ../p/profile.php");
      }

} else {
           echo ('<div class="alert  alert-dismissible  alert-primary" role="alert"> password dont match </div> ');
       } }
   
 

 

 ?>

