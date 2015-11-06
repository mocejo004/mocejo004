<?php
$link = mysql_connect('localhost', 'root', 'root')
    or die('Ezin isan da konektatu: ' . mysql_error());
	
mysql_select_db('QUIZ') or die('Ezin izan da datu basera konektatu.');

	$galdera=$_GET["galdera"];
	$erantzuna=$_GET["erantzuna"];
	$zailtasuna=$_GET["zailtasuna"];
	$gaia=$_GET["gaia"];
	$eposta=$_COOKIE["logeatutakoErab"];
	$sql="INSERT INTO GALDERA(Galdera,Erantzuna,Zailtasuna,Eposta) VALUES('$galdera','$erantzuna','$zailtasuna','$eposta')";
		$result=mysql_query($sql);
		if(!$result){
			echo'Konstultak huts egin du: ' . mysql_error();
		}else{
			$galderak= simplexml_load_file('galderak.xml');
					$galdera= $galderak->addChild('assessmentItem');
					$galdera->addAttribute('complexity', $zailtasuna);
					$galdera->addAttribute('subject', $gaia);
					$itemBody=$galdera->addChild('itemBody');
					$itemBody->addChild('p', $galdera);
					$correctResponse=$galdera->addChild('correctResponse');
					$correctResponse->addChild('value', $erantzuna);
					echo $galderak->asXML('galderak.xml');
					echo "<br/>Ondo txertatu da XML fitxategian eta datu basean";
		}

mysql_close($link);
?>
