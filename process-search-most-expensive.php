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
      <div class="text-center" style="height:50%;padding-top: 25%">
        <?php
        	function GetResult($connection, $sql){
        		$result = mysqli_query($connection, $sql) OR die(mysqli_error($connection));

        		if(mysqli_num_rows($result) > 0){
        			while($row = mysqli_fetch_assoc($result)){
                echo "<p class='h3'>".$row["AlbumName"]."  $".round($row["MAX(b.RetailPrice)"], 2). "</p>";
        			}
        		}
        	}

            include 'connect.php';
            include 'utility.php';

            $type = NULL;
            $selected = NULL;

            if (isset($_POST['type'])) {
              $type = $_POST['type'];
            }
            if (isset($_POST['selected'])) {
              $selected = $_POST['selected'];
            }
            // echo "<p> For Album $selectedAlbum by $selectedArtist, retail price is </p>";


            if($selected == "" || $type==""){
              Redirect("../threefiftyfour/templates/search_most_expensive.html");
            }

            $conn = OpenCon();
            $sql = NULL;
            switch($type){
              case "Artist":
                $sql = "SELECT c.AlbumName, MAX(b.RetailPrice) FROM Merchandise a, MerchandiseInfo b, Music c
                    Where a.UPC = b.UPC AND a.Merchandise_ID = c.Merchandise_ID
                    AND c.Artist = '$selected'";     
                break;
              case "Genre":
                $sql =  "SELECT c.AlbumName, MAX(b.RetailPrice) FROM Merchandise a, MerchandiseInfo b, Music c, MusicInfo d
                        WHERE a.UPC = b.UPC AND a.Merchandise_ID = c.Merchandise_ID 
                        AND c.Artist = d.Artist and c.AlbumName = d.AlbumName
                        AND d.Genre = '$selected'";
                break;
              case "Format":
                $sql = "SELECT c.AlbumName, MAX(b.RetailPrice) FROM Merchandise a, MerchandiseInfo b, Music c
                      WHERE a.UPC = b.UPC AND a.Merchandise_ID = c.Merchandise_ID
                      AND c.MediaFormat = '$selected'";
                break;
              default:
                Redirect("../threefiftyfour/templates/index.html");
            }
            echo "<p class='h2'><i class='fa fa-key'></i> The Most Expensive Price for $type $selected is: </p>";
            GetResult($conn, $sql);
            CloseCon($conn);
          ?>
          <div>
            <a class='btn btn-success btn-lg' href="templates/search_most_expensive.html"><i class="fa fa-search"></i>Start Another Query</a>
            <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i>Home</a>
          </div>
        </div>
      </div>
    </body>
</html>