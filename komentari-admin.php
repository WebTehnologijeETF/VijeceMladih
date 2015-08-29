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

	if (isset($_POST['autor'])) { //kliknuto dugme "Dodaj komentar"

		$id = $_POST['id'];
		$autor= $_POST['autor'];
		$tekst= $_POST['tekst'];
		$email = $_POST['email'];
		$novost = $_POST['novost'];
		
		$autor = htmlspecialchars($autor, ENT_QUOTES, 'UTF-8');
		$tekst = htmlspecialchars($tekst, ENT_QUOTES, 'UTF-8');
		$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
		$id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
		$novost = htmlspecialchars($novost, ENT_QUOTES, 'UTF-8');
	
		$sql="SELECT id FROM korisnici WHERE username=:autor";
			$upit = $veza->prepare($sql);
			$upit->bindValue(":autor", $autor);
			$upit->execute();
			$rezultat=$upit->fetch();
			$autor=$rezultat["id"];
		
		
		if ($id!=0) {
			$sql= "UPDATE komentari SET autor=:autor, tekst=:tekst, email=:email, ";
			$sql= $sql."novost=:novost WHERE id=:id";
		
			$upit = $veza->prepare($sql);
			$upit->bindValue(":novost", $novost);
			$upit->bindValue(":email", $email);
			$upit->bindValue(":tekst", $tekst);
			$upit->bindValue(":autor", $autor);
			$upit->bindValue(":id", $id);
			$upit->execute();
		}
		else {
			$sql= "INSERT INTO komentari SET email=:email, tekst=:tekst, novost=:novost, autor=:autor";
			$upit = $veza->prepare($sql);
			$upit->bindValue(":email", $email);
			$upit->bindValue(":tekst", $tekst);
			$upit->bindValue(":autor", $autor);
			$upit->bindValue(":novost", $novost);
			$upit->execute();
		}
	}

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
 	$sql="SELECT k.*, n.naslov FROM novosti n, komentari k where k.novost=n.id";
	$upit = $veza->prepare($sql);
	$upit->execute();
	$rezultat=$upit->fetchAll();
	echo '
	<table border=1>
		<tr>
			<th> Autor </th>
			<th> Tekst </th>
			<th> Datum objave </th>
			<th> Email </th>
			<th> Naslov novosti </th>
			<th> Brisanje </th>
		</tr>';
		foreach($rezultat as $red) {
			echo '<tr>
						<td name="'.$red["id"].'autor">'.$red['autor'].'</td>
						<td name="'.$red["id"].'tekst">'.$red['tekst'].'</td>
						<td>'.date("d. m. Y", strtotime($red['datumobjave'])).'</td>
						<td name="'.$red["id"].'email">'.$red['email'].'</td>
						<td name="'.$red["id"].'naslov">'.$red['naslov'].'</td>
						<td> <input type="button" value="Izmijeni" onClick="obrisiKomentar('.$red["id"].')"></td>
				<tr>';
		}
	echo '
		</table> <br>
		<form action="komentari-admin.php" method="POST" id="formaNovost">
			Autor: <input type="text" name="autor" placeholder="Autor"/> <br>
			<input type="hidden" name="id" value="0" />
			<input type="submit" value="Dodaj komentar" />
		</form>
	 ';

}
else { //ukoliko nije prijavljen
		header("Location: admin.php");
}
?>

</body>
</html>
