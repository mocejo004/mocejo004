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
	$sql="INSERT INTO ERABILTZAILEA(IzenAbizenak,Eposta,Pasahitza,Telefono,Ezpesialitatea,comentarios,img) VALUES('$IzenAbizenak','$Eposta','$Pasahitza','$Telefono','$Espezialitatea','$comentarios','$img_edukia_egokituta')";

	$result=mysql_query($sql);
	if(!$result){
		echo'Konstultak huts egin du: ' . mysql_error();
		echo'<br><span><a href="singnUp.html">Atzera bueltatu</a></span>';
	}else{
		echo'Dena ondo joan da, nahi baduzu<span><a href="IkusiErabiltzaileakArgazkiekin.php"> erabiltzaile lista </a></span>ikus dezakezu.';
	}


mysql_close($link);
?>

