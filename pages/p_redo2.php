<?php
session_start();
if (!isset($_SESSION["resonlinepermitido"])) {
 header("location:../index.php");
 exit();
};

// require('../class/consulta/funciones.php');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
 <meta charset="utf-8" />
 <title>Reportes Gerenciales</title>
 <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
 <meta content="" name="description" />
 <meta content="" name="author" />

 <!-- ================== BEGIN BASE CSS STYLE ================== -->
<link rel="shortcut icon" sizes="16x16" type="image/png" href="../assets/img/favicon/logo.png">
 <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
 <link href="../assets/css/jquery-ui.min.css" rel="stylesheet" />
 <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
 <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
 <link href="../assets/css/animate.min.css" rel="stylesheet" />
 <link href="../assets/css/style.min.css" rel="stylesheet" />
 <link href="../assets/css/style-responsive.min.css" rel="stylesheet" />
 <link href="../assets/css/orange.css" rel="stylesheet" id="theme" />
   <link href="../assets/css/sysinv.css" rel="stylesheet" id="theme" />
 <link href="../assets/css/datepicker.css" rel="stylesheet"/>
 <link href="../assets/css/datepicker3.css" rel="stylesheet"/>
 <link rel="stylesheet" href="../assets/plugins//odometer/themes/odometer-theme-default.css"/>

 <!-- ================== END BASE CSS STYLE ================== -->

 <!-- ================== BEGIN BASE JS ================== -->
  <script src="../assets/js/pace.min.js"></script>
 <!-- ================== END BASE JS ================== -->
 <style>
 .navbar-brand{
   width: auto;
 }
 .navbar-brand>img {
   display: inline;
}
.page-sidebar-minified>.sidebar{
 height:100%
}
 </style>

</head>
<body>
 <!-- begin #page-loader -->
 <div id="page-loader" class="fade in"><span class="spinner"></span></div>
 <!-- end #page-loader -->

 <!-- begin #page-container -->
 <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
   <!-- begin #header -->
   <div id="header" class="header navbar navbar-default navbar-fixed-top">
     <!-- inicio container-fluid   -->
     <div class="container-fluid bg-orange">
       <div class="navbar-header">
         <a href="../index.php" class="navbar-brand">
           <!-- <i class="fa fa-table" style='color:#ffffff'></i> -->
