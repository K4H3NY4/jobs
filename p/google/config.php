<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("999718642573-si6j92dt8t4suukfaspldiucbuo3oh96.apps.googleusercontent.com");
	$gClient->setClientSecret("kNDUnQjHOBh1tnckDHqXEIdk");
	$gClient->setApplicationName("Cetonvale-Login");
	$gClient->setRedirectUri("https://housing.pacisvorgel.co.ke/housing-jobs/p/google/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
