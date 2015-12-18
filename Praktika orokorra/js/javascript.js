function bilatu(){
	var balioa= document.getElementById("bilaketaTextua").value;
	var divs=document.getElementById('argazkiTaula').getElementsByTagName('div');

	var count=0;
	
	if(balioa==''){
		
		for(var i=0;i<divs.length;i++){
			divs[i].style.display="block";
		}
		
	}else{
		
		for(var i=0;i<divs.length;i++){
			if( divs[i].id != balioa){
				count++;
				divs[i].style.display="none";
			}
		}
		
		if(count==divs.length){
			alert('Ez da aurkitu izen hori duen argazkirik!');
			for(var i=0;i<divs.length;i++){
				divs[i].style.display="block";
			}
		}
		
	}
}

function bilatuPublikoak(){

	XMLHttpRequestObject2 = new XMLHttpRequest();
	XMLHttpRequestObject2.onreadystatechange = function()
	{
		if ((XMLHttpRequestObject2.readyState==4)&&(XMLHttpRequestObject2.status==200 ))
		{
			document.getElementById("argazkiTaula").innerHTML=XMLHttpRequestObject2.responseText;
		}
	}
	XMLHttpRequestObject2.open("GET","argazkiaLortuAjax.php?kategoria=publikoa&jabea= ", true);
	XMLHttpRequestObject2.send();
}



function baimenaAldatu(baimena, id){

	XMLHttpRequestObject2 = new XMLHttpRequest();
	XMLHttpRequestObject2.onreadystatechange = function()
	{
		if ((XMLHttpRequestObject2.readyState==4)&&(XMLHttpRequestObject2.status==200 ))
		{
			document.getElementById("button"+id).innerHTML=XMLHttpRequestObject2.responseText;
		}
	}
	XMLHttpRequestObject2.open("GET","baimenaAldatu.php?baimena="+baimena+"&id="+id, true);
	XMLHttpRequestObject2.send();
		
}



