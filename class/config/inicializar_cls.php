<?php
require '../class/consultas/consultas_cls.php';
$clase2=new consultas;$clase3=new consultas;
$rs_esp= $clase2->getEspecialidades();
$rs_cent= $clase3->getCentros();
?>
