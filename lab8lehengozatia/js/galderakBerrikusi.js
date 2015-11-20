function gordeAldaketak(id){
	var galdera=document.getElementById(id+"Galdera").value;
	var zailtasuna=document.getElementById(id+"Zailtasuna").value;
	var erantzuna=document.getElementById(id+"Erantzuna").value;
	
	XMLHttpRequestObject = new XMLHttpRequest();
	XMLHttpRequestObject.onreadystatechange = function()
	{
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 ))
		{
			document.getElementById(id+"div").innerHTML=XMLHttpRequestObject.responseText;
		}
	}

	XMLHttpRequestObject.open("GET","gordeAldaketak.php?Galdera="+galdera+"&Zailtasuna="+zailtasuna+"&Erantzuna="+erantzuna+"&Id="+id, true);
	XMLHttpRequestObject.send();
}
function bakarrikZenbakiak(e){
	tekla = (document.all) ? e.keyCode : e.which;
    if (tekla==8){
        return true;
    }
    var er =new RegExp("[1-5]");
    teklaFinala = String.fromCharCode(tekla);
    return er.test(teklaFinala);
}