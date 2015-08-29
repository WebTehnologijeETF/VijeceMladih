
 


 <!DOCTYPE html>
<html lang="en">

<head>
  <title> Vijece mladih OO Stari Grad</title>
  <meta charset="utf-8" />
 <!-- <script src="ValidacijaKontakt.js" type="text/javascript"></script>-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="MenuJava.js" type="text/javascript"></script>
  

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
    <?php
    session_start();   
                  function provjeriIme() {
                     if(!(isset($_GET["name"])))  return true;
                      if (strlen($_GET["name"]) > 2) return true;
                      else return false; 
                  }

               function provjeriMail() {
                  if(!(isset($_GET["email"])))  return true;
                  $email = $_GET["email"]; 

                  if (strlen($email)==0) return true;
                  if (strlen($email) < 5) return false;
                  $flag=false;
                  $ludoA = 0;
                  for ($i=1; $i<strlen($email); $i++) {
                    if ($email[$i]=='@') {
                      $flag=true;
                      $ludoA = $i;
                      break;
                    }
                  }
                  if (!$flag) return false;

                  $flag=false;
                  for ($i=$ludoA+1; $i<strlen($email)-1; $i++) {
                     if ($email[$i]=='.') {
                      $flag=true;
                      break;
                    }   
                  }
                  if (!$flag) return false;

                  $brojac=0;
                  for ($i=0; $i<strlen($email); $i++) {
                    if ($email[$i]=='@') $brojac++;
                  }
                  if ($brojac > 1) return false;
                  return true;

                }

                $name = "";
                $email = "";     
                $telefon = ""; 
                $naslov = "";  
                $comment =  "";
                $ispravno=false; 


            if(isset($_GET["name"])) {   
                     
                $name = $_GET["name"];
                $email = $_GET["email"];     
                $telefon = $_GET["telefon"]; 
                $naslov = $_GET["naslov"];  
                $comment =  $_GET["comment"];   

                $name=htmlspecialchars($name, ENT_QUOTES, "UTF-8");
                $email=htmlspecialchars($email, ENT_QUOTES, "UTF-8");
                $telefon=htmlspecialchars($telefon, ENT_QUOTES, "UTF-8");
                $naslov=htmlspecialchars($naslov, ENT_QUOTES, "UTF-8");
                $comment=htmlspecialchars($comment, ENT_QUOTES, "UTF-8");

                //ovdje postavi $ispravno na false pozivima validacijskih funkcija
                if(provjeriIme()) $ispravno=true;

               if (isset($_GET["slanje"])){
                echo "<div id = 'slanje'> <form action='kontakt.php' method='GET'> <h2>Provjerite da li ste ispravno popunili kontakt formu</h2>";
                echo "<p><i>Ime i prezime: </i>".$name." <br>";
                echo "<i>Email: </i>".$email."<br>"."<i>Broj telefona(format: xxx-xxx-xxx):</i>".$telefon."<br>";
                echo "<i>Naslov: </i>".$naslov."<br><i>Komentar: </i>".$comment."<br>";
                echo "<p>Da li ste sigurni da želite poslati ove podatke?</p> <input type='submit' value='Siguran sam' name='salji'> </div> </form>"; 
                echo "<h3>Ako ste pogrešno popunili formu, možete ispod prepraviti unesene podatke </h3>";       
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
                $_SESSION["naslov"] = $naslov;
                $_SESSION["comment"] = $comment;
                $_SESSION["telefon"]=$telefon;  
              }                                                                                   
            }
            
           if(isset($_REQUEST["salji"])) {
                echo "<h2>Zahvaljujemo se što ste nas kontaktirali!</h2>";
                $from = $_SESSION["email"];
                $to = "ahasovic1@etf.unsa.ba";
                $subject = $_SESSION["naslov"];
                $message = $_SESSION["name"]."\n".$_SESSION["telefon"]."\n \n \n".$_SESSION["comment"];
                mail($to, $subject, $message); 
                session_destroy();
            }
    ?>

<!--End of header-->
 <div class="mainContent"> 
  <div class="content">
    <article class="topContent">
    <form id="forma" name="forma" action="kontakt.php" method="get" onsubmit="return provjeriFormu()" enctype="plain/text">
      <h2>Kontakt forma</h2>
      <label class="required" for="name">Ime i prezime: </label>
      <input id="name" name="name" type="text" value="<?php if (isset($_GET['name'])) echo $_GET['name']; else echo ''; ?>"/>
      <!--?php if (isset($_GET['name'])) echo $_GET['name']; else echo ''; ?-->
      <span id="name_validation" class="<?php if (provjeriIme()) echo 'nevidljiv'; else echo 'error'; ?>"><img src='images/error.png'>Ime mora sadržati najmanje 3 karaktera! </span>

      <label for="email">Email: </label>
      <input id="email" name="email" type="text" value="<?php if (isset($_GET['email'])) echo $_GET['email']; else echo ''; ?>"/>
      <span id="email_validation" class="<?php if (provjeriMail()) echo 'nevidljiv'; else echo 'error'; ?>"><img src='images/error.png'> Neispravan e-mail! </span>

      <label for="telefon">Broj telefona(format: xxx-xxx-xxx): </label>
      <input type="tel" name="telefon" id="telefon" value="<?php if (isset($_GET['telefon'])) echo $_GET['telefon']; else echo ''; ?>"/>
      <span id="telefon_validation" class="nevidljiv"><img src='images/error.png'> Neispravan broj telefona! </span>

      <label for="naslov">Naslov: </label>
      <input name="naslov" value="<?php if (isset($_GET['naslov'])) echo $_GET['naslov']; else echo ''; ?>"/>

      <label for="comment">Komentar: </label>
      <textarea name="comment" value="<?php if (isset($_GET['comment'])) echo $_GET['comment']; else echo ''; ?>"></textarea>

      <input class="smallButton" type="submit" value ="Pošalji" name="slanje"/>
      <input class="smallButton" type="reset" value="Poništi"/> 
    </form>
    <div id="Upisi"></div>
    
    </article>
  </div>
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

</body>

</html>
