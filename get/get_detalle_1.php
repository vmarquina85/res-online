<?php
require '../class/consultas/consultas_cls.php';
$claseConsulta7= new consultas;
$anio=$_REQUEST['anio'];
$mes=$_REQUEST['mes'];
$centro=$_REQUEST['centro'];
$resultado=$claseConsulta7->esp_aten($anio,$mes,$centro);
  echo "<div class='text-center'>
  <h4>Atenciones - ".trim($centro)." - ".trim($anio)."</h4>
  </div>
  <div class='container-scrolled'>
  <table id='tb_esp_aten' class='table table-striped table-bordered'>
  <thead>
        <tr>
          <th>Especialidad</th>
          <th>Atenciones</th>
        </tr>
      </thead>
      <tbody>";
   for ($i=0; $i <sizeof($resultado) ; $i++) {
     echo   "<tr>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$resultado[$i]['especialidad']."</td>
            <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".number_format($resultado[$i]['atenciones'],0,'.',',')."</td>
            </tr>";
  }
  echo "</tbody>
  </table>";
echo "</div>
";
 ?>
