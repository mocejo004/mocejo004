<?php
$linki=new mysqli ("localhost","root","root","QUIZ");
if($linki->connect_errno){
	echo "errorea konektatzean";
}else{
	$eposta=$_COOKIE["logeatutakoErab"];
	$sqli ="SELECT * FROM GALDERA WHERE Eposta='$eposta'";
	$result=$linki->query($sqli);
	if(!($result)){
		echo "Errorea sqlin.";
	}else{
		while($row=$result->fetch_assoc()){
			echo '<tr>'.$row['Galdera'].'</tr><br>';
			echo '<tr>-------------------------------</tr><br>';
		}	
	}
	
}