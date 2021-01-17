<?php

require('config/db.php');
session_start();

if(!isset($_SESSION["profid"])){
header("Location: prof-login.php");
exit(); } 
else if(isset($_SESSION["profid"])){
   $profid = $_SESSION['profid'];
}

    
if(isset($_POST['submit-profpic'])){

    $update_id = mysqli_real_escape_string($db, $_POST['update_id']);

    $cover_photo = $_FILES['uploadfiled']['name'];
    $covertmpname = $_FILES['uploadfiled']['tmp_name'];
    $folder = 'uploads/';
    //$array1 = explode($_FILES['uploadfile'],['name']);
    //$file_name_extension = $array1;
    $new_file_name = time().rand(1000,9999)."".$cover_photo;
    $folder="uploads/".date('Y')."/".date('m')."/".date('d');
    
    if(!is_dir($folder)){
    mkdir($folder,0777,true);
    $folder = $folder."/".$new_file_name;
    }else{
    $folder = $folder."/".$new_file_name;
    }
    
    
    
    move_uploaded_file($covertmpname,  $folder);
    
    
    
    
    $sql = "UPDATE prof SET
     `picture` = '$folder' 
    WHERE id = '$update_id' ";
    
    
    
    
    $db->query($sql);
    if($db->error){
    echo $db->error;
    }else{
    ($sql);
        header("Location: http://localhost/housing-jobs/p/profile.php");
    
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    
    
    /*
    
    $sid    = "ACb527a2c0357ec9080d83a8cd13412c93";
    $token  = "[AuthToken]";
    $twilio = new Client($sid, $token);
    
    $message = $twilio->messages
    ->create("whatsapp:+254700419377", // to
    array(
    "from" => "whatsapp:+14155238886",
    "body" => "Your Yummy Cupcakes Company order of 1 dozen frosted cupcakes has shipped and should be delivered on July 10, 2019. Details: http://www.yummycupcakes.com/"
    )
    );
    
    print($message->sid);
    */
    }
    
    
    };

    ?>