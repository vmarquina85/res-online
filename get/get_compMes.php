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
$mesnombre=array('(TOTAL MESES)','ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICEMBRE');
$resultado=$claseConsulta->compCentros($anio,$mes);
if (sizeof($resultado)>0 ){
  echo  "<div id='tb_centrosComp' class='table-responsive'>
  <table id='tb_response' class='table data-table table-striped table-bordered'>
    <thead>
      <tr>
        <th>E.E.S.S.</th>
        <th>".$anio." <br> ".$mesnombre[$index]."</th>
        <th>".($anio-1)." <br> ".$mesnombre[$index]."</th>
        <th>".($anio-2)." <br> ".$mesnombre[$index]."</th>
      </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($resultado) ; $i++) {
   echo   "<tr>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$resultado[$i]['operativo']."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>S/. ".number_format($resultado[$i]['dato_3'],2,'.',',')."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>S/. ".number_format($resultado[$i]['dato_2'],2,'.',',')."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>S/. ".number_format($resultado[$i]['dato_1'],2,'.',',')."</td>
          </tr>";
}
echo "</tbody>";
echo "</table></div>";
}

 ?>
