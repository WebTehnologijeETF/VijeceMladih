/*var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

var name = forma.name;
var email = forma.email
var telefon = forma.telefon;
var naslov = forma.naslov;
var comment = forma.comment;

name.addEventListener("blur",ispravnostnamena,false);
email.addEventListener("blur", ispravnostMaila, false);
telefon.addEventListener("blur", ispravnostTelefona, false);


document.getElementById("forma").onsubmit = validiraj;

function validiraj(){

	return ispravnostnamena() && ispravnostMaila();// && ispravnostTelefona();
}

function ispravnostnamena() {
	/*var ck_name = /^[A-Za-z0-9 ]{1,50}$/;
	var errors = [];
	if (!ck_name.test(name)) {
		alert("\nUnesite svoje name i prezname!");
		return false;
 	}
 return true;
 if(name.value()==""){
 	alert("\nUnesite svoje name!");
    name.focus();
    return false;
	}
	return true;
}

function ispravnostMaila() {
	  
	var errors = [];
 	if (!ck_email.test(email)) {
 		alert("\nUnesite validnu email adresu!");
 		return false;
 	} 
 return true;
}
}*/
/*var name = forma.name;
function ispravnostImena() {
	var ck_name = /^[A-Za-z0-9 ]{1,50}$/;
	var errors = [];
	if (!ck_name.test(name)) {
		alert("\nUnesite svoje ime i prezime!");
		return false;
 	}
	return true;
}

function validiraj() {
  var valid = 1;
  var email = document.getElementById('email');
  var email_validation = document.getElementById("email_validation");
  var name = document.getElementById('name');
  var name_validation = document.getElementById("name_validation");
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
  if (!ispravnostImena||name.value="") {
    valid = 0;
    name_validation.innerHTML = "Field Required";
    name_validation.style.display = "block";
    name_validation.parentNode.style.backgroundColor = "#FFDFDF";
  } else {
    name_validation.style.display = "none";
    name_validation.parentNode.style.backgroundColor = "transparent";
  }
  
  if (email.value === "") {
    valid = 0;
    email_validation.innerHTML = "Field Required";
    email_validation.style.display = "block";
    email_validation.parentNode.style.backgroundColor = "#FFDFDF";
  } else {
    email_validation.style.display = "none";
    email_validation.parentNode.style.backgroundColor = "transparent";
  }
  
  if(!filter.test(email.value)) {
    valid = 0;
    email_validation.innerHTML = "Invalid email address";
    email_validation.style.display = "block";
    email_validation.parentNode.style.backgroundColor = "#FFDFDF";
  } else {
    email_validation.style.display = "none";
    email_validation.parentNode.style.backgroundColor = "transparent";
  }
  if (!valid)
    return false;
}

function validacijaNaslov(){
  var naslov = document.getElementById("title");
  if(naslov.value == "" && contact.usluga.selected == null){
    naslov.value = "Odaberite uslugu"
    naslov.disabled = true; 
    textbox.disabled = true;
    return false;
  }
    else{
        return true;
    }

}
function validacijaPoruka(){
  var naslov = document.getElementById("title");
  if(naslov.value == "" && contact.usluga.selected == null){
    naslov.value = "Odaberite uslugu"
    naslov.disabled = true; 
    textbox.disabled = true;
    return false;
    
  }
    else{
        return true;
    }
}*/

function provjeriIme() {
  var polje= document.getElementById("name");
  if (polje.value.length > 2) return true;
  else return false; 
}

function provjeriMail() {
  var tekst= document.getElementById("email").value;
  if (tekst.length == 0) return true;
  if (tekst.length < 5) return false;
  var flag=false;
  var ludoA = 0;
  for (i=1; i<tekst.length; i++) {
    if (tekst.charAt(i)=='@') {
      flag=true;
      ludoA = i;
      break;
    }
  }
  if (!flag) return false;

  var flag=false;
  for (i=ludoA+1; i<tekst.length-1; i++) {
     if (tekst.charAt(i)=='.') {
      flag=true;
      break;
    }   
  }
  if (!flag) return false;

  var brojac=0;
  for (i=0; i<tekst.length; i++) {
    if (tekst.charAt(i)=='@') brojac++;
  }
  if (brojac > 1) return false;
  return true;

}

function provjeriTelefon() {
  var tekst= document.getElementById("telefon").value;
  if (tekst.length == 0) return true;
  var telefonRegEx = /^\d{3}-\d{3}-\d{3}$/
  return telefonRegEx.test(tekst);
}

function postaviZnak(polje) {
    el=document.getElementById("name_validation");
    if (el!=null) el.setAttribute("class", "nevidljiv");
        el=document.getElementById("email_validation");
   if (el!=null) el.setAttribute("class", "nevidljiv");
        el=document.getElementById("telefon_validation");
   if (el!=null) el.setAttribute("class", "nevidljiv");
            el=document.getElementById("opcina_validation");
   if (el!=null) el.setAttribute("class", "nevidljiv");
            el=document.getElementById("mjesto_validation");
   if (el!=null) el.setAttribute("class", "nevidljiv");

  if (polje=="name") {
    el=document.getElementById("name_validation");
    el.setAttribute("class", "error");
  }
  else if (polje=="telefon") {
    el=document.getElementById("telefon_validation");
    el.setAttribute("class", "error");
    el.innerHTML="<img src='images/error.png'> Neispravan broj telefona!";
  }
  else if (polje=="email") {
    el=document.getElementById("email_validation");
    el.setAttribute("class", "error");
        el.innerHTML="<img src='images/error.png'> Neispravan email!";
  }
  else if (polje=="cross") {
    el1=document.getElementById("telefon_validation");
    el2=document.getElementById("email_validation");
    el1.setAttribute("class", "error");
    el2.setAttribute("class", "error");
    el1.innerHTML="<img src='images/error.png'> Morate unijeti ili broj telefona ili e-mail";
    el2.innerHTML="<img src='images/error.png'> Morate unijeti ili broj telefona ili e-mail";
  }
  else if (polje=="opcina") {
    el=document.getElementById("opcina_validation");
    el.setAttribute("class", "error");
    el=document.getElementById("mjesto_validation");
    el.setAttribute("class", "error");
        
  } 

}

function provjeriFormu() {
  if(!provjeriIme()) {
    postaviZnak("name");
    return false;
  }
  if(!provjeriMail()) {
    postaviZnak("email");
    return false;
  }
  if(!provjeriTelefon()) {
    postaviZnak("telefon");
    return false;
  }
  if (document.getElementById("telefon").value.length > 0 || document.getElementById("email").value.length > 0) return true;
  else {
    postaviZnak("cross");
    return false;
  }



}

function MjestoOpcina() {
              flag=false;
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        var odgovor = JSON.parse(ajax.responseText);
                        if (Object.keys(odgovor)=="greska") {
                         postaviZnak("opcina");
                        }
                        else {
                          document.getElementById("ajaxForma").submit();
                        }
                        
                    }
                    if (ajax.readyState == 4 && ajax.status == 404)
                          document.innerHTML = stranica.toString();
                }
                var mjesto = document.getElementById("mjesto").value;
                var opcina = document.getElementById("opcina").value;
                if (mjesto.length === 0) { 
                     alert("Polje za unos mjesta je prazno!");
                     return false;
                }
                if (opcina.length === 0) { 
                     alert("Polje za unos opcine je prazno!");
                     return false;
                }
                ajax.open("GET", "http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina=" + opcina+"&mjesto=" + mjesto, true);
                ajax.send();
               
           

            }
  