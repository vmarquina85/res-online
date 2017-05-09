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
		$sql="select * from summary.crosstab('select operativo,date_part(''year'' ,fecha) as annio,sum(ingresos) as ingresos from summary.redo where  date_part(''year'' ,fecha) in (".$anio.",".($anio-1).",".($anio-2).")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha)=".$mes;
		}
		$sql=$sql." group by operativo,date_part(''year'' ,fecha)";
		if ($mes!='*') {
			$sql=$sql.",date_part(''month'' ,fecha)";
		}
		$sql=$sql." order by 1','select * from unnest(array[".$anio.",".($anio-1).",".($anio-2)."]) order by 1') as ct(operativo character varying(100), \"".($anio-2)."\" numeric(11,2),\"".($anio-1)."\" numeric(11,2),\"".($anio)."\"  numeric(11,2))";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function compCentros_atenciones($anio,$mes){
		$sql="select * from summary.crosstab('select operativo,date_part(''year'' ,fecha) as annio,sum(atenciones) as atenciones from summary.redo where  date_part(''year'' ,fecha) in (".$anio.",".($anio-1).",".($anio-2).")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha)=".$mes;
		}
		$sql=$sql." group by operativo,date_part(''year'' ,fecha)";
		if ($mes!='*') {
			$sql=$sql.",date_part(''month'' ,fecha)";
		}
		$sql=$sql." order by 1','select * from unnest(array[".$anio.",".($anio-1).",".($anio-2)."]) order by 1') as ct(operativo character varying(100), \"".($anio-2)."\" numeric(11,2),\"".($anio-1)."\" numeric(11,2),\"".($anio)."\"  numeric(11,2))";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function compMeses_ingresos($anio,$mes){
		$sql="select * from summary.crosstab('select date_part(''month'' ,fecha) as mes,date_part(''year'' ,fecha) as annio,sum(ingresos) as ingresos from summary.redo where  date_part(''year'' ,fecha) in (".$anio.",".($anio-1).",".($anio-2).")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha)=".$mes;
		}
		$sql=$sql." group by date_part(''year'' ,fecha),date_part(''month'' ,fecha) ";

		$sql=$sql." order by 1','select * from unnest(array[".$anio.",".($anio-1).",".($anio-2)."]) order by 1') as ct(mes character varying(100), \"".($anio-2)."\" numeric(11,2),\"".($anio-1)."\" numeric(11,2),\"".($anio)."\"  numeric(11,2))";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function compMeses_atenciones($anio,$mes){
		$sql="select * from summary.crosstab('select date_part(''month'' ,fecha) as mes,date_part(''year'' ,fecha) as annio,sum(atenciones) as atenciones from summary.redo where  date_part(''year'' ,fecha) in (".$anio.",".($anio-1).",".($anio-2).")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha)=".$mes;
		}
		$sql=$sql." group by date_part(''year'' ,fecha),date_part(''month'' ,fecha) ";

		$sql=$sql." order by 1','select * from unnest(array[".$anio.",".($anio-1).",".($anio-2)."]) order by 1') as ct(mes character varying(100), \"".($anio-2)."\" numeric(11,2),\"".($anio-1)."\" numeric(11,2),\"".($anio)."\"  numeric(11,2))";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function compEspecialidades_ingresos($anio,$mes){
		$sql="select * from summary.crosstab('select especialidad,date_part(''year'' ,fecha) as annio,sum(ingresos) as ingresos from summary.redo where  date_part(''year'' ,fecha) in (".$anio.",".($anio-1).",".($anio-2).")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha)=".$mes;
		}
		$sql=$sql." group by especialidad,date_part(''year'' ,fecha)";
		if ($mes!='*') {
			$sql=$sql.",date_part(''month'' ,fecha)";
		}
		$sql=$sql." order by 1','select * from unnest(array[".$anio.",".($anio-1).",".($anio-2)."]) order by 1') as ct(especialidad character varying(100), \"".($anio-2)."\" numeric(11,2),\"".($anio-1)."\" numeric(11,2),\"".($anio)."\"  numeric(11,2))";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function compEspecialidades_atenciones($anio,$mes){
		$sql="select * from summary.crosstab('select especialidad,date_part(''year'' ,fecha) as annio,sum(atenciones) as atenciones from summary.redo where  date_part(''year'' ,fecha) in (".$anio.",".($anio-1).",".($anio-2).")";
		if ($mes!='*') {
			$sql=$sql." and date_part(''month'' ,fecha)=".$mes;
		}
		$sql=$sql." group by especialidad,date_part(''year'' ,fecha)";
		if ($mes!='*') {
			$sql=$sql.",date_part(''month'' ,fecha)";
		}
		$sql=$sql." order by 1','select * from unnest(array[".$anio.",".($anio-1).",".($anio-2)."]) order by 1') as ct(especialidad character varying(100), \"".($anio-2)."\" numeric(11,2),\"".($anio-1)."\" numeric(11,2),\"".($anio)."\"  numeric(11,2))";
		$res=pg_query(parent::conexion_resumen(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
}
	?>
