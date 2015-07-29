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
var name = forma.name;
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