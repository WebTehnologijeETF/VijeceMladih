<?php
	include 'db.php';

	# Provjeri da li treba spasiti novi komentar
	if(isset($_GET["idNovosti"])) {
		$idNovosti = m2h($_REQUEST['idNovosti']);
		$autor = m2h($_REQUEST['autor']);
		$email = m2h($_REQUEST['email']);
		$tekst = m2h($_REQUEST['tekst']);
		
		$upit = "INSERT into komentari SET novost = :idNovosti, autor = :autor, email = :email, tekst = :tekst;";
        $upis = $veza->prepare($upit);
        $upis->bindValue(":idNovosti", $idNovosti, PDO::PARAM_STR);
        $upis->bindValue(":autor", $autor, PDO::PARAM_STR);
        $upis->bindValue(":email", $email, PDO::PARAM_STR);
        $upis->bindValue(":tekst", $tekst, PDO::PARAM_STR);
        $upis->execute();
	}

	$rezultat = $veza->query("SELECT n.id, n.datumobjave, CONCAT(k.ime, k.prezime) AS autor, n.naslov, n.slika, n.tekst FROM novosti n, korisnici k WHERE k.id = n.autor;");
    if (!$rezultat) {
        $greska = $veza->errorInfo();
        print "SQL greška: " . m2h($greska[2]);
        exit();
    }
    foreach ($rezultat as $novi) {
    	echo $novi['naslov'];
        echo "<script>prikaziNovost('".$novi['id']."','".$novi['datumobjave']."', '".$novi['autor']."', '".$novi['naslov']."', '".$novi['slika']."', '".$novi['tekst']."');</script>";
        $komentari = $veza->query("SELECT k.datumobjave, k.autor, k.email, k.tekst FROM komentari k WHERE k.novost = ".$novi['id'].";");
        if (!$komentari) {
	        $greska = $veza->errorInfo();
	        print "SQL greška: " . m2h($greska[2]);
	        exit();
	    }
	    $brojkomentara = 0;
	    foreach ($komentari as $komentar) {
	    	$brojkomentara++;
	    	echo "<script>prikaziKomentareZaNovost('".$novi['id']."','".$komentar['datumobjave']."', '".$komentar['autor']."', '".$komentar['email']."', '".$komentar['tekst']."');</script>";
	    }
	    echo "<script>prikaziBrojKomentaraZaNovost('".$novi['id']."','".$brojkomentara."');</script>";
    }

?>