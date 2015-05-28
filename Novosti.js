function prikaziNovost(id, datumObjave, autor, naslov, slika, tekst) {
	var content = document.getElementById("content");
	content.innerHTML =  content.innerHTML + "<article class='topContent' id='" + id + "'>"+
        "<header><h2>"+ naslov +"</h2></header>" + 
        "<footer><p class='post-info'>" + datumObjave + "</p></footer>" +
        "<content><p>" + tekst + "</p></content>" +
        "<div class='komentari'><a class='brojkomentara' onclick='otvoriKomentare(" + id + ")'>0 komentara</a>"+
        "<div class='tijelokomentara'>Novi komentar:<form action='Novosti.php'>"+
        "<input type='hidden' name='idNovosti' value="+ id +">"+
        "Ime:<br><input type='text' name='autor'><br>"+
        "E-mail:<br><input type='text' name='email'><br>"+
        "Tekst:<br><input type='text' name='tekst'><br><input type='submit' value='OK'>"+
        "</form></div>"+
        "<div class='unoskomentara'></div></div>"
        "</article>";
}

function prikaziBrojKomentaraZaNovost(idNovosti, brojkomentara) {
	var komentari = document.getElementById(idNovosti).getElementsByClassName("komentari")[0];
	komentari.getElementsByClassName("brojkomentara")[0].innerHTML = brojkomentara + " komentara";
	komentari.getElementsByClassName("tijelokomentara")[0].style.display = "none";
}

function prikaziKomentareZaNovost(idNovosti, datumObjave, autor, email, tekst) {
	var komentari = document.getElementById(idNovosti).getElementsByClassName("komentari")[0].getElementsByClassName("tijelokomentara")[0];
	if (email != "") {
		komentari.innerHTML =  datumObjave + "<br>" + autor + "<a href='mailto:" + email + "'>" + email + "</a><br>" + tekst +"<br><hr>" + komentari.innerHTML;
	} else {
		komentari.innerHTML =  datumObjave + "<br>" + autor + "<br>" + tekst +"<br><hr>" + komentari.innerHTML;
	}
}

function otvoriKomentare(id) {
	var komentari = document.getElementById(id).getElementsByClassName("komentari")[0].getElementsByClassName("tijelokomentara")[0];
	if (komentari.style.display == "block") komentari.style.display = "none";
	else komentari.style.display = "block"
}