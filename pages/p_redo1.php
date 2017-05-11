<?php
session_start();
if (!isset($_SESSION["resonlinepermitido"])) {
  header("location:../index.php");
  exit();
};
require '../class/consultas/consultas_cls.php';
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
            <li class="has-sub active">
              <a href="../pages/p_redo1.php">
                <i class="fa fa-laptop"></i>
                <span>RESUMEN DIARIO  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DE OPERACIONES</span>
              </a>
            </li>
            <li class="has-sub">
              <a href="../pages/p_redo2.php">
                <!--        <b class="caret pull-right"></b> -->
                <i class="fa fa-laptop"></i>
                <span>REPORTE DETALLADO  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POR CENTRO</span>
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
      <div class="row">
        <div class="col-sm-6">
          <div class="wrapper bg-silver-lighter m-b-15">
            <form class="form-inline text-center" action="javascript:;">
              <div class="input-group m-b-5">
                <span class="input-group-addon  input-sm" ><img src="" alt="">Año</span>
                <input id="sl_anio1" onchange="mostrarResultados()" type="text" class='datepicker-default form-control'>
              </div>
              <div class="input-group m-b-5 ">
                <span class="input-group-addon  input-sm" >Mes</span>
                <select  onchange="mostrarResultados()" id="sl_mes1" class='form-control'>
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
                    <span>S/. </span><p id='data_ingresos' class="odometer">0</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="widget widget-stats  bg-blue">
                  <div class="stats-icon"><i class="fa fa-plus-circle"></i></div>
                  <div class="stats-info">
                    <h4>TOTAL ATENCIONES</h4>
                    <span></span><p id='data_atenciones' class="odometer">0</p>
                  </div>
                </div>
              </div>
            </div>
            <div id='pnl_Ingresos' class="panel panel-inverse" style='height: 100%;' >
              <div class="panel-heading">
                <div class="btn-group pull-right">
                  <button type="button" class="btn bg-orange text-white btn-xs">Tipo</button>
                  <button type="button" class="btn bg-orange text-white btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" >
                    <li ><a data-target="#resultados_I" data-slide-to="0">Por Centros</a></li>
                    <li ><a data-target="#resultados_I" data-slide-to="1">Por Mes</a></li>
                    <li ><a data-target="#resultados_I" data-slide-to="2">Por Especialidades</a></li>
                  </ul>
                </div>

                <h4 class="panel-title">Tabla Comparativa- Ingresos</h4>
              </div>
              <div class="panel-body">
                <div class="carousel slide" data-ride="carousel" id=resultados_I>
                  <!-- begin carousel-inner -->
                  <div class="carousel-inner">
                    <!-- begin item -->
                    <div class="item active">
                      <div id='tb_comp_I1' class="table-responsive"></div>
                    </div>
                    <!-- end item -->
                    <!-- begin item -->
                    <div class="item">
                      <div id='tb_comp_I2' class="table-responsive"></div>
                    </div>
                    <div class="item">
                      <div id='tb_comp_I3' class="table-responsive"></div>
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
                <input id="sl_anio"  onchange="mostrarResultados()" type="text" class='datepicker-default form-control'>
              </div>
              <div class="input-group m-b-5 ">
                <span class="input-group-addon  input-sm" >Mes</span>
                <select onchange="mostrarResultados()"  id="sl_mes" class='form-control'>
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
                    <span>S/. </span><p id='data_ingresos' class="odometer">0</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="widget widget-stats  bg-blue">
                  <div class="stats-icon"><i class="fa fa-plus-circle"></i></div>
                  <div class="stats-info">
                    <h4>TOTAL ATENCIONES</h4>
                    <span></span><p id='data_atenciones' class="odometer">0</p>
                  </div>
                </div>
              </div>
            </div>
            <div id='pnl_Ingresos' class="panel panel-inverse" style='height: 100%;' >
              <div class="panel-heading">
                <div class="btn-group pull-right">
                  <button type="button" class="btn bg-orange text-white btn-xs">Tipo</button>
                  <button type="button" class="btn bg-orange text-white btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" >
                    <li ><a data-target="#resultados_I" data-slide-to="0">Por Centros</a></li>
                    <li ><a data-target="#resultados_I" data-slide-to="1">Por Mes</a></li>
                    <li ><a data-target="#resultados_I" data-slide-to="2">Por Especialidades</a></li>
                  </ul>
                </div>

                <h4 class="panel-title">Tabla Comparativa- Ingresos</h4>
              </div>
              <div class="panel-body">
                <div class="carousel slide" data-ride="carousel" id=resultados_I>
                  <!-- begin carousel-inner -->
                  <div class="carousel-inner">
                    <!-- begin item -->
                    <div class="item active">
                      <div id='tb_comp_I1' class="table-responsive"></div>
                    </div>
                    <!-- end item -->
                    <!-- begin item -->
                    <div class="item">
                      <div id='tb_comp_I2' class="table-responsive"></div>
                    </div>
                    <div class="item">
                      <div id='tb_comp_I3' class="table-responsive"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-group">
        <button data-target="#resultados_I" data-slide-to="0" class="btn btn-white">Centros</button>
        <button data-target="#resultados_I" data-slide-to="1" class="btn btn-white">Meses</button>
        <button data-target="#resultados_I" data-slide-to="2" class="btn btn-white">Especialidades</button>
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
    <script src="../assets/js/apps.min.js"></script>
    <script src="../assets/js/ajax.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
    //globals
    var f= new Date();
    var activado=false;
    var panio=f.getFullYear(), pmes='*';

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
      document.getElementById('sl_anio').selectedIndex='6';
      document.getElementById('sl_mes').selectedIndex='0';
    }
    function mostrarResultados(){
      // part1
      $('#data_ingresos').text(0);
      $('#data_atenciones').text(0);
      panio=document.getElementById('sl_anio1').value;
      pmes=document.getElementById('sl_mes1').value;
      var url = "../get/get_redo1_totales.php?anio="+panio+"&mes="+pmes;
      $.getJSON (url, function (datatable) {
        var data = datatable;
        $('#data_ingresos').text(data[0]['ingresos']);
        $('#data_atenciones').text(data[0]['atenciones']);
        // ingresos
        compCentrosIngresos(panio,pmes);
        compMesIngresos(panio,pmes);
        compEspIngresos(panio,pmes);
        //atenciones
        compCentrosAtenciones(panio,pmes);
        compMesAtenciones(panio,pmes);
        compEspAtenciones(panio,pmes);
      });
    }
    function compCentrosIngresos(anio,mes){
      startLoading('#pnl_Ingresos');
      if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
      }
      var modurl = "../get/get_compCentros.php?anio="+anio+"&mes="+mes;
      http.open("GET", modurl, true);
      http.addEventListener('readystatechange', function() {
        if (http.readyState == 4) {
          if(http.status == 200) {
            var resultado = http.responseText;

            document.getElementById('tb_comp_I1').innerHTML=(resultado);
            initDatatable("#tb_response_Centro_I");
            endLoading('#pnl_Ingresos');
          }
        }
      });
      http.send(null);
    }
    function compMesIngresos(anio,mes){
      startLoading('#pnl_Ingresos');
      if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
      }
      var modurl = "../get/get_compMes.php?anio="+anio+"&mes="+mes;
      http.open("GET", modurl, true);
      http.addEventListener('readystatechange', function() {
        if (http.readyState == 4) {
          if(http.status == 200) {
            var resultado = http.responseText;
            document.getElementById('tb_comp_I2').innerHTML=(resultado);
          //initDatatable("#tb_response_mes_I");
            endLoading('#pnl_Ingresos');
          }
        }
      });
      http.send(null);
    }
    function compEspIngresos(anio,mes){
      startLoading('#pnl_Ingresos');
      if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
      }
      var modurl = "../get/get_compEsp.php?anio="+anio+"&mes="+mes;
      http.open("GET", modurl, true);
      http.addEventListener('readystatechange', function() {
        if (http.readyState == 4) {
          if(http.status == 200) {
            var resultado = http.responseText;
            document.getElementById('tb_comp_I3').innerHTML=(resultado);
            initDatatable("#tb_response_esp_I");
            endLoading('#pnl_Ingresos');
          }
        }
      });
      http.send(null);
    }

    // funciones de atenciones
    function compCentrosAtenciones(anio,mes){
      startLoading('#pnl_Atenciones');
      if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
      }
      var modurl = "../get/get_compCentrosA.php?anio="+anio+"&mes="+mes;
      http.open("GET", modurl, true);
      http.addEventListener('readystatechange', function() {
        if (http.readyState == 4) {
          if(http.status == 200) {
            var resultado = http.responseText;

            document.getElementById('tb_comp_A1').innerHTML=(resultado);
            initDatatable("#tb_response_Centro_A");
            endLoading('#pnl_Atenciones');
          }
        }
      });
      http.send(null);
    }
    function compMesAtenciones(anio,mes){
      startLoading('#pnl_Atenciones');
      if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
      }
      var modurl = "../get/get_compMesA.php?anio="+anio+"&mes="+mes;
      http.open("GET", modurl, true);
      http.addEventListener('readystatechange', function() {
        if (http.readyState == 4) {
          if(http.status == 200) {
            var resultado = http.responseText;
            document.getElementById('tb_comp_A2').innerHTML=(resultado);
            initDatatable("#tb_response_mes_A");
            endLoading('#pnl_Atenciones');
          }
        }
      });
      http.send(null);
    }
    function compEspAtenciones(anio,mes){
      startLoading('#pnl_Atenciones');
      if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
      }
      var modurl = "../get/get_compEspA.php?anio="+anio+"&mes="+mes;
      http.open("GET", modurl, true);
      http.addEventListener('readystatechange', function() {
        if (http.readyState == 4) {
          if(http.status == 200) {
            var resultado = http.responseText;
            document.getElementById('tb_comp_A3').innerHTML=(resultado);
            initDatatable("#tb_response_esp_A");
            endLoading('#pnl_Atenciones');
          }
        }
      });
      http.send(null);
    }







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
