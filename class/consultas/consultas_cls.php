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
	function compCentros_ingresos($anio,$mes){
		$sql="select operativo,sum(ingresos) as ingresos , sum(atenciones) as atenciones from summary.redo where  date_part('year' ,fecha)=".$anio;
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha)=".$mes;
		}
		$sql=$sql." group by operativo,date_part('year' ,fecha)";
		if ($mes!='*') {
			$sql=$sql.",date_part('month' ,fecha)";
		}
		$sql=$sql." order by 3 desc";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function compMeses_ingresos($anio,$mes){
		$sql="select date_part('month' ,fecha) as mes,sum(ingresos) as ingresos,sum(atenciones) as atenciones from summary.redo where  date_part('year' ,fecha)=".$anio;
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha)=".$mes;
		}
		$sql=$sql." group by date_part('year' ,fecha),date_part('month' ,fecha) ";

		$sql=$sql." order by 2 desc";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}

	function compEspecialidades_ingresos($anio,$mes){
		$sql="select especialidad,date_part('year' ,fecha) as annio,sum(ingresos) as ingresos, sum(atenciones) as atenciones from summary.redo where  date_part('year' ,fecha)=".$anio;
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha)=".$mes;
		}
		$sql=$sql." group by especialidad,date_part('year' ,fecha)";
		if ($mes!='*') {
			$sql=$sql.",date_part('month' ,fecha)";
		}
		$sql=$sql." order by 2 desc";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function esp_aten($anio,$mes,$centro){
		$sql="select especialidad,sum(atenciones) as atenciones from summary.redo where operativo='".trim($centro)."'  and date_part('year' ,fecha)=".$anio;
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha)=".$mes;
		}
		$sql=$sql." group by especialidad,date_part('year' ,fecha)";
		if ($mes!='*') {
			$sql=$sql.",date_part('month' ,fecha)";
		}
		$sql=$sql." order by 2 desc";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function esp_ing($anio,$mes,$centro){
		$sql="select especialidad,sum(ingresos) as ingresos from summary.redo where operativo='".trim($centro)."'  and date_part('year' ,fecha)=".$anio;
		if ($mes!='*'){
			$sql=$sql." and date_part('month' ,fecha)=".$mes;
		}
		$sql=$sql." group by especialidad,date_part('year' ,fecha)";
		if ($mes!='*'){
			$sql=$sql.",date_part('month' ,fecha)";
		}
		$sql=$sql." order by 2 desc";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function bdupdateState_gMaxFechas(){
		$sql="select operativo,to_char(max(fecha),'dd/mm/yyyy') as actualizacion,(current_date-max(fecha)) as dif from summary.redo group by operativo";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}

}
	?>
