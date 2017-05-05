	//---------DEFINICION DE VARIABLES------------- 
		var indice;
		var tabladetalle = $("#tbl_pape_det");
		//-------FIN DEFINICION------------------------
		$(document).ready(function() {
			App.init();
			FormWizard.init();
			FormPlugins.init();
		});

		$("#Li_chgpsw").click(function(){
			var modal_1= $("#modal_chgpsw");
		
			$(modal_1).modal();
		});
		$("#btn_buscar_bd").click(function(){
			var modal= $("#modal_buscar");

			$(modal).modal();
		});

		$("#datepicker-default").datepicker({
			todayHighlight: !0
		}), $("#datepicker-inline").datepicker({
			todayHighlight: !0
		}), $(".input-daterange").datepicker({
			todayHighlight: !0
		}), $("#datepicker-disabled-past").datepicker({
			todayHighlight: !0
		}), $("#datepicker-autoClose").datepicker({
			todayHighlight: !0,
			autoclose: !0
		})

		var DEPENDENCIA =[ 
		<?php for($i=0;$i<sizeof($rs_dependencias);$i++)
		{
			?>
			'<?php echo $rs_dependencias[$i]["descripcion"] ?>',  
			<?php 
		}

		?>
		];
		var PERSONAL =[ 
		<?php for($i=0;$i<sizeof($rs_personal);$i++)
		{
			?>
			'<?php echo $rs_personal[$i]["persona"] ?>',  
			<?php 
		}

		?>
		];  
		var AREA =[ 
		<?php for($i=0;$i<sizeof($rs_area);$i++)
		{
			?>
			'<?php echo $rs_area[$i]["descripcion"] ?>',  
			<?php 
		}

		?>
		];  
		var CARGO =[ 
		<?php for($i=0;$i<sizeof($rs_cargo);$i++)
		{
			?>
			'<?php echo $rs_cargo[$i]["descripcion"] ?>',  
			<?php 
		}

		?>
		];  
// iniciamos el autocomplete
$( "#txt_dep_o").autocomplete({
	source: DEPENDENCIA
});
$( "#txt_dep_d").autocomplete({
	source: DEPENDENCIA
});

$( "#txt_entrega_o").autocomplete({
	source: PERSONAL
});
$( "#txt_recibe_d").autocomplete({
	source: PERSONAL
});

$( "#txt_area_o").autocomplete({
	source: AREA
});
$( "#txt_area_d").autocomplete({
	source: AREA
});
$( "#txt_cargo_o").autocomplete({
	source: CARGO
});
$( "#txt_cargo_d").autocomplete({
	source: CARGO
});

function Buscar_equipo() {
	if (window.XMLHttpRequest) {
		var http=getXMLHTTPRequest();
	};
	// $("#sldistPaciente").removeAttr("disabled");
	var url = 'buscar_bien.php';
	var param=document.getElementById("txt_parametro").value;
	var modurl = url+ "?parametro="+ param;
	http.open("GET", modurl, false);
	http.addEventListener('readystatechange', function() {
		if (http.readyState == 4) {
			if(http.status == 200) {
				var miTexto = http.responseText;
				document.getElementById("tb_bienes").innerHTML = (miTexto); 
			};
		}; 

	});
	// http.onreadystatechange = useHttpResponseDistritoPac;
	http.send(null);
};
function agregar_detalle(fila){


	codigo=fila.cells[0].innerHTML;
	clase=fila.cells[1].innerHTML;
	descripcion=fila.cells[2].innerHTML;
	marca=fila.cells[3].innerHTML
	serie=fila.cells[4].innerHTML
	modelo=fila.cells[5].innerHTML;
	estado=fila.cells[6].innerHTML;
	tabladetalle.append("<tr id="+indice+" style='font-size: 10px;background:#ffffff;'><td>1</td><td>"+codigo+"</td><td>"+descripcion+"</td><td>"+marca+"</td><td>"+serie+"</td><td>"+estado+"</td><td contenteditable='true' ></td><td><a href=\"javascript:DeleteDetalle("+indice+");\"><i class='fa fa-times'></i></td></tr>"); 
	indice=indice+1;
	$('#modal_buscar').modal('hide');

};
$("#btn_nuevo").click(function(){

	tabladetalle.append("<tr id="+indice+" style='font-size: 10px;background:#ffffff;'><td>1</td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td><a href=\"javascript:DeleteDetalle("+indice+");\"><i class='fa fa-times'></i></td></tr>"); 
	indice=indice+1;
});
function DeleteDetalle(r){ 
	var tabla =document.getElementById("tbl_pape_det");
	var selectedIndex=document.getElementById(r).rowIndex;
	tabla.deleteRow(selectedIndex);
};
function update_contrasena(){
	if ((document.getElementById("actual_contrasena").value!="" && document.getElementById("new_contrasena").value!=0) && (document.getElementById("repetir_contrasena").value!="") )
	{
		if (window.XMLHttpRequest) {
			var http=getXMLHTTPRequest();
		};
		var url = 'update_contrasena.php';
		var act_pass=document.getElementById("actual_contrasena").value;
		var new_pass=document.getElementById("new_contrasena").value;
		var new_pass_rep=document.getElementById("repetir_contrasena").value;
		var modurl = url + "?pass=" + act_pass + "&n_pass=" + new_pass + "&r_pass=" + new_pass_rep +"&userid=<?php echo $_SESSION['user_id'] ?>";
		http.open("POST", modurl, false);
		http.addEventListener('readystatechange', function() {
			if (http.readyState == 4) {
				if(http.status == 200) {
					var respuesta = http.responseText.trim();
					if (respuesta=="0") {

						document.getElementById('mod_title').innerHTML='Información';
						document.getElementById('mod_msg').innerHTML='Contraseña actual no es Correcta' ;
						$("#modal-alert").modal();	


					}else{
						document.getElementById('mod_title').innerHTML='Información';
						document.getElementById('mod_msg').innerHTML='Contraseña Cargada con Exito' ;
						$("#modal-alert").modal();
					};
				};
			}; 

		});
	// http.onreadystatechange = useHttpResponseProvPac;
	http.send(null);
} else {

	document.getElementById('mod_title').innerHTML='Alerta';
	document.getElementById('mod_msg').innerHTML='Debe llenar todos los datos para continuar' ;
	$("#modal-alert").modal();
};
};
function obtener_datos_impresion(){

};