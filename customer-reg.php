<?php

require('config/db.php');
/*
$query = 'SELECT * FROM rider ';
$result = mysqli_query($db,$query
*/
    if(isset($_POST['register'])){

        $firstName = mysqli_real_escape_string ( $db, $_POST['firstName']);
        $lastName = mysqli_real_escape_string ( $db, $_POST['lastName']);
        $idNumber = mysqli_real_escape_string ($db, $_POST['idNumber']);
       $phone = mysqli_real_escape_string ($db, $_POST['phone']);
       $password = mysqli_real_escape_string ($db, $_POST['password']);
       $email = mysqli_real_escape_string ($db, $_POST['email']);
       $confirmPassword = mysqli_real_escape_string ($db, $_POST['confirmPassword']);

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
   
   
   
   
       if ($password == $confirmPassword) {
   
          //
         
   
          
       } else {
           echo ('
           <div class="alert  alert-dismissible  alert-primary" role="alert">
           password dont match
    </div>
         
           
           ');
       }
       
        
           
       $sql = "INSERT INTO `customer` SET
       
        `first-name`='$firstName',
       `last-name`= '$lastName',
       `password`='".md5($password)."',
       `picture`='$folder' ,
       `phone`='$phone',
       `email`='$email' ";
      
   
   
   $db->query($sql);
   if($db->error){
    
   
       echo $db->error;
   }else{
       echo "submitted";
   }
   
   
    }
   
 

 

 ?>


<form method="POST"   action="<?php $_SERVER['PHP_SELF']; ?>" class="register-rider container" id="register-rider">

Customer Register <br><br>
       

        <label for="" >First name</label><br>
        <input type="text" class="form-control" name="firstName">
        <br>

        <label for="" >Last Name</label><br>
        <input type="text" class="form-control" name="lastName">
        <br>

        <label for="" >ID Number</label><br>
        <input type="text" class="form-control" name="idNumber">
        <br>

        <label for="" >Phone Number</label><br>
        <input type="text" class="form-control" name="phone">
        <br>

        <label for="" >email</label><br>
        <input type="email" class="form-control" name="email" autocomplete="none">
        <br>

        <BR>
        Item Photo<br>
        <input class="form-control" type="file" name="uploadfile" id="uploaded" accept=".jpg,.jpeg,.png.,"><BR>

        <label for="">Password</label><br>
        <input type="password" class="form-control" name="password">
<br>
        <label for=""> Confirm Password</label><br>
        <input type="password" class="form-control" name="confirmPassword">
        <br>

     <button class="btn "  name="register"> Register</button>

    </form>