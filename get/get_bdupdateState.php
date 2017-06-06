<?php
require '../class/consultas/consultas_cls.php';
$clase= new consultas;
$resultado=$clase->bdupdateState_gMaxFechas();
if (sizeof($resultado)>0) {
  for ($i=0; $i <sizeof($resultado) ; $i++) {

    echo   "<tbody id='dat_actu'>
    <tr";
    if ($resultado[$i]['dif']>2 && $resultado[$i]['dif']<30){
      echo  " class='warning'";
    }else if($resultado[$i]['dif']>30){
      echo  " class='danger'";
    }else if($resultado[$i]['dif']<=2){
      echo  " class='success'";
    }
    echo ">
       <td class='p-3 f-s-11 text-left m-r-10 m-l-10'>". $resultado[$i]['operativo']."</td>
           <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".$resultado[$i]['actualizacion']."</td>
           <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>";
      if ($resultado[$i]['dif']<=2) {
        echo "<span class='badge badge-success'>ACTUALIZADO</span>";
      }else if ($resultado[$i]['dif']>2 && $resultado[$i]['dif']<30) {
        echo "<span class='badge badge-warning'>PARCIAL</span>";
      }else if ($resultado[$i]['dif']>30) {
        echo "<span class='badge badge-danger'>NO ACTUALIZADO</span>";
      }
    echo "</td>

 </tr>
</tbody>";

 }
}
// echo  " <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>";
// if ($resultado[$i]['dif']<=2) {
// echo "<span class='badge badge-success'>".$resultado[$i]['dif']."</span>";
// }else if ($resultado[$i]['dif']>2 && $resultado[$i]['dif']<30) {
// echo "<span class='badge badge-warning'>".$resultado[$i]['dif']."</span>";
// }else if ($resultado[$i]['dif']>30) {
// echo "<span class='badge badge-danger'>".$resultado[$i]['dif']."</span>";
// }
// echo "</td>
?>
