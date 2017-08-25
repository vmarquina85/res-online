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
		$sql="select operativo,to_char(max(fecha),'dd/mm/yyyy') as actualizacion,(current_date-max(fecha)) as dif , case when (select state from summary.oper where descripcion = operativo)='1' then 'ACTIVO' else 'NO ACTIVO' end as actividad from summary.redo group by operativo";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function getEspecialidades(){
		$sql="select distinct n_esp from summary.res_pro_ven_ate order by 1";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function getReporteAsociados1($anio,$parametro,$tipo){
		if ($tipo=='1') {
			$sql="Select SubString(p_atr,1,4)año,to_char(date('01-'||SubString(p_atr,5,2)||'-16'),'TMMonth')mes,n_esp,trim(n_ras) as denominacion,trim(n_ruc) as ruc,Sum(c_ate)atenciones,Sum(v_pag)importe
		From summary.res_pro_ven_ate where n_con!='' and trim(n_ras) like '%".strtoupper($parametro)."%' and SubString(p_atr,1,4)='".$anio."' ";
		}else if ($tipo=='2') {
			$sql="Select SubString(p_atr,1,4)año,to_char(date('01-'||SubString(p_atr,5,2)||'-16'),'TMMonth')mes,n_esp,trim(n_per) as denominacion,trim(n_ruc) as ruc,Sum(c_ate)atenciones,Sum(v_pag)importe
		From summary.res_pro_ven_ate where n_con!='' and trim(n_per) like '%".strtoupper($parametro)."%' and SubString(p_atr,1,4)='".$anio."' ";
		}
// if ($mes!='*'){
// 	$sql=$sql."and SubString(p_atr,5,2)='".$mes."' ";
// }
// if ($especialidad!='*') {
// 	$sql=$sql. "and n_esp ='".strtoupper($especialidad)."' ";
// }
if ($tipo=='1') {
	$sql=$sql."Group By SubString(p_atr,1,4),SubString(p_atr,5,2),n_esp,trim(n_ras),n_ruc
	order by SubString(p_atr,5,2)";
}else if ($tipo=='2') {
	$sql=$sql."Group By SubString(p_atr,1,4),SubString(p_atr,5,2),n_esp,trim(n_per),n_ruc
	order by SubString(p_atr,5,2)";
}

		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
}
	?>