<img src="../assets/img/logo.png" alt="">
         <strong class='text-white sombrear'>Res-online</strong>

         </a>
         <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
           <span class="icon-bar bg-white"></span>
           <span class="icon-bar bg-white"></span>
           <span class="icon-bar bg-white"></span>
         </button>
       </div>
     </div><!-- Final container-fluid    -->

   </div><!-- Fin Cabecera   -->
   <!-- end #header -->

   <!-- begin #sidebar -->
   <div id="sidebar" class="sidebar">
     <!-- begin sidebar scrollbar -->
     <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
       <div data-scrollbar="true" data-height="100%" style="overflow: hidden; width: auto; height: 100%;">
         <!-- begin sidebar user -->
         <ul class="nav">
           <li class="nav-profile">
             <div class="image">
               <a href="javascript:;"><img src="../assets/img/avatars/A.jpg" alt=""></a>
             </div>
             <div class="info">
               Admin
               <small>Administrador</small>
             </div>
           </li>
         </ul>
         <!-- end sidebar user -->
         <!-- begin sidebar nav -->
         <ul class="nav">
           <li class="has-sub">
               <a href="../pages/p_redo1.php">
                   <!--        <b class="caret pull-right"></b> -->
                   <i class="fa fa-laptop"></i>
                   <span>RESUMEN DIARIO  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DE OPERACIONES</span>
               </a>
           </li>
           <li class="has-sub active">
               <a href="../pages/p_redo2.php">
                   <!--        <b class="caret pull-right"></b> -->
                   <i class="fa fa-laptop"></i>
                   <span>REPORTE DETALLADO  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POR CENTRO</span>
               </a>
           </li>
   <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
         </ul>
         <!-- end sidebar nav -->
       </div>
       <div class="slimScrollBar ui-draggable" style="width: 7px; position: absolute; top: 128px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 81.753339269813px; background: rgb(0, 0, 0);"></div>
       <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div>
       <!-- end sidebar scrollbar -->
     </div>

   </div>


   <div id="content" class="content">
     <!-- <h1 class="page-header" >Reporte 2</h1> -->
     <div class="wrapper bg-silver-lighter m-b-15">
       <div class="form-inline">
         <h5>Parametros de Busqueda</h5>
         <select class=" form-control m-b-5" id="sl_centro">
           <option value="0">SELECCIONE</option>
           <optgroup label="CENTROS MEDICOS">
             <option value="CEN">EL NAZARENO</option>
             <option value="CCH">HUAYCAN</option>
             <option value="CCM">JOSE CARLOS MARIATEGUI</option>
             <option value="CJP">JUAN PABLO II</option>
             <option value="CLE">LA ENSENADA</option>
             <option value="CLV">LAS VIOLETAS</option>
             <option value="CRM">SAN RAMON</option>
             <option value="CSM">SEÑOR DE LOS MILAGROS</option>
             <option value="CSR">SINCHI ROCA</option>
             <option value="CHN">TRABAJADORES HOSPITAL DEL NINO</option>
             <option value="CVL">VILLA LIMATAMBO</option>
           </optgroup>


           <optgroup label="HOSPITALES PROVINCIAS">
             <option value="CIX">CHICLAYO</option>
             <option value="CZC">CUZCO</option>
             <option value="CZ2">CUZCO - SAN GERONIMO</option>
             <option value="ICA">ICA</option>
             <option value="SLN">SULLANA</option>
             <option value="TCN">TACNA</option>
             <option value="TRP">TARAPOTO</option>
             <option value="TMB">TUMBES</option>
           </optgroup>

           <optgroup label="HOSPITALES LIMA">
             <option value="ATE">ATE</option>
             <option value="CMN">CAMANA</option>
             <option value="CAR">CARABAYLLO</option>
             <option value="CHR">CHORRILLOS</option>
             <option value="CMS">COMAS</option>
             <option value="EAG">EL AGUSTINO</option>
             <option value="MGD">MAGDALENA DEL MAR</option>
             <option value="RMC">METRO UNI</option>
             <option value="CLM">MIRONES BAJO</option>
             <option value="PTP">PUENTE PIEDRA</option>
             <option value="PHR">PUNTA HERMOSA</option>
             <option value="LN2">RISSO</option>
             <option value="SJL">SAN JUAN DE LURIGANCHO</option>
             <option value="SMP">SAN MARTIN DE PORRES</option>
             <option value="SRQ">SURQUILLO</option>
             <option value="VES">VILLA EL SALVADOR</option>
             <option value="VMT">VILLA MARIA DEL TRIUNFO</option>
           </optgroup>

         </select>
         <input type="text" class="form-control datepicker-autoClose  m-b-5" placeholder="Fecha Inicio" id='txt_fec_ini'/>
         <input type="text" class="form-control datepicker-autoClose  m-b-5" placeholder="Fecha Fin" id='txt_fec_ini'/>

   <button class="btn btn-primary m-b-5" onclick="mostrardatos()">Buscar</button>


       </div>
     </div>
     <div class="row">
       <div class="col-md-6">
         <div class="widget widget-stats bg-green">
           <div class="stats-icon"><i class="fa fa-usd"></i></div>
           <div class="stats-info">
             <h4>TOTAL INGRESOS</h4>
             <span>S/. </span><p id='bnr_ingresos' class="odometer">0</p>
           </div>
           <div class="stats-link" id='btn_detalle_ingreso'>
             <a href="javascript:;" >Ver Detalles <i class="fa fa-arrow-circle-o-right"></i></a>
           </div>
         </div>
       </div>
       <div class="col-md-6">
         <div class="widget widget-stats bg-orange">
           <div class="stats-icon"><i class="fa fa-user"></i></div>
           <div class="stats-info">
             <h4>TOTAL ATENCIONES</h4>
             <p id='bnr_atencion' class="odometer">0</p>

           </div>
           <div class="stats-link" id='btn_detalle_Atenciones'>
             <a href="javascript:;" >Ver Detalles <i class="fa fa-arrow-circle-o-right"></i></a>
           </div>
         </div>
       </div>
     </div>

     <div class='row'>
       <div class='col-md-12'>
         <div class="panel panel-success" data-sortable-id="ui-widget-2">
           <div class="panel-heading">
             <div class="btn-group pull-right">
               <button type="button" class="btn btn-success btn-xs">Tipo</button>
               <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 <span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
                 <li><a href="javascript:;" onclick="cambiar_tipo_graph('column');">Columnas</a></li>
                 <li><a href="javascript:;" onclick="cambiar_tipo_graph('line');">Lineas</a></li>
                 <li><a href="javascript:;" onclick="cambiar_tipo_graph('table');">Tabla</a></li>
               </ul>
             </div>

             <h4 class="panel-title">Informacion Comparativa</h4>

           </div>
           <div class="panel-body">


             <div id="container"></div>
           </div>
         </div>
       </div>
     </div>

     <div class='modal fade' id='md_detalle_I' aria-hidden='true' style='display: none;'>
       <div class='modal-dialog'>

         <div class='modal-content'>
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title">Ingresos por Especialidad</h4>
           </div>
           <div class="modal-body">
             <div id="detalle_ingresos" ></div>
           </div>
         </div>
       </div>
     </div>

     <div class='modal fade' id='md_detalle_A' aria-hidden='true' style='display: none;'>
       <div class='modal-dialog'>

         <div class='modal-content'>
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title">Atenciones por Especialidad</h4>
           </div>
           <div class="modal-body">

             <div>
               <div id="detalle_atenciones" >

               </div>

             </div>
           </div>
         </div>
       </div>
     </div>




     <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
     <!-- end scroll to top btn -->
   </div>
   <!-- end page container -->
   <!-- ================== BEGIN BASE JS ================== -->
   <script src="../assets/js/jquery-1.9.1.min.js"></script>
   <script src="../assets/js/jquery-migrate-1.1.0.min.js"></script>
   <script src="../assets/js/jquery-ui.min.js"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
   <script src="../assets/js/jquery.slimscroll.min.js"></script>
   <script src="../assets/js/jquery.cookie.js"></script>

   <script src="../assets/js/highcharts.js"></script>
   <script src="../assets/plugins/odometer/odometer.js"></script>
   <!-- ================== END BASE JS ========================== -->
   <!-- ================== BEGIN PAGE LEVEL JS ================== -->

   <script src="../assets/js/bootstrap-datepicker.js"></script>
   <script src="../assets/js/jquery.dataTables.js"></script>
   <script src="../assets/js/apps.min.js"></script>
   <script src="../assets/js/ajax.js"></script>
   <!-- ================== END PAGE LEVEL JS ================== -->
   <script>
 //globals
 var f= new Date();
 $(document).ready(function() {
   App.init();

   var hoy =f.getDate() + "/" + pad((f.getMonth() +1),2,0) + "/" + f.getFullYear();

   $('[data-toggle="tooltip"]').tooltip();


 });


 $(".datepicker-default").datepicker({
   todayHighlight: !0,
   format: 'dd/mm/yyyy'
 }), $(".datepicker-inline").datepicker({
   todayHighlight: !0,
   format: 'dd/mm/yyyy'
 }), $(".input-daterange").datepicker({
   todayHighlight: !0,
   format: 'dd/mm/yyyy'
 }), $(".datepicker-disabled-past").datepicker({
   todayHighlight: !0,
   format: 'dd/mm/yyyy'
 }), $(".datepicker-autoClose").datepicker({
   todayHighlight: !0,
   autoclose: !0,
   format: 'dd/mm/yyyy'
 });

 function pad(n, width, z) {
   z = z || '0';
   n = n + '';
   return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
 }
 function fn_get_datos(dependencia,txtdate,txtdate_end,tipo){
   var url = "../get/get_datos.php?dependencia="+dependencia+"&txtdate="+txtdate+"&txtdate_end="+txtdate_end+"&method=get_grant_sales_by_day&tipo="+tipo;
   $.getJSON (url, function (datatable) {
     var data = datatable;
     if (tipo=='I') {
       setTimeout(function(){$('#bnr_ingresos').text(data)}, 10);
     }else if(tipo=='A'){
       setTimeout(function(){$('#bnr_atencion').text(data)}, 10);
     };

   });
 }
 function mostrardatos(){
   $('#bnr_ingresos').text(0);
   $('#bnr_atencion').text(0);
   var centro=document.getElementById("sl_centro").value;
   var fechaincio=document.getElementById("txt_fec_ini").value;
   var fechafin=document.getElementById("txt_fec_ini").value;
   if (centro!="0" && fechaincio!="" && fechafin!="") {
     fn_get_datos(centro,fechaincio,fechafin,'I');
     fn_get_datos(centro,fechaincio,fechafin,'A');
     get_detalles_especialidad(centro,fechaincio,fechafin,'A');
     get_detalles_especialidad(centro,fechaincio,fechafin,'I');
   //llenado "EN DURO" de datos de Tabla___________________________
   $('#container').highcharts({
     chart: {
       type: 'column'
     },
     title: {
       text: 'Ingresos Mensuales (Comparativo Años)'
     },
     subtitle: {
       text: 'Grafica-Barra <br />Data de Prueba'
     },
     xAxis: {
       categories: [
       'Jan',
       'Feb',
       'Mar',
       'Apr',
       'May',
       'Jun',
       'Jul',
       'Aug',
       'Sep',
       'Oct',
       'Nov',
       'Dec'
       ],
       crosshair: true
     },
     yAxis: {
       min: 0,
       title: {
         text: 'Ingresos S/.'
       }
     },
     tooltip: {
       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}:</td>' +
       '<td style="padding:0"><b>  S/. {point.y:,.0f}</b></td></tr>',
       footerFormat: '</table>',
       shared: true,
       useHTML: true
     },
     credits: {
       enabled: false
     },
     legend: {
       layout: 'horizontal',
       align: 'center',
       verticalAlign: 'bottom',
       borderWidth: 0
     },
     plotOptions: {
       column: {
         pointPadding: 0.2,
         borderWidth: 0
       }
     },
     series: [{
       name: '2016',
       data:[ 303438,393240,537584,303423,485097,292217]

     }, {
       name: '2015',
       //data: [466965,368065,504203,546663,426609,468342,339026,579659,433593,292217,568739,481774]
       data: [466965,368065,504203,546663,426609,468342]

     }, {
       name: '2014',
       //data:  [529133,513199,527666,549908,573318,531284,506772,597928,502258,591406,515475,512301]
       data:  [529133,513199,527666,549908,573318,531284]

     }, {
       name: '2013',
       //data:  [529133,596901,507443,548445,584943,550732,575006,510040,507543,544188,556144,598141]
       data:  [529133,596901,507443,548445,584943,550732]

     }]
   });
}else{
 alert("Completar los Datos");

};
//llenado "EN DURO" de datos de Tabla___________________________
 };//Fin Función_____________________________________________

 function get_detalles_especialidad(dependencia,txtdate,txtdate_end,tipo){
   var url = "../get/get_detalle.php?dependencia="+dependencia+"&txtdate="+txtdate+"&txtdate_end="+txtdate_end+"&method=get_grant_sales_by_specialy&tipo="+tipo;
   $.get (url, function (datatable) {
       var data = eval(datatable); //we are good here
       if (tipo=='I') {
         $('#detalle_ingresos').highcharts().series[0].setData(data);
         $('#detalle_ingresos').highcharts().redraw();
       }else if(tipo=='A'){
         $('#detalle_atenciones').highcharts().series[0].setData(data);
         $('#detalle_atenciones').highcharts().redraw();
       };
   });
 }



 function cambiar_tipo_graph(tipo){
   if (tipo=='line'|| tipo=='column') {
     $('#container').highcharts({
       chart: {
         type: tipo
       },
       title: {
         text: 'Ingresos Mensuales (Comparativo Años)'
       },
       subtitle: {
         text: 'Grafica-'+tipo +'<br />Data de Prueba'
       },
       xAxis: {
         categories: [
         'Jan',
         'Feb',
         'Mar',
         'Apr',
         'May',
         'Jun',
         'Jul',
         'Aug',
         'Sep',
         'Oct',
         'Nov',
         'Dec'
         ],
         crosshair: true
       },
       yAxis: {
         min: 0,
         title: {
           text: 'Ingresos S/.'
         }
       },
       tooltip: {
         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}:</td>' +
         '<td style="padding:0"><b>  S/. {point.y:,.0f}</b></td></tr>',
         footerFormat: '</table>',
         shared: true,
         useHTML: true
       },
       credits: {
         enabled: false
       },
       legend: {
         layout: 'horizontal',
         align: 'center',
         verticalAlign: 'bottom',
         borderWidth: 0
       },
       plotOptions: {
         column: {
           pointPadding: 0.2,
           borderWidth: 0
         }
       },
       series: [{
         name: '2016',
         data:[ 303438,393240,537584,303423,485097,292217]

       }, {
         name: '2015',
       // data: [466965,368065,504203,546663,426609,468342,339026,579659,433593,292217,568739,481774]
       data: [466965,368065,504203,546663,426609,468342]

     }, {
       name: '2014',
       //data:  [529133,513199,527666,549908,573318,531284,506772,597928,502258,591406,515475,512301]
       data:  [529133,513199,527666,549908,573318,531284]

     }, {
       name: '2013',
       //data:  [529133,596901,507443,548445,584943,550732,575006,510040,507543,544188,556144,598141]
       data:  [529133,596901,507443,548445,584943,550732]
     }]
   });
var chart3 = $('#container').highcharts();
$('#detalle_atenciones').css('visibility', 'hidden');
$('#detalle_atenciones').css('visibility', 'initial');
chart3.reflow();
}else{
 $('#container').empty();
 $('#container').append(
   '<div class="table-responsive"><table class="table table-condensed table-hover table-bordered"><tr><th>Año</th><th>Enero</th><th>Febrero</th><th>Marzo</th><th>Abril</th><th>Mayo</th><th>Junio</th><th>JuLio</th><th>Agosto</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th></tr><tr><th>2016</th><td>303438</td><td>393240</td><td>537584</td><td>303423</td><td>485097</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><th>2015</th><td>466965</td><td>368065</td><td>504203</td><td>546663</td><td>426609</td><td>468342</td><td>339026</td><td>579659</td><td>433593</td><td>292217</td><td>568739</td><td>481774</td></tr><tr><th>2014</td><td>529133</td><td>513199</td><td>527666</td><td>549908</td><td>573318</td><td>531284</td><td>506772</td><td>597928</td><td>502258</td><td>591406</td><td>515475</td><td>512301</td></tr><tr><th>2013</th><td>529133</td><td>596901</td><td>507443</td><td>548445</td><td>584943</td><td>550732</td><td>575006</td><td>510040</td><td>507543</td><td>544188</td><td>556144</td><td>598141</td></tr></table></div>'



   );

};


}
$("#btn_detalle_Atenciones").click(function(){
 $("#md_detalle_A").modal();
});

