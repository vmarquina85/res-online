<?php
session_start();
echo $_SESSION["fechAct"];
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
  table tbody, table thead
  {
    display: block;

  }

  table tbody
  {
    overflow: overlay;
    height: 300px;

  }


  th,td
  {
  width: 100%;
  }
  .container-scrolled{
    height:300px;
    z-index:2;
    overflow-x:hidden;
    overflow-y:scroll;
    padding:0px;
    border: 1px solid #e3e3e3;
  }
  .nav>li.mobile{
    display: none;
  }
@media (max-width:480px){
  .nav>li.mobile{
display:block;
  }
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
        <a href="javascript:disclamer();" class="navbar-brand">
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
              <i class="fa fa-book fa-2x" aria-hidden="true"></i>
              <span>RESUMEN DIARIO  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DE OPERACIONES</span>
            </a>
          </li>
          <li class="has-sub mobile">
						<a href="javascript:;">
              <b class="caret pull-right"></b>
							<i class="fa fa-key"></i>
							<span>USUARIO</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="javascript:getPasswordModal();">Cambiar Contraseña</a></li>
                <li><a href="../class/login/logout_cls.php">Cerrar Sesión</a></li>
						</ul>
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
  <div class="alert alert-info fade in m-b-15">
								<strong>Fecha de Actualizacion</strong>
								Datos Actualizados hasta el <?php echo $_SESSION['fechact'];?>
                <button type="button" class='btn btn-info btn-xs pull-right'>Ver Detalles</button>

							</div>
  <div class="row">
    <div class="col-md-6">
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
          <div class="col-md-7">
            <div class="widget widget-stats bg-green">
              <div class="stats-icon"><img src="../assets/img/ingresos.png" alt=""></div>
              <div class="stats-info">
                <h4>TOTAL INGRESOS</h4>
                <span>S/. </span><p id='data_ingresos1' class="odometer">0</p>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="widget widget-stats  bg-blue">
              <div class="stats-icon"><img src="../assets/img/atenciones.png" alt=""></div>
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
          <div class="panel-body" id='prueba'>
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
    <div class="col-md-6">
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
          <div class="col-md-7">
            <div class="widget widget-stats bg-green">
              <div class="stats-icon"><img src="../assets/img/ingresos.png" alt=""></div>
              <div class="stats-info">
                <h4>TOTAL INGRESOS</h4>
                <span>S/. </span><p id='data_ingresos2' class="odometer">0</p>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="widget widget-stats  bg-blue">
              <!-- <div class="stats-icon"><i class="fa fa-plus-circle"></i></div> -->
              <div class="stats-icon"><img src="../assets/img/atenciones.png" alt=""></div>

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

  <div id='modal_detalles' class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-orange">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-white">Detalles Especialidades</h4>

        </div>
        <div class="modal-body">
          <div id="container"></div>
          <div id ='tabla_det' class="table-responsive">
          </div>

        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <div id='disclamer' class="modal fade">
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
            <h4>V0.4</h4>
            <p>UNIDAD DE SISTEMAS Y PROCESOS</p>
            <P>SISOL - 2017</P>
            <button class="btn btn-warning" data-dismiss="modal">OK</button>
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
<script src="../class/redo1/redo1.js"></script>
<script src="../assets/js/apps.min.js"></script>
<script src="../assets/js/ajax.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
//globals
var f= new Date();
var activado=false;
var ganio1='', gmes1='';
var ganio2='', gmes2='';

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


</script>
</body>
</html>
