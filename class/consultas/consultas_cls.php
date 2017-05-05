<?php
require '../class/conexion/conexion_cls.php';

class consultas extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}

	function totalIngresosAtenciones($anio,$mes){
		$sql="select sum(atenciones)as atenciones,sum(ingresos) as ingresos from summary.redo where  date_part('year' ,fecha)=".$anio;
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha)='".$mes."'";
		}
		$sql=$sql." group by date_part('year' ,fecha)";
		if ($mes!='*') {
			$sql=$sql.",date_part('month' ,fecha)";
		}
		$sql=$sql." order by 1";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function compCentros($anio,$mes){
		$sql="select * from summary.crosstab('select operativo,date_part(''year'' ,fecha) as annio,sum(ingresos) as ingresos from summary.redo where  date_part(''year'' ,fecha) in (".$anio.",".($anio-1).",".($anio-2).")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha)=".$mes;
		}
		$sql=$sql." group by operativo,date_part(''year'' ,fecha)";
		if ($mes!='*') {
			$sql=$sql.",date_part(''month'' ,fecha)";
		}
		$sql=$sql." order by 1') as ct(operativo character varying(100), dato_1 numeric(11,2),dato_2  numeric(11,2),dato_3  numeric(11,2))";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
}
	?>
