<?php
$link = mysql_connect('localhost', 'root', 'root')
    or die('Ezin isan da konektatu: ' . mysql_error());
	
mysql_select_db('QUIZ') or die('Ezin izan da datu basera konektatu.');

	$sql="SELECT Galdera,Zailtasuna FROM GALDERA";
	$result=mysql_query($sql)or die('Consulta fallida: ' . mysql_error());;
	if(!$result){
			echo'Konstultak huts egin du: ' . mysql_error();
			echo'<br><span><a href="layout.html">Atzera bueltatu</a></span>';
	}else{
		while($lerro=mysql_fetch_array($result)){
			if($lerro['Zailtasuna']==0){
				$zailtasuna='Zehastu gabea';
			}else{
				$zailtasuna=$lerro['Zailtasuna'];
			}
			$imp= "<br>Galdera:" . $lerro['Galdera'] . '</br><br>Zailtasuna:' .$zailtasuna. '</br>';
			echo $imp;
			echo "------------------------------------------";
		}
	}
echo'<br><span><a href="layout.html"> Menu nagusira joan </a></span></br>';

mysql_close($link);
?>