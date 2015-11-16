<?php
require_once('/lib/nusoap.php');
require_once('/lib/class.wsdlcache.php');

$soapclient = new nusoap_client('http://localhost:8080/wsp/lab7b/konprobatuPasahitza.php?wsdl',true);
$err = $soapclient->getError();
if ($err) {
 echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}
$pasahitza=$_GET['pasahitza'];
$result = $soapclient->call('konprobatu',array( 'x'=>$pasahitza));
if ($result=='BALIOGABEA'){
	echo 'Pasahitza ez da fidagarria';
}
else if($result=='BALIOZKOA'){
	echo 'Pasahitza fidagarria';
}else{
	$err = $soapclient->getError();
 if ($err) {
  echo '<h2>Error</h2><pre>' . $err . '</pre>';
 }
	echo 'Arazoak';
}
?>