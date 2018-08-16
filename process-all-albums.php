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
              echo "<p class='h3'>".$row["Name"]. "</p>";
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
            Redirect("../threefiftyfour/templates/search_all_albums.html");
          }

          $conn = OpenCon();
          $sql = NULL;
          switch($type){
            case "Artist":
              $sql = "SELECT tmp1.Name from
                      (select c.Customer_ID, ci.Name FROM Customer c, CustomerInfo ci WHERE c.PhoneNo = ci.PhoneNo) tmp1
                        WHERE NOT EXISTS(
                          SELECT * FROM (SELECT * FROM Music WHERE Artist = '$selected') tmp2
                          WHERE NOT EXISTS (
                            SELECT p.Merchandise_ID from PurchaseHistoryLog p
                            WHERE tmp1.Customer_ID = p.Customer_ID 
                            AND tmp2.Merchandise_ID = p.Merchandise_ID
                            )
                      )";
              break;
            case "Genre":
              $sql =  "SELECT tmp1.Name FROM
                      (SELECT c.Customer_ID, ci.Name FROM Customer c, CustomerInfo ci
                        WHERE c.PhoneNo = ci.PhoneNo) tmp1
                      WHERE NOT EXISTS(
                        select * 
                        FROM (SELECT m.Merchandise_ID from Music m RIGHT JOIN MusicInfo mi ON
                          m.AlbumName = mi.AlbumName
                          AND m.Artist = mi.Artist 
                          WHERE mi.Genre = '$selected') tmp2
                        Where not EXISTS (
                          SELECT p.Merchandise_ID from PurchaseHistoryLog p
                          WHERE tmp1.Customer_ID = p.Customer_ID 
                          AND tmp2.Merchandise_ID = p.Merchandise_ID
                        )
                      )";
              break;
            case "Format":
              $sql = "SELECT tmp1.Name FROM
                      (SELECT c.Customer_ID, ci.Name FROM Customer c, CustomerInfo ci where c.PhoneNo = ci.PhoneNo) tmp1
                        WHERE NOT EXISTS(
                          SELECT * FROM (SELECT * FROM Music WHERE MediaFormat = '$selected') tmp2
                          WHERE NOT EXISTS (
                            SELECT p.Merchandise_ID from PurchaseHistoryLog p
                            WHERE tmp1.Customer_ID = p.Customer_ID 
                            AND tmp2.Merchandise_ID = p.Merchandise_ID
                            )
                      )";
              break;
            default:
              Redirect("../threefiftyfour/templates/index.html");
          }
          echo "<p class='h2'><i class='fa fa-eye'></i> The Loyal Customer Purchased All the Albums of $type: $selected is: </p>";
 
          GetResult($conn, $sql);
          CloseCon($conn);
        ?>
        <a class='btn btn-success btn-lg' href="templates/search_all_albums.html"><i class="fa fa-search"></i>Start Another Query</a>
        <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i>Home</a>
      </div>
    </div>
  </body>
</html>