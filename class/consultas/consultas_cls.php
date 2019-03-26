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
	function ComparativoAtenciones($anio1,$anio2,$mes,$dia){
		$sql="select * from summary.crosstab('select operativo,date_part(''year'' ,fecha) as annio,sum(atenciones) as atenciones from summary.redo where  date_part(''year'' ,fecha) in (".$anio1.",".$anio2.")";
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
	function compMeses_atenciones($anio1,$anio2,$mes,$dia){
		$sql="select * from summary.crosstab('select date_part(''month'' ,fecha) as mes,date_part(''year'' ,fecha) as annio,sum(atenciones) as atenciones from summary.redo where  date_part(''year'' ,fecha) in (".$anio1.",".$anio2.")";
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
	function compEspecialidades_atenciones($anio1,$anio2,$mes,$dia){
		$sql="select * from summary.crosstab('select especialidad,date_part(''year'' ,fecha) as annio,sum(atenciones) as atenciones from summary.redo where  date_part(''year'' ,fecha) in (".$anio1.",".$anio2.")";
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
	function compFechas_atenciones($anio1,$anio2,$mes,$dia){
		$sql="select * from summary.crosstab('select to_char(fecha,''DD/MM'') as fecha ,date_part(''year'' ,fecha) as annio,sum(atenciones) as atenciones from summary.redo where  date_part(''year'' ,fecha) in (".$anio1.",".$anio2.")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha) in (".$mes.")";
		}else{
			$nmes=substr($dia,3,2);
			$nday=substr($dia,0,2);
			$sql=$sql." and ((fecha >=''01/01/".$anio1."'' and fecha <=''".$nday."/".$nmes."/".$anio1."'') or(fecha >=''01/01/".$anio2."'' and fecha <=''".$nday."/".$nmes."/".$anio2."''))";
		}
		$sql=$sql." group by  to_char(fecha,''DD/MM''), date_part(''year'' ,fecha)";
		if ($anio1>$anio2) {
			$sql=$sql." order by 1','select * from unnest(array[".$anio1.",".$anio2."]) order by 1 desc')as ct(fecha character varying(100), \"".$anio1."\" numeric(11,2), \"".$anio2."\" numeric(11,2))";
		}else {
			$sql=$sql." order by 1','select * from unnest(array[".$anio1.",".$anio2."]) order by 1 desc')as ct(fecha character varying(100), \"".$anio2."\" numeric(11,2), \"".$anio1."\" numeric(11,2))";
		}
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function compFechas_ingresos($anio1,$anio2,$mes,$dia){
		$sql="select * from summary.crosstab('select to_char(fecha,''DD/MM'') as fecha,date_part(''year'' ,fecha) as annio,sum(ingresos) as ingresos from summary.redo where  date_part(''year'' ,fecha) in (".$anio1.",".$anio2.")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha) in (".$mes.")";

		}else{
			$nmes=substr($dia,3,2);
			$nday=substr($dia,0,2);
			$sql=$sql." and ((fecha >=''01/01/".$anio1."'' and fecha <=''".$nday."/".$nmes."/".$anio1."'') or(fecha >=''01/01/".$anio2."'' and fecha <=''".$nday."/".$nmes."/".$anio2."''))";
		}
		$sql=$sql." group by to_char(fecha,''DD/MM''), date_part(''year'' ,fecha)";
		if ($anio1>$anio2) {
			$sql=$sql." order by 1','select * from unnest(array[".$anio1.",".$anio2."]) order by 1 desc')as ct(fecha character varying(100), \"".$anio1."\" numeric(11,2), \"".$anio2."\" numeric(11,2))";
		}else {
			$sql=$sql." order by 1','select * from unnest(array[".$anio1.",".$anio2."]) order by 1 desc')as ct(fecha character varying(100), \"".$anio2."\" numeric(11,2), \"".$anio1."\" numeric(11,2))";
		}
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}

	function compEstxingresos($anio1,$anio2,$mes,$dia){
		$sql="select case when a.operativo is null then b.operativo else a.operativo end, case when a.dia is null then date_part('day',b.dia) else date_part('day',a.dia) end as dia,case when a.dia is null then date_part('month',b.dia) else date_part('month',a.dia) end as mes,a.\"".$anio1."\",b.\"".$anio2."\"
                FROM (select OPERATIVO||to_char(fecha,'DDMM') AS COD,operativo, fecha as dia,sum(ingresos) as \"".$anio1."\" from summary.redo
							where	date_part('year' ,fecha) in (".$anio1.")";
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha) in (".$mes.")";
		}else{
			$nmes=substr($dia,3,2);
			$nday=substr($dia,0,2);
			$sql=$sql." and (fecha >='01/01/$anio1' and fecha <='$nday/$nmes/$anio1')";
		}
		$sql=$sql." group by operativo, fecha, date_part('year' ,fecha)order by operativo ,fecha)a
		FULL OUTER JOIN
		(select OPERATIVO||to_char(fecha,'DDMM') AS COD,operativo, fecha as dia,sum(ingresos) as \"".$anio2."\" from summary.redo where  date_part('year' ,fecha) in (".$anio2.")";
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha) in (".$mes.")";
		}else{
			$nmes=substr($dia,3,2);
			$nday=substr($dia,0,2);
			$sql=$sql." and (fecha >='01/01/$anio2' and fecha <='$nday/$nmes/$anio2')";
		}
	$sql=$sql." group by operativo, fecha, date_part('year' ,fecha)order by operativo ,fecha)b on a.COD=b.COD order by 1,3,2";
		// echo $sql;
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}

	function compEstxAtenciones($anio1,$anio2,$mes,$dia){
		$sql="select case when a.operativo is null then b.operativo else a.operativo end, case when a.dia is null then date_part('day',b.dia) else date_part('day',a.dia) end as dia,case when a.dia is null then date_part('month',b.dia) else date_part('month',a.dia) end as mes,a.\"".$anio1."\",b.\"".$anio2."\"
								FROM (select OPERATIVO||to_char(fecha,'DDMM') AS COD,operativo, fecha as dia,sum(atenciones) as \"".$anio1."\" from summary.redo
							where	date_part('year' ,fecha) in (".$anio1.")";
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha) in (".$mes.")";
		}else{
			$nmes=substr($dia,3,2);
			$nday=substr($dia,0,2);
			$sql=$sql." and (fecha >='01/01/$anio1' and fecha <='$nday/$nmes/$anio1')";
		}
		$sql=$sql." group by operativo, fecha, date_part('year' ,fecha)order by operativo ,fecha)a
		FULL OUTER JOIN
		(select OPERATIVO||to_char(fecha,'DDMM') AS COD,operativo, fecha as dia,sum(atenciones) as \"".$anio2."\" from summary.redo where  date_part('year' ,fecha) in (".$anio2.")";
		if ($mes!='*') {
			$sql=$sql." and date_part('month' ,fecha) in (".$mes.")";
		}else{
			$nmes=substr($dia,3,2);
			$nday=substr($dia,0,2);
			$sql=$sql." and (fecha >='01/01/$anio2' and fecha <='$nday/$nmes/$anio2') ";
		}
	$sql=$sql." group by operativo, fecha, date_part('year' ,fecha)order by operativo ,fecha)b on a.COD=b.COD order by 1,3,2";
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
	function getReporteAsociados1($anio,$ope,$especialidad){
		//convertir años a un array
		$arrayAnio= explode(",",$anio);
		$sql="select * from summary.crosstab('select trim(n_ras) as raz_soc, substring(p_atr,1,4) as anio,sum(v_pag)importe From summary.res_pro_ven_ate where  trim(n_ras)!=''''  AND cast(substring(p_atr,1,4) as integer) in (".$anio.")";
		if ($especialidad!="*") {
			$sql=$sql." and n_esp=''".$especialidad."''";
		}
		if ($ope!="*") {
			$sql=$sql." and n_ope=''".$ope."''";
		}
		$sql=$sql." group by trim(n_ras),substring(p_atr,1,4) order by 1','select * from unnest(array[".$anio."]) order by 1 desc')as ct(r_social character varying(100)";
		for ($i=sizeof($arrayAnio)-1; $i >=0 ; $i--) {
			$sql=$sql.",\"".$arrayAnio[$i]."\" numeric(11,2)";
		}

		$sql=$sql.")";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function getReporteAsociados2($anio,$ope,$especialidad){
		//convertir años a un array
		$arrayAnio= explode(",",$anio);
		$sql="select * from summary.crosstab('select trim(n_per) as raz_soc, substring(p_atr,1,4) as anio,sum(v_pag)importe From summary.res_pro_ven_ate where  trim(n_ras)='''' and (trim(n_per)!='''' or trim(n_per) is not null)   AND cast(substring(p_atr,1,4) as integer) in (".$anio.")";
		if ($especialidad!="*") {
			$sql=$sql." and n_esp=''".$especialidad."''";
		}
		if ($ope!="*") {
			$sql=$sql." and n_ope=''".$ope."''";
		}
		$sql=$sql." group by trim(n_per),substring(p_atr,1,4) order by 1','select * from unnest(array[".$anio."]) order by 1 desc')as ct(r_social character varying(100)";

		for ($i=sizeof($arrayAnio)-1; $i >=0 ; $i--) {
			$sql=$sql.",\"".$arrayAnio[$i]."\" numeric(11,2)";
		}

		$sql=$sql.")";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}

}
?>
