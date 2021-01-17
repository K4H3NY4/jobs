<?php
session_start();
if(!isset($_SESSION["profid"])){
header("Location: login.php");
exit(); } 
else if(isset($_SESSION["profid"])){
    header("Location: profile.php");

}

?>