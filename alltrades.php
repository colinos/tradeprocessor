<?php

include("./config.php");
include("./db.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="#">

    <title>All Trades</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
  </head>

  <body>

    <div class="container theme-showcase">

      <div class="page-header">
        <h1>All Trades</h1>
      </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Currency From</th>
                  <th>Currency To</th>
                  <th>Amount Sell</th>
                  <th>Amount Buy</th>
                  <th>Rate</th>
                  <th>Time Placed</th>
                  <th>Originating Country</th>
                </tr>
              </thead>
              <tbody>
				  
<?php

$dbLink = connectToDatabase();
$queryString = "SELECT * FROM colin_trademessage";
$query = mysql_query($queryString, $dbLink);
if (!$query) {
	die("Could not query the database: " . mysql_error());
}

while ($row = mysql_fetch_array($query)) {
	echo " <tr>";
	echo "  <td>" . $row["userId"] . "</td>";
	echo "  <td>" . $row["currencyFrom"] . "</td>";
	echo "  <td>" . $row["currencyTo"] . "</td>";
	echo "  <td>" . number_format($row["amountSell"], 2) . "</td>";
	echo "  <td>" . number_format($row["amountBuy"], 2) . "</td>";
	echo "  <td>" . number_format($row["rate"], 4) . "</td>";
	echo "  <td>" . date("r", $row["timePlaced"]) . "</td>";
	echo "  <td>" . $row["originatingCountry"] . "</td>";
	echo " </tr>";
}

mysql_close($dbLink);

?>
				  
              </tbody>
            </table>
          </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>
