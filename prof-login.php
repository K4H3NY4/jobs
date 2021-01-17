<?php
	require('config/db.php');

    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($db,$email); //escapes special characters in a string
		$password = md5($_POST['password']);
		$password = mysqli_real_escape_string($db,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `prof`
		 WHERE email='$email' and
		  password='$password'
		  ";

		$result = mysqli_query($db,$query) or die(mysql_error());
		$cred = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($result);
        if($rows==1){
			session_start();
			$_SESSION['email'] = $email;
			$_SESSION['profid'] =$cred["id"];
			//header("Location: index.php"); // Redirect user to index.php
			echo 'success';
			echo $_SESSION['profid'];
			
            }else{
				echo "<div class='form'><h3>email/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="email" name="email" placeholder="email" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>

<br /><br />

</div>

<?php } ?>


</body>
</html>
