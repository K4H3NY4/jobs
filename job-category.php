<?php
require('config/db.php');


if(isset($_POST['submit'])){

$category = mysqli_real_escape_string($db, $_POST['category']);
//$catimage = mysqli_real_escape_string($db, $_POST['catimage']);

$cover_photo = $_FILES['catimage']['name'];
$covertmpname = $_FILES['catimage']['tmp_name'];
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






$sql = "INSERT INTO `task_category` SET

`category`='$category' ,
`photo`='$folder'  ";


$db->query($sql);
if($db->error){
echo $db->error;
}else{

    
 

header("Location: backend/job-category.php");

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


}

?>