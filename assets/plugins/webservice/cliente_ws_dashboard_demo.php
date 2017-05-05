<?php
include('nusoap/lib/nusoap.php');

$client=new nusoap_client("http://www.sisol.gob.pe/home/wss/cliente_ws_dashboard.php");

$param=array('idlocal'=>'SMP','vdate'=>'04/06/2015','vdate_end'=>'04/06/2015','vfp'=>'0,1,2,4,5');
//vfp es la forma de pago:  0 - Contado, 1 - TARJETA DE CREDITO, 2 - SIS,  4 - ESSALUD,  5 - SOLIDARIO
/* idlocal:
CEN CMM. EL NAZARENO
CCH CMM. HUAYCAN
CCM CMM. JOSE CARLOS MARIATEGUI
CJP CMM. JUAN PABLO I I
CLE CMM. LA ENSENADA
CLV CMM. LAS VIOLETAS
CRM CMM. SAN RAMON
CSM CMM. SENOR DE LOS MILAGROS
CSR CMM. SINCHI ROCA
CHN CMM. TRABAJADORES HOSPITAL DEL NINO
CVL CMM. VILLA LIMATAMBO
ATE H.S. ATE
CMN H.S. CAMANA
CAR H.S. CARABAYLLO
CIX H.S. CHICLAYO
CHR H.S. CHORRILLOS
CMS H.S. COMAS
CZC H.S. CUZCO
CZ2 H.S. CUZCO - SAN GERONIMO
EAG H.S. EL AGUSTINO
ICA H.S. ICA
MGD H.S. MAGDALENA DEL MAR
RMC H.S. METRO UNI
CLM H.S. MIRONES BAJO
PTP H.S. PUENTE PIEDRA
PTH H.S. PUNTA HERMOSA
LN2 H.S. RISSO
SJL H.S. SAN JUAN DE LURIGANCHO
SMP H.S. SAN MARTIN DE PORRES
SLN H.S. SULLANA
SRQ H.S. SURQUILLO
TCN H.S. TACNA
TRP H.S. TARAPOTO
TMB H.S. TUMBES
VES H.S. VILLA EL SALVADOR
VMT H.S. VILLA MARIA DEL TRIUNFO
*/
$client->setCredentials("usrdashboar","DasHb@8420","basic");
$response = $client->call('get_ventas_hs',$param);
if($client->fault) {  
    echo "FAULT: <p>Code: (".$client->faultcode.")</p>";  
    echo "String: ".$client->faultstring;  
    exit();
} 
$a=$response;  
$nrec=count($a); 

if ($nrec>0){
    if (isset($a[0]['err_nro'])){
        print_r($a);            
    }else{
       /* echo $a[0]['ape_paterno'];
        $sr = $a[0]['ape_paterno'];*/

        var_dump($a);
    }
}

?>