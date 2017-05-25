<?php
require '../class/consultas/consultas_cls.php';
$claseConsulta1= new consultas;
$anio=$_REQUEST['anio'];
$mes=$_REQUEST['mes'];
if ($mes!='*') {
  $index=(int)$mes;
}else{
  $index=0;
}
$mesnombre=array('(TOTAL)','ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICEMBRE');
$resultado=$claseConsulta1->compCentros_ingresos($anio,$mes);
$anio=(string)$anio;
if (sizeof($resultado)>0 ){
  echo  "<table id='tb_response_Centro_I' class='table table-striped table-bordered'>
    <thead>
      <tr>
        <th class='text-center'>E.E.S.S.</th>
        <th class='text-center'>Atenciones<br> ".$mesnombre[$index]."</th>
        <th class='text-center'>Ingresos<br> ".$mesnombre[$index]."</th>
      </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($resultado) ; $i++) {
   echo   "<tr>
          <td class='p-3 f-s-11 text-left m-r-10 m-l-10'> ".$resultado[$i]['operativo']."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10' onclick='get_details_1(this,0)'><a href='javascript:;'>".number_format($resultado[$i]['atenciones'],0,'.',',')."</a></td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10' onclick='get_details_2(this,0)'><a href='javascript:;'>".number_format($resultado[$i]['ingresos'],2,'.',',')."</a></td>
          </tr>";
}
echo "</tbody>";
echo "</table>";
}

 ?>
