

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

function potvrdi(id) {
    noviId =  document.getElementById("id"+id).value;
    naziv=document.getElementById("naziv"+id).value;
    slika=document.getElementById("slika"+id).value;

    var temp = {
        id: parseInt(noviId),
        naziv: naziv,
        slika: slika
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
    ajax.send("pomocna=" + "promjena" + "&brindexa=16390&proizvod=" + JSON.stringify(temp));

    t="<td id=id"+noviId+">" + noviId + "</td> <td id=naziv"+noviId+">" + naziv + "</td><td id=slika"+noviId+">" + slika + "</td><td><input type='button' onclick=promijeni("+noviId+") value='Promijeni'> </td><td><input type='button' onclick=brisi("+noviId+") value='Briši'> </td>";
    document.getElementById("red"+id).innerHTML=t;
    document.getElementById("red"+id).setAttribute("id", "red"+noviId);
}

function promijeni(id) {
    t="<td ><input id=id"+id+" type='text'></td> <td><input id=naziv"+id+" type='text'></td><td><input id=slika"+id+" type='text'></td><td><input type='button' onclick=potvrdi("+id+") value='OK'> </td>";
    document.getElementById("red"+id).innerHTML=t;
}

function brisi(id) {
    document.getElementById("red"+id).remove();
}

function create(tb) {
    var t = "<table class='tabela'> <tr><td><input type='button' onclick=pomocna('dodavanje')  value='Dodaj proizvod'> </td><td>"+ 
                "</tr></table>";
    t += '<table id="proizvodi"> <tr><th>Id</th><th>Naziv</th><th>Slika</th></tr>';

    for (i = 0; i < tb.length; i++)
        t += "<tr id=red"+tb[i].id+"><td id=id"+tb[i].id+">" + tb[i].id + "</td> <td id=naziv"+tb[i].id+">" + tb[i].naziv + "</td><td id=slika"+tb[i].id+">" + tb[i].slika + "</td><td><input type='button' onclick=promijeni("+tb[i].id+") value='Promijeni'> </td><td><input type='button' onclick=brisi("+tb[i].id+") value='Briši'> </td></tr>";
    t += '</table>';
    document.getElementById("createTable").innerHTML = t;
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

createTable();