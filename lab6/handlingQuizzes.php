<?php 
	if (isset($_POST['ikusi'])){
		$galdera=$_POST['galdera'];
		$erantzuna=$_POST['erantzuna'];
		$zailtasuna=$_POST['zailtasuna'];
		header('Location:galderakErakutzi.php');
	}
	if (isset($_POST['irten'])){		
		setcookie("logeatutakoErab","", time() - 3600);
		setcookie("KonexioId","", time() - 3600);
		header("Location:Login.php");
	}
?>
<!doctype HTML>
<html> 
<head>
<script type="text/javascript" language = "javascript">
XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function()
{
	alert(XMLHttpRequestObject.readyState);
	if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 ))
	{
		document.getElementById("txtHint").innerHTML=XMLHttpRequestObject.responseText;
	}
}

function galderakIkusi(){
	XMLHttpRequestObject.open("GET","galderakIkusi.php", true);
	XMLHttpRequestObject.send();
}

XMLHttpRequestObject2 = new XMLHttpRequest();
XMLHttpRequestObject2.onreadystatechange = function()
{
	alert(XMLHttpRequestObject2.readyState);
	if ((XMLHttpRequestObject2.readyState==4)&&(XMLHttpRequestObject2.status==200 ))
	{
		document.getElementById("txtHint2").innerHTML=XMLHttpRequestObject2.responseText;
	}
}

function galderakGorde(){
	var galdera=document.getElementById("galdera").value;
	var erantzuna=document.getElementById("erantzuna").value;
	var zailtasuna=document.getElementById("zailtasuna").value;
	var gaia=document.getElementById("gaia").value;
	XMLHttpRequestObject2.open("GET","probaGordeAjax.php?galdera="+galdera+"&erantzuna="+erantzuna+"&zailtasuna="+zailtasuna+"&gaia="+gaia, true);
	XMLHttpRequestObject2.send();

}
</script></head>
</head>
<body>
<form  action="" id="galderaSartu" name="galderaSartu" method="post" enctype="multipart/form-data">
galdera: <br/>
<textarea name="galdera" id="galdera" rows="5" cols="40"></textarea><br/>
<br/>
erantzuna:<br/> <input name="erantzuna" id="erantzuna" size="80"></textarea><br/>
<br/>
<br/>
Gaia:<br/> <input name="gaia" id="gaia" size="80"></textarea><br/>
<div>
zailtazun maila (1 eta 5 artean):&nbsp
<select type="text" name="zailtasuna" id="zailtasuna">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>

</select>
<br/>
<br/><span id="balioa"></span>
</div>
<input type="button" name="galderaGord" value="Gorde" onclick="galderakGorde()">
<br><input type="button" name="galderakIkus" value="Nire Galderak ikusi" onclick="galderakIkusi()">
<br><input type="submit" name="irten"  value="Irten" />
</form>
<div id="txtHint" style="background-color:#99FF66;">
<p>Nik igotako galderak hemen agertuko dira...</p>
</div>
<div id="txtHint2" style="background-color:#FE2E2E;">
<p>Nik igotako galdera ondo gorde da...</p>
</div>
</body></html>