<?php

 $db = new mysqli( "localhost","root","","jobs");
 if($db ->connect_error){
     exit("Cannot connect to the database");
 }

 date_default_timezone_set('Africa/Nairobi');



?>
