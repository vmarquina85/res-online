<?php

require '../class/consultas/consultas_cls.php';
$claseConsulta3= new consultas;
$claseConsulta4= new consultas;
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
$mesnombre=array('Al '.substr($fechaActualuzacion,0,3).substr($fechaActualuzacion,3,2),'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICEMBRE');
$resultado=$claseConsulta3->compEspecialidades_ingresos($anio1,$anio2,$mes,$fechaActualuzacion);
$resultado2=$claseConsulta4->compEspecialidades_atenciones($anio1,$anio2,$mes,$fechaActualuzacion);
if (sizeof($resultado)>0 ){
  echo  "<table id='tb_response_esp_I' class='table tablesorter table-bordered'>
  <thead>
  <tr>
    <th rowspan='2'class='bg-silver f-s-16 text-center'>ESPECIALIDAD</th>
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
    <td class='p-3 f-s-14 text-left m-r-10 m-l-10'> ".$resultado[$i]['especialidad']."</td>
    <td title='Click para ver Detalle' data-toggle='tooltip' class='p-3 f-s-14 text-right m-r-10 m-l-10'>".number_format($resultado2[$i][$anio1],2,'.',',')."</td>
    <td title='Click para ver Detalle' data-toggle='tooltip' class='p-3 f-s-14 text-right m-r-10 m-l-10'>".number_format($resultado[$i][$anio1],2,'.',',')."</td>
    <td title='Click para ver Detalle' data-toggle='tooltip' class='p-3 f-s-14 text-right m-r-10 m-l-10'>".number_format($resultado2[$i][$anio2],2,'.',',')."</td>
    <td title='Click para ver Detalle' data-toggle='tooltip' class='p-3 f-s-14 text-right m-r-10 m-l-10'>".number_format($resultado[$i][$anio2],2,'.',',')."</td>
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
  <td class='bg-silver p-3 f-s-14 text-left m-r-10 m-l-10'><strong>TOTAL</strong></td>
  <td class='bg-silver p-3 f-s-14 text-right m-r-10 m-l-10'><strong>".number_format($total3,2,'.',',')."</strong></td>
  <td class='bg-silver p-3 f-s-14 text-right m-r-10 m-l-10'><strong>".number_format($total1,2,'.',',')."</strong></td>
  <td class='bg-silver p-3 f-s-14 text-right m-r-10 m-l-10'><strong>".number_format($total4,2,'.',',')."</strong></td>
  <td class='bg-silver p-3 f-s-14 text-right m-r-10 m-l-10'><strong>".number_format($total2,2,'.',',')."</strong></td>
  </tr>";
  echo "</tbody>";
  echo "</table>";
}

?>
