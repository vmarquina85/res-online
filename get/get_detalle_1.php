<?php
// session_start();
if (!isset($_SESSION["resonlinepermitido"])) {
  header("location:../index.php");
  exit();
};
require '../class/consultas/consultas_cls.php';
$claseConsulta7= new consultas;
$anio=$_REQUEST['anio'];
$mes=$_REQUEST['mes'];
$centro=$_REQUEST['centro'];
$resultado=$claseConsulta7->esp_aten($anio,$mes,$centro);
  echo "<div class='text-center'>
  <h4>Ingresos - ".trim($centro)." - ".trim($anio)."</h4>
  </div>
  <table id='tb_esp_aten' class='table tablesorter table-bordered'>
  <thead>
        <tr>
          <th class='text-center bg-silver'>Especialidad</th>
          <th class='text-center bg-silver'>Atenciones</th>
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
 ?>
