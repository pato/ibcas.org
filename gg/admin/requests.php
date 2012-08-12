<?php include('security.php');
// Connecting, selecting database
$host     = "db425983927.db.1and1.com";
$user     = "dbo425983927";
$password = "g4mm4123";
$db       = "db425983927";


$link = mysql_connect($host, $user, $password)
    or die('Could not connect: ' . mysql_error());
mysql_select_db($db) or die('Could not select database');

if (isset($_POST['submit']) && $_POST['submit']==1){
	$query = 'UPDATE requests SET active=0 WHERE id='.$_POST['id'];
	mysql_query($query) or die('Query failed: ' . mysql_error());
}else if (isset($_POST['submit']) && $_POST['submit']==2){
	$query = 'UPDATE requests SET active=1 WHERE id='.$_POST['id'];
	mysql_query($query) or die('Query failed: ' . mysql_error());
}

// Performing SQL query
$query = 'SELECT * FROM requests Where active = 1';
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
		<h2>Requests</h2>
		<table border="0" cellspacing="0" cellpadding="0">
		<th>Requested By</th>
		<th>Game</th>
		<th>Delete</th>
		<?php while ($entry = mysql_fetch_array($result, MYSQL_ASSOC)):?>
		<form action="./requests.php" method="POST">
			<tr>
				<td><?=$entry['name']?></td>
				<td><?=$entry['game']?></td>
				<td><input type="hidden" name="id" value="<?=$entry['id']?>"><input type="hidden" name="submit" value="1"><input type="submit" value="Delete" class="button"></td>
			</tr>
		</form>
		<?php endwhile; ?>
		</table>
		<?php /*
		<h2>Deleted Requests</h2>
		<?php
		mysql_free_result($result);
		$query = 'SELECT * FROM requests Where active = 0';
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		?>
		<table border="0" cellspacing="0" cellpadding="0">
		<th>Requested By</th>
		<th>Game</th>
		<th>UnDelete</th>
		<?php while ($entry = mysql_fetch_array($result, MYSQL_ASSOC)):?>
		<form action="./requests.php" method="POST">
			<tr>
				<td><?=$entry['name']?></td>
				<td><?=$entry['game']?></td>
				<td><input type="hidden" name="id" value="<?=$entry['id']?>"><input type="hidden" name="submit" value="2"><input type="submit" value="UnDelete" class="button"></td>
			</tr>
		</form>
		<?php endwhile; ?>
		</table>
		*/
		?>
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