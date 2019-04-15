<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	include("configure.php");

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$action = $_POST['action_form'];

	if($action == 'sign_in'){

		$sql = "SELECT UserID FROM User WHERE Email = '$email' and Password = '$password'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);
	      
		// If result matched $myusername and $mypassword, table row must be 1 row

		session_start();

		if($count == 1) {
			$_SESSION['login_user'] = $email;
			header("location:profile.php");
		}else {
			echo "Your Login Name or Password is invalid";
		}
	}else{

		$userCheck = "SELECT UserID FROM User WHERE UserID = '$username'";
		$userCheckresult = mysqli_query($db,$userCheck);
		
		if ($numberResults > 0){
			echo 'User Name Already Exist ' . $numberResults;
		}

		$emailCheck = "SELECT Email FROM User WHERE Email = '$email'";
		$emailCheckresult = mysqli_query($db,$emailCheck);
		
		if (mysqli_num_rows($emailCheckresult) > 0){
			echo 'Emai Already In Use';
		}

		$query = "INSERT INTO User VALUES ('122', $username', '$email', '$password')";
		mysqli_query($query);

		mysqli_close();

		header("location:get.php");
	}
	
}
?>
