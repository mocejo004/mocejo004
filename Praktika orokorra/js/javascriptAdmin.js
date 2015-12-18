
function onartuErabiltzaile(eposta){

	XMLHttpRequestObject = new XMLHttpRequest();
	XMLHttpRequestObject.onreadystatechange = function()
	{
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 ))
		{
			document.getElementById(eposta).innerHTML=XMLHttpRequestObject.responseText;
		}
	}
	XMLHttpRequestObject.open("GET","onartuErabiltzaile.php?eposta="+eposta, true);
	XMLHttpRequestObject.send();
}

function baztertuErabiltzaile(eposta){

	XMLHttpRequestObject = new XMLHttpRequest();
	XMLHttpRequestObject.onreadystatechange = function()
	{
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 ))
		{
			document.getElementById(eposta).innerHTML=XMLHttpRequestObject.responseText;
		}
	}
	XMLHttpRequestObject.open("GET","ezabatuErabiltzaile.php?eposta="+eposta, true);
	XMLHttpRequestObject.send();
}

function ezabatuArgazkia(id){
	
	XMLHttpRequestObject = new XMLHttpRequest();
	XMLHttpRequestObject.onreadystatechange = function()
	{
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 ))
		{
			document.getElementById(id).innerHTML=XMLHttpRequestObject.responseText;
		}
	}
	XMLHttpRequestObject.open("GET","ezabatuArgazki.php?id="+id, true);
	XMLHttpRequestObject.send();
	
}
/*
setInterval(function(){
	XMLHttpRequestObject = new XMLHttpRequest();
	XMLHttpRequestObject.onreadystatechange = function()
	{
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 ))
		{
			document.getElementById("momentukoTaldeKop").innerHTML=XMLHttpRequestObject3.responseText;
		}
	}

		XMLHttpRequestObject.open("GET","taldeKop.php", true);
		XMLHttpRequestObject.send();
}, 5000);
*/