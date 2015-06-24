<?php

include("./config.php");
include("./db.php");

$acceptedFromCurrencies = array(
	"AED",
	"AUD",
	"CAD",
	"CHF",
	"CZK",
	"DKK",
	"EUR",
	"GBP",
	"HKD",
	"HUF",
	"NOK",
	"NZD",
	"PLN",
	"SEK",
	"USD",
	"ZAR"
);

$acceptedToCurrencies = array(
	"AED",
	"AUD",
	"CAD",
	"CHF",
	"CZK",
	"DKK",
	"EUR",
	"GBP",
	"HKD",
	"HUF",
	"ILS",
	"NOK",
	"NZD",
	"PLN",
	"SEK",
	"SGD",
	"USD",
	"ZAR"
);

$countries = array(
	"AD" => "Andorra",
	"AE" => "United Arab Emirates",
	"AF" => "Afghanistan",
	"AG" => "Antigua and Barbuda",
	"AI" => "Anguilla",
	"AL" => "Albania",
	"AM" => "Armenia",
	"AO" => "Angola",
	"AQ" => "Antarctica",
	"AR" => "Argentina",
	"AS" => "American Samoa",
	"AT" => "Austria",
	"AU" => "Australia",
	"AW" => "Aruba",
	"AX" => "Åland Islands",
	"AZ" => "Azerbaijan",
	"BA" => "Bosnia and Herzegovina",
	"BB" => "Barbados",
	"BD" => "Bangladesh",
	"BE" => "Belgium",
	"BF" => "Burkina Faso",
	"BG" => "Bulgaria",
	"BH" => "Bahrain",
	"BI" => "Burundi",
	"BJ" => "Benin",
	"BL" => "Saint Barthélemy",
	"BM" => "Bermuda",
	"BN" => "Brunei Darussalam",
	"BO" => "Bolivia, Plurinational State of",
	"BQ" => "Bonaire, Sint Eustatius and Saba",
	"BR" => "Brazil",
	"BS" => "Bahamas",
	"BT" => "Bhutan",
	"BV" => "Bouvet Island",
	"BW" => "Botswana",
	"BY" => "Belarus",
	"BZ" => "Belize",
	"CA" => "Canada",
	"CC" => "Cocos (Keeling) Islands",
	"CD" => "Congo, the Democratic Republic of the",
	"CF" => "Central African Republic",
	"CG" => "Congo",
	"CH" => "Switzerland",
	"CI" => "Côte d'Ivoire",
	"CK" => "Cook Islands",
	"CL" => "Chile",
	"CM" => "Cameroon",
	"CN" => "China",
	"CO" => "Colombia",
	"CR" => "Costa Rica",
	"CU" => "Cuba",
	"CV" => "Cabo Verde",
	"CW" => "Curaçao",
	"CX" => "Christmas Island",
	"CY" => "Cyprus",
	"CZ" => "Czech Republic",
	"DE" => "Germany",
	"DJ" => "Djibouti",
	"DK" => "Denmark",
	"DM" => "Dominica",
	"DO" => "Dominican Republic",
	"DZ" => "Algeria",
	"EC" => "Ecuador",
	"EE" => "Estonia",
	"EG" => "Egypt",
	"EH" => "Western Sahara",
	"ER" => "Eritrea",
	"ES" => "Spain",
	"ET" => "Ethiopia",
	"FI" => "Finland",
	"FJ" => "Fiji",
	"FK" => "Falkland Islands (Malvinas)",
	"FM" => "Micronesia, Federated States of",
	"FO" => "Faroe Islands",
	"FR" => "France",
	"GA" => "Gabon",
	"GB" => "United Kingdom of Great Britain and Northern Ireland",
	"GD" => "Grenada",
	"GE" => "Georgia",
	"GF" => "French Guiana",
	"GG" => "Guernsey",
	"GH" => "Ghana",
	"GI" => "Gibraltar",
	"GL" => "Greenland",
	"GM" => "Gambia",
	"GN" => "Guinea",
	"GP" => "Guadeloupe",
	"GQ" => "Equatorial Guinea",
	"GR" => "Greece",
	"GS" => "South Georgia and the South Sandwich Islands",
	"GT" => "Guatemala",
	"GU" => "Guam",
	"GW" => "Guinea-Bissau",
	"GY" => "Guyana",
	"HK" => "Hong Kong",
	"HM" => "Heard Island and McDonald Islands",
	"HN" => "Honduras",
	"HR" => "Croatia",
	"HT" => "Haiti",
	"HU" => "Hungary",
	"ID" => "Indonesia",
	"IE" => "Ireland",
	"IL" => "Israel",
	"IM" => "Isle of Man",
	"IN" => "India",
	"IO" => "British Indian Ocean Territory",
	"IQ" => "Iraq",
	"IR" => "Iran, Islamic Republic of",
	"IS" => "Iceland",
	"IT" => "Italy",
	"JE" => "Jersey",
	"JM" => "Jamaica",
	"JO" => "Jordan",
	"JP" => "Japan",
	"KE" => "Kenya",
	"KG" => "Kyrgyzstan",
	"KH" => "Cambodia",
	"KI" => "Kiribati",
	"KM" => "Comoros",
	"KN" => "Saint Kitts and Nevis",
	"KP" => "Korea, Democratic People's Republic of",
	"KR" => "Korea, Republic of",
	"KW" => "Kuwait",
	"KY" => "Cayman Islands",
	"KZ" => "Kazakhstan",
	"LA" => "Lao People's Democratic Republic",
	"LB" => "Lebanon",
	"LC" => "Saint Lucia",
	"LI" => "Liechtenstein",
	"LK" => "Sri Lanka",
	"LR" => "Liberia",
	"LS" => "Lesotho",
	"LT" => "Lithuania",
	"LU" => "Luxembourg",
	"LV" => "Latvia",
	"LY" => "Libya",
	"MA" => "Morocco",
	"MC" => "Monaco",
	"MD" => "Moldova, Republic of",
	"ME" => "Montenegro",
	"MF" => "Saint Martin (French part)",
	"MG" => "Madagascar",
	"MH" => "Marshall Islands",
	"MK" => "Macedonia, the former Yugoslav Republic of",
	"ML" => "Mali",
	"MM" => "Myanmar",
	"MN" => "Mongolia",
	"MO" => "Macao",
	"MP" => "Northern Mariana Islands",
	"MQ" => "Martinique",
	"MR" => "Mauritania",
	"MS" => "Montserrat",
	"MT" => "Malta",
	"MU" => "Mauritius",
	"MV" => "Maldives",
	"MW" => "Malawi",
	"MX" => "Mexico",
	"MY" => "Malaysia",
	"MZ" => "Mozambique",
	"NA" => "Namibia",
	"NC" => "New Caledonia",
	"NE" => "Niger",
	"NF" => "Norfolk Island",
	"NG" => "Nigeria",
	"NI" => "Nicaragua",
	"NL" => "Netherlands",
	"NO" => "Norway",
	"NP" => "Nepal",
	"NR" => "Nauru",
	"NU" => "Niue",
	"NZ" => "New Zealand",
	"OM" => "Oman",
	"PA" => "Panama",
	"PE" => "Peru",
	"PF" => "French Polynesia",
	"PG" => "Papua New Guinea",
	"PH" => "Philippines",
	"PK" => "Pakistan",
	"PL" => "Poland",
	"PM" => "Saint Pierre and Miquelon",
	"PN" => "Pitcairn",
	"PR" => "Puerto Rico",
	"PS" => "Palestine, State of",
	"PT" => "Portugal",
	"PW" => "Palau",
	"PY" => "Paraguay",
	"QA" => "Qatar",
	"RE" => "Réunion",
	"RO" => "Romania",
	"RS" => "Serbia",
	"RU" => "Russian Federation",
	"RW" => "Rwanda",
	"SA" => "Saudi Arabia",
	"SB" => "Solomon Islands",
	"SC" => "Seychelles",
	"SD" => "Sudan",
	"SE" => "Sweden",
	"SG" => "Singapore",
	"SH" => "Saint Helena, Ascension and Tristan da Cunha",
	"SI" => "Slovenia",
	"SJ" => "Svalbard and Jan Mayen",
	"SK" => "Slovakia",
	"SL" => "Sierra Leone",
	"SM" => "San Marino",
	"SN" => "Senegal",
	"SO" => "Somalia",
	"SR" => "Suriname",
	"SS" => "South Sudan",
	"ST" => "Sao Tome and Principe",
	"SV" => "El Salvador",
	"SX" => "Sint Maarten (Dutch part)",
	"SY" => "Syrian Arab Republic",
	"SZ" => "Swaziland",
	"TC" => "Turks and Caicos Islands",
	"TD" => "Chad",
	"TF" => "French Southern Territories",
	"TG" => "Togo",
	"TH" => "Thailand",
	"TJ" => "Tajikistan",
	"TK" => "Tokelau",
	"TL" => "Timor-Leste",
	"TM" => "Turkmenistan",
	"TN" => "Tunisia",
	"TO" => "Tonga",
	"TR" => "Turkey",
	"TT" => "Trinidad and Tobago",
	"TV" => "Tuvalu",
	"TW" => "Taiwan, Province of China",
	"TZ" => "Tanzania, United Republic of",
	"UA" => "Ukraine",
	"UG" => "Uganda",
	"UM" => "United States Minor Outlying Islands",
	"US" => "United States of America",
	"UY" => "Uruguay",
	"UZ" => "Uzbekistan",
	"VA" => "Holy See",
	"VC" => "Saint Vincent and the Grenadines",
	"VE" => "Venezuela, Bolivarian Republic of",
	"VG" => "Virgin Islands, British",
	"VI" => "Virgin Islands, U.S.",
	"VN" => "Viet Nam",
	"VU" => "Vanuatu",
	"WF" => "Wallis and Futuna",
	"WS" => "Samoa",
	"YE" => "Yemen",
	"YT" => "Mayotte",
	"ZA" => "South Africa",
	"ZM" => "Zambia",
	"ZW" => "Zimbabwe"
);

