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
        	function FindAvg($connection, $sql){
        		$result = mysqli_query($connection, $sql) OR die(mysqli_error($connection));

        		if(mysqli_num_rows($result) > 0){
        			while($row = mysqli_fetch_assoc($result)){
        				echo "<p class='h3'>".round($row["AVG(NumHours)"], 1)." hours per working day". "</p>";
        			}
        		}
        	}

            include 'connect.php';
            include 'utility.php';

            $selectedName = NULL;

            if (isset($_POST['selectedName'])) {
              $selectedName = $_POST['selectedName'];
            }

            if($selectedName == ""){
              Redirect("../threefiftyfour/check-avg-hours.php");
            }

            echo "<p class='h2'><i class='fa fa-user'></i> For Employee $selectedName, he worked average</p>";

            $conn = OpenCon();
            $sql = "Select AVG(NumHours) from HoursWorked h
                    Where h.Employee_ID IN 
                    (SELECT e1.Employee_ID FROM Employees e1, EmployeeInfo e2
                    WHERE e1.SIN = e2.SIN
                    AND e2.Name = '$selectedName')
                    GROUP BY h.Employee_ID";
            
            FindAvg($conn, $sql);
            CloseCon($conn);
          ?>
          <div style = "padding-top: 5%">
            <a class='btn btn-success btn-lg' href="check-avg-hours.php"><i class="fa fa-search"></i>Start Another Query</a>
           	<a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i>Home</a>
          </div>
      </div> 
    </body>
</html>