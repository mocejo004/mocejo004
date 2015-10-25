<?php 
	if (isset($_POST['ikusi'])){
		$galdera=$_POST['galdera'];
		$erantzuna=$_POST['erantzuna'];
		$zailtasuna=$_POST['zailtasuna'];
		header('Location:galderakErakutzi.php');
	}
	if (isset($_POST['irten'])){		
		setcookie("logeatutakoErab","", time() - 3600);
		setcookie("KonexioId","", time() - 3600);
		header("Location:Login.php");
	}
	if(isset($_POST['bidali'])){
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
		if(count($_COOKIE)==2) {
			$eposta=$_COOKIE["logeatutakoErab"];		
			$KonexioId=$_COOKIE["KonexioId"];
		}else{
			$eposta="";
			$KonexioId=0;
		}
		$ekintzaMota="Galdera txertatu";
		$sql="INSERT INTO EKINTZA(KonexioId,Eposta,EkintzaMota,Ip) VALUES('$KonexioId','$eposta','$ekintzaMota','$ipc')";	
		$result=mysql_query($sql);
		if(!$result){
			echo'Konstultak huts egin du: ' . mysql_error();
		}
		$galdera=$_POST["galdera"];
		$erantzuna=$_POST["erantzuna"];
		$zailtasuna=$_POST["zailtasuna"];
		$eposta=$_COOKIE["logeatutakoErab"];
		$sql="INSERT INTO GALDERA(Galdera,Erantzuna,Zailtasuna,Eposta) VALUES('$galdera','$erantzuna','$zailtasuna','$eposta')";
		$result=mysql_query($sql);
		if(!$result){
			echo'Konstultak huts egin du: ' . mysql_error();
			echo'<br><span><a href="InsertQuestion.php">Atzera bueltatu</a></span>';
		}else{
			echo'<a>Galdera ondo gorde da</a><br>';
		}

	mysql_close($link);
	}
?>	
<!Doctype html>	
<html>
<head>
<title></title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
</head>
<body>
<form  action="" id="galdera" name="galdera" method="POST" enctype="multipart/form-data">
Galdera: <br/>
<textarea name="galdera" rows="5" cols="40"></textarea><br/>
<br/>
Erantzuna:<br/> <input name="erantzuna" size="80"></textarea><br/>
<br/>
<div>
Zailtazun maila (1 eta 5 artean):&nbsp
<select type="text" name="zailtasuna" >
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>

</select>
<br/>
<br/><span id="balioa"></span>
</div>
<input type="submit" name="bidali" value="Bidali" />
<br><input type="submit" name="ikusi" value="Galderak ikusi" />
<br><input type="submit" name="irten"  value="Irten" />
</form>
</body>
</html>
