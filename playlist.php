<?php
	session_start();
	include('session.php');

	$PLID = htmlspecialchars($_GET["PLID"]);

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
							<a class="nav-link" href="profile.php">Playlists</a>
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
					<h1 class="mt-5">Playlist <?php echo $PLID; ?></h1>

					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Title</th>
								<th scope="col">Artist</th>
								<th scope="col">Album</th>
								<th scope="col">Genre</th>
								<th scope="col">Year</th>
								<th scope="col">Playtime</th>
								<th scope="col">URL</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$getSongs = "SELECT SongID FROM Songlists WHERE PlaylistID = '$PLID'";
							$songIDs = mysqli_query($db,$getSongs);

							while ($row = $songIDs->fetch_assoc()) {
								$SID = $row["SongID"];

								$getSongData = "SELECT * FROM Songs WHERE SongID = '$SID'";
								$songData = mysqli_query($db,$getSongData);

								$SongRow = $songData->fetch_assoc();

								$STitle = $SongRow['Title'];
								$SArtistID = $SongRow['ArtID'];
								$SAlbumID = $SongRow['AlbumID'];
								$SGenre = $SongRow['Genre'];
								$SYear = $SongRow['Year'];
								$SPlaytime = $SongRow['Playtime'];
								$SURL = $SongRow['URL'];

								$getArtistName = "SELECT Name FROM Artists WHERE ArtID = '$SArtistID'";
								$ArtistName = mysqli_query($db,$getArtistName);
								$ArtistRow = $ArtistName->fetch_assoc();

								$ArtName = $ArtistRow['Name'];
						?>
								<tr>
									<td class="text-center"><?php echo $STitle ?></td>
									<td class="text-center"><?php echo $ArtName ?></td>
									<td class="text-center"><?php echo $SAlbumID ?></td>
									<td class="text-center"><?php echo $SGenre ?></td>
									<td class="text-center"><?php echo $SYear ?></td>
									<td class="text-center"><?php echo $SPlaytime ?></td>
									<td class="text-center">
										<a href="<?php echo $SURL ?>" target="_blank">
											<i class="fas fa-play"></i>
										</a>
									</td>
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

