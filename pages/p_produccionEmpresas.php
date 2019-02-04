<?php
session_start();
if (!isset($_SESSION["resonlinepermitido"])) {
  header("location:../index.php");
  exit();
};
include ("../class/config/inicializar_cls.php");

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
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../assets/css/jquery-ui.min.css" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="../assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
  <link href="../assets/css/animate.min.css" rel="stylesheet" />
  <link href="../assets/css/style.min.css" rel="stylesheet" />
  <link href="../assets/css/style-responsive.min.css" rel="stylesheet" />
  <link href="../assets/plugins/tablesorter/themes/blue/style.css" rel="stylesheet"/>
  <link href="../assets/css/orange.css" rel="stylesheet" id="theme" />
  <link href="../assets/css/sysinv.css" rel="stylesheet" id="theme" />
  <link href="../assets/css/datepicker.css" rel="stylesheet"/>
  <link href="../assets/css/datepicker3.css" rel="stylesheet"/>
  <link href="../assets/css/password-indicator.css" rel="stylesheet"/>
  <!-- <link href="../assets/plugins/bootstrap-select/bootstrap-select.css" rel="stylesheet" /> -->
  <link href="../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->
  <!-- <link href="../assets/css/data-table.css" rel="stylesheet" /> -->
  <!-- <link href="../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" /> -->
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
    height:150px;
    overflow-y: auto;
  }

  /*.panel.panel-expand>.panel-body .table-responsive {
  height:90%;
  }*/
  .nav>li.mobile{
    display: none;
  }
  @media (max-width:768px){
    .nav>li.mobile{
      display:block;
    }
  }
  .clickable{
    cursor:pointer;
  }
  .navbar-fixed-bottom{
    bottom: 0;
  }
  /*ploader*/
  .pLoader{
    display: block;
    margin: auto;
  }
  svg path,
  svg rect{
    fill: #FF6700;
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
          <a href="javascript:disclamer();" class="navbar-brand">
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
              <span class="hidden-xs">Hola, <?php echo ucwords(strtolower($_SESSION["resonline_user_name"])) ?></span>
              <?php if ($_SESSION["resonline_sexo"]=='M') {
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
                  <?php if ($_SESSION["resonline_sexo"]=='M') {
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
          <ul  id='top-menu' class="nav">

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
      <ol class="breadcrumb pull-right">
        <li>Menu Principal</li>
        <li><strong>Reporte de Asociados</strong></li>
      </ol>
      <h3 class="page-header">Reporte de Asociados</h3>
      <!-- inicio contenido -->

      <div id='pnl_Ingresos1' class="panel panel-default panel-with-tabs">
        <div class="panel-body">
          <form action='' id="ra_form">
            <div class="input-group m-b-5">
              <span class="input-group-addon input-sm">Centros</span>
              <select id='ra_select_centros' class="selectpicker form-control input-sm" title="SELECCIONAR CENTRO" data-live-search="true" >
                <option value="*">TODOS</option>
                <?php for ($i=0; $i < sizeof($rs_cent) ; $i++) {  ?>
                  <option value="<?php echo $rs_cent[$i]['n_ope'];?>"><?php echo $rs_cent[$i]['n_ope']; ?></option>
                <?php  }?>
              </select>
            </div>
            <div class="input-group m-b-5">
              <span class="input-group-addon input-sm">Especialidad</span>
              <select id='ra_select_especialidad' class="selectpicker form-control input-sm" title="SELECCIONAR ESPECIALIDAD" data-live-search="true"  >
                <option value="*">TODOS</option>
                <?php for ($i=0; $i < sizeof($rs_esp) ; $i++) {  ?>
                  <option value="<?php echo utf8_encode($rs_esp[$i]['n_esp']);?>"><?php echo utf8_encode($rs_esp[$i]['n_esp']); ?></option>
                <?php  }?>
              </select>
            </div>
            <div class="input-group m-b-5">
              <span class="input-group-addon input-sm">Año</span>
              <select id='ra_select_anio'  class="selectpicker form-control input-sm" name="" title="SELECCIONAR AÑO(S)" data-actions-box="true" multiple>

                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2018">2019</option>

              </select>
            </div>
            <div class="input-group m-b-5">
              <span class="input-group-addon input-sm">Mes</span>
              <select id='ra_select_mes'  class="selectpicker form-control input-sm" name="" title="SELECCIONAR Mes(S)" data-actions-box="true" multiple>
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





          </form>

          <button onclick="ra_obtenerReporte1()" class="btn btn-block btn-primary">Generar Reporte</button>
        </div>
      </div>

      <div id='ra_panel_resultado' class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">RESULTADOS</h4>
        </div>
        <div class="panel-body">
          <ul class="nav nav-tabs">
            <li class='active'>
              <a href="#razonsoc" data-toggle="tab" aria-expanded="true">Reporte I</a>
            </li>
            <li>
              <a href="#person" data-toggle="tab" aria-expanded="true">Reporte II</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="razonsoc">
              <div class="table-responsive">
                <div id='ra_table_reporte' class='text-center'>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="person">
              <div class="table-responsive">
                <div id='ra_table_reporte2' class='text-center'>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- fin  contenido -->
      <div id='disclamer' class="modal fade" aria-hidden='true'>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-orange">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-white">Acerca</h4>
            </div>
            <div class="modal-body">
              <div class="text-center">
                <img src="../assets/img/logo_big.png" alt="">
                <h4>Res-online</h4>
                <h4>V2.7</h4>
                <p>UNIDAD DE SISTEMAS Y PROCESOS</p>
                <P>SISOL - 2017</P>
                <button class="btn btn-warning" data-dismiss="modal">OK</button>
              </div>


            </div>
          </div>
        </div>
      </div>

      <!-- <div id='loading' class="modal fade" aria-hidden='true'>
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-body">
      <div class="progress progress-striped active">
      <div class="progress-bar" style="width: 100%">Cargando</div>
    </div>
  </div>
</div>
</div>
</div> -->


<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
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
<!-- <script src="../assets/js/jquery.dataTables.js"></script> -->
<!-- <script src="../assets/js/dataTables.fixedColumns.js"></script>
<script src="../assets/js/table-manage-fixed-columns.demo.min.js"></script> -->
<script src="../assets/js/password-indicator.js"></script>
<!-- <script src="../assets/plugins/bootstrap-select/bootstrap-select.js"></script> -->
<script src="../assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>

<script src="../class/config/config.js"></script>
<script src="../class/ra/ra.js"></script>
<script src="../assets/plugins/tablesorter/jquery.tablesorter.js"></script>
<!-- <script src="../assets/js/dataloader.js"></script> -->
<script src="../class/menu/menu.js"></script>
<script src="../assets/js/apps.min.js"></script>
<script src="../assets/js/ajax.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
//globals
construirMenu();
document.getElementById('item2').className += " active";
$(document).ready(function() {
  // mostrarLoader();
  App.init();
});
</script>

</body>
</html>
