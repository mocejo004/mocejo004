<?php
	$link = mysql_connect('localhost', 'root', 'root')
    or die('Ezin isan da konektatu: ' . mysql_error());
	
	mysql_select_db('QUIZ') or die('Ezin izan da datu basera konektatu.');

	function lortuIp(){
		if ( isset($_SERVER["REMOTE_ADDR"]) )    { 
			$ip=$_SERVER["REMOTE_ADDR"]; 
		} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    { 
			$ip=$_SERVER["HTTP_X_FORWARDED_FOR"]; 
		} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    { 
			$ip=$_SERVER["HTTP_CLIENT_IP"]; 
		}
		return $ip;
	}	
		$ipc=lortuIp();
		$eposta="";
		if(isset($_COOKIE["logeatutakoErab"])){
			$eposta=$_COOKIE["logeatutakoErab"];
		}
		$Id=0;
		if(isset($_COOKIE["KonexioId"])){
			$Id=$_COOKIE["KonexioId"];
		}
		$ekintzaMota="Galderak ikusi";
		$sql="INSERT INTO EKINTZA(KonexioId,Eposta,EkintzaMota,Ip) VALUES('$Id','$eposta','$ekintzaMota','$ipc')";
		$result=mysql_query($sql);
		if(!$result){
			echo'Konstultak huts egin du: ' . mysql_error();
		}
		
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
if(isset($_COOKIE["logeatutakoErab"])){
		echo'<br><span><a href="InsertQuestion.php">Atzera bueltatu </a></span></br>';
}else{
	echo'<br><span><a href="layout.html"> Menu nagusira joan </a></span></br>';
}
mysql_close($link);
?>