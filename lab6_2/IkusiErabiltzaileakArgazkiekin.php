<?php
$link = mysql_connect('localhost', 'root', 'root')
    or die('No se pudo conectar: ' . mysql_error());
	
mysql_select_db('QUIZ') or die('No se pudo seleccionar la base de datos');

$query = 'SELECT * FROM ERABILTZAILEA';
$result=mysql_query($query)or die('Consulta fallida: ' . mysql_error());
$count=0;
echo "<table BORDER=1>\n";
echo "\t\t<td>IZEN-ABIZENAK</td><td>EPOSTA</td><td>PASAHITZA</td><td>TELEFONO ZENBAKIA</td><td>ESPEZIALITATEA</td><td>TEKNOLOGIA ETA ERRAMINTAK</td><td>IRUDIA</td>\t</tr>\n";
while($erabiltzaile=mysql_fetch_assoc($result)) {
					$lerroa = "<tr><td>" . $erabiltzaile['IzenAbizenak'] . '</td> <td>' . $erabiltzaile['Eposta'] . '</td><td>' . $erabiltzaile['Pasahitza'] . '</td><td>';
					$lerroa = $lerroa . $erabiltzaile['Telefono'] . '</td> <td>' . $erabiltzaile['Ezpesialitatea'] . '</td><td>' . $erabiltzaile['comentarios'] . '</td><td>';
					$lerroa = $lerroa . '<img height="70" width="150" align="middle" src="ErakutziArgazkia.php?id='.$erabiltzaile['Eposta'].'"/>' . '</td></tr>';
					echo $lerroa;
}

echo "</table>\n";
echo'<br>Nahi baduzu,<span><a href="singnUp.html"> beste erabiltzaile bat erregistratu </a></span>ahal dezakezu, edo<span><a href="layout.html"> menu nagusira </a></span>joan ahal zara.';

mysql_free_result($result);
mysql_close($link);
?>