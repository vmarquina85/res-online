<?php
include_once '../conexion/conexion_cls.php';
$class=new conectar;
$class2=new conectar;
$conexion=$class->nueva_conexion();
$conexion2=$class2->conexion_resumen();
$usuario = $_POST['usuario'];
$contraseña = $_POST['password'];

$consulta ="select key_pass,us_log,id_us,id_per,state,lres_online
from sysaccusers where key_pass='".strtoupper($usuario)."' ";
$result = pg_query($conexion, $consulta);

if (pg_num_rows($result) > 0) {
  $query = pg_fetch_array($result, 0);
  $consulta2 ="select nombres||' '||ape_paterno||' '||ape_materno as name,sexo from personal where id_personal='".$query["id_per"]."'";
  $result2 = pg_query($conexion, $consulta2);
  $query2 = pg_fetch_array($result2, 0);

  $consulta3 ="select to_char(max(fecha),'dd/mm/yyyy') as fechact from summary.redo";
  $result3 = pg_query($conexion2, $consulta3);
  $query3 = pg_fetch_array($result3, 0);

  $fechAct = $query3["fechact"];
  $key_pass = $query["key_pass"];
  $us_log = $query["us_log"];
  $id_usr = $query["id_us"];
  $id_personal=$query["id_per"];
  $usr_name=$query2["name"];
  $sexo=$query2["sexo"];
  $estado=$query["state"];
  $lres_online = $query["lres_online"];
  if(md5($contraseña)==$us_log)
  {
    $ale ="resonline";
    session_start();
    session_name($ale);
    $_SESSION['key_pas'] = $key_pass;
    $_SESSION['fechact']=$query3["fechact"];
    $_SESSION['id_usr']= $id_usr;
    $_SESSION['id_personal']=$id_personal;
    $_SESSION['sexo']=$sexo;
    $_SESSION['user_name']=$usr_name;
    $_SESSION['state'] = $estado;
    $_SESSION['resonlinepermitido'] = "yes";
    echo $_SESSION['resonlinepermitido'];
  // }
}else{
  echo '<div class="alert alert-danger">
  <p id="validacionMensaje">Contraseña invalida</p>
</div>';
}
}else{
  echo '<div class="alert alert-danger">
  <p id="validacionMensaje">El Usuario no Registrado</p>
</div>';
}
?>