$msgAppearsInvalid = false;	// to determine whether to write trade message to database or output error

$msg = json_decode(file_get_contents("php://input"));

if (!$msg) {
	$msgAppearsInvalid = true;
} else {

	// Validate JSON

	if (!$msg->userId) {
		$msgAppearsInvalid = true;
	}

	if ($msg->currencyFrom) {
		// $msg->currencyFrom exists, now check it's valid
		if (!in_array(strtoupper($msg->currencyFrom), $acceptedFromCurrencies)) {
			$msgAppearsInvalid = true;
		}
	} else {
		$msgAppearsInvalid = true;
	}

	if ($msg->currencyTo) {
		// $msg->currencyTo exists, now check it's valid
		if (!in_array(strtoupper($msg->currencyTo), $acceptedToCurrencies)) {
			$msgAppearsInvalid = true;
		}
	} else {
		$msgAppearsInvalid = true;
	}

	if ($msg->amountSell) {
		// $msg->amountSell exists, now check it's valid
		if (!is_numeric($msg->amountSell)) {
			$msgAppearsInvalid = true;
		}
	} else {
		$msgAppearsInvalid = true;
	}

	if ($msg->amountBuy) {
		// $msg->amountBuy exists, now check it's valid
		if (!is_numeric($msg->amountBuy)) {
			$msgAppearsInvalid = true;
		}
	} else {
		$msgAppearsInvalid = true;
	}

	if ($msg->rate) {
		// $msg->rate exists, now check it's valid
		if (!is_numeric($msg->rate)) {
			$msgAppearsInvalid = true;
		}
	} else {
		$msgAppearsInvalid = true;
	}

	if ($msg->timePlaced) {
		// $msg->timePlaced exists, now check it's valid
		if (!strtotime($msg->timePlaced)) {
			$msgAppearsInvalid = true;
		}
	} else {
		$msgAppearsInvalid = true;
	}
	
	if ($msg->originatingCountry) {
		// $msg->originatingCountry exists, now check it's valid
		if (!$countries[strtoupper($msg->originatingCountry)]) {
			$msgAppearsInvalid = true;
		}
	} else {
		$msgAppearsInvalid = true;
	}

}

if ($msgAppearsInvalid) {
	echo 0;
} else {	// trade message appears valid - perform database operations
	
	// Step 1: write trade message to database
	
	$dbLink = connectToDatabase();
	
	// TODO: $msg->userId should be checked that it conforms to some decided-upon format for userIDs
	$timePlacedTime = strtotime($msg->timePlaced);	// convert time to UNIX time
	$queryString = "INSERT INTO colin_trademessage SET userId = '$msg->userId', currencyFrom = '$msg->currencyFrom', currencyTo = '$msg->currencyTo', amountSell = $msg->amountSell, amountBuy = $msg->amountBuy, rate = $msg->rate, timePlaced = $timePlacedTime, originatingCountry = '$msg->originatingCountry'";
	
	$query = mysql_query($queryString, $dbLink);
	if (!$query) {
		die("Could not query the database: " . mysql_error());
	}
	
	// Step 2: add the trade amount to the total for this currency pair in the database
	
	// get the total from the database for this currency pair
	$queryString = "SELECT total FROM colin_tradetotal WHERE currencyfrom = '$msg->currencyFrom' AND currencyto = '$msg->currencyTo'";
	$query = mysql_query($queryString, $dbLink);
	if (!$query) {
		die("Could not query the database: " . mysql_error());
	}
	$row = mysql_fetch_array($query);
	
	// add the current trade to the existing total
	$newTotal = $row["total"] + $msg->amountSell;
	
	// write the new total back to the database
	$queryString = "UPDATE colin_tradetotal SET total = $newTotal WHERE currencyfrom = '$msg->currencyFrom' AND currencyto = '$msg->currencyTo'";
	$query = mysql_query($queryString, $dbLink);
	if (!$query) {
		die("Could not query the database: " . mysql_error());
	}
	
	mysql_close($dbLink);

	echo 1;
}

?>
