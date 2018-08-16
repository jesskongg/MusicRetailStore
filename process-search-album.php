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
      <div  class="text-center" style="height:50%;padding-top: 25%">
        <?php
        	function FindPrice($connection, $sql){
        		$result = mysqli_query($connection, $sql) OR die(mysqli_error($connection));

        		if(mysqli_num_rows($result) > 0){
        			while($row = mysqli_fetch_assoc($result)){
        				echo "<p class='h3'>". "$".$row["RetailPrice"]. "</p>";
        			}
        		}
        	}

          include 'connect.php';
          include 'utility.php';

          $selectedArtist = NULL;
          $selectedAlbum = NULL;

          if (isset($_POST['selectedArtist'])) {
            $selectedArtist = $_POST['selectedArtist'];
          }
          if (isset($_POST['selectedAlbum'])) {
            $selectedAlbum = $_POST['selectedAlbum'];
          }
          echo "<p class='h2'> For Album $selectedAlbum by $selectedArtist, retail price is </p>";

          if($selectedArtist == "" || $selectedAlbum==""){
            Redirect("../threefiftyfour/search-album-name.php");
          }

          $conn = OpenCon();
          $sql = "SELECT b.RetailPrice FROM
          		Merchandise a, MerchandiseInfo b 
          		WHERE a.UPC = b.UPC AND 
          		a.Merchandise_ID IN 
          		(SELECT Merchandise_ID FROM Music 
          		WHERE Artist = '$selectedArtist '
          		AND AlbumName ='$selectedAlbum')";
          
          FindPrice($conn, $sql);
          CloseCon($conn);
        ?>
      </div>
      <div class="text-center" style="height:50%;padding-top: 10%">
        <a class='btn btn-success btn-lg' href="search-album-artist.php"><i class="fa fa-search"></i>Start Another Query</a>
        <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i>Home</a>
			</div>
      </div>
    </body>
 </html>