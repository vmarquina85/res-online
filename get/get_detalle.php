<?php
require('../class/conexion/conexion_cls.php');
require('../assets/plugins/nusoap/lib/nusoap.php');
$class2= new conectar;
$cn=$class2->nueva_conexion();

$sq="select url_dependencia,port_dependencia from hospitales where id_dependencia='".strtoupper($_GET['dependencia'])."'";
$rs=pg_query($cn,$sq);
$wsdl=pg_fetch_result($rs,0,'url_dependencia').':'.pg_fetch_result($rs,0,'port_dependencia').'/sisol/ws_grant_sales_by_day.php';
ini_set("default_socket_timeout", 8);



 $client=new nusoap_client($wsdl);
 $param=array('vdate'=>$_GET['txtdate'],'vdate_end'=>$_GET['txtdate_end'],'vfp'=>'0,1,2,4,5');
$response = $client->call($_GET['method'],$param);
 if($client->fault) {
 	echo "FAULT: <p>Code: (".$client->faultcode.")</p>";
     echo "String: ".$client->faultstring;
 	exit();
 }
$r=$response;
$nr=count($r);
if ($_GET['tipo']=="I") {

?>
[
<?php for($i=0;$i<sizeof($r);$i++)
      {
        ?>
         ['<?php echo $r[$i]["especialidad"] ?>',<?php echo $r[$i]["total"] ?> ],
        <?php
      }

      ?>
        ]
<?php
}elseif ($_GET['tipo']=="A") {
?>
[
<?php for($i=0;$i<sizeof($r);$i++)
      {
        ?>
         ['<?php echo $r[$i]["especialidad"] ?>',<?php echo $r[$i]["atenciones"] ?> ],
        <?php
      }

      ?>
        ]
<?php
 }
 ?>
