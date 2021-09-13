<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("999718642573-rslprn4edvn2cr6k3lk9fgtoo4ksail2.apps.googleusercontent.com");
	$gClient->setClientSecret("mIh4IlIoj2QetvI-sfq_gN7Q");
	$gClient->setApplicationName("cetonvale-login2");
	$gClient->setRedirectUri("https://housing.pacisvorgel.co.ke/housing-jobs/u/google/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
