<?php
    // Establishes initial connection to database
    include 'connect.php';
    include 'utility.php';
?>

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
      <div class="text-center" style="height:50%;padding-top: 15%">

        <h2 class='font-weight-bold'><i class='fa fa-search'></i> Search for Suppliers</h2>
      	<form action="supplier-search.php" method="GET">
        	Filter suppliers by name: 
        	<input style="color: #0F0F0F" type="text" name="query" id="filterquery">
        	<input class="btn btn-success btn-lg" type="submit">
        </form>

        <?php
          $conn = OpenCon();

          $headers = $conn->query("
          	DESC SuppliersInfo;
          ");

          $stmt = $conn->prepare("
          	SELECT * FROM SuppliersInfo SI
          	WHERE SI.Name LIKE ?
          ");

          if(isset($_GET['query'])) {
          	//Fill search box with previous query
          	echo '
          	<script type="text/javascript">
          		document.getElementById("filterquery").value="' . $_GET['query'] .'";
      			</script>';

          	//Wildcards for when this is searched in DB, for LIKE statement (e.g. LIKE %boots%)
          	$filter = "%" . $_GET['query'] . "%"; 

            $stmt->bind_param("s", $filter);

            $stmt->execute();
            $result = $stmt->get_result();
          }
          else { //Show whole table if no query
              $result = $conn->query("
          			SELECT * FROM SuppliersInfo SI
          		");
        	}

          draw_table($headers, $result);

        function draw_table($headers, $result) {
      	  echo '
      	  <table class="table">
      	  	<thead><tr>';
      	  		foreach ($headers as $header) {
      		  		echo '<th scope="col">' . $header['Field'] . '</th>';
      	  		}
      	  echo '
      	  </tr></thead>

      	  <tbody>';
      	  	while ($row = $result->fetch_assoc()) {
      	  		echo '<tr>';
      	  			foreach ($row as $item) {
      	  				echo '<td>' . $item . '</td>';
      	  			}
      	  		echo '</tr>';
      	  	}
      	  echo '
      	  </tbody>
      	  </table>';
      	  }
        ?>
        <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i>Home</a>
      </div>
    </div>
  </body>
</html>
