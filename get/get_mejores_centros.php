<?php 
require('funciones.php');
$arreglo=['CEN','CCH','CCM','CJP','CLE','CLV','CRM','CSM','CSR','CHN','CVL','ATE','CMN','CAR','CIX','CHR','CMS','CZC','CZ2','EAG','ICA','LVC','MGD','RMC','CLM','PTP','PHR','LN2','SJL','SMP','SLN','SRQ','TCN','TRP','TMB','VES','VMT','NVC'];
$r= array(sizeof($arreglo));
for ($i=0; $i < sizeof($arreglo) ; $i++) { 
	$r[$i]= array(2);
}


for ($i=0; $i < sizeof($arreglo) ; $i++) { 

	$sq="select url_dependencia,port_dependencia from hospitales where id_dependencia='".strtoupper($arreglo[$i])."'";
	$cn=con();
	$rs=pg_query($cn,$sq);
	$wsdl=pg_fetch_result($rs,0,'url_dependencia').':'.pg_fetch_result($rs,0,'port_dependencia').'/sisol/ws_grant_sales_by_day.php';
	ini_set("default_socket_timeout ", 8);
	$client=new nusoap_client($wsdl);
	$param=array('vdate'=>$_GET['txtdate'],'vdate_end'=>$_GET['txtdate_end'],'vfp'=>'0,1,2,4,5');
	$response = $client->call($_GET['method'],$param);
	if($client->fault) {  
		echo "FAULT: <p>Code: (".$client->faultcode.")</p>";  
		echo "String: ".$client->faultstring;  
		exit();
	} 
	$r[$i][0]=$arreglo[$i];
	$r[$i][1]=$response;
}

echo json_encode($r);
?>
