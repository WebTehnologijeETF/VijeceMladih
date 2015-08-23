
 <div class="mainContent"> 
  <div class="content">
    <article class="topContent">
      <?php
            
            if(isset($_GET["slanje"])) {   
                session_start();                         
                echo "<div id = 'predSlanje'> <form action='slanjeMaila.php' method='POST'> <h2>Provjerite da li ste ispravno popunili kontakt formu</h2><br>";
                echo "<p><i>Ime i prezime: </i></p> <p id='name'> ".$_GET['name']."</p> <br>";
                echo "<p><i>Email: </i></p> <p> ".$_GET['email']."</p> <br>""<p><i>Broj telefona(format: xxx-xxx-xxx):</i></p> <p> ".$_GET['telefon']."</p><br>";
                echo "<p><i>Naslov: </i></p> <p> ".$_GET['naslov']."</p> <br><p><i>Komentar: </i></p> <p>".$_GET['poruka']."</p> <br>";
                echo "<p>Da li ste sigurni da želite poslati ove podatke?</p> <input type='submit' value='Siguran sam' name='salji'> </div> "; 
                echo "<h3>Ako ste pogrešno popunili formu, možete ispod prepraviti unesene podatke </h3>";       
                $_SESSION["name"] = $_GET["ime"];
                $_SESSION["email"] = $_GET["email"];
                $_SESSION["naslov"] = $_GET["naslov"];
                $_SESSION["poruka"] = $_GET["poruka"];                                                                                    
            }
            
            if(isset($_REQUEST["salji"])) {
                echo "<h2>Zahvaljujemo se što ste nas kontaktirali!</h2>";
                $to = "ahasovic1@etf.unsa.ba";
                $subject = $SESSION["naslov"];
                $message = $SESSION["name"]."\n".$SESSION["telefon"]."\n \n \n".$SESSION["poruka"];
                mail($to, $subject, $message); 
                session_destroy();
            }   
            
        ?>

    <form id="forma" name="forma" action="slanjeMaila.php" method="GET">
      <h2>Kontakt forma</h2>
      <label class="required" for="name">Ime i prezime: </label>
      <input id="name" name="name" type="text" value="<?php if (isset($_REQUEST['name'])) print $_REQUEST['name']; ?>" required/>
      <span id="name_validation" class="error"></span>


      <label class="required" for="email">Email: </label>
      <input id="email" name="email" type="email" value="<?php if (isset($_REQUEST['email'])) print $_REQUEST['email']; ?>" reqired/>
      <span id="email_validation" class="error"></span>

      <label for="telefon">Broj telefona(format: xxx-xxx-xxx): </label>
      <input type="tel" name="telefon" pattern="^\d{3}-\d{3}-\d{3}$" value="<?php if (isset($_REQUEST['telefon'])) print $_REQUEST['telefon']; ?>"/>
      <span class="error"></span>

      <label for="naslov">Naslov: </label>
      <input name="naslov" value="<?php if (isset($_REQUEST['naslov'])) print $_REQUEST['naslov']; ?>"/>

      <label for="comment">Komentar: </label>
      <textarea name="comment"><?php if (isset($_REQUEST['poruka'])) print $_REQUEST['poruka']; ?></textarea>

      <input class="smallButton" type="submit" value ="Pošalji"/>
      <input class="smallButton" type="reset" value="Poništi"/> 
    </form>
    <div id="Upisi"></div>
    <script src="ValidacijaKontakt.js"></script>
    </article>
  </div>
 </div>