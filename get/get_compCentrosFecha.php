<?php
require '../class/consultas/consultas_cls.php';
$consulta7= new consultas;
$consulta8= new consultas;
$fechaActualuzacion=$_REQUEST['fact'];

$total1=0;
$total2=0;
$total3=0;
$total4=0;
$anio1=$_REQUEST['anio1'];
$anio2=$_REQUEST['anio2'];
$mes=$_REQUEST['mes'];
if ($mes!='*') {
  $index=(int)$mes;
}else{
  $index=0;
}
// $mesnombre=array('Al '.substr($fechaActualuzacion,0,3).substr($fechaActualuzacion,3,2),'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICEMBRE');
$resultado=$consulta7->compEstxingresos($anio1,$anio2,$mes,$fechaActualuzacion);
$resultado2=$consulta8->compEstxAtenciones($anio1,$anio2,$mes,$fechaActualuzacion);


if (sizeof($resultado)>0 ){
  echo  "<table id='tb_response_fecha_II' class='table tablesorter table-bordered'>
    <thead>
    <tr>
      <th rowspan='2'class='bg-silver f-s-16 text-center'>E.E.S.S</th>
      <th rowspan='2'class='bg-silver f-s-16 text-center'>DÍA</th>
      <th rowspan='2'class='bg-silver f-s-16 text-center'>MES</th>
      <th colspan='2' class='bg-silver f-s-16 text-center'>".$anio1."</th>
      <th colspan='2' class='bg-silver f-s-16 text-center'>".$anio2."</th>
    </tr>
    <tr>
    <th class='bg-silver f-s-16 text-center'>Atenciones (Productos)</th>
    <th class='bg-silver f-s-16 text-center'>Ingresos (S/.)</th>
    <th class='bg-silver f-s-16 text-center'>Atenciones (Productos)</th>
  <th class='bg-silver f-s-16 text-center'>Ingresos (S/.)</th>
    </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($resultado) ; $i++) {
   echo   "<tr>
     <td class='p-3 f-s-14 text-center m-r-10 m-l-10'> ".$resultado[$i]['operativo']."</td>
          <td class='p-3 f-s-14 text-center m-r-10 m-l-10'> ".str_pad($resultado[$i]['dia'], 2, "0", STR_PAD_LEFT)."</td>
          <td class='p-3 f-s-14 text-center m-r-10 m-l-10'> ".str_pad($resultado[$i]['mes'], 2, "0", STR_PAD_LEFT)."</td>
          <td class='p-3 f-s-14 text-right m-r-10 m-l-10'>".number_format($resultado2[$i][$anio1],2,'.',',')."</td>
          <td class='p-3 f-s-14 text-right m-r-10 m-l-10'>".number_format($resultado[$i][$anio1],2,'.',',')."</td>
          <td class='p-3 f-s-14 text-right m-r-10 m-l-10'>".number_format($resultado2[$i][$anio2],2,'.',',')."</td>
          <td class='p-3 f-s-14 text-right m-r-10 m-l-10'>".number_format($resultado[$i][$anio2],2,'.',',')."</td>
          </tr>";
}
for ($i=0; $i <sizeof($resultado) ; $i++) {
$total1+=$resultado[$i][$anio1];
$total2+=$resultado[$i][$anio2];
}
for ($i=0; $i <sizeof($resultado2) ; $i++) {
  $total3+=$resultado2[$i][$anio1];
  $total4+=$resultado2[$i][$anio2];
}
echo "<tr>
<td colspan='3' class='bg-silver p-3 f-s-14 text-left m-r-10 m-l-10'><strong>TOTAL</strong></td>
<td class='bg-silver p-3 f-s-14 text-right m-r-10 m-l-10'><strong>".number_format($total3,2,'.',',')."</strong></td>
<td class='bg-silver p-3 f-s-14 text-right m-r-10 m-l-10'><strong>".number_format($total1,2,'.',',')."</strong></td>
<td class='bg-silver p-3 f-s-14 text-right m-r-10 m-l-10'><strong>".number_format($total4,2,'.',',')."</strong></td>
<td class='bg-silver p-3 f-s-14 text-right m-r-10 m-l-10'><strong>".number_format($total2,2,'.',',')."</strong></td>
       </tr>";
echo "</tbody>";
echo "</table>";
}

 ?>
