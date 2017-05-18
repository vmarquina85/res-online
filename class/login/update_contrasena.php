<?php
include('../conexion/conexion_cls.php');
session_start();
$usr_login=$_SESSION['key_pas'];
$password=$_REQUEST['pass'];
$new_pass=$_REQUEST['n_pass'];
$repeat_pass=$_REQUEST['r_pass'];
//conectar a base de datos
$conectar=new conectar;
$cn=$conectar->nueva_conexion();
//obtener Maximo Corelativo
$sql="select us_log from sysaccusers where key_pass='".$usr_login."'" ;
$result=pg_query($cn,$sql);
$rs1 = pg_fetch_array($result, 0);
$anterior=$rs1['us_log'];
if (md5(trim($password))==$anterior) {
$plsql="update sysaccusers set us_log='".md5($new_pass)."' where key_pass='" .$usr_login. "' and us_log='".$anterior."'" ;
$result2=pg_query($cn,$plsql);
}else{
echo "0";
 pg_close($cn);
 exit();
}
 echo "1";
 pg_close($cn);
?>
