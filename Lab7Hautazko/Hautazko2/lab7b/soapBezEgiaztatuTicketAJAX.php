<?php
require_once('/lib/nusoap.php');
require_once('/lib/class.wsdlcache.php');

$soapclient = new nusoap_client('http://localhost:8080/wsp/lab7b/konprobatuTicket.php?wsdl',true);
$err = $soapclient->getError();
if ($err) {
 echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}
$ticket=$_GET['ticket'];
$result = $soapclient->call('ticket',array( 'x'=>$ticket));
if ($result==='BAIMENDUN ERABILTZAILEA'){
	echo 'Ticketa onartua';
}
else if($result=='BAIMENIK GABEKO ERABILTZAILEA'){
	echo 'Ticket-a ez dago sisteman';
}else{
	$err = $soapclient->getError();
 if ($err) {
  echo '<h2>Error</h2><pre>' . $err . '</pre>';
 }
	echo 'Arazoak';
}
?>