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
          <li><a href="Novosti.php#">Novosti</a></li>   
          <li><a href="Galerija.html#">Galerija</a></li>
          <li><a href="Ankete.html#">Članice</a></li>
          <li><a href="Dokumenti.html#">Dokumenti</a></li>
          <li><a href="Kontakt.html#">Kontakt<img src="images/arrow.png" /></a>
                <ul class="submenu1">
                  <li><a href="KontaktAJAX#">Gdje smo</a></li>
                  <li><a href="#">link neki</a></li>
                  <ul class="submenu2">
                    <li><a href="#">link 1</a></li>
                    <li><a href="#">link 2</a></li>
                  </ul>
                </ul>
          </li>
        </ul>
    </nav>
 </header>

<!--End of header-->
  <div class="mainContent">
  <div id="content" class="content">
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
<?php include 'PrikazNovosti.php'; ?>
</body>

</html>