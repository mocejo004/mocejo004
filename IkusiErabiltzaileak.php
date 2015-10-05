<?php
$link = mysql_connect('localhost', 'root', 'root')
    or die('No se pudo conectar: ' . mysql_error());
	
mysql_select_db('QUIZ') or die('No se pudo seleccionar la base de datos');

$query = 'SELECT * FROM ERABILTZAILEA';
$result=mysql_query($query)or die('Consulta fallida: ' . mysql_error());

echo "<table BORDER=1>\n";
echo "\t\t<td>IZEN-ABIZENAK</td><td>EPOSTA</td><td>PASAHITZA</td><td>TELEFONO ZENBAKIA</td><td>ESPEZIALITATEA</td><td>TEKNOLOGIA ETA ERRAMINTAK</td>\t</tr>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
echo'<br>Nahi baduzu,<span><a href="singnUp.html"> beste erabiltzaile bat erregistratu </a></span>ahal dezakezu, edo<span><a href="layout.html"> menu naguzira </a></span>joan ahal zara.';

mysql_free_result($result);
mysql_close($link);
?>