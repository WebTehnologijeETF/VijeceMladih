function prikazi(ref) {
	var meni = ref.children[0];
	if(meni.style.display=="block")
	{
		meni.style.display="none";
	}
	else
	{
		meni.style.display="block";
	}
	//console.log(ref.innerHTML);
}