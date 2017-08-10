<?php
require '../class/consultas/consultas_cls.php';
$claseConsulta5= new consultas;
$anio=$_REQUEST['anio'];
$mes=$_REQUEST['mes'];
if ($mes!='*') {
  $index=(int)$mes;
}else{
  $index=0;
}
$mesnombre=array('MESES','ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICEMBRE');
$resultado=$claseConsulta5->compMeses_ingresos($anio,$mes);
if (sizeof($resultado)>0 ){
  echo  "<table id='tb_response_mes_I' class='table tablesorter table-bordered'>
    <thead>
      <tr>
        <th class='bg-silver f-s-12'>Mes</th>
        <th class='bg-silver f-s-12'>Atenciones</th>
        <th class='bg-silver f-s-12'>Ingresos</th>
      </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($resultado) ; $i++) {
   echo   "<tr>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$mesnombre[(int)$resultado[$i]['mes']]."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10 clickable'>".$resultado[$i]['atenciones']."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10 clickable'>".$resultado[$i]['ingresos']."</td>

          </tr>";
}
echo "</tbody>";
echo "</table>";
}

 ?>
