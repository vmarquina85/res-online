<?php
class conectar
{
function conexion_resumen(){
$pconnect=pg_connect("host=192.168.1.95 port=5432 dbname=summary user=usredo password=usredo");
// $pconnect=pg_connect("host=10.10.10.4 port=5432 dbname=summary user=webserver password=W38Serv3R879*-$");
	if (!$pconnect)
	   return "fracaso";
	else
	   return $pconnect;
}
function conexion_resumen_prueba(){
// $pconnect=pg_connect("host=10.10.10.4 port=5432 dbname=summary user=usredo password=usredo");
 $pconnect=pg_connect("host=10.10.10.4 port=5432 dbname=summary user=webserver password=W38Serv3R879*-$");
	if (!$pconnect)
	   return "fracaso";
	else
	   return $pconnect;
}
function nueva_conexion(){
$pconnect=pg_connect("host=10.10.10.4 port=5432 dbname=sisol user=ures_online password=R3s0nl1ne*");
	if (!$pconnect)
	   return "fracaso";
	else
	   return $pconnect;
}
}
?>
