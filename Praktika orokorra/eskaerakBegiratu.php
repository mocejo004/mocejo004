<?php
	$mysqli = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

	if ($mysqli->connect_errno) {
		printf("Falló la conexión: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$result =$mysqli->query("SELECT Eposta FROM ERABILTZAILEA WHERE Onartua=0");
	
	if (mysqli_num_rows($result) == 0)
		echo '<p style="color:green">Momentu honetan ez dago eskaerarik.</p>';
	else
	{
		while(list($eposta) = mysqli_fetch_row($result))
		{
			
			echo ' <tr id="'.$eposta.'">
                      <td>'.$eposta.'</td>
                      <td>
                             <button class="btn btn-success" onclick="onartuErabiltzaile(\''.$eposta.'\')">Onartu</button>&nbsp<button class="btn btn-danger" onclick="baztertuErabiltzaile(\''.$eposta.'\')">Baztertu</button>
                      </td>
                   </tr>';
		}
	}
?>