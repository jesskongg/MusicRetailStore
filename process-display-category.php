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
	      	<div class="text-center" style="height:50%;padding-top:10%">
				<?php
					include "connect.php";
					$Category = $_POST["Category"];
					echo "All $Category in the System are:";
					$connection = OpenCon();
					$sql = "SELECT DISTINCT $Category FROM MusicInfo";
					listSelection($connection, $sql, $Category);

					function listSelection($connection, $sql, $Category){
						$result = mysqli_query($connection, $sql) OR die(mysqli_error($connection));

						echo '
						<table class="table text-center">
							<thead><tr>';
								echo '<th scope="col">';
								if($Category == 'Artist'){
									echo 'Artists';
								} else if ($Category == 'AlbumName') {
									echo 'Albums';
								} else {
									echo 'Genres';
								}
								echo '</th>';
								
							echo '
							</tr></thead>';

							if(mysqli_num_rows($result) > 0){
								echo '
								<tbody>';
									while($row = mysqli_fetch_assoc($result)){
										echo '<tr>';
											foreach ($row as $item) {
												echo '<td>' . $item . '</td>';
											}
										
										echo '</tr>';
									}
								echo '
								</tbody>';
							}

						echo '</table>';
					}
				?>
				<div style="padding-top:3%">
					<a class='btn btn-success btn-lg' href="templates/select_category.html"><i class="fa fa-search"></i>Start Another Query</a>
					<a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i>Home</a>
				</div>
			</div>
		</div>
	</body>
</html>
