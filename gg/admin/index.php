<?php include('security.php');
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


$link = mysql_connect($host, $user, $password)
    or die('Could not connect: ' . mysql_error());
mysql_select_db($db) or die('Could not select database');

if (isset($_POST['submit']) && $_POST['submit']==1){ //edit a game
	$query = "UPDATE games SET name='{$_POST['name']}', file='{$_POST['file']}', price='{$_POST['price']}', category='{$_POST['category']}' WHERE id=".$_POST['id'];
	mysql_query($query) or die('Query failed: ' . mysql_error());
}else if (isset($_POST['submit']) && $_POST['submit']==2){ //add a game
	$uploaddir = '../files/';
	$file = basename($_FILES['file']['name'],".swf") . ".gg";
	$uploadfile = $uploaddir . $file;
	
	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
		$query = "INSERT INTO games (name, file, price, category) VALUES ('{$_POST['name']}', '{$file}' ,'{$_POST['price']}', '{$_POST['category']}')";
		mysql_query($query) or die('Query failed: ' . mysql_error());
	}else {
	   echo "<p>Upload failed</p>";
	}
}else if (isset($_POST['submit']) && $_POST['submit']==3){ //remove a game
	$query = "DELETE FROM games WHERE id=".$_POST['id'];
	mysql_query($query) or die('Query failed: ' . mysql_error());
}

// Performing SQL query
$query = 'SELECT * FROM games';
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
		<h2>Add Game</h2>
		<table border="0" cellspacing="0" cellpadding="0">
			<th>Name</th>
			<th>File</th>
			<th>Category</th>
			<th>Price</th>
			<th>Save</th>
			<form action="./index.php" method="POST" enctype="multipart/form-data">
				<tr>
					<td><input type="text" name="name" value="" size="50%"></td>
					<td><input type="file" name="file" id="file" size="50%"></td>
					<td>
						<select name="category">
							<option value="Action">Action</option>
							<option value="Adventure">Adventure</option>
							<option value="Casino">Casino</option>
							<option value="Fighting">Fighting</option>
							<option value="Puzzle">Puzzle</option>
							<option value="Racing">Racing</option>
							<option value="Shooting">Shooting</option>
							<option value="Sport">Sport</option>
						</select>
					</td>
					<td><input type="text" name="price" value="" size="10%" autocomplete="off"></td>
					<td><input type="hidden" name="submit" value="2"><input type="submit" value="Add" class="button"></td>
				</tr>
			</form>
		</table>
		<h2>Manage Games</h2>
		<table border="0" cellspacing="0" cellpadding="0">
			<th>Name</th>
			<th>File</th>
			<th>Category</th>
			<th>Price</th>
			<th>Save</th>
			<th>Remove</th>
			<?php while ($entry = mysql_fetch_array($result, MYSQL_ASSOC)):?>
			<form action="./index.php" method="POST">
				<tr>
					<td><input type="text" name="name" value="<?=$entry['name']?>" size="30"></td>
					<td><input type="text" name="file" value="<?=$entry['file']?>" size="40"></td>
					<td>
						<select name="category">
							<option value="<?=$entry['category']?>"><?=$entry['category']?></option>
							<option value="Action">Action</option>
							<option value="Adventure">Adventure</option>
							<option value="Casino">Casino</option>
							<option value="Fighting">Fighting</option>
							<option value="Puzzle">Puzzle</option>
							<option value="Racing">Racing</option>
							<option value="Shooting">Shooting</option>
							<option value="Sport">Sport</option>
						</select>
					</td>
					<td><input type="text" name="price" value="<?=$entry['price']?>" autocomplete="off"></td>
					<td>
						<input type="hidden" name="id" value="<?=$entry['id']?>">
						<input type="hidden" name="submit" value="1">
						<input type="submit" value="Save" class="button">
						</td>
						</form>
					<form action="./index.php" method="POST">
					<td>
						<input type="hidden" name="id" value="<?=$entry['id']?>"><input type="hidden" name="submit" value="3">
						<input type="submit" value="Remove" class="button2">
						</form>
					</td>
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