<?php
	session_start();
	include('session.php');

	//Print all global variables - >   print_r($_SESSION);
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Database Project</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	</head>

	<body>

		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
			<div class="container">
				<a class="navbar-brand" href="#">Music App</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="profile.php">Playlists
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Sign Out</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1 class="mt-5">Welcome <?php echo $login_username; ?></h1>

					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Playlist ID</th>
								<th scope="col">Name</th>
								<th scope="col"># of songs</th>
								<th scope="col">Edit Songs</th>
								<th scope="col">View</th>
								<th scope="col">Remove</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$getPlaylist = "SELECT PlaylistID FROM Playlist WHERE UserID = '$login_id'";
							$playlistsIDs = mysqli_query($db,$getPlaylist);

							while ($row = $playlistsIDs->fetch_assoc()) {
								$PLID = $row["PlaylistID"];

								$getNumberOfSongs = "SELECT COUNT(*) AS count FROM Songlists WHERE PlaylistID = '$PLID'";
								$songNum = mysqli_query($db,$getNumberOfSongs);

								$SonglistRow = $songNum->fetch_assoc();
								$PLSongs = $SonglistRow['count'];

						?>
								<tr>
									<th scope="row" class="text-center"><?php echo $PLID; ?></th>
									<td class="text-center">Name of the playlist, we need to add this field to table</td>
									<td class="text-center"><?php echo $PLSongs ?></td>
									<td class="text-center"><a href="playlist.php?PLID=<?php echo $PLID; ?>"><i class="fas fa-edit"></i></a></td>
									<td class="text-center"><i class="fas fa-eye"></i></td>
									<td class="text-center"><i class="fas fa-trash-alt"></i></td>
								</tr>
						<?php
							}
						?>		
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.bundle.js"></script>
	</body>
</html>