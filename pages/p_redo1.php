<?php
session_start();
if (!isset($_SESSION["resonlinepermitido"])) {
  header("location:../index.php");
  exit();
};
include_once '../class/conexion/conexion_cls.php';
$class2=new conectar;
$conexion2=$class2->conexion_resumen();
$consulta ="select to_char(max(fecha),'dd/mm/yyyy') as fechact from summary.redo";
$result = pg_query($conexion2, $consulta);
$query = pg_fetch_array($result, 0);
$fechAct = $query["fechact"];
echo "<script>
var gfecphp='".$fechAct."'
</script>"
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
  <!-- <link rel="stylesheet" href="../assets/plugins/odometer/themes/odometer-theme-minimal.css"/> -->
  <!-- ================== END BASE CSS STYLE ================== -->
  <!-- <link href="../assets/css/data-table.css" rel="stylesheet" /> -->
  <link href="../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
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
    height:300px;
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
          <ul id='top-menu' class="nav">

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
        <li class="active" >Redo</li>
      </ol>
      <h3 class="page-header">Resumen de Operaciones</h3>

      <div class="alert alert-info fade in m-b-15">
        <strong>Fecha de Actualización:</strong>
        Datos Actualizados hasta el <?php echo $fechAct;?>
        <a href='p_bdupdateState.php' class='btn btn-info btn-xs'>Ver Detalles</a>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="wrapper bg-silver-lighter m-b-15">
            <form  action="javascript:;">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group m-b-5">
                    <span class="input-group-addon  input-sm" ><img src="" alt="">Año 1</span>
                    <select  id="sl_anio1" class='selectpicker form-control'>
                      <option value="" disabled selected>--SELECCIONAR--</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group m-b-5">
                    <span class="input-group-addon  input-sm" ><img src="" alt="">Año 2</span>
                    <select id="sl_anio2" class='selectpicker form-control'>
                      <option value="" disabled selected>--SELECCIONAR--</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="input-group m-b-5 ">
                <span class="input-group-addon  input-sm" >Por Fecha de Actualización</span>
                <span class="input-group-addon">
                  <input type="checkbox" id="cb_fact" title='Hasta Fecha de Actualización'>
                </span>
                <select id="sl_mes1" class='selectpicker form-control' multiple title="SELECCIONAR MES(ES)" data-actions-box="true">
                  <option value="*" disabled>FECHA DE ACTUALIZACIÓN</option>
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
            <div class="text-center m-b-10">
              <button onclick="getResultados()" type="button" class="btn btn-primary btn-block ">Consultar</button>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="widget widget-stats bg-green">
                  <div class="stats-icon"><iframe src="../assets/img/vector/coin.svg" style='height: 48px;width: 48px;' frameborder="0"></iframe></div>
                  <div class="stats-info">
                    <h4 id='titleA'>TOTAL INGRESOS</h4>
                    <p id='data_ingresos1' class="odometer">0</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="widget widget-stats bg-green">
                  <div class="stats-icon"><iframe src="../assets/img/vector/coin.svg" style='height: 48px;width: 48px;' frameborder="0"></iframe></div>
                  <div class="stats-info">
                    <h4 id='titleB'>TOTAL INGRESOS</h4>
                    <p id='data_ingresos2' class="odometer">0</p>
                  </div>
                </div>
              </div>

            </div>
            <div id='pnl_Ingresos1' class="panel panel-inverse">
              <div class="panel-heading">
                <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Tabla Comparativa</h4>

              </div>
              <div class="panel-body" id='prueba'>
                <div class="pLoader"></div>
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

      </div>



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
                <!-- title -->
                <h4>Res-online</h4>
                <!-- version -->
                <h4>V2.7</h4>
                <p>UNIDAD DE SISTEMAS Y PROCESOS</p>
                <!-- año de version -->
                <P>SISOL - 2017</P>
                <button class="btn btn-warning" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id='loading' class="modal fade" aria-hidden='true'>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="progress progress-striped active">
                <div class="progress-bar" style="width: 100%">Cargando</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="header" class="navbar-fixed-bottom text-center">
        <div class="btn-group">
          <button onclick='show_centros()' class="btn btn-warning"><img src="../assets/img/hospital.png" alt=""> Centros</button>
          <button onclick='show_mes()' class="btn btn-warning"> <img src="../assets/img/date.png" alt=""> Meses</button>
          <button onclick='show_especialidades()' class="btn btn-warning"> <img src="../assets/img/health.png" alt=""> Especialidades</button>
        </div>
      </div>
      <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up p-t-5"></i></a>
      <!-- end scroll to top btn -->
    </div>
  </div>
  <!-- end page container -->
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="../assets/js/jquery-1.9.1.min.js"></script>
  <script src="../assets/js/jquery-migrate-1.1.0.min.js"></script>
  <script src="../assets/js/jquery-ui.min.js"></script>
  <!-- <script src="../assets/plugins/odometer/odometer.min.js"></script> -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.slimscroll.min.js"></script>
  <script src="../assets/js/jquery.cookie.js"></script>
  <script src="../assets/js/highcharts.js"></script>
  <!-- ================== END BASE JS ========================== -->
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="../assets/js/bootstrap-datepicker.js"></script>
  <!-- <script src="../assets/js/jquery.dataTables.js"></script> -->
  <!-- <script src="../assets/js/dataTables.fixedColumns.js"></script>
  <script src="../assets/js/table-manage-fixed-columns.demo.min.js"></script> -->
  <script src="../assets/js/password-indicator.js"></script>
  <script src="../assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>

  <script src="../class/config/config.js"></script>
  <script src="../class/menu/menu.js"></script>
  <script src="../class/redo1/redo1.js"></script>
  <script src="../assets/plugins/tablesorter/jquery.tablesorter.js"></script>
  <!-- <script src="../assets/js/dataloader.js"></script> -->
  <script src="../assets/js/apps.min.js"></script>
  <script src="../assets/js/ajax.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->
  <script>
  //globals
  var f= new Date();
  var ganio1='', gmes1='';
  var ganio2='', gmes2='',gdate='';
  construirMenu();
  document.getElementById('item0').className += " active";
  $(document).ready(function() {
    // mostrarLoader();
    App.init();

    jQuery.tablesorter.addParser({
      id: "FancyNumber",
      is: function(s) {
        return /^[0-9]?[0-9,\.]*$/.test(s);
      },
      format: function(s) {
        return jQuery.tablesorter.formatFloat( s.replace(/,/g,'') );
      },
      type: "numeric"
    });
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
    // iniciarControles();
  });
  $("#cb_fact").click( function(){
    if( $(this).is(':checked') ) {
      iniciarControles();
    }else{
      $('#sl_mes1').selectpicker('val', '');
    }
  });

</script>
<div id='modal_detalles' class='modal fade' aria-hidden='true' style='display: none;'>
  <div class='dialog-normal modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header bg-orange'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
        <h4 class='modal-title text-white'>Detalles Especialidades</h4>
      </div>
      <div class='modal-body'>
        <div id ='tabla_det' class="table-responsive">
        </div>
      </div>
      <div class='modal-footer'>

      </div>
    </div>
  </div>
</div>
</body>
</html>