$("#btn_detalle_ingreso").click(function(){
 $("#md_detalle_I").modal();

});


//inicializando graficas
$('#detalle_ingresos').highcharts({

 chart: {

   renderTo: 'detalle_ingresos',
   type: 'column'
 },

 colors:["#99DC79"],
 title: {
   text: 'GRÁFICO'
 },
 subtitle: {
   // text: 'Fecha : '+ f.getDate() + "/" + pad(f.getMonth()+1,2) + "/" + f.getFullYear()
   text: 'INGRESOS POR ESPECIALIDAD'
 },
 xAxis: {
   type: 'category',
   labels: {

     enabled: true
   }
 },
 legend: {
   layout: 'vertical',
   align: 'right',
   verticalAlign: 'top',
   x: -70,
   y: 100,
   floating: true,
   borderWidth: 1,
   backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
   shadow: true
 },
 yAxis: {
   min: 0,
   title: {
     text: 'Ingresos (Soles)'
   }
 },
 tooltip: {
   pointFormat: 'Ventas: S/. <b>{point.y:.2f} </b>'
 },
 credits: {
   enabled: false
 },
 exporting: {
   enabled: false
 },
 series: [{
   name: 'Ingresos',
   data: [ ]
 }]
});


$('#detalle_atenciones').highcharts({


 chart: {
   renderTo: 'detalle_atenciones',
   type: 'column'
 },
 colors:["#FF8000"],
 title: {
   text: 'GRAFICO:ATENCIONES POR ESPECIALIDAD'
 },
 subtitle: {
   //text: 'Fecha : '+ f.getDate() + "/" + pad(f.getMonth()+1,2) + "/" + f.getFullYear()
 },
 xAxis: {
   type: 'category',
   labels: {

     enabled: true
   }
 },
 legend: {
   layout: 'vertical',
   align: 'right',
   verticalAlign: 'top',
   x: -70,
   y: 100,
   floating: true,
   borderWidth: 1,
   backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
   shadow: true
 },
 yAxis: {
   min: 0,
   title: {
     text: 'Atenciones (Nro)'
   }
 },
 tooltip: {
   pointFormat: 'Atenciones: <b>{point.y} </b>'
 },
 credits: {
   enabled: false
 },
 exporting: {
   enabled: false
 },
 series: [{
   name: 'Atenciones',
   data: [ ]
 }]
});

var chart = $('#detalle_ingresos').highcharts();
$('#md_detalle_I').on('show.bs.modal', function() {
 $('#detalle_ingresos').css('visibility', 'hidden');
});
$('#md_detalle_I').on('shown.bs.modal', function() {
 $('#detalle_ingresos').css('visibility', 'initial');
 chart.reflow();
});

var chart2 = $('#detalle_atenciones').highcharts();
$('#md_detalle_A').on('show.bs.modal', function() {
 $('#detalle_atenciones').css('visibility', 'hidden');
});
$('#md_detalle_A').on('shown.bs.modal', function() {
 $('#detalle_atenciones').css('visibility', 'initial');
 chart2.reflow();
});



</script>


</body>
</html>
