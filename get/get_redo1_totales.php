<?php
require '../class/consultas/consultas_cls.php';
$claseConsulta= new consultas;
$anio=$_REQUEST['anio'];
$mes=$_REQUEST['mes'];
$resultado=$claseConsulta->totalIngresosAtenciones($anio,$mes);
if (sizeof($resultado)!=0) {
  echo json_encode($resultado);
}else {
  $cero=array('atenciones'=>"0",'ingresos'=>"0");
  echo "[".json_encode($cero)."]";
}
?>
