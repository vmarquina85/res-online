<?php
require '../class/consultas/consultas_cls.php';
$claseConsulta1= new consultas;
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
//llamar a funcion clase consultas
//{
$resultado=$claseConsulta1->ComparativoIngresos($anio1,$anio2,$mes,$fechaActualuzacion);
//}
//convertir los datos del anio a texto para mostrar dentro de la tabla de respuesta
//{
$anio1=(string)$anio1;
$anio2=(string)$anio2;
//}
if (sizeof($resultado)>0 ){

  echo  "<table id='tb_response_Centro_I' class='table table-hover tablesorter  table-bordered'>
    <thead>
      <tr>
        <th class='bg-silver f-s-12 text-center'>E.E.S.S.</th>
        <th class='bg-silver f-s-12 text-center'>".$anio1." <br> ".$mesnombre[$index]."</th>
        <th class='bg-silver f-s-12 text-center'>".$anio2." <br> ".$mesnombre[$index]."</th>
      </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($resultado) ; $i++) {
   echo   "<tr>
          <td class='p-3 f-s-11 text-left m-r-10 m-l-10'> ".$resultado[$i]['operativo']."</td>
          <td title='Click para ver Detalle' data-toggle='tooltip' class='p-3 f-s-11 text-center m-r-10 m-l-10 clickable' onclick='get_details_2(this,0)'>".number_format($resultado[$i][$anio1],2,'.',',')."</td>
          <td title='Click para ver Detalle' data-toggle='tooltip' class='p-3 f-s-11 text-center m-r-10 m-l-10 clickable' onclick='get_details_2(this,0)'>".number_format($resultado[$i][$anio2],2,'.',',')."</td>
          </tr>";
}
for ($i=0; $i <sizeof($resultado) ; $i++) {
$total1+=$resultado[$i][$anio1];
$total2+=$resultado[$i][$anio2];
}
echo "<tr>
       <td class='bg-silver p-3 f-s-11 text-left m-r-10 m-l-10'><strong>TOTAL</strong></td>
       <td class='bg-silver p-3 f-s-11 text-center m-r-10 m-l-10'><strong>".number_format($total1,2,'.',',')."</strong></td>
       <td class='bg-silver p-3 f-s-11 text-center m-r-10 m-l-10'><strong>".number_format($total2,2,'.',',')."</strong></td>
       </tr>";
echo "</tbody>";
echo "</table>";
}

 ?>
