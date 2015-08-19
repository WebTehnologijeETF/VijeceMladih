/*

function MjestoOpcina()
;
    var opcina = document.getElementById("opcina").value;
	var mjesto = document.getElementById("mjesto").value;

	console.log(ime);
 	var ajax = new XMLHttpRequest();
    		ajax.onreadystatechange = function() {
        		if (ajax.readyState == 4 && ajax.status == 200)
                {
            			document.getElementById("Upisi").innerHTML = ajax.responseText;
                }
        		if (ajax.readyState == 4 && ajax.status == 404)
            			document.getElementById("Upisi").innerHTML = ime;
    }
    			ajax.open("GET", "http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina=" + opcina+"&mjesto=" + mjesto, true);
    			ajax.send();

	return false;
}
*/

function MjestoOpcina() {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        var odgovor = JSON.parse(ajax.responseText);
                        if (odgovor.hasOwnProperty('greska')) {
                            alert(odgovor.greska);
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