<?php
require('assets/plugins/nusoap/lib/nusoap.php');
//FUNCIONES DE CONEXION------------------------------------------------------------------------------
function get_dependencia($dependencia){
	$sq="select url_dependencia,port_dependencia from hospitales where id_dependencia='".strtoupper($dependencia)."'";
	$cn=con();
	$rs=pg_query($cn,$sq);
	return $rs;
}
function get_datos_anio($dependencia,$anio){
	$sq="select url_dependencia,port_dependencia from hospitales where id_dependencia='".strtoupper($dependencia)."'";
	$cn=con();
	$rs=pg_query($cn,$sq);
	$wsdl=pg_fetch_result($rs,0,'url_dependencia').':'.pg_fetch_result($rs,0,'port_dependencia').'/sisol/ws_grant_sales_by_day.php';
	ini_set("default_socket_timeout", 8);
	$client=new nusoap_client($wsdl);

	for ($i=1; $i <=12 ; $i++) {
		$fday=date("d/m/Y", mktime(0,0,0,$i, 1, $anio));
		$lday=date("d/m/Y", mktime(0,0,0,$i+1, 0, $anio));
		$param=array('vdate'=>$fday,'vdate_end'=>$lday,'vfp'=>'0,1,2,4,5');
		$response = $client->call('get_grant_sales_by_day',$param);
		if($client->fault) {
			echo "FAULT: <p>Code: (".$client->faultcode.")</p>";
			echo "String: ".$client->faultstring;
			exit();
		}
		$r[$i-1]=(int)$response[0]["total"];

	};
	return $r;
}
function get_venta_rs($dependencia,$txtdate,$txtdate_end){
	$sq="select url_dependencia,port_dependencia from hospitales where id_dependencia='".strtoupper($dependencia)."'";
	$cn=con();
	$rs=pg_query($cn,$sq);
	$wsdl=pg_fetch_result($rs,0,'url_dependencia').':'.pg_fetch_result($rs,0,'port_dependencia').'/sisol/ws_grant_sales_by_day.php';
	ini_set("default_socket_timeout", 8);
	$client=new nusoap_client($wsdl);
	$param=array('vdate'=>$txtdate,'vdate_end'=>$txtdate_end,'vfp'=>'0,1,2,4,5');
	$response = $client->call('get_grant_sales_by_day',$param);
$proxy = $client->getProxy();

$start = time(); // starting the timer

$timing = time() - $start; // calculating the transaction time

if($timing > 30 ){
return 0;
exit();
}




	if($client->fault) {
		echo "FAULT: <p>Code: (".$client->faultcode.")</p>";
		echo "String: ".$client->faultstring;
		exit();
	}
	$r=(int)$response[0]["total"];
	return $r;
}
function get_atenciones_rs($dependencia,$txtdate,$txtdate_end){
	$sq="select url_dependencia,port_dependencia from hospitales where id_dependencia='".strtoupper($dependencia)."'";
	$cn=con();
	$rs=pg_query($cn,$sq);
	$wsdl=pg_fetch_result($rs,0,'url_dependencia').':'.pg_fetch_result($rs,0,'port_dependencia').'/sisol/ws_grant_sales_by_day.php';
	ini_set("default_socket_timeout", 8);
	$client=new nusoap_client($wsdl);
	$param=array('vdate'=>$txtdate,'vdate_end'=>$txtdate_end,'vfp'=>'0,1,2,4,5');
	$response = $client->call('get_grant_sales_by_day',$param);

$proxy = $client->getProxy();

$start = time(); // starting the timer
$payTrans = $proxy->doPayment(array('someparams' => 'somevalues'));
$timing = time() - $start; // calculating the transaction time

if($timing > 30 ){
return 0;
exit();
}

	if($client->fault) {
		echo "FAULT: <p>Code: (".$client->faultcode.")</p>";
		echo "String: ".$client->faultstring;
		exit();
	}
	$r=(int)$response[0]["atenciones"];
	return $r;
}
//---------------------------------------------------------------------------------------------------






?>
