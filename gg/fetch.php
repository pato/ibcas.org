<?php
// Connecting, selecting database
$host     = "db425983927.db.1and1.com";
$user     = "dbo425983927";
$password = "g4mm4123";
$db       = "db425983927";


if (isset($_GET['cat']) == false) die("Silly Goose");

$link = mysql_connect($host, $user, $password)
    or die('Could not connect: ' . mysql_error());
mysql_select_db($db) or die('Could not select database');

// Performing SQL query
$query = 'SELECT * FROM games WHERE category = "'.$_GET['cat'].'"';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
while ($entry = mysql_fetch_array($result, MYSQL_ASSOC)) {
	echo $entry['file']."|";
	echo $entry['name']."|";
	echo $entry['price']."~";
}

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>