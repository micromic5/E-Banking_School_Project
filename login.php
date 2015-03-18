<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="style.css">
	<form action="test.php" method="POST">
		<h2>Login</h2>
		<table>
		<tr>
		    <td><span class="span">Benutzername:</span></td>
		    <td><input type="text" name="PK_customerNumber"></td>
		</tr>
		<tr>
		    <td><span class="span">Passwort:</span></td>
		    <td><input type="password" name="password"></td>
		</tr>
			<?php
			if(isset($_GET['error'])) 
			{
			?>
			<tr>
				<td><span style="color:red">Login Daten nicht korrekt</span></td>
			</tr>	
			<?php
			}
			?>
		<tr>
		<td><input type="submit" value="login" /></td>
		</tr>
		</table>
	</form>
</body>
</html>