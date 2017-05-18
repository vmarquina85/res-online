<?php
session_start();
if (!isset($_SESSION["resonlinepermitido"])) {
  header("location:../index.php");
  exit();
};
//require '../class/consultas/consultas_cls.php';
// require '../class/config/inicializar_cls.php';
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
  <link href="../assets/css/password-indicator.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../assets/plugins//odometer/themes/odometer-theme-default.css"/>
  <!-- ================== END BASE CSS STYLE ================== -->
  <link href="../assets/css/data-table.css" rel="stylesheet" />
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
  .table-responsive{
    height:100%;
  }
  table{
    table-layout:auto;
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
          <!-- <button type="button" class="navbar-toggle pull-left" data-click="sidebar-toggled">
          <span class="fa fa-chevron-left fa-1x text-white"></span>
        </button> -->
        <a href="../index.php" class="navbar-brand">
          <!-- <i class="fa fa-table" style='color:#ffffff'></i> -->
          <img src="../assets/img/logo.png" alt="">
          <strong class='text-white sombrear'>Res-online</strong>

        </a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
          <i class="fa fa-bars fa-2x text-white sombrear" aria-hidden="true"></i>
        </button>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown navbar-user">
          <a href="javascript:;" class="dropdown-toggle text-white sombrear" data-toggle="dropdown">
            <span class="hidden-xs">Hola, <?php echo ucwords(strtolower($_SESSION["user_name"])) ?></span>
            <?php if ($_SESSION['sexo']=='M') {
              echo '<img src="../assets/img/man.png" alt="">';
            } else{
              echo '<img src="../assets/img/girl.png" alt="">';
            }
            ?>
          </a>
          <ul class="dropdown-menu animated fadeInLeft">
            <li class="arrow"></li>
            <li><a href="javascript:getPasswordModal();">Cambiar Contraseña</a></li>
            <li class="divider"></li>
            <li><a href="../class/login/logout_cls.php">Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
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
              <a href="javascript:;">
                <?php if ($_SESSION['sexo']=='M') {
                  echo '<img src="../assets/img/man.png" alt="">';
                } else{
                  echo '<img src="../assets/img/girl.png" alt="">';
                }
                ?>
              </a>
            </div>
            <div class="info">
              <?php echo $_SESSION['key_pas']; ?>
              <small>Administrador</small>
            </div>
          </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
        <li class="nav-header">MENÚ PRINCIPAL</li>
          <li class="has-sub active">
            <a href="../pages/p_redo1.php">
              <i class="fa fa-laptop"></i>
              <span>RESUMEN DIARIO  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DE OPERACIONES</span>
            </a>
          </li>

            <!-- <li class="nav-header pull-down sesion">SESIÓN</li>
            <li class="has-sub sesion">
              <a href="../pages/p_redo1.php">
                <i class="fa fa-key"></i>
                <span>CAMBIAR CONTRASEÑA</span>
              </a>
            </li>
            <li class="has-sub sesion">
              <a href="../pages/p_redo1.php">
                <i class="fa fa-times"></i>
                <span>CERRAR SESIÓN</span>
              </a>
            </li> -->



          <!-- <li class="has-sub">
          <a href="../pages/p_redo2.php">
          <i class="fa fa-laptop"></i>
          <span>REPORTE DETALLADO  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POR CENTRO</span>
        </a>
      </li> -->
      <!-- <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li> -->
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
  <div class="row">
    <div class="col-sm-6">
      <div class="wrapper bg-silver-lighter m-b-15">
        <form class="form-inline text-center" action="javascript:;">
          <div class="input-group m-b-5">
            <span class="input-group-addon  input-sm" ><img src="" alt="">Año</span>
            <select onchange="mostrarResultados1()" id="sl_anio1" class='form-control'>
              <option value="" disabled selected>--SELECCIONAR--</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
            </select>
          </div>
          <div class="input-group m-b-5 ">
            <span class="input-group-addon  input-sm" >Mes</span>
            <select  onchange="mostrarResultados1()" id="sl_mes1" class='form-control'>
              <option value="*">--TODOS--</option>
              <option value="01">ENERO</option>
              <option value="02">FEBRERO</option>
              <option value="03">MARZO</option>
              <option value="04">ABRIL</option>
              <option value="05">MAYO</option>
              <option value="06">JUNIO</option>
              <option value="07">JULIO</option>
              <option value="08">AGOSTO</option>
              <option value="09">SEPTIEMBRE</option>
              <option value="10">OCTUBRE</option>
              <option value="11">NOVIEMBRE</option>
              <option value="12">DICIEMBRE</option>
            </select>
          </div>
          <!-- <button  onclick ='mostrarResultados()' class="btn btn-primary m-b-5">Mostrar</button> -->

        </form>
        <br>
        <div class="row">
          <div class="col-sm-6">
            <div class="widget widget-stats bg-green">
              <div class="stats-icon"><i class="fa fa-usd"></i></div>
              <div class="stats-info">
                <h4>TOTAL INGRESOS</h4>
                <span>S/. </span><p id='data_ingresos1' class="odometer">0</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="widget widget-stats  bg-blue">
              <div class="stats-icon"><i class="fa fa-plus-circle"></i></div>
              <div class="stats-info">
                <h4>TOTAL ATENCIONES</h4>
                <span></span><p id='data_atenciones1' class="odometer">0</p>
              </div>
            </div>
          </div>
        </div>
        <div id='pnl_Ingresos1' class="panel panel-inverse" style='height: 100%;' >
          <div class="panel-heading">
            <h4 class="panel-title">Tabla Comparativa</h4>
          </div>
          <div class="panel-body">
            <div class="carousel slide" data-ride="carousel" id=resultados_I>
              <!-- begin carousel-inner -->
              <div class="carousel-inner">
                <!-- begin item -->
                <div class="item active">
                  <div id='tb_comp_I11' class="table-responsive"></div>
                </div>
                <!-- end item -->
                <!-- begin item -->
                <div class="item">
                  <div id='tb_comp_I21' class="table-responsive"></div>
                </div>
                <div class="item">
                  <div id='tb_comp_I31' class="table-responsive"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="wrapper bg-silver-lighter m-b-15">
        <form class="form-inline text-center" action="javascript:;">
          <div class="input-group m-b-5">
            <span class="input-group-addon  input-sm" ><img src="" alt="">Año</span>
            <!-- <input id="sl_anio2"  onchange="mostrarResultados2()" type="text" class='datepicker-default form-control'> -->
            <select  onchange="mostrarResultados2()" id="sl_anio2" class='form-control'>
              <option value="" disabled selected>--SELECCIONAR--</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
            </select>
          </div>
          <div class="input-group m-b-5 ">
            <span class="input-group-addon  input-sm" >Mes</span>
            <select onchange="mostrarResultados2()"  id="sl_mes2" class='form-control'>
              <option value="*">--TODOS--</option>
              <option value="01">ENERO</option>
              <option value="02">FEBRERO</option>
              <option value="03">MARZO</option>
              <option value="04">ABRIL</option>
              <option value="05">MAYO</option>
              <option value="06">JUNIO</option>
              <option value="07">JULIO</option>
              <option value="08">AGOSTO</option>
              <option value="09">SEPTIEMBRE</option>
              <option value="10">OCTUBRE</option>
              <option value="11">NOVIEMBRE</option>
              <option value="12">DICIEMBRE</option>
            </select>
          </div>
          <!-- <button  onclick ='mostrarResultados()' class="btn btn-primary m-b-5">Mostrar</button> -->

        </form>
        <br>
        <div class="row">
          <div class="col-sm-6">
            <div class="widget widget-stats bg-green">
              <div class="stats-icon"><i class="fa fa-usd"></i></div>
              <div class="stats-info">
                <h4>TOTAL INGRESOS</h4>
                <span>S/. </span><p id='data_ingresos2' class="odometer">0</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="widget widget-stats  bg-blue">
              <div class="stats-icon"><i class="fa fa-plus-circle"></i></div>
              <div class="stats-info">
                <h4>TOTAL ATENCIONES</h4>
                <span></span><p id='data_atenciones2' class="odometer">0</p>
              </div>
            </div>
          </div>
        </div>
        <div id='pnl_Ingresos2' class="panel panel-inverse" style='height: 100%;' >
          <div class="panel-heading">
            <h4 class="panel-title">Tabla Comparativa</h4>
          </div>
          <div class="panel-body">
            <div class="carousel slide" data-ride="carousel" id=resultados_II>
              <!-- begin carousel-inner -->
              <div class="carousel-inner">
                <!-- begin item -->
                <div class="item active">
                  <div id='tb_comp_I12' class="table-responsive"></div>
                </div>
                <!-- end item -->
                <!-- begin item -->
                <div class="item">
                  <div id='tb_comp_I22' class="table-responsive"></div>
                </div>
                <div class="item">
                  <div id='tb_comp_I32' class="table-responsive"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="btn-group">
    <button onclick='show_centros()' class="btn btn-white">Centros</button>
    <button onclick='show_mes()' class="btn btn-white">Meses</button>
    <button onclick='show_especialidades()' class="btn btn-white">Especialidades</button>
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
<script src="../assets/js/dataTables.fixedColumns.js"></script>
<script src="../assets/js/table-manage-fixed-columns.demo.min.js"></script>
<script src="../assets/js/password-indicator.js"></script>

<script src="../class/config/config.js"></script>
<script src="../assets/js/apps.min.js"></script>
<script src="../assets/js/ajax.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
//globals
var f= new Date();
var activado=false;
// var panio=f.getFullYear(), pmes='*';

$(document).ready(function() {

  App.init();
  $('.carousel').carousel({
    pause: true,
    interval: false
  });
  $(".datepicker-default").datepicker({
    format: "yyyy",
    startView: "years",
    minViewMode: "years",
    autoclose: "true"
  })
  var hoy =f.getDate() + "/" + pad((f.getMonth() +1),2,0) + "/" + f.getFullYear();
  $('[data-toggle="tooltip"]').tooltip();
  iniciarControles();
});
function show_centros(){
  $("#resultados_II").carousel(0);
  // $('#tb_response_Centro_I_2').draw();
  $("#resultados_I").carousel(0);
  // $('#tb_response_Centro_I').draw();
}
function show_mes(){
  $("#resultados_II").carousel(1);
  // $('#tb_response_mes_I_2').draw();
  $("#resultados_I").carousel(1);
  // $('#tb_response_mes_I').draw();
}
function show_especialidades(){
  $("#resultados_II").carousel(2);
  // $('#tb_response_esp_I_2').DataTable.draw();
  $("#resultados_I").carousel(2);
  // $('#tb_response_esp_I').DataTable.draw();

}



function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}
function controlValidar(){
  if (document.getElementById('txt_bienDescripcionUpdt').value==''){
    alert('Seleccione un tipo de bien');
    var div=document.getElementById('txt_bienDescripcionUpdt').closest('div');
    $(div).toggleClass('has-error');
    document.getElementById('txt_bienDescripcionUpdt').focus();
    return false;
  }else{
    var div=document.getElementById('txt_bienDescripcionUpdt').closest('div');
    $(div).removeClass('has-error');
  }
}
function iniciarControles(){
  // document.getElementById('sl_anio1').value=f.getFullYear();
//  document.getElementById('sl_anio1').selectedIndex='5';
  document.getElementById('sl_mes1').selectedIndex='0';
//  document.getElementById('sl_anio2').selectedIndex='5';
  document.getElementById('sl_mes2').selectedIndex='0';
}
//parametro: 1 o 2 quien activo el evento
function mostrarResultados1(){
  $('#data_ingresos1').text(0);
  $('#data_atenciones1').text(0);
  var panio=document.getElementById('sl_anio1').value;
  var pmes=document.getElementById('sl_mes1').value;
  var url = "../get/get_redo1_totales.php?anio="+panio+"&mes="+pmes;
  $.getJSON (url, function (datatable) {
    var data = datatable;
    $('#data_ingresos1').text(data[0]['ingresos']);
    $('#data_atenciones1').text(data[0]['atenciones']);
    // ingresos
    compCentrosIngresos1(panio,pmes);
    compMesIngresos1(panio,pmes);
    compEspIngresos1(panio,pmes);
  });
}


function compCentrosIngresos1(anio,mes){
  startLoading('#pnl_Ingresos1');
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var modurl = "../get/get_compCentros.php?anio="+anio+"&mes="+mes+"&tipoanno=1";
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;

        document.getElementById('tb_comp_I11').innerHTML=(resultado);
        initDatatable("#tb_response_Centro_I");
        endLoading('#pnl_Ingresos1');
      }
    }
  });
  http.send(null);
}
function compMesIngresos1(anio,mes){
  startLoading('#pnl_Ingresos1');
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var modurl = "../get/get_compMes.php?anio="+anio+"&mes="+mes+"&tipoanno=1";
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById('tb_comp_I21').innerHTML=(resultado);
        //initDatatable("#tb_response_mes_I");
        endLoading('#pnl_Ingresos1');
      }
    }
  });
  http.send(null);
}
function compEspIngresos1(anio,mes){
  startLoading('#pnl_Ingresos1');
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var modurl = "../get/get_compEsp.php?anio="+anio+"&mes="+mes+"&tipoanno=1";
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById('tb_comp_I31').innerHTML=(resultado);
        initDatatable("#tb_response_esp_I");
        endLoading('#pnl_Ingresos1');
      }
    }
  });
  http.send(null);
}
// PARA EL AÑO A COMPARAR
//parametro: 1 o 2 quien activo el evento
function mostrarResultados2(){
  $('#data_ingresos2').text(0);
  $('#data_atenciones2').text(0);
  var panio=document.getElementById('sl_anio2').value;
  var pmes=document.getElementById('sl_mes2').value;
  var url = "../get/get_redo1_totales.php?anio="+panio+"&mes="+pmes;
  $.getJSON (url, function (datatable) {
    var data = datatable;
    $('#data_ingresos2').text(data[0]['ingresos']);
    $('#data_atenciones2').text(data[0]['atenciones']);
    // ingresos
    compCentrosIngresos2(panio,pmes);
    compMesIngresos2(panio,pmes);
    compEspIngresos2(panio,pmes);
  });
}


function compCentrosIngresos2(anio,mes){
  startLoading('#pnl_Ingresos2');
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var modurl = "../get/get_compCentrosA.php?anio="+anio+"&mes="+mes+"&tipoanno=2";
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;

        document.getElementById('tb_comp_I12').innerHTML=(resultado);
        initDatatable("#tb_response_Centro_I_2");
        endLoading('#pnl_Ingresos2');
      }
    }
  });
  http.send(null);
}
function compMesIngresos2(anio,mes){
  startLoading('#pnl_Ingresos2');
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var modurl = "../get/get_compMesA.php?anio="+anio+"&mes="+mes+"&tipoanno=2";
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById('tb_comp_I22').innerHTML=(resultado);
        //initDatatable("#tb_response_mes_I");
        endLoading('#pnl_Ingresos2');
      }
    }
  });
  http.send(null);
}
function compEspIngresos2(anio,mes){
  startLoading('#pnl_Ingresos2');
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var modurl = "../get/get_compEspA.php?anio="+anio+"&mes="+mes+"&tipoanno=2";
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById('tb_comp_I32').innerHTML=(resultado);
        initDatatable("#tb_response_esp_I_2");
        endLoading('#pnl_Ingresos2');
      }
    }
  });
  http.send(null);
}

// funciones de atenciones
function numberWithCommas(x) {
  var parts = x.toString().split(".");
  parts[0] = parts[0].replace(/\B(?=(?=\d*\.)(\d{3})+(?!\d))/g, '_');
  return parts.join(".");
}
function startLoading(panel){
  if (!$(panel).hasClass('panel-loading')) {
    var targetBody = $(panel).find('.panel-body');
    var spinnerHtml = '<div class="panel-loader"><span class="spinner-small"></span></div>';
    $(panel).addClass('panel-loading');
    $(targetBody).prepend(spinnerHtml);
  }
}
function endLoading(panel){
  setTimeout(function () {
    $(panel).removeClass('panel-loading');
    $(panel).find('.panel-loader').remove();
  }, 2000);
}
function initDatatable(jqueryID){

  var e=$(jqueryID).DataTable({
    "language": {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      }
    },
    scrollY: "330px",
    //  scrollX: "100%",
    scrollCollapse: true,
    paging: false,
    searching:false
  });
  new $.fn.dataTable.FixedColumns( e,{});
}
</script>
</body>
</html>
