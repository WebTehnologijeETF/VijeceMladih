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
        </ul>
    </nav>
 </header>

<!--End of header-->
  <div class="mainContent">
  <div id="content" class="content">
    <?php
      $datoteke = scandir("novosti/");
      $niz= array();
      for ($i=2; $i < count($datoteke); $i++) {
          $n = file("novosti/".$datoteke[$i]);
          $datum= $n[0];
          $autor= $n[1];
          $naslov= $n[2];
          $slika= $n[3];
          $tekst="";
          $minusi=count($n)-1;
          $detaljniji="";
          for ($j=4; $j<count($n); $j++) {
            if ($n[$j]=="--") {
              $minusi=$j;
              break;
            }
            else $tekst=$tekst.$n[$j];
          }
          for ($j=$minusi+1; $j<count($n); $j++) {
            $detaljniji=$detaljniji.$n[$j];
          }

          $datum=htmlspecialchars($datum, ENT_QUOTES, "UTF-8");
          $autor=htmlspecialchars($autor, ENT_QUOTES, "UTF-8");
          $naslov=htmlspecialchars($naslov, ENT_QUOTES, "UTF-8");
          $slika=htmlspecialchars($slika, ENT_QUOTES, "UTF-8");
          $tekst=htmlspecialchars($tekst, ENT_QUOTES, "UTF-8");
          $minusi=htmlspecialchars($minusi, ENT_QUOTES, "UTF-8");
          $detaljniji=htmlspecialchars($detaljniji, ENT_QUOTES, "UTF-8");

          $element = array("datum" => $datum, "autor" => $autor, "naslov" => $naslov, "slika" => $slika, "tekst" => $tekst ,"minusi"=>$minusi,"detaljniji" => $detaljniji);
          array_push($niz, $element);
      }

    /*  for ($i=0; $i < count($niz); $i++) {
        for ($j=0; $j<count($niz)-1-$i; $j++) {
            //strtodate($niz[$i]["datum"]); // PROVJERITI kako pretvoriti u datum i porediti dva datuma
            if ($niz[$j+1] < $niz[$j]) {
                $tmp = $niz[$j];
                $niz[$j] = $niz[$j+1];
                $niz[$j+1] = $tmp;
            }
        }
      }
*/
      for ($i=0; $i < count($niz); $i++) {
       // echo "<div class='kutijica'>".$niz[$i]["tekst"]."</div>";
        echo "<div class='kutijica'>".$niz[$i]["naslov"]."<br>".$niz[$i]["autor"]."<br>".$niz[$i]["datum"]."<br>".$niz[$i]["slika"]."<br>".$niz[$i]["tekst"]."<br>".$niz[$i]["minusi"]."<br>".$niz[$i]["detaljniji"]."</div><br><br>";
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