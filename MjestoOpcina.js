

function MjestoOpcina()
;
	var opcina = document.getElementById("opcina").value;
	var mjesto = document.getElementById("mjesto").value;

	console.log(ime);
 	var ajax = new XMLHttpRequest();
    		ajax.onreadystatechange = function() {
        		if (ajax.readyState == 4 && ajax.status == 200)
            			document.getElementById("Upisi").innerHTML = ajax.responseText;

        		if (ajax.readyState == 4 && ajax.status == 404)
            			document.getElementById("Upisi").innerHTML = ime;
    }
    			ajax.open("GET", "http://zamger.etf.unsa.ba/wt/mjesto_opcina.php" + opcina + mjesto, true);
    			ajax.send();

	return false;
}


