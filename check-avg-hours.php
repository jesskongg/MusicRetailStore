<html >
  <head>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="page-top bg-primary">
    <form action="process-check-avg-hours.php" method="post">
      <div class="container text-center" style="height:100%">
        <div class="text-center" style="height:50%;padding-top: 25%">
          <h2><i class='fa fa-user'></i> Check The Average Hours Worked Per Employee</h2>
          <h3>Select Employee by Name</h3>
          
          <div class="text-danger" style="padding-top: 2%">
            <?php
              // Establishes initial connection to database
              include 'connect.php';
              $conn = OpenCon();
              // Queries database for all names to populate the dropdown list with
              // User can then select from values in the dropdown
              $empNames = $conn->query("SELECT Name FROM EmployeeInfo");

              echo "<select name='selectedName'>";
              // Specifies that value selected in dropdown list will be submitted through form as 'EmployeeName'
              echo '<option value="">Select Name</option>';
              while ($row = $empNames->fetch_assoc()) {
                unset($empName);
                $empName = $row['Name'];
                echo '<option value="'.$empName.'">'.$empName.'</option>';
              }
              CloseCon($conn);
              echo '</select>'
            ?>
          </div>
          
          <div style="padding-top: 2%">
            <input type="submit" class="btn btn-success btn-lg" value="Go">
            <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i> Home</a>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
