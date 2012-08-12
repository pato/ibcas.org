<?php include('security.php');
// Connecting, selecting database
$host     = "db425983927.db.1and1.com";
$user     = "dbo425983927";
$password = "g4mm4123";
$db       = "db425983927";

$link = mysql_connect($host, $user, $password)
    or die('Could not connect: ' . mysql_error());
mysql_select_db($db) or die('Could not select database');

// Performing SQL query
$query = 'SELECT * FROM users';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

?>
<html>
<head>
	<link href="./tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    <script type="text/javascript" src="./tablecloth/tablecloth.js"></script>
</head>
<body>
<div id="container"  class="rounded">
	<div id="header">
		<h1>
			GammaGames Admin Panel
		</h1>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="./index.php">Games</a></li>
			<li><a href="./requests.php">Requests</a></li>
			<li><a href="./users.php">Users</a></li>
			<li><a href="./contact.php">Messages</a></li>
			<li><a href="./login.php">Logout</a></li>
		</ul>
	</div>
		<div id="content"> 
		<table border="0" cellspacing="0" cellpadding="0">
		<th>Username</th>
		<th>Computer Name</th>
		<th>IP</th>
		<th>OS</th>
		<th>Screen Size</th>
		<th>Date Installed</th>
		<?php while ($entry = mysql_fetch_array($result, MYSQL_ASSOC)):?>
			<tr>
				<td><?=$entry['username']?></td>
				<td><?=$entry['computername']?></td>
				<td><?=$entry['ip']?></td>
				<td><?=$entry['os']?></td>
				<td><?=$entry['screen']?></td>
				<td><?=$entry['date']?></td>
			</tr>
		<?php endwhile; ?>
		</table>
	</div>
	<div id="footer">
		Copyright © Patricio Lankenau, 2012
	</div>
</div>
</body>
</html>
<?
// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>