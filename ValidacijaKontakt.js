/*var ck_name = /^[A-Za-z0-9 ]{1,50}$/;
var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

function validacija(form){

	var name = form.name.value;
	var email = form.email.value;  
	var errors = [];
	if (!ck_name.test(name)) {
		alert("\nUnesite svoje ime i prezime!");
		return false;
 	}
 	if (!ck_email.test(email)) {
 		alert("\nUnesite validnu email adresu!");
 		return false;
 	} 
 return true;
}
*/

var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

var tabela = document.getElementById("forma").getElementsByTagName("table")[0];

var ime = tabela.getElementsByTagName("tr")[0].getElementsByTagName("td")[1].getElementsByTagName("input")[0];
var email = tabela.getElementsByTagName("tr")[1].getElementsByTagName("td")[1].getElementsByTagName("input")[0];
var opcina = tabela.getElementsByTagName("tr")[2].getElementsByTagName("td")[1].getElementsByTagName("input")[0];
var mjesto = tabela.getElementsByTagName("tr")[3].getElementsByTagName("td")[1].getElementsByTagName("input")[0];


ime.addEventListener("blur",ispravnostImena,false);
email.addEventListener("blur", ispravnostMaila, false);
opcina.addEventListener("blur", ispravnostOpcine, false);


document.getElementById("forma").onsubmit = validiraj;

function validiraj(){

	return ispravnostImena() && ispravnostMaila() && ispravnostOpcine();
}

function ispravnostImena() {
	var ck_name = /^[A-Za-z0-9 ]{1,50}$/;
	var errors = [];
	if (!ck_name.test(ime)) {
		alert("\nUnesite svoje ime i prezime!");
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
function ispravnostOpcine() {
	
		var req = new XMLHttpRequest();
		
		req.onreadystatechange = function() {

			if (ajax.readyState == 4 && ajax.status == 200)
            			document.getElementById("Upisi").innerHTML = ajax.responseText;

        		if (ajax.readyState == 4 && ajax.status == 404)
            			document.getElementById("Upisi").innerHTML = ime;
		}
		
		ajax.open("GET", "http://zamger.etf.unsa.ba/wt/mjesto_opcina.php" + opcina + mjesto, true);
    	ajax.send();
		
		return false;
}