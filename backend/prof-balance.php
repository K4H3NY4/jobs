<?php
require('../config/db.php');



    date_default_timezone_set('Africa/Nairobi');




$profid = mysqli_real_escape_string($db, $_GET['id']);

$query = "SELECT SUM(`price`) FROM tasks where `cstatus`='Closed' AND `funds-status`='Paid' AND `prof-id` ='$profid' ";
$result = mysqli_query($db,$query);
$totaltopup = mysqli_fetch_assoc($result);


$topups = $totaltopup["SUM(`price`)"];



$available_balance = $topups - 0 ;



/***
 *  Withdraw Query
 * 
 */
$queryWithdraw = "SELECT SUM(`amount`) FROM withdraw where `cstatus`='Complete' AND `prof-id` ='$profid' ";
$resultWithdraw = mysqli_query($db,$queryWithdraw);
$totalWithdraw = mysqli_fetch_assoc($resultWithdraw);

$withdraws = $totalWithdraw["SUM(`amount`)"];





$available_balance = $topups - $withdraws ;


mysqli_free_result($result);
mysqli_free_result($resultWithdraw);


?>