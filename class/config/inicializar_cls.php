<?php
session_start();
if (!isset($_SESSION["resonlinepermitido"])) {
  header("location:../index.php");
  exit();
};
require '../class/consultas/consultas_cls.php';
$clase2=new consultas;
$rs_esp= $clase2->getEspecialidades();
?>
