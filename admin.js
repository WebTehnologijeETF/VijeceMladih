function izmijeniNovost(id) {
	naslov= $("[name='"+id+"naslov']").html();
	$("[name='naslov']").val(naslov);
	
	tekst= $("[name='"+id+"tekst']").html();
	$("[name='tekst']").html(tekst);

	$("[name='id']").val(id);
}

function obrisiKomentar(id) {
	autor= $("[name='"+id+"autor']").html();
	$("[autor='autor']").val(autor);
	
	/*tekst= $("[name='"+id+"tekst']").html();
	$("[name='tekst']").html(tekst);

	email= $("[name='"+id+"email']").html();
	$("[name='email']").html(tekst);*/

	$("[name='id']").val(id);
}