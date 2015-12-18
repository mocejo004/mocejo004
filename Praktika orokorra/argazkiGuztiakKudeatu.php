<?php
	$mysqli = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

	if ($mysqli->connect_errno) {
		printf("Falló la conexión: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$result =$mysqli->query("SELECT Argazkia,Izena,Eposta,Kategoria,Id FROM ARGAZKIA");
	
	if (mysqli_num_rows($result) == 0)
		echo '<p style="color:green">Momentu honetan ez dago argazkirik.</p>';
	else
	{
		while(list($argazkia, $izena, $eposta, $kategoria ,$id) = mysqli_fetch_row($result))
		{
			
			echo  '<div class="col-lg-6 col-md-4 col-xs-6 thumb" style="padding: 50px 30px 50px 80px;" id="'.$id.'">
                                <a class="thumbnail" href="#">
                                    <img class="img-responsive" src="data:image/jpeg;base64,'.base64_encode( $argazkia ).'" >
                                </a>
								<b>Izena:</b>'. $izena.'</br>
								<b>Erabiltzailea:</b> '.$eposta.'</br>
								<b>Kategoria:</b>'. $kategoria.'</br></br>

                                <button class="btn btn-danger btn-sm" onclick="ezabatuArgazkia(\''.$id.'\')">Ezabatu</button>
                  </div>';
		}
	}
?>