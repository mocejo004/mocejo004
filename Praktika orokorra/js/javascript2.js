
function erakutziBesteak(){
	var balioa=document.getElementById("album").value;
	if(balioa=="albumBerria"){
		document.getElementById("albumBerriaDiv").style.display="block";
	}else{
		document.getElementById("albumBerriaDiv").style.display="none";
	}
		
}

function ikustaraziAlbuma(){
	var balioa=document.getElementById("albumGuztiak").value;
	if(balioa!=''){
		XMLHttpRequestObject = new XMLHttpRequest();
		XMLHttpRequestObject.onreadystatechange = function()
		{
			if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 ))
			{
				document.getElementById("argazkiTaula").innerHTML=XMLHttpRequestObject.responseText;
			}
		}
		XMLHttpRequestObject.open("GET","ikustaraziAlbumekoArgazkiak.php?albuma="+balioa, true);
		XMLHttpRequestObject.send();
	}
}

function aldatuEgoera(egoeraBerria, jabea){
	
	if(egoeraBerria=='publikoa'){
		document.getElementById("pribatua").className="";
		document.getElementById("atzipenMugatua").className="";
		document.getElementById("publikoa").className="active";

	}else if(egoeraBerria=='pribatua'){
		document.getElementById("atzipenMugatua").className="";
		document.getElementById("publikoa").className="";
		document.getElementById("pribatua").className="active";

	}else if(egoeraBerria=='atzipenMugatua'){
		document.getElementById("pribatua").className="";
		document.getElementById("publikoa").className="";
		document.getElementById("atzipenMugatua").className="active";

	}
	
	onload(jabea);
}

function bilatuPribatuak(jabea){
	var balioa=document.getElementById("album").value;
	if(balioa=="albumBerria"){
		document.getElementById("albumBerriaDiv").style.display="block";
	}else{
		document.getElementById("albumBerriaDiv").style.display="none";
	}
		
	if(document.getElementById("publikoa").className =='active'){
		kategori='publikoa';
	}else if(document.getElementById("atzipenMugatua").className =='active'){
		kategori='atzipenMugatua';
	}else if(document.getElementById("pribatua").className =='active'){
		kategori='pribatua';
	}
	
	XMLHttpRequestObject = new XMLHttpRequest();
	XMLHttpRequestObject.onreadystatechange = function()
	{
		if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 ))
		{
			document.getElementById("argazkiTaula").innerHTML=XMLHttpRequestObject.responseText;
		}
	}
	XMLHttpRequestObject.open("GET","argazkiaLortuAjax.php?kategoria="+kategori+"&jabea="+jabea, true);
	XMLHttpRequestObject.send();
	
}