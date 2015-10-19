<?php
$link = mysql_connect('localhost', 'root', 'root')
    or die('Ezin isan da konektatu: ' . mysql_error());
	
mysql_select_db('QUIZ') or die('Ezin izan da datu basera konektatu.');
$Eposta=$_POST["Eposta"];

	$IzenAbizenak=$_POST["IzenAbizenak"];
	$Pasahitza=$_POST["Pasahitza"];
	$Telefono=$_POST["Telefono"];
	$Espezialitatea=$_POST["Espezialitatea"];
	if(strcmp($Espezialitatea,"Besterik")==0){
		$Espezialitatea=$_POST["besterik2"];
	}
	$img_edukia_egokituta="";
	$img_type=$_FILES["argazkia"]['type'];
	if (((strpos($img_type, "bmp") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))){
		$img_name=$_FILES["argazkia"]['tmp_name'];
		$img_edukia=file_get_contents($img_name);
		$img_edukia_egokituta=mysql_real_escape_string($img_edukia);
	
	}
	$comentarios=$_POST["comentarios"];
	if ((!filter_var($Eposta,FILTER_VALIDATE_REGEXP,
		array("options"=>array("regexp"=>"/^[a-z]{1,}\d{3}@ikasle\.ehu\.(eus|es)$/"))) === false) && (!filter_var($Pasahitza,FILTER_VALIDATE_REGEXP,
		array("options"=>array("regexp"=>"/^.{6,}$/"))) === false)&& (!filter_var($Telefono,FILTER_VALIDATE_REGEXP,
		array("options"=>array("regexp"=>"/^[0-9]{9}$/"))) === false)&& (!filter_var($IzenAbizenak,FILTER_VALIDATE_REGEXP,
		array("options"=>array("regexp"=>"/^[A-Z]{1}[a-z]{1,}\s[A-Z]{1}[a-z]{1,}\s[A-Z]{1}[a-z]{1,}$/"))) === false)) {
			echo("Datuen formatua onartu egin da<br>");
		$sql="INSERT INTO ERABILTZAILEA(IzenAbizenak,Eposta,Pasahitza,Telefono,Ezpesialitatea,comentarios,img) VALUES('$IzenAbizenak','$Eposta','$Pasahitza','$Telefono','$Espezialitatea','$comentarios','$img_edukia_egokituta')";
	
		$result=mysql_query($sql);
		if(!$result){
			echo'Konstultak huts egin du: ' . mysql_error();
			echo'<br><span><a href="singnUp.html">Atzera bueltatu</a></span>';
		}else{
			echo'Dena ondo joan da, nahi baduzu<span><a href="IkusiErabiltzaileakArgazkiekin.php"> erabiltzaile lista </a></span>ikus dezakezu.';
		}
	}else{
		echo("Datuen formatua ez da onartu, beraz ez dira datuak gorde.<br>");
		echo'<br><span><a href="singnUp.html">Atzera bueltatu</a></span>';
	}

mysql_close($link);
?>

