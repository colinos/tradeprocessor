<?php

function connectToDatabase() {
	$dbLink = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$dbLink){
		echo(mysql_error());
		return 0;
	}

	$selected = mysql_select_db(DB_DATABASE, $dbLink);
	if(!$selected){
		echo(mysql_error());
		return 0;
	}
	
	return $dbLink;
}

?>
