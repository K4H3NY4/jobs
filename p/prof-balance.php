<?php
require('../config/db.php');

session_start();

if(!isset($_SESSION["profid"])){
header("Location: login.php");
exit(); } 
else if(isset($_SESSION["profid"])){
   $profid = $_SESSION['profid'];
}


    date_default_timezone_set('Africa/Nairobi');



$profid = $_SESSION['profid'];


$query = "SELECT SUM(`price`) FROM tasks where `cstatus`='Closed' AND `funds-status`='Paid' AND `prof-id` ='$profid' ";
$result = mysqli_query($db,$query);
$totaltopup = mysqli_fetch_assoc($result);
mysqli_free_result($result);


$topups = $totaltopup["SUM(`price`)"];



$available_balance = $topups - 0 ;



/***
 *  Withdraw Query
 * 
 */
$queryWithdraw = "SELECT SUM(`amount`) FROM withdraw where `cstatus`='Complete' AND `prof-id` ='$profid' ";
$resultWithdraw = mysqli_query($db,$queryWithdraw);
$totalWithdraw = mysqli_fetch_assoc($resultWithdraw);
mysqli_free_result($resultWithdraw);

$withdraws = $totalWithdraw["SUM(`amount`)"];


$available_balance = $topups - $withdraws ;
