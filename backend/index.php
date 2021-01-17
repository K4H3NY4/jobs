<?php
session_start();

if(!isset( $_SESSION['adminid'])){
  header("Location: login.php");
    exit(); }


else if(isset($_SESSION["adminid"])){
    header("Location: deposits.php");
   
}


?>