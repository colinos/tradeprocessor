<?php

include("./config.php");
include("./db.php");

// Output bars showing the value of all trades for currency pairs
// TODO: for proof of concept, this page is "hardcoded" for trades from EUR - would need to make the page dynamic for all currencies

$tradeTotals = array();	// array of trade totals
$highestTotalForCurrenciesBought = 0;	// used for calculating the size of each currency "bar" relative to the "leading" currency

$dbLink = connectToDatabase();
$queryString = "SELECT * FROM colin_tradetotal WHERE currencyfrom = 'EUR'";
$query = mysql_query($queryString, $dbLink);
if (!$query) {
	die("Could not query the database: " . mysql_error());
}

while ($row = mysql_fetch_array($query)) {
	$tradeTotals[$row["currencyto"]] = $row["total"];
	
	if ($row["total"] > $highestTotalForCurrenciesBought) {
		$highestTotalForCurrenciesBought = $row["total"];
	}
}

mysql_close($dbLink);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="#">

    <title>Trade Totals</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
  </head>

  <body>

    <div class="container theme-showcase">

      <div class="page-header">
        <h1>Totals of EUR Sold by Currency Bought</h1>
      </div>

<?php

foreach ($tradeTotals as $currencyTo => $total) {
	if ($highestTotalForCurrenciesBought > 0) {
		$percentageRelativeToLeadingCurrency = 100 * $total / $highestTotalForCurrenciesBought;
	} else {
		$percentageRelativeToLeadingCurrency = 0;
	}
	
	echo "      <span>Currency Bought: $currencyTo</span>";
	echo "      <div class='progress'>";
	echo "        <div class='progress-bar' role='progressbar' style='width: $percentageRelativeToLeadingCurrency%;'><span>EUR $total</span></div>";
	echo "      </div>";
}

?>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>
