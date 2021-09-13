<?php
	require('../config/db.php');

    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($db,$email); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($db,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `prof`
		 WHERE email='$email' and
		  password='".md5($password)."'";

		$result = mysqli_query($db,$query);
		$rows = mysqli_num_rows($result);
        if($rows==1){
			session_start();
			$_SESSION['email'] = $email;
			$_SESSION['prof_id'] =$prof_id ;
		
			echo 'success';
            echo $_SESSION['prof_id'];

            header("Location: ../p/profile.php");
            
			
            }else{
				echo "<div class='form'><h3>email/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{

	};
?>
