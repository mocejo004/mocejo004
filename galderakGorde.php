<?php
$link = mysql_connect('localhost', 'root', 'root')
    or die('Ezin isan da konektatu: ' . mysql_error());
	
mysql_select_db('QUIZ') or die('Ezin izan da datu basera konektatu.');

	$galdera=$_POST["galdera"];
	$erantzuna=$_POST["erantzuna"];
	$zailtasuna=$_POST["zailtasuna"];
	$eposta=$_COOKIE["logeatutakoErab"];
	$sql="INSERT INTO GALDERA(Galdera,Erantzuna,Zailtasuna,Eposta) VALUES('$galdera','$erantzuna','$zailtasuna','$eposta')";
		$result=mysql_query($sql);
		if(!$result){
			echo'Konstultak huts egin du: ' . mysql_error();
			echo'<br><span><a href="InsertQuestion.html">Atzera bueltatu</a></span>';
		}else{
			echo'Dena ondo joan da,beste galdera bat geitu nahi baduzu<span><a href="InsertQuestion.html"> klikatu hemen</a></span>, eta irten nahi baduzu <span><a href="Login.php"> klikatu hemen</a></span>.';
		}

mysql_close($link);
?>
