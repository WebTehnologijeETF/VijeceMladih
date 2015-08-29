<!DOCTYPE html>
<html lang="en">

<head>
  <title> Vijece mladih OO Stari Grad</title>
  <meta charset="utf-8" />

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="MenuJava.js" type="text/javascript"></script>
  <script src="Novosti.js" type="text/javascript"></script>
  <meta name="viewport" content="width=device-width, inital-scale=1.0"/>
</head>

<body class="body">
  <!--Start of header-->
 <header class="mainHeader">
    <img src="images/logo.gif" alt="logo">

    <nav id="nav">
        <ul>
          <li><a href="Pocetna.html#">Naslovnica</a></li>
          <li><a href="novosti.php#">Novosti</a></li>   
          <li><a href="Galerija.html#">Galerija</a></li>
          <li><a href="Ankete.html#">Članice</a></li>
          <li><a href="Dokumenti.html#">Dokumenti</a></li>
          <li><a href="kontakt.php#">Kontakt<img src="images/arrow.png" /></a>
                <ul class="submenu1">
                  <li><a href="KontaktAJAX#">Gdje smo</a></li>
                  <li><a href="#">link neki</a></li>
                  <ul class="submenu2">
                    <li><a href="#">link 1</a></li>
                    <li><a href="#">link 2</a></li>
                  </ul>
                </ul>
          </li>
          <li><a href="admin.php#">Admin</a></li>
        </ul>
    </nav>
 </header>

<!--End of header-->
  <div class="mainContent">
  <div id="content" class="content">
    <?php
    session_start();
    include 'db.php';

      if (isset($_POST["autor"])) {
          $autor=$_POST["autor"];
          $tekst=$_POST["tekst"];
          $email=$_POST["email"];
          $novost=$_POST["novost"];
          //htmlspecialchar

          $autor=htmlspecialchars($autor, ENT_QUOTES, "UTF-8");
          $tekst=htmlspecialchars($tekst, ENT_QUOTES, "UTF-8");
          $email=htmlspecialchars($email, ENT_QUOTES, "UTF-8");
          $novost=htmlspecialchars($novost, ENT_QUOTES, "UTF-8");

          $sql = "INSERT INTO komentari SET autor=:autor, tekst=:tekst, email=:email, novost=:novost";
          $upit = $veza->prepare($sql);
          $upit->bindValue(":autor", $autor);
          $upit->bindValue(":tekst", $tekst);
          $upit->bindValue(":email", $email);
          $upit->bindValue(":novost", $novost);
          $upit->execute();
      }
      $sql ="SELECT n.*, k.ime, k.prezime FROM novosti n, korisnici k WHERE n.autor=k.id";
      $upit = $veza->prepare($sql);
      $upit->execute();
      $rezultat=$upit->fetchAll();
      foreach($rezultat as $red) {
        $datum=$red["datumobjave"];
        $autor=$red["ime"]." ".$red["prezime"];
        $naslov=$red["naslov"];
        $slika= $red["slika"];
        $tekst = $red["tekst"];
        $id = $red["id"];

        echo "<div class='kutijica'>".$naslov."<br>".$tekst."</div>";
        echo "<form action ='novosti.php' method ='POST' class='kutijica'> 
        Komentar: <input type='hidden' name='novost' value=".$id."> <br>
        Autor: <input type='text' name='autor'><br>
        Email: <input type='text' name='email' ><br><br>
        Tekst: <textarea name='tekst'></textarea><br>
        <input type='submit' name='dugme' value='Dodaj komentar'></form>";
      }


    ?>
  </div>
 <aside class="Sidebar1">
    <article>
      <h2>Članice VM: </h2>
      <button>Incijativa mladih za ljudska prava – YIHR</button>
      <br><br>
      <button>Asocijacija srednjoškolaca u BiH – AsuBiH</button><br><br>
      <button>Centar za društveno obrazovanje mladih – CDOM</button><br><br>
      <button>Centar za razvoj internet medija eMreža</button><br><br>
      <button>Progressum</button><br><br>
      <button>Grupa za razvoj društvenog poduzetništva </button><br><br>
      <button>Metarmofoza</button><br><br>
      <button>Omladinska novinska agencija u BiH – ONAuBiH</button><br><br>
      <button>Udruženje za promociju omladinskog aktivizma – POMAK</button><br><br>
      <button>Mlade snage – Youth Force</button><br><br>
    </article>
  </aside>
  

  <footer class="mainFooter"> 
    <p> Copyright &copy; 2015 Aida Hasović </p>
  </footer>
</div>

</body>

</html>