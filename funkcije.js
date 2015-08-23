
 function pozovi(stranica){
                  var ajax = new XMLHttpRequest();
                  ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("sredina").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.innerHTML = stranica.toString();
                }
                if(stranica == 'novosti'){
                    ajax.open("GET", "novosti.php", true);
                    ajax.send();
                }
                if(stranica == 'galerija'){
                    ajax.open("GET", "Galerija.html", true);
                    ajax.send();
                }
                 if(stranica == 'ankete'){
                    ajax.open("GET", "Ankete.html", true);
                    ajax.send();
                }
                 if(stranica == 'dokumenti'){
                    ajax.open("GET", "Dokumenti.html", true);
                    ajax.send();
                    createTable();
                }
                 if(stranica == 'kontakt'){
                    ajax.open("GET", "Kontakt.html", true);
                    ajax.send();
                }
                 if(stranica == 'gdjesmo'){
                    ajax.open("GET", "KontaktAJAX.html", true);
                    ajax.send();
                }
               return  false;
            }


function createTable() {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var tb = JSON.parse(ajax.responseText);
            create(tb);
        }
        if (ajax.readyState == 4 && ajax.status == 404) {
            alert(ajax.responseText);
        }

    }
    ajax.open("GET", 'http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16390', true);
    ajax.send();
}
function create(tb) {
    var t = "<table class='tabela'> <tr><td><input type='button' onclick=pomocna('dodavanje')  value='Dodaj proizvod'> </td><td>"+ 
                "<input type='button' onclick=pomocna('promjena') value='Promijeni'> </td><td>" +
                "<input type='button' onclick=pomocna('brisanje') value='Briši'></td></tr></table>";
    t += '<table id="proizvodi"> <tr><th>Id</th><th>Naziv</th><th>Slika</th></tr>';

    t += "<tr><td><input id='id'></td><td><input id='naziv'></td><td><input id='slika' type='file'></td></tr>"
    for (i = 0; i < tb.length; i++)
        t += "<tr><td>" + tb[i].id + "</td> <td>" + tb[i].naziv + "</td><td>" + tb[i].slika + "</td></tr>";
    t += '</table>';
    document.getElementById("createTable").innerHTML = t;
}

function pomocna(ver) {
    var temp = {
        id: parseInt(document.getElementById('id').value),
        naziv: document.getElementById('naziv').value,
        slika: "image"
    };
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200)
            createTable();
        if (ajax.readyState == 4 && ajax.status == 404)
            alert(ajax.responseText.toString());
    }
    ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php", true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("pomocna=" + ver + "&brindexa=16390&proizvod=" + JSON.stringify(temp));
}


