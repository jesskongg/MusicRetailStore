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

        <form action="process-delete.php" method="post">
          <h2><i class="fa fa-remove"></i> Delete an Employee by Selecting a Name or SIN</h2>
          </br></br>

          <h4>Employee Name</h4>
          <?php
            include 'connect.php';
            $conn = OpenCon();
            // Queries database for all names to populate the dropdown list with
            // User can then select from values in the dropdown
            $result = $conn->query("SELECT Name from EmployeeInfo");
            // Specifies that value selected in dropdown list will be submitted through form as 'EmployeeName'
            echo '<div class="text-danger" style="padding-top:1%">';
            echo "<select name='EmployeeName'>";
            // Use this line to provide an empty option at the top of the dropdown
            echo '<option value="">Select Name</option>';
            while ($row = $result->fetch_assoc()) {
              unset($EmployeeName);
              $EmployeeName = $row['Name'];
              echo '<option value="'.$EmployeeName.'">'.$EmployeeName.'</option>';
            }
            echo "</select>";
            echo '</div>'
          ?>
          <br></br>

          <h4>Employee SIN</h4>
          <?php
            $result2 = $conn->query("SELECT SIN from EmployeeInfo");
            echo '<div class="text-danger" style="padding-top:1%">';
            echo "<select name='EmployeeSIN'>";
            echo '<option value="">Select SIN</option>';
            while ($row = $result2->fetch_assoc()) {
              unset($EmployeeSIN);
              $EmployeeSIN = $row['SIN'];
              echo '<option value="'.$EmployeeSIN.'">'.$EmployeeSIN.'</option>';
            }
            echo "</select>";
            echo "</div>";
          ?>
          <br></br>
          <input class="btn btn-warning btn-lg" type="submit" value="Delete">
          <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i> Home</a>
        </form>
      </div>
    </div>
  </body>
</html>