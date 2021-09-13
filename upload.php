<?php
require('config/db.php');
session_start();
if(!isset($_SESSION["email"])){
    header("Location: customer-login.php");
    exit(); }
else if(isset($_SESSION["email"]) ){
    $email= $_SESSION['email'];
    $id = $_SESSION['id'];
   


};

if(isset($_POST['submit'])){

$title = mysqli_real_escape_string($db, $_POST['title']);
$category = mysqli_real_escape_string($db, $_POST['category']);
$county = mysqli_real_escape_string($db, $_POST['county']);
$town = mysqli_real_escape_string($db, $_POST['town']);
$description = mysqli_real_escape_string($db, $_POST['description']);
$price = mysqli_real_escape_string($db, $_POST['price']);
<<<<<<< HEAD
$period = mysqli_real_escape_string($db, $_POST['period']);
=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

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




$sql = "INSERT INTO `tasks` SET

`title`='$title' ,
`category`='$category' ,
`county`='$county' ,
`town`='$town' ,
`description`='$description' ,
`price`='$price' ,
<<<<<<< HEAD
`period`='$period' ,
=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
`photo`='$folder' ,
`customer-id`='$id',
`funds-status`='Pending',
`cstatus`='Open' ";


$db->query($sql);
if($db->error){
echo $db->error;
}else{
<<<<<<< HEAD

    
$queryProfs = "SELECT * FROM `prof` where `county`= '$county' AND `occupation` ='$occupation'  ORDER by `id` DESC";
$resultProfs = mysqli_query($db,$queryProfs);
$profs =  mysqli_fetch_all($resultProfs, MYSQLI_ASSOC);
mysqli_free_result($resultProfs);

foreach ( $profs as $prof) :

    $to = $prof['email'];
    $subject = "NEW JOB ALERT";
    $message = "Job title </b> " . $title . "</b> <br> Description "  .$description. " <br> Budget <b>" .$price."</b>";
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From: <no-reply@housing.co.ke>' . "\r\n";
    /*$headers .= 'Cc: kahenyaj@gmail.com' . "\r\n";*/
    
    mail($to,$subject,$message,$headers);

endforeach;

header("Location: u/projects.php");
=======
($sql);
    header("Location: http://localhost/housing-jobs/u/projects.php");
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c

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


/***
 * profile picture
 * 
 * 
 * ** */
if(isset($_POST['submit-photo'])){

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
    
    
    
    
    $sql = "UPDATE customer SET
     `picture` = '$folder' 
    WHERE id = '$update_id' ";
    
    
    
    
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

<<<<<<< HEAD
    mysqli_close($db);
=======
>>>>>>> b888daa3ab3d6c7880f7e4f17cc79861e3914f2c
?>