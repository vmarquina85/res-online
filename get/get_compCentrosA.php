<?php
require '../class/consultas/consultas_cls.php';
$claseConsulta= new consultas;
$anio=$_REQUEST['anio'];
$mes=$_REQUEST['mes'];
if ($mes!='*') {
  $index=(int)$mes;
}else{
  $index=0;
}
$mesnombre=array('(TOTAL)','ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICEMBRE');
$resultado=$claseConsulta->compCentros_atenciones($anio,$mes);
$anio=(string)$anio;
if (sizeof($resultado)>0 ){
  echo  "<table id='tb_response_Centro_A' class='table table-striped table-bordered'>
    <thead>
      <tr>
        <th class='text-center'>E.E.S.S.</th>
        <th class='text-center'>".$anio." <br> ".$mesnombre[$index]."</th>
        <th class='text-center'>".($anio-1)." <br> ".$mesnombre[$index]."</th>
        <th class='text-center'>".($anio-2)." <br> ".$mesnombre[$index]."</th>
      </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($resultado) ; $i++) {
   echo   "<tr>
          <td class='p-3 f-s-11 text-left m-r-10 m-l-10'> ".$resultado[$i]['operativo']."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><a href=''>".number_format($resultado[$i][$anio],2,'.',',')."</a></td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".number_format($resultado[$i][($anio-1)],2,'.',',')."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".number_format($resultado[$i][($anio-2)],2,'.',',')."</td>
          </tr>";
}
echo "</tbody>";
echo "</table>";
}

 ?>
