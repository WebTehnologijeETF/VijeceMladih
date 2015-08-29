<!DOCTYPE HTML >
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Vijece mladih OO Stari Grad</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script src="MenuJava.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, inital-scale=1.0"/>		
</head>
<body>


<?php
session_start();
include 'db.php';

				//ukoliko je pokušana prijava
				if (isset($_POST['username'])) {
					
					$username = $_REQUEST['username'];
					if (isset($_POST['password'])) {
						$password=$_POST['password'];
						$password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
					}
					else $password="";
					$username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

					$upit = $veza->prepare("SELECT * FROM korisnici WHERE username=? and password=md5(?)");
					$upit->execute(array($username,$password));
					if($rezultat=$upit->fetch()) {
						$_SESSION['username']=$username;
						$_SESSION['password']=$password;
						$_SESSION['ime']=$rezultat["ime"].' '.$rezultat["prezime"];
						}
					else echo '<div align="right" id="greska"> Unijeli ste pogrešno korisničko ime i/ili šifru!<br> Molimo Vas da pokušate ponovo! </div><br>';
				}
				
				//ukoliko je kliknuta odjava
				if (isset($_POST['odjava'])) {
					session_unset();
				}
				
//ukoliko je korisnik prijavljen
if (isset($_SESSION['username'])) {
	header("Location: novosti-admin.php");
}
else { //ukoliko nije prijavljen
	print ' <form name="login" action="admin.php" method="POST">
	<div id="loginElement"><br><br><br><br><br><br><br>
		<table width="600px" height="200px" border="0" cellspacing="0" cellpadding="10" class="loginTable">
		
		<tr>
				<td align="left" class="loginTitle" colspan=2>
					Administratorski panel 
				</td>
			</tr>
				<tr>
					<td width="300">
						<font class = "loginText">korisničko ime:</font>
					</td>
					<td width="300">
						<input class="loginInput" type="text" name="username" maxlength="25">
					</td>
				</tr>
				<tr>
					<td width="300">
						<font class = "loginText">šifra:</font>
					</td>
					<td width="300">
						<input class="loginInput" type="password" name="password" maxlength="25">
					</td>
				</tr>
				<tr>
					<td width="300">
                            Zaboravili ste šifru?
					</td>
					<td width="300" align="left">
						<input type="submit" name="submit" value="Prijava">
					</td>
				</tr>
        </table></div>	
	</form> ';
}
?>

</body>
</html>
