 <div class="mainContent"> 
  <div class="content">
    <article class="topContent">
    <form id="forma" name="forma">
      <h2>Kontakt forma</h2>
      <label class="required" for="name">Ime i prezime: </label>
      <input id="name" name="name" type="text" onblur="ispravnostImena()" required/>
      <span id="name_validation" class="error"></span>

      <label class="required" for="email">Email: </label>
      <input id="email" name="email" type="email" onblur="validiraj()" reqired/>
      <span id="email_validation" class="error"></span>

      <label for="telefon">Broj telefona(format: xxx-xxx-xxx): </label>
      <input type="tel" name="telefon" pattern="^\d{3}-\d{3}-\d{3}$" />
      <span class="error"></span>
      <label for="naslov">Naslov: </label>
      <input name="naslov" onfocus = validacijaNaslov() id = "naslov" type = "text" />

      <label for="comment">Komentar: </label>
      <textarea name="comment" onfocus = validacijaPoruka() id = "textbox" rows = "7" ></textarea>

      <input class="smallButton" type="submit" value ="Pošalji"/>
      <input class="smallButton" type="reset" value="Poništi"/> 
    </form>
    <div id="Upisi"></div>
    <script src="ValidacijaKontakt.js"></script>
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