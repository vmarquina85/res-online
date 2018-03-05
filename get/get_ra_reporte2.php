<?php
require '../class/consultas/consultas_cls.php';
$ra_class= new consultas;
$oper=$_REQUEST['oper'];
$esp=$_REQUEST['esp'];
$annio=$_REQUEST['anio'];
$ArrayAnnio=explode(",",$annio);
$ra_rs_reporte=$ra_class->getReporteAsociados2($annio,$oper,$esp);
echo "<thead>
<tr>
<th class='text-center bg-silver'>Nombre</th>";
for ($i=0; $i < sizeof($ArrayAnnio); $i++) {
  echo  "<th class='text-center bg-silver'>".$ArrayAnnio[$i]."</th>";
}
// echo  "<th class='text-center bg-silver'>Total</th>";

echo   "</tr>
</thead>
<tbody>";
for ($c=0; $c <sizeof($ra_rs_reporte) ; $c++) {
  echo   "<tr>
  <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$c]['r_social']."</td>";
  for ($j=0; $j < sizeof($ArrayAnnio); $j++) {
  echo  "<td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".number_format($ra_rs_reporte[$c][$ArrayAnnio[$j]],2,'.',',')."</td>";
    }
  // echo "<td class='p-3 f-s-11 bg-silver text-center m-r-10 m-l-10'><strong>".number_format((double)$total,2,'.',',')."</strong></td>
  // </tr>";
}  echo "</tbody>";
?>
