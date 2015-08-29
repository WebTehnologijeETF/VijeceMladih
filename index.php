<?php
    
    if(isset($_POST['btnSubmit'])) {
        $veza = new PDO("mysql:dbname=vijecemladih;host=localhost;charset=utf8", "vijecemladih", "sarajevo");
        $veza->exec("set names utf8"); 
    
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
    
        $upit = $veza->prepare("select * from korisnici where username=? and password=?");           
        $upit->execute(array($username, $password));           
        if (!$upit) {
            $greska = $veza->errorInfo();
            print "Greška". $greska[2];
            exit();
        }
         $rezultat = NULL;
            foreach($upit as $value) {
                $rezultat = $value;
                break;
            }
        if($rezultat == NULL) echo "Ne postoji korisnik";
        else{          
            session_start();            
            $_SESSION['username'] = $rezultat['username'];
            $_SESSION['ime'] = $rezultat['ime'];
            $_SESSION['prezime'] = $rezultat['prezime'];
            $_SESSION['id'] = $rezultat['id'];                
        }    
    }
    if(isset($_POST['odjava'])) {  
        session_start();
        session_unset();
        session_destroy();                                   
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title> Vijece mladih OO Stari Grad</title>
  <meta charset="utf-8" />

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="funkcije.js" type="text/javascript"></script>
  <script src="java/novost.js"></script>
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
    <div class="content">
  </div>
 <aside class="Sidebar1">
    <article>
      <h2>Članice VM: </h2>
      <button>Incijativa mladih za ljudska prava – YIHR</button>
      <br><br>
      <button>Asocijacija srednjoškolaca u BiH – AsuBiH</button><br>
    </article>
  </aside>
  <aside class="Sidebar2">
    <article>
      <h2>Članice VM: </h2>
      <button>Incijativa mladih za ljudska prava – YIHR</button>
      <br><br>
      <button>Metarmofoza</button><br><br>
      <button>Omladinska novinska agencija u BiH – ONAuBiH</button><br><br>
    </article>
  </aside>

  <footer class="mainFooter"> 
    <p> Copyright &copy; 2015 Aida Hasović </p>
  </footer>
</div>
</body>

</html>