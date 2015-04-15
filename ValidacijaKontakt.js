var ck_name = /^[A-Za-z0-9 ]{1,50}$/;
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