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

          // Initialize variables
          $EmployeeName = NULL;
          $EmployeePhoneNo = NULL;
          $EmployeeAddress = NULL;

          // Checking to see if the form fields have been filled out on form and saving to local variables if so
          if (isset($_POST['EmployeePhoneNo'])) {
            $EmployeePhoneNo = $_POST['EmployeePhoneNo'];
          }
          if (isset($_POST['EmployeeAddress'])) {
            $EmployeeAddress = $_POST['EmployeeAddress'];
          }
          if (isset($_POST['EmployeeName'])) {
            $EmployeeName = $_POST['EmployeeName'];
          }
          $conn = OpenCon();
          $sql1 = NULL;
          $sql2 = NULL;


          // Updating PhoneNo or Address to the one provided on the form
          if ($EmployeeName) {
            if ($EmployeePhoneNo) {
              $result1 = $conn->query("SELECT Name FROM EmployeeInfo WHERE Name = '$EmployeeName'");
              if ($result1) {
                $sql1 = "UPDATE EmployeeInfo SET PhoneNumber = '$EmployeePhoneNo' WHERE Name = '$EmployeeName'";
              }
            }
            if ($EmployeeAddress) {
              $result2 = $conn->query("SELECT Name FROM EmployeeInfo WHERE Name = '$EmployeeName'");
              if ($result2) {
                $sql2 = "UPDATE EmployeeInfo SET Address = '$EmployeeAddress' WHERE Name = '$EmployeeName'";
              }
            }
          }
          else {
            echo "<p class='h3'>Please provide the name of the employee you wish to update information for</p>";
          }

          // Checking for successful query
          if ($sql1 != NULL || $sql2 != NULL) {
            if ($sql1 != NULL && $sql2 != NULL) {
              if ($conn->query($sql1) != TRUE || $conn->query($sql2) != TRUE) {
                echo "Error updating record: " . $conn->error;
                exit;
              }
            }
            else if ($sql1 != NULL) {
              if ($conn->query($sql1) != TRUE) {
                echo "Error updating record: " . $conn->error;
                exit;
              }
            }
            else if ($sql2 != NULL) {
              if ($conn->query($sql2) != TRUE) {
                echo "Error updating record: " . $conn->error;
                exit;
              }
            }
              echo "<p class='h3'><i class='fa fa-refresh'></i> Employee record has been successfully updated</p>";
              echo "<br>";
              echo "<br>";

              // Table to display updated employee information
              // Table generated at: https://www.tablesgenerator.com/html_tables
              echo "<div class='text-center' style='padding-left:35%'>>";
              echo  "<style type='text/css'>
                      .tg  {border-collapse:collapse;border-spacing:0;}
                      .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                      .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                      .tg .tg-yw4l{vertical-align:top}
                    </style>
                    <table class='tg text-center'>
                      <tr>
                        <td><strong>Name</strong></td>
                        <td><strong>Phone</strong></td>
                        <td><strong>Address</strong></td>
                        </strong>
                      </tr>
                      <tr>
                        <td>$EmployeeName</td>
                        <td>$EmployeePhoneNo</td>
                        <td>$EmployeeAddress</td>
                      </tr>
                    </table>";
                echo "</div>";
            // else {
            //   echo "Error updating record: " . $conn->error;
            // }
          }
          else {
            echo "<p class='h3'> Please provide the new employee PhoneNo or Address you wish to update</p>";
          }
        ?>
        <div style="padding-top:3%">
          <a class='btn btn-info btn-lg' href="update.php"><i class="fa fa-arrow-left"></i> Back</a>
          <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i> Home</a>
        </div>
      </div>
    </div>
  </body>
</html>