<?php
require '../class/consultas/consultas_cls.php';
$claseConsulta6= new consultas;
$anio=$_REQUEST['anio'];
$mes=$_REQUEST['mes'];
if ($mes!='*') {
  $index=(int)$mes;
}else{
  $index=0;
}
$mesnombre=array('MESES','ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICEMBRE');
$resultado=$claseConsulta6->compMeses_ingresos($anio,$mes);
if (sizeof($resultado)>0 ){
  echo  "<table id='tb_response_mes_I_2' class='table  table-striped table-bordered'>
    <thead>
      <tr>
        <th>Mes</th>
        <th>Atenciones</th>
        <th>Ingresos</th>
      </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($resultado) ; $i++) {
   echo   "<tr>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$mesnombre[(int)$resultado[$i]['mes']]."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><a href=''>".number_format($resultado[$i]['atenciones'],2,'.',',')."</a></td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".number_format($resultado[$i]['ingresos'],2,'.',',')."</td>

          </tr>";
}
echo "</tbody>";
echo "</table>";
}

 ?>
