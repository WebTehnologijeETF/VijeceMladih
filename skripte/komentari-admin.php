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
	
//ukoliko je korisnik prijavljen
if (isset($_SESSION['username'])) {
	echo '

	 <header class="mainHeader">
    <div id="nav">
      <div id="navWrapper">
        <ul>
<li>
              <a href="novosti-admin.php">Novosti</a></li><li>
              <a href="#">Komentari</a></li><li>
              <a href="korisnici-admin.php">Korisnici</a>
          </li>
   
        </ul>
		<form id="statusPrijave" action="admin.php" method="POST">  <input type="submit" name="odjava" value="Odjava"> 
      </div>
    </div>
 </header>';
}
else { //ukoliko nije prijavljen
		header("Location: admin.php");
}
?>

</body>
</html>
