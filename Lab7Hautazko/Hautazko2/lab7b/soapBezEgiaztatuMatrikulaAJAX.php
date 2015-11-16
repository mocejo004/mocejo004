<?php
require_once('/lib/nusoap.php');
require_once('/lib/class.wsdlcache.php');

$soapclient = new nusoap_client('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl',true);
$err = $soapclient->getError();
if ($err) {
 echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}
$eposta=$_GET['eposta'];
$result = $soapclient->call('comprobar',array( 'x'=>$eposta));
if ($result=='NO'){
	echo 'Eposta ez dago erregistratuta';
}
else if($result=='SI'){
	echo 'Eposta erregistratuta dago';
}else{
$err = $soapclient->getError();
 if ($err) {
  echo '<h2>Error</h2><pre>' . $err . '</pre>';
 }
}

?>