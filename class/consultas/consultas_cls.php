<?php
require '../class/conexion/conexion_cls.php';

class consultas extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}
	function ComparativoIngresos($anio1,$anio2,$mes,$dia){
		$sql="select * from summary.crosstab('select operativo,date_part(''year'' ,fecha) as annio,sum(ingresos) as ingresos from summary.redo where  date_part(''year'' ,fecha) in (".$anio1.",".$anio2.")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha) in (".$mes.")";
		}else{
			$nmes=substr($dia,3,2);
			$nday=substr($dia,0,2);
			$sql=$sql." and ((fecha >=''01/01/".$anio1."'' and fecha <=''".$nday."/".$nmes."/".$anio1."'') or(fecha >=''01/01/".$anio2."'' and fecha <=''".$nday."/".$nmes."/".$anio2."''))";
		}
		$sql=$sql." group by operativo, date_part(''year'' ,fecha)";
if ($anio1>$anio2) {
$sql=$sql." order by 1','select * from unnest(array[".$anio1.",".$anio2."]) order by 1 desc')as ct(operativo character varying(100), \"".$anio1."\" numeric(11,2), \"".$anio2."\" numeric(11,2))";
}else {
	$sql=$sql." order by 1','select * from unnest(array[".$anio1.",".$anio2."]) order by 1 desc')as ct(operativo character varying(100), \"".$anio2."\" numeric(11,2), \"".$anio1."\" numeric(11,2))";
}
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function totalIngresosAtenciones($anio,$mes,$dia){
		$sql="select sum(ingresos) as ingresos from summary.redo where  date_part('year' ,fecha)=".$anio;
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha) in (".$mes.")";
		}else{
			$nmes=substr($dia,3,2);
			$nday=substr($dia,0,2);
			$sql=$sql." and (fecha>='01/01/".$anio."' and fecha <='".$nday."/".$nmes."/".$anio."')";
		}
		$sql=$sql." group by date_part('year' ,fecha)";
		// if ($mes!='*') {
		// 	$sql=$sql.",date_part('month' ,fecha)";
		// }
		$sql=$sql." order by 1";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function compMeses_ingresos($anio1,$anio2,$mes,$dia){
		$sql="select * from summary.crosstab('select date_part(''month'' ,fecha) as mes,date_part(''year'' ,fecha) as annio,sum(ingresos) as ingresos from summary.redo where  date_part(''year'' ,fecha) in (".$anio1.",".$anio2.")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha) in (".$mes.")";

		}else{
			$nmes=substr($dia,3,2);
			$nday=substr($dia,0,2);
		  $sql=$sql." and ((fecha >=''01/01/".$anio1."'' and fecha <=''".$nday."/".$nmes."/".$anio1."'') or(fecha >=''01/01/".$anio2."'' and fecha <=''".$nday."/".$nmes."/".$anio2."''))";
		}
		$sql=$sql." group by date_part(''month'' ,fecha), date_part(''year'' ,fecha)";
		if ($anio1>$anio2) {
		$sql=$sql." order by 1','select * from unnest(array[".$anio1.",".$anio2."]) order by 1 desc')as ct(mes character varying(100), \"".$anio1."\" numeric(11,2), \"".$anio2."\" numeric(11,2))";
		}else {
			$sql=$sql." order by 1','select * from unnest(array[".$anio1.",".$anio2."]) order by 1 desc')as ct(mes character varying(100), \"".$anio2."\" numeric(11,2), \"".$anio1."\" numeric(11,2))";
		}
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}

	function compEspecialidades_ingresos($anio1,$anio2,$mes,$dia){
		$sql="select * from summary.crosstab('select especialidad,date_part(''year'' ,fecha) as annio,sum(ingresos) as ingresos from summary.redo where  date_part(''year'' ,fecha) in (".$anio1.",".$anio2.")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha) in (".$mes.")";
		}else{
			$nmes=substr($dia,3,2);
			$nday=substr($dia,0,2);
			$sql=$sql." and ((fecha >=''01/01/".$anio1."'' and fecha <=''".$nday."/".$nmes."/".$anio1."'') or(fecha >=''01/01/".$anio2."'' and fecha <=''".$nday."/".$nmes."/".$anio2."''))";
		}
		$sql=$sql." group by especialidad, date_part(''year'' ,fecha)";
		if ($anio1>$anio2) {
		$sql=$sql." order by 1','select * from unnest(array[".$anio1.",".$anio2."]) order by 1 desc')as ct(especialidad character varying(100), \"".$anio1."\" numeric(11,2), \"".$anio2."\" numeric(11,2))";
		}else {
			$sql=$sql." order by 1','select * from unnest(array[".$anio1.",".$anio2."]) order by 1 desc')as ct(especialidad character varying(100), \"".$anio2."\" numeric(11,2), \"".$anio1."\" numeric(11,2))";
		}
		// echo $sql;
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function esp_aten($anio,$mes,$centro){
		$sql="select especialidad,sum(atenciones) as atenciones from summary.redo where operativo='".trim($centro)."'  and date_part('year' ,fecha)=".$anio;
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha) in (".$mes.")";
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
			$sql=$sql." and date_part('month' ,fecha) in (".$mes.")";
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
	function getCentros(){
		$sql="select distinct n_ope from summary.res_pro_ven_ate order by 1";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function getReporteAsociados1($anio,$parametro,$tipo){
		if ($tipo=='1') {
					$sql="select * from summary.crosstab('Select trim(n_ras) as denominacion,to_char(date(''01-''||SubString(p_atr,5,2)||''-16''),''TMMonth'')mes,sum(v_pag)importe
		From summary.res_pro_ven_ate where n_con!='''' and trim(n_ras) like ''%".strtoupper($parametro)."%'' and SubString(p_atr,1,4)=''".$anio."''";
		}else if ($tipo=='2') {
			$sql="select * from summary.crosstab('Select trim(n_per) as denominacion,to_char(date(''01-''||SubString(p_atr,5,2)||''-16''),''TMMonth'')mes,sum(v_pag)importe
		From summary.res_pro_ven_ate where n_con!='''' and trim(n_per) like ''%".strtoupper($parametro)."%'' and SubString(p_atr,1,4)=''".$anio."''";
		}
if ($tipo=='1') {
	$sql=$sql."Group By SubString(p_atr,1,4),SubString(p_atr,5,2),trim(n_ras)
order by 1,SubString(p_atr,5,2)') as ct(centro text, enero numeric(11,2), febrero numeric(11,2),marzo numeric(11,2),abril numeric(11,2),mayo numeric(11,2),junio numeric(11,2),julio numeric(11,2),agosto numeric(11,2),septiembre numeric(11,2),octubre numeric(11,2),noviembre numeric(11,2),diciembre numeric(11,2))";
}else if ($tipo=='2') {
	$sql=$sql."Group By SubString(p_atr,1,4),SubString(p_atr,5,2),trim(n_per)
order by 1,SubString(p_atr,5,2)') as ct(centro text, enero numeric(11,2), febrero numeric(11,2),marzo numeric(11,2),abril numeric(11,2),mayo numeric(11,2),junio numeric(11,2),julio numeric(11,2),agosto numeric(11,2),septiembre numeric(11,2),octubre numeric(11,2),noviembre numeric(11,2),diciembre numeric(11,2))";
}

		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
}
	?>
