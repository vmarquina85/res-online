<?php
require '../class/consultas/consultas_cls.php';
$claseConsulta5= new consultas;
$fechaActualuzacion=$_REQUEST['fact'];

$total1=0;
$total2=0;
$anio1=$_REQUEST['anio1'];
$anio2=$_REQUEST['anio2'];
$mes=$_REQUEST['mes'];
if ($mes!='*') {
  $index=(int)$mes;
}else{
  $index=0;
}
$mesnombre=array('Al '.substr($fechaActualuzacion,0,3).substr($fechaActualuzacion,3,2),'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICEMBRE');
$resultado=$claseConsulta5->compMeses_ingresos($anio1,$anio2,$mes,$fechaActualuzacion);
if (sizeof($resultado)>0 ){
  echo  "<table id='tb_response_mes_I' class='table tablesorter table-bordered'>
    <thead>
      <tr>
        <th class='bg-silver f-s-12 text-center'>Mes</th>
        <th class='bg-silver f-s-12 text-center'>".$anio1." <br> ".$mesnombre[$index]."</th>
        <th class='bg-silver f-s-12 text-center'>".$anio2." <br> ".$mesnombre[$index]."</th>
      </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($resultado) ; $i++) {
   echo   "<tr>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$mesnombre[(int)$resultado[$i]['mes']]."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".number_format($resultado[$i][$anio1],2,'.',',')."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".number_format($resultado[$i][$anio2],2,'.',',')."</td>
          </tr>";
}
for ($i=0; $i <sizeof($resultado) ; $i++) {
$total1+=$resultado[$i][$anio1];
$total2+=$resultado[$i][$anio2];
}
echo "<tr>
       <td class='bg-silver p-3 f-s-11 text-center m-r-10 m-l-10'><strong>TOTAL</strong></td>
       <td class='bg-silver p-3 f-s-11 text-center m-r-10 m-l-10'><strong>".number_format($total1,2,'.',',')."</strong></td>
       <td class='bg-silver p-3 f-s-11 text-center m-r-10 m-l-10'><strong>".number_format($total2,2,'.',',')."</strong></td>
       </tr>";
echo "</tbody>";
echo "</table>";
}

 ?>
