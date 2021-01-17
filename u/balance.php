<?php
require('../config/db.php');
    
session_start();
if(!isset($_SESSION["id"])){
header("Location: login.php");
exit(); } 
else if(isset($_SESSION["id"])){
   $id = $_SESSION['id'];
}

date_default_timezone_set('Africa/Nairobi');



/***
 * Top Up Query
 * 
 */

$query = "SELECT SUM(`amount`) FROM deposit where `customer-id` ='$id'  AND `cstatus`= 'complete' ";
$result = mysqli_query($db,$query);
$totaltopup = mysqli_fetch_assoc($result);
mysqli_free_result($result);



$topups = $totaltopup["SUM(`amount`)"];



/****
 *Tasks  Payouts Query
 * 
 * 
 */
$queryPayout = "SELECT SUM(`price`) FROM tasks where `cstatus`='Closed' AND `funds-status`='Paid' AND `customer-id` ='$id' ";
$resultPayout = mysqli_query($db,$queryPayout);
$totalPayouts = mysqli_fetch_assoc($resultPayout);

$payouts = $totalPayouts["SUM(`price`)"];
mysqli_free_result($resultPayout);



/***
 *  Withdraw Query
 * 
 */
$queryWithdraw = "SELECT SUM(`amount`) FROM withdraw where `cstatus`='Complete' AND `customer-id` ='$id' ";
$resultWithdraw = mysqli_query($db,$queryWithdraw);
$totalWithdraw = mysqli_fetch_assoc($resultWithdraw);

$withdraws = $totalWithdraw["SUM(`amount`)"];

mysqli_free_result($resultWithdraw);




$available_balance = $topups - ($payouts + $withdraws);


?>