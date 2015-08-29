function dobaviNovosti(admin) {
    document.getElementById("content").innerHTML = "";
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var novost = JSON.parse(ajax.responseText);
            prikaziNovosti(novost, admin);
        }
        if (ajax.readyState == 4 && ajax.status == 404) {
            document.getElementById('content').innerHTML = '<p>Error</p>';
        }
    }
    ajax.open("GET", 'servis/novost.php?&id=' + id, true);
    ajax.send();
}


function dodajNovost(id) { 
    var novost = {
        naslov: document.getElementsByName("naslov")[0].value,
        tekst: document.getElementsByName("novost")[0].value,
        slika: document.getElementsByName("slika")[0].value
    }
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var rez = JSON.parse(ajax.responseText);
            if(id == null) {
                if (rez.OK == "OK") { alert("Dodano"); }
                else alert("Error"); 
            }else {
                if (rez.OK == "OK") { alert("Izmjenjeno"); }
                else alert("Error"); 
            }
        }
        if (ajax.readyState == 4 && ajax.status == 404) {
            document.getElementById('content').innerHTML = '<p>Error</p>';
        }

    }
        ajax.open("POST", "servis/novost.php", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send("naslov=" + novost.naslov + "&tekst=" + novost.tekst + "&slika=" + novost.slika);
}


function prikaziNovosti(novost, admin) { 
    for (i = 0; i < novost.length; i++) {
        dodajJednuNovost(novost[i], admin);
    }

}

function dodajJednuNovost(novost, admin) { 
    var element = document.createElement("div"); 
    element.setAttribute("class", "element");

    var id = document.createElement("input"); 
    id.setAttribute("type", "hidden");
    id.setAttribute("value", novost.id);

    var link = document.createElement("a"); 
    link.setAttribute("href", "#");
    link.setAttribute("onclick", "dobaviVijest(" + novost.id + "," + admin + ")");

    var naslov = document.createElement("h2"); 
    naslov.innerHTML = novost.naslov;

    var slika = document.createElement("img");
    slika.setAttribute("class", "slikaProizvoda");
    slika.setAttribute("src", novost.slika);
    slika.setAttribute("alt", novost.naslov);

    link.appendChild(naslov);
    link.appendChild(slika);
    element.appendChild(link);
    element.appendChild(id);

    if (admin == true) {

        var divAdmin = document.createElement("div");
        divAdmin.setAttribute("class", "divAdmin");


        var uredi = document.createElement("a");
        uredi.setAttribute("href", "#");
        uredi.setAttribute("onclick", "popuniPoljaZaUredit("+ novost.id +")");
        uredi.innerHTML = "Uredi";

        var brisi = document.createElement("a");
        brisi.setAttribute("href", "#");
        brisi.setAttribute("onclick", "brisiNovost(" + novost.id + ")");
        brisi.innerHTML = "Briši";
        divAdmin.appendChild(uredi);
        divAdmin.appendChild(brisi);
        element.appendChild(divAdmin);
    }

    document.getElementById("content").appendChild(element);
}

function popuniPoljaZaUredit(id) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var novost = JSON.parse(ajax.responseText);
            document.getElementsByName("naslov")[0].value = novost.naslov;
            document.getElementsByName("novost")[0].value = novost.tekst;
            document.getElementsByName("slika")[0].value = novost.slika;
            document.getElementsByName("btnSubmit")[0].value = "Uredi";
            document.getElementsByName("btnSubmit")[0].setAttribute("onclick", "dodajNovost(id)");
        }
        if (ajax.readyState == 4 && ajax.status == 404) {
            document.getElementById('ponuda').innerHTML = '<p> Desio se problem </p>';
        }
    }
    ajax.open("GET", 'servis/novost.php?&id=' + id, true);
    ajax.send();
}

function urediNovost(id) {
    dodajNovost(id);
}

function brisiNovost(id) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var rez = JSON.parse(ajax.responseText);
            if (rez.OK == "OK") { alert("Novost je obrisana"); }
            else alert("Problem brisanja");
        }
        if (ajax.readyState == 4 && ajax.status == 404) {
            document.getElementById('ponuda').innerHTML = '<p> Desio se problem </p>';
        }

    }
    ajax.open("DELETE", "servis/novost.php?id=" + id, true);
    ajax.send();
}