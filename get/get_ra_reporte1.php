<?php
require '../class/consultas/consultas_cls.php';
$ra_class= new consultas;
$tipo=$_REQUEST['tipo'];
$parametro=$_REQUEST['parametro'];

$annio=$_REQUEST['anio'];

$ra_rs_reporte=$ra_class->getReporteAsociados1($annio,$parametro,$tipo);
  echo "<thead>
        <tr>
          <th class='text-center bg-silver'>Razon Social/Nombre</th>
          <th class='text-center bg-silver'>Enero</th>
          <th class='text-center bg-silver'>Febrero</th>
          <th class='text-center bg-silver'>Marzo</th>
          <th class='text-center bg-silver'>Abril</th>
          <th class='text-center bg-silver'>Mayo</th>
          <th class='text-center bg-silver'>Junio</th>
          <th class='text-center bg-silver'>Julio</th>
          <th class='text-center bg-silver'>Agosto</th>
          <th class='text-center bg-silver'>Septiembre</th>
          <th class='text-center bg-silver'>Octubre</th>
          <th class='text-center bg-silver'>Noviembre</th>
          <th class='text-center bg-silver'>Diciembre</th>
          <th class='text-center bg-silver'>Total</th>


        </tr>
      </thead>
      <tbody>";
   for ($i=0; $i <sizeof($ra_rs_reporte) ; $i++) {
     $total=$ra_rs_reporte[$i]['enero']+$ra_rs_reporte[$i]['febrero']+$ra_rs_reporte[$i]['marzo']
     +$ra_rs_reporte[$i]['abril']+$ra_rs_reporte[$i]['mayo']+$ra_rs_reporte[$i]['junio']+$ra_rs_reporte[$i]['julio']
     +$ra_rs_reporte[$i]['agosto']+$ra_rs_reporte[$i]['septiembre']+$ra_rs_reporte[$i]['octubre']+$ra_rs_reporte[$i]['noviembre']
     +$ra_rs_reporte[$i]['diciembre'];
     echo   "<tr>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['centro']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['enero']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['febrero']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['marzo']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['abril']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['mayo']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['junio']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['julio']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['agosto']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['septiembre']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['octubre']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['noviembre']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['diciembre']."</td>
            <td class='p-3 f-s-11 bg-silver text-center m-r-10 m-l-10'><strong>".(double)$total."</strong></td>

            </tr>";
  }
  echo "</tbody>";
 ?>
