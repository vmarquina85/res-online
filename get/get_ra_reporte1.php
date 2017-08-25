<?php
require '../class/consultas/consultas_cls.php';
$ra_class= new consultas;
$tipo=$_REQUEST['tipo'];
$parametro=$_REQUEST['parametro'];

$annio=$_REQUEST['anio'];

$ra_rs_reporte=$ra_class->getReporteAsociados1($annio,$parametro,$tipo);
  echo "<thead>
        <tr>
          <th class='text-center bg-silver'>Año</th>
          <th class='text-center bg-silver'>Mes</th>
          <th class='text-center bg-silver'>Especialidad</th>
          <th class='text-center bg-silver'>Nombre/Razon Social</th>
          <th class='text-center bg-silver'>Ruc</th>
          <th class='text-center bg-silver'>Atenciones</th>
          <th class='text-center bg-silver'>Importe</th>
        </tr>
      </thead>
      <tbody>";
   for ($i=0; $i <sizeof($ra_rs_reporte) ; $i++) {
     echo   "<tr>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$ra_rs_reporte[$i]['año']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".$ra_rs_reporte[$i]['mes']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".$ra_rs_reporte[$i]['n_esp']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".$ra_rs_reporte[$i]['denominacion']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".$ra_rs_reporte[$i]['ruc']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".$ra_rs_reporte[$i]['atenciones']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".$ra_rs_reporte[$i]['importe']."</td>
            </tr>";
  }
  echo "</tbody>";
 ?>
