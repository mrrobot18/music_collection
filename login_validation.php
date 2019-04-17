<?php

session_start();

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
		if($count == 1) {
			$_SESSION['login_user'] = $row['UserID'];
			header("location:profile.php");
		}else {
			echo "Your Login Name or Password is invalid";
		}
	}else{

		$userCheck = "SELECT UserID FROM User WHERE username = '$username'";
		$userCheckresult = mysqli_query($db,$userCheck);

		$emailCheck = "SELECT Email FROM User WHERE Email = '$email'";
		$emailCheckresult = mysqli_query($db,$emailCheck);
		
		if ($numberResults > 0){
			echo 'User Name Already Exist ' . $numberResults;
		}		
		elseif (mysqli_num_rows($emailCheckresult) > 0){
			echo 'Emai Already In Use';
		}
		else{
			$query = "INSERT INTO `User`(`username`, `Email`, `Password`) VALUES ('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['login_user'] = $username;
			header("location:profile.php");
		}
	}
}
?>
