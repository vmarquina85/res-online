<?php
include_once '../conexion/conexion_cls.php';
$class=new conectar;
$conexion=$class->nueva_conexion();
$usuario = $_POST['usuario'];
$contraseña = $_POST['password'];
$consulta ="select key_pass,us_log,id_us,state,lres_online
from sysaccusers where key_pass='".strtoupper($usuario)."' ";
$result = pg_query($conexion, $consulta);
if (pg_num_rows($result) > 0) {
  $query = pg_fetch_array($result, 0);
  $key_pass = $query["key_pass"];
  $us_log = $query["us_log"];
  $id_usr = $query["id_us"];
  $estado=$query["state"];
  $lres_online = $query["lres_online"];
  if(md5($contraseña)==$us_log)
  {
  //   if ($usr_stat <> '1') {
  //     echo '<div class="alert alert-warning">
  //     <p id="validacionMensaje">El Usuario esta deshabilitado. Favor contáctese con el personal de la USP</p>
  //   </div>';
  // } else {
    $ale ="resonline";
//variables de entorno
    // $ca = "select dependencia,entidad from entorno";
    // $r = pg_query($conexion, $ca);
    session_start();
    session_name($ale);
  
    $_SESSION['key_pas'] = $key_pass;
    $_SESSION['id_usr']= $id_usr;
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
