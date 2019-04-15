<?php
   include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Database Project</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<div class="container">
			<a class="navbar-brand" href="#">Music App</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
	</nav>

	<!-- Page Content -->
	<div class="container my-4">
		<div class="row">
			<div class="card mb-3">
				<img src="images/banner.png" class="card-img-top" alt="...">
				<div class="card-body login">
					<h5 class="card-title">Log In / Sign up</h5>
					<p class="card-text">
						<form method="POST" action="login_validation.php"> 
							<input id="action_form" name="action_form" type="hidden" value="sign_in">
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="text" class="form-control" id="email" placeholder="email" name="email" required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="psw" placeholder="Password" name="pass" required>
							</div>
							<div class="form-group form-check">
								<input type="checkbox" class="form-check-input" id="create">
								<label class="form-check-label" for="exampleCheck1">Create account</label>
							</div>
							<div class="form-group" id="username_form">
								<label for="username">User Name</label>
								<input type="text" class="form-control" id="username" placeholder="User Name" name="username">
							</div>
							<button type="submit" id="submit" class="btn btn-primary">Sign In</button> 
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.bundle.js"></script>

	<script>
		$("#username_form").hide();

		$('#create').on('change', function(){
			if(this.checked){
				$('#action_form').val('sign_up');
				$('#submit').html("Sign Up");
				$("#username_form").show();
				$('#username').attr('required', 'required');
			}
			else{
				$('#action_form').val('sign_in');
				$('#submit').html("Sign In");
				$("#username_form").hide();
				$('#username').removeAttr('required');
			}
		});

	</script>
</body>

</html>
