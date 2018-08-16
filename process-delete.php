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
          include 'connect.php';

          $EmployeeSIN = NULL;
          $EmployeeName = NULL;

          // Checking to see if the form fields have been filled out on form and saving to local variables if so
          if (isset($_POST['EmployeeSIN'])) {
            $EmployeeSIN = $_POST['EmployeeSIN'];
          }
          if (isset($_POST['EmployeeName'])) {
            $EmployeeName = $_POST['EmployeeName'];
          }
          $conn = OpenCon();
          $sql1 = NULL;
          $sql2 = NULL;


          // Deleting an employee record based on either name or SIN (depending which was provided on form)
          if ($EmployeeName) {
            $result = $conn->query("SELECT * FROM EmployeeInfo WHERE Name = '$EmployeeName'");
            if ($result) {
              $sql1 = "UPDATE Employees SET IsActive = 0 WHERE SIN = (SELECT SIN FROM EmployeeInfo WHERE Name = '$EmployeeName')";
              $sql2 = "DELETE FROM EmployeeInfo WHERE Name = '$EmployeeName'";
            }
          }
          else if ($EmployeeSIN) {
            $result = $conn->query("SELECT * FROM EmployeeInfo WHERE SIN = '$EmployeeSIN'");
            if ($result) {
              $sql1 = "UPDATE Employees SET IsActive = 0 WHERE SIN = '$EmployeeSIN'";
              $sql2 = "DELETE FROM EmployeeInfo WHERE SIN = '$EmployeeSIN'";
            }
          }

          // Checking for errors
          if ($sql1 != NULL && $sql2 != NULL) {
            if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
              echo "<h2><i class='fa fa-remove'></i> Employee has been permanently removed from database</h2>";
            }
            else {
              echo "Error deleting record: " . $conn->error;
            }
          }
          else {
            echo "<h2>Please provide an employee name or SIN to be deleted</h2>";
          }
        ?>
        <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i> Home</a>
      </div>
    </div>
  </body>
</html>
