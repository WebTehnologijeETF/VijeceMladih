<!DOCTYPE HTML >
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Vijece mladih OO Stari Grad</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script src="MenuJava.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, inital-scale=1.0"/>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>	
		<script src="admin.js"></script>		
</head>
<body>

<?php
session_start();
include 'db.php';
	
//ukoliko je korisnik prijavljen
if (isset($_SESSION['username'])) {
	if (isset($_POST['naslov'])) { //kliknuto dugme "Dodaj novost"
		$slika=0;
		$id = $_POST['id'];
		$naslov= $_POST['naslov'];
		$tekst= $_POST['tekst'];
		if (isset($_POST['slika'])) $slika = $_POST['slika'];
		$autor = $_POST['autor'];
		
		$autor = htmlspecialchars($autor, ENT_QUOTES, 'UTF-8');
		if (isset($_POST['slika'])) $slika = htmlspecialchars($slika, ENT_QUOTES, 'UTF-8');
		$tekst = htmlspecialchars($tekst, ENT_QUOTES, 'UTF-8');
		$naslov = htmlspecialchars($naslov, ENT_QUOTES, 'UTF-8');
		$id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
		
		$sql="SELECT id FROM korisnici WHERE username=:autor";
			$upit = $veza->prepare($sql);
			$upit->bindValue(":autor", $autor);
			$upit->execute();
			$rezultat=$upit->fetch();
			$autor=$rezultat["id"];
		
		
		if ($id!=0) {
			$sql= "UPDATE novosti SET naslov=:naslov, tekst=:tekst, ";
			if (isset($_POST['slika'])) $sql= $sql."slika=:slika, "; 
			$sql= $sql."autor=:autor WHERE id=:id";
		
			$upit = $veza->prepare($sql);
			$upit->bindValue(":naslov", $naslov);
			$upit->bindValue(":tekst", $tekst);
			if (isset($_POST['slika'])) $upit->bindValue(":slika", $slika);
			$upit->bindValue(":autor", $autor);
			$upit->bindValue(":id", $id);
			$upit->execute();
		}
		else {
			$sql= "INSERT INTO novosti SET naslov=:naslov, tekst=:tekst, slika=:slika, autor=:autor";
			$upit = $veza->prepare($sql);
			$upit->bindValue(":naslov", $naslov);
			$upit->bindValue(":tekst", $tekst);
			$upit->bindValue(":slika", $slika);
			$upit->bindValue(":autor", $autor);
			$upit->execute();
		}
	}
	
	echo '

	 <header class="mainHeader">
    <div id="nav">
      <div id="navWrapper">
        <ul>
<li>
              <a href="#">Novosti</a></li><li>
              <a href="komentari-admin.php">Komentari</a></li><li>
              <a href="korisnici-admin.php">Korisnici</a>
          </li>
   
        </ul>
		<form id="statusPrijave" action="admin.php" method="POST">  <input type="submit" name="odjava" value="Odjava"> </form>
      </div>
    </div>
 </header>';
 
	$sql="SELECT n.*, k.ime, k.prezime FROM novosti n, korisnici k where k.id=n.autor";
	$upit = $veza->prepare($sql);
	$upit->execute();
	$rezultat=$upit->fetchAll();
	
 echo '
	<table border=1>
		<tr>
			<th> Naslov </th>
			<th> Tekst </th>
			<th> Slika </th>
			<th> Autor </th>
			<th> Datum objave </th>
			<th> Izmjena </th>
		</tr>';
		foreach($rezultat as $red) {
			echo '<tr>
						<td name="'.$red["id"].'naslov">'.$red['naslov'].'</td>
						<td name="'.$red["id"].'tekst">'.$red['tekst'].'</td>
						<td> <img width="50px" height="50px" src="'.$red['slika'].'"></td>
						<td>'.$red['ime']." ".$red['prezime'].'</td>
						<td>'.date("d. m. Y", strtotime($red['datumobjave'])).'</td>
						<td> <input type="button" value="Izmijeni" onClick="izmijeniNovost('.$red["id"].')"></td>
				<tr>';
		}
echo '
	</table> <br>
	<form action="novosti-admin.php" method="POST" id="formaNovost">
		Naslov: <input type="text" name="naslov" placeholder="Naslov novosti" /> <br>
		Tekst: <textarea name="tekst" type="text"> </textarea> <br>
		Slika: <input name="slika" type="file" accept="image/*" /> <br>
		<input type="hidden" name="id" value="0" />
		<input type="hidden" name="autor" value="'.$_SESSION["username"].'" />
		<input type="submit" value="Dodaj novost" />
	</form>
 ';
}
else { //ukoliko nije prijavljen
		header("Location: admin.php");
}
?>

</body>
</html>
