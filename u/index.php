<?php
session_start();
if(!isset($_SESSION["id"])){
header("Location: login.php");
exit(); } 
else if(isset($_SESSION["id"])){
    header("Location: profile.php");

}

?>