<?php
// Connecting, selecting database
$host     = "db425983927.db.1and1.com";
$user     = "dbo425983927";
$password = "g4mm4123";
$db       = "db425983927";


if (isset($_POST['username']) == false) die("Silly Goose");


$link = mysql_connect($host, $user, $password)
    or die('Could not connect: ' . mysql_error());
mysql_select_db($db) or die('Could not select database');

$query = "INSERT INTO users (username, computername, ip, os, screen) VALUES ('{$_POST['username']}', '{$_POST['computername']}', '{$_POST['ip']}', '{$_POST['os']}', '{$_POST['screen']}')";
mysql_query($query) or die('Query failed: ' . mysql_error());
?>