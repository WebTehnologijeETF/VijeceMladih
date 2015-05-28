function izmijeniNovost(id) {
	naslov= $("[name='"+id+"naslov']").html();
	$("[name='naslov']").val(naslov);
	
	tekst= $("[name='"+id+"tekst']").html();
	$("[name='tekst']").html(tekst);

	$("[name='id']").val(id);
}