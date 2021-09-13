<?php
require('../config/db.php');
    

date_default_timezone_set('Africa/Nairobi');



/***
 * Top Up Query
 * 
 */
$id = mysqli_real_escape_string($db, $_GET['id']);

$query = "SELECT SUM(`amount`) FROM deposit where `customer-id` ='$id'  AND `cstatus`= 'complete' ";
$result = mysqli_query($db,$query);
$totaltopup = mysqli_fetch_assoc($result);



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



/***
 *  Withdraw Query
 * 
 */
$queryWithdraw = "SELECT SUM(`amount`) FROM withdraw where `cstatus`='Complete' AND `customer-id` ='$id' ";
$resultWithdraw = mysqli_query($db,$queryWithdraw);
$totalWithdraw = mysqli_fetch_assoc($resultWithdraw);

$withdraws = $totalWithdraw["SUM(`amount`)"];





$available_balance = $topups - ($payouts + $withdraws);


mysqli_free_result($resultWithdraw);
mysqli_free_result($resultPayout);
mysqli_free_result($result);
mysqli_close($db);


?>