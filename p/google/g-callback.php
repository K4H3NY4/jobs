<?php
	require_once "config.php";
	require('db.php');

	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: login.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['gid'] = $userData['id'];
	$_SESSION['gemail'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];
	
	$gmail = $_SESSION['gemail'];

		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `prof`
		 WHERE email='$gmail' ";

		$result = mysqli_query($db,$query) or die;
		$cred = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($result);
        if($rows==1){
		
			$_SESSION['email'] = $email;
			$_SESSION['profid'] =$cred["profid"];
			header("Location: ../index.php"); // Redirect user to index.php
			echo 'success';
            echo $_SESSION['profid'];

            header("Location: ../profile.php");
        }else{
    unset($_SESSION['access_token']);
	$gClient->revokeToken();
	session_destroy();
  	header('Location: ../register.php');
            
        }
	exit();
?>