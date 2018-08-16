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
        <form action="process-all-albums.php" method="post">
          <h2 class='font-weight-bold'><i class='fa fa-eye'></i> Search For the Loyal Customers</h2>

          <?php
            // Establishes initial connection to database
            include 'connect.php';
            include 'utility.php';
            // Queries database for all names to populate the dropdown list with
            // User can then select from values in the dropdown
            $type = NULL;
            if (isset($_POST['type'])) {
              $type = $_POST['type'];
            }
            echo '<strong>Current Selected Type: </strong>';
            echo '<input class="text-danger" name="type" value="'.$type.'" readonly>';
            $conn = OpenCon();
            $selections = Null;
            $column = Null;

            switch ($type){
              case "Artist":
                echo '<p class="h3">Find the Customer Purchased all the Albums of Selected Artist</p>';
                $selections = $conn->query("SELECT DISTINCT Artist FROM MusicInfo");
                $column = 'Artist';
                break;
              case "Genre":
                echo '<p class="h3">Find the Customer Purchased All the Albums of Selected Genre</p>';
                $selections = $conn->query("SELECT DISTINCT Genre FROM MusicInfo");
                $column = 'Genre';
                break;
              case "Format":
                echo '<p class="h3">Find the Customer Purchased All the Albums of Selected Media Format</p>';
                $selections = $conn->query("SELECT DISTINCT MediaFormat FROM Music");
                $column = 'MediaFormat';
                break;
              default:
                Redirect("../threefiftyfour/templates/index.html");
            }
            echo '<p class="h3">Please Select '.$type.'</p>';
            echo '<div class="text-danger" style="padding-top:1%">';
            // Specifies that value selected in dropdown list will be submitted through form as 'EmployeeName'
            echo "<select name='selected'>";
            // echo '<option value="">Select Album</option>';
            while ($row = $selections->fetch_assoc()) {
              unset($selection);
              $selection= $row[$column];
              echo '<option value="'.$selection.'">'.$selection.'</option>';
            }
            echo "</select>";
            CloseCon($conn);
            echo "</div>";
          ?>
          <div style="padding-top: 2%">
            <input class='btn btn-success btn-lg' type="submit" value="Go">
            <a class='btn btn-info btn-lg' href="templates/search_all_albums.html"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </form>
        <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i>Home</a>
      </div>
    </div>
  </body>
</html>
