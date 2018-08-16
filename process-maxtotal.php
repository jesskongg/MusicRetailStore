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
        function myTable($obConn,$sql)
        {
          $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
          if (mysqli_num_rows($rsResult)>0)
          {
            echo "<h2>Results for customer with largest number of total purchases</h2>";
            //We start with header. >>>Here we retrieve the field names<<<
            echo '<table width="100%" border="0"cellspacing="2"><tr align="center">';
            $i = 0;

            while ($i < mysqli_num_fields($rsResult))
            {
              $field = mysqli_fetch_field_direct($rsResult, $i);
              $fieldName=$field->name;
              echo "<td align='center' bgcolor='#2ed3e1'><strong>$fieldName</strong></td>";
              $i = $i + 1;
            }
            echo "</tr>";
           //>>>Field names retrieved<<<
           //We dump info
           $bolWhite=true;
           while ($row = mysqli_fetch_assoc($rsResult))
           {
             echo $bolWhite ? "<tr bgcolor='#ff7b41'>": "<tr bgcolor='#FFF'>";
             $bolWhite=!$bolWhite;
             foreach($row as $data)
             {
               echo "<td align='center'>$data</td>";
             }
             echo "</tr>";
           }
           echo "</table>";
          }
          else
          {
            echo "NO RESULTS FOUND! Try another query.";
          }
        }
        include 'connect.php';
        $conn = OpenCon();
        $sql = "SELECT Name AS 'Customer Name', MAX(TotalPurchases) AS 'Total Purchases'
                FROM
                (SELECT Name, SUM(Quantity) AS TotalPurchases
                FROM CustomerInfo, Customer, PurchaseHistoryLog
                WHERE Customer.PhoneNo = CustomerInfo.PhoneNo
                AND Customer.Customer_ID = PurchaseHistoryLog.Customer_ID
                GROUP BY Customer.PhoneNo
                ORDER BY TotalPurchases DESC
                LIMIT 1) AS P";

        myTable($conn,$sql);
        ?>
        <div style="padding-top: 5%">
          <a class='btn btn-danger btn-lg' href="templates/index.html"><i class="fa fa-home"></i>Home</a>
        </div>
      </div>
    </div>
  </body>
</html>
