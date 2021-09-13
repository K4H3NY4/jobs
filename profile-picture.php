<?php
require('config/db.php');
session_start();
if(!isset($_SESSION["email"])){
    header("Location: customer-login.php");
    exit(); }
else if(isset($_SESSION["email"])){
    $email= $_SESSION['email'];
    $id = $_SESSION['id'];


};

if(isset($_POST['submit-photo'])){

    $cover_photo = $_FILES['uploadfile']['name'];
    $covertmpname = $_FILES['uploadfile']['tmp_name'];
    $folder = 'uploads/';
    $array1 = explode($_FILES['uploadfile'],['name']);
    $file_name_extension = $array1;
    $new_file_name = time().rand(1000,9999)."_".$cover_photo;
    $folder="uploads/".date('Y')."/".date('m')."/".date('d');
    
    if(!is_dir($folder)){
    mkdir($folder,0777,true);
    $folder = $folder."/".$new_file_name;
    }else{
    $folder = $folder."/".$new_file_name;
    }
    
     move_uploaded_file($covertmpname,  $folder);
    
    
$sql = "UPDATE customer SET `picture` = $folder 
WHERE id = '$id' ";


$db->query($sql);
if($db->error){
echo $db->error;
}else{
($sql);
<<<<<<< HEAD
    header("Location: u/profile.php");
=======
    header("Location: http://localhost/housing-jobs/u/profile.php");
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

}


}

?>