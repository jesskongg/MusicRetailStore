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
        <h3><i class="fa fa-refresh"></i> Select the employee you would like to update</h3>
        <form action="process-update.php" method="post" style="padding-top: 2%">
          <?php
            // Establishes initial connection to database
            include 'connect.php';
            $conn = OpenCon();
            // Queries database for all names to populate the dropdown list with
            // User can then select from values in the dropdown
            $result = $conn->query("SELECT Name from EmployeeInfo");
            echo '<label>Employee Name</label> ';
            echo '<div class="text-danger">';
            echo "<select name='EmployeeName'>";
            // Specifies that value selected in dropdown list will be submitted through form as 'EmployeeName'
            echo '<option value="">Select Name</option>';
            while ($row = $result->fetch_assoc()) {
              unset($EmployeeName);
              $EmployeeName = $row['Name'];
              echo '<option value="'.$EmployeeName.'">'.$EmployeeName.'</option>';
            }
            echo "</select>";
            echo "</div>"
          ?>
 
         <h3>Enter new phone number or address to update for the selected employee</h3>
         <label>Employee Phone Number</label>
          <!--input name defines the variable name that gets passed through to process-update.php-->
          <input name="EmployeePhoneNo" class="text-danger" type="text" placeholder="New phone number"></input>
         <br>
         <label>Address</label>
          <input name="EmployeeAddress" class="text-danger" type="text" placeholder="New address"></input>
         <br>
         <br>
          <input class='btn btn-success btn-lg' type="submit" value="Update">
          <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i>Home</a>
        </form>
      </div>
    </div>
  </body>
</html>