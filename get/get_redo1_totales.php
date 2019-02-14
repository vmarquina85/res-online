<?php
session_start();
if (!isset($_SESSION["resonlinepermitido"])) {
  header("location:../index.php");
  exit();
};
require '../class/consultas/consultas_cls.php';
$claseConsulta= new consultas;
$anio=$_REQUEST['anio'];
$feact=$_REQUEST['fact'];
$mes=$_REQUEST['mes'];
$resultado=$claseConsulta->totalIngresosAtenciones($anio,$mes,$feact);
if (sizeof($resultado)!=0) {
  echo json_encode($resultado);
}else {
  $cero=array('ingresos'=>"0");
  echo "[".json_encode($cero)."]";
}
?>
