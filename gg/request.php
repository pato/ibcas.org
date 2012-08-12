<?php
// Connecting, selecting database
$host     = "db425983927.db.1and1.com";
$user     = "dbo425983927";
$password = "g4mm4123";
$db       = "db425983927";

/*
$host     = "localhost";
$user     = "root";
$password = "";
$db       = "gamma";
*/

if (isset($_POST['name']) == false) die("Silly Goose");

$link = mysql_connect($host, $user, $password)
    or die('Could not connect: ' . mysql_error());
mysql_select_db($db) or die('Could not select database');

$query = "INSERT INTO requests (name, game) VALUES ('{$_POST['name']}', '{$_POST['game']}')";
mysql_query($query) or die('Query failed: ' . mysql_error());
?>