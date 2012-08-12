<?php
// Connecting, selecting database
$host     = "db425983927.db.1and1.com";
$user     = "dbo425983927";
$password = "g4mm4123";
$db       = "db425983927";


if (isset($_POST['name']) == false) die("Silly Goose");

$link = mysql_connect($host, $user, $password)
    or die('Could not connect: ' . mysql_error());
mysql_select_db($db) or die('Could not select database');

$msg = mysql_real_escape_string($_POST['msg']);

$query = "INSERT INTO contact (name, message) VALUES ('{$_POST['name']}', '{$msg}')";
mysql_query($query) or die('Query failed: ' . mysql_error());
?>