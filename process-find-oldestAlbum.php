<html>
	<head>
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	  	crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body class="page-top bg-primary">
	    <div class="container text-center" style="height:100%">
	      	<div  class="text-center" style="height:50%;padding-top:25%">
				<?php
					include 'connect.php';
					$connection = OpenCon();

					$category = $_POST["conditionCategory"];
					$value = NULL;

					if($category == "artist"){
						$value = $_POST["categoryValue"];
						$sql = "SELECT AlbumName, ReleaseYear
							FROM MusicInfo mi
							WHERE ReleaseYear = (SELECT MIN(ReleaseYear) FROM MusicInfo WHERE Artist = '$value')
							AND mi.Artist = '$value'";
					} else {
						$value = $_POST["categoryValue"];

						$sql = "SELECT AlbumName, ReleaseYear
						FROM MusicInfo mi
						WHERE ReleaseYear =	(SELECT MIN(ReleaseYear) FROM MusicInfo WHERE Genre = '$value')
							AND mi.Genre = '$value'";
					}
					
					findOldestAlbum($connection, $sql, $category, $value);

					function findOldestAlbum($connection, $sql, $category, $value){
						$result = mysqli_query($connection, $sql) OR die(mysqli_error($connection));

						if(mysqli_num_rows($result) > 0){
							echo "<h2><i class='fa fa-search'></i> The Oldest Album for ".$category." ".$value." is";
							echo '<table class="table">';
							
								echo '
								<thead><tr>';
									echo '<th>';
										echo 'Album';
									echo '</th>';

									echo '<th>';
										echo 'Release Year';
									echo '</th>';
									
								echo '
								</tr></thead>';

								while($row = mysqli_fetch_assoc($result)){
									echo '<tbody><tr>';
										echo '<td>' . $row["AlbumName"] . '</td>';
										echo '<td>' . $row["ReleaseYear"] . '</td>';
									echo '</tbody></tr>';
								}

							echo '</table>';
						} else {
							echo "<h2><i class='fa fa-search'></i> There is no album based on your specification";
						}
					}
				?>
				<div style="padding-top:3%">
					<a class='btn btn-success btn-lg' href="templates/find_oldestAlbum.html"><i class="fa fa-search"></i>Start Another Query</a>
					<a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i>Home</a>
				</div>
			</div>
		</div>
	</body>
</html>
