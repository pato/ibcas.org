<?php session_start();
$username = "admin";
$password = "lankenau123";
if (isset($_POST['username']) && isset($_POST['password'])){
	if ($_POST['username'] == $username && $_POST['password'] == $password){
		$_SESSION['alive'] = true;
		header( 'Location: ./index.php' );
	}
}else{
	unset($_SESSION['alive']);
}
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
			GammaGames Admin Panel Login
		</h1>
	</div>
	<div id="navigation">
	</div>
	<div id="content"> 
		<form action="login.php" method="POST">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td> </td>
					<td><input type="submit" value="Login" class="button"></td>
				</tr>
			</table>
		</form>
	</div>
	<div id="footer">
		Copyright © Patricio Lankenau, 2012
	</div>
</div>
</body>
</html>