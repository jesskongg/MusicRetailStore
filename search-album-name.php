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
        <form action="process-search-album.php" method="post">
          <h2 class='font-weight-bold'><i class='fa fa-dollar'></i> Search For the Price of the Album</h2>
          <h3>Select Artist Name</h3>

          <?php
            // Establishes initial connection to database
            include 'connect.php';
            include 'utility.php';
            // Queries database for all names to populate the dropdown list with
            // User can then select from values in the dropdown
            $selectedArtist = NULL;
            if (isset($_POST['artist'])) {
              $selectedArtist = $_POST['artist'];
            }
            if($selectedArtist == ""){
              Redirect("../threefiftyfour/search-album-artist.php");
            }
            echo '<strong>Current Selected Artist: </strong>';
            echo '<input class="text-danger" name="selectedArtist" value="'.$selectedArtist.'" readonly>';

            $conn = OpenCon();
            $albums = $conn->query("SELECT AlbumName FROM MusicInfo WHERE Artist = '$selectedArtist'");
            echo '<p class="h3" style="padding-top:1%">Select Album Name</p>';
            echo '<div class="text-danger" style="padding-top:1%">';
            // Specifies that value selected in dropdown list will be submitted through form as 'EmployeeName'
            echo "<select name='selectedAlbum'>";
            echo '<option value="">Select Album</option>';
            while ($row = $albums->fetch_assoc()) {
              unset($album);
              $album = $row['AlbumName'];
              echo '<option value="'.$album.'">'.$album.'</option>';
            }
            echo "</select>";
            echo '</div>';
            CloseCon($conn);
          ?>
          <div style="padding-top: 2%">
            <input class="btn btn-success btn-lg" type="submit" value="Go">
            <a class="btn btn-info btn-lg" href="search-album-artist.php"><i class="fa fa-arrow-left"></i>Back</a>
          </div>
          <div style="padding-top: 2%">
            <a class="btn btn-danger btn-lg" href="templates/index.html"><i class="fa fa-home"></i>Home</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
