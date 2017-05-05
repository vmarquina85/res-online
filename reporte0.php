<?php
// session_start();
// if (!isset($_SESSION["accesopermitido"])) {
//     header("location:index.php");
//     exit();
// };

require('class/consultas/funciones.php');
$year=date('Y');

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
    <link href="assets/css/jquery-ui.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link href="assets/css/style.min.css" rel="stylesheet" />
    <link href="assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="assets/css/orange.css" rel="stylesheet" id="theme" />
    <link href="assets/css/sysinv.css" rel="stylesheet" id="theme" />
    <link href="assets/css/datepicker.css" rel="stylesheet"/>
    <link href="assets/css/datepicker3.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/plugins//odometer/themes/odometer-theme-default.css"/>

    <!-- ================== END BASE CSS STYLE ================== -->
    <link href="assets/css/data-table.css" rel="stylesheet" />
    <!-- ================== BEGIN BASE JS ================== -->

    <script src="assets/js/pace.min.js"></script>

    <!-- ================== END BASE JS ================== -->
    <style>
    .navbar-brand{
        width: auto;
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
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="Index.php" class="navbar-brand"><i class="fa fa-table" style='color:#DF8F19'></i> Reporte Gerencial</a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
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
                                <a href="javascript:;"><img src="img/user-2.jpg" alt=""></a>
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
                            <a href="reporte1.php">
                                <i class="fa fa-laptop"></i>
                                <span>Reporte1</span>
                            </a>
                        </li>
                        <li class="has-sub  ">
                            <a href="reporte2.php">
                                <!--        <b class="caret pull-right"></b> -->
                                <i class="fa fa-laptop"></i>
                                <span>Reporte2</span>
                            </a>
                        </li>
                        <li class="has-sub  ">
                            <a href="reporte3.php">

                                <i class="fa fa-laptop"></i>
                                <span>Reporte3</span>
                            </a>
                        </li>
                    </ul>
                    <!-- end sidebar nav -->
                </div>
                <div class="slimScrollBar ui-draggable" style="width: 7px; position: absolute; top: 128px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 81.753339269813px; background: rgb(0, 0, 0);"></div>
                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div>
                <!-- end sidebar scrollbar -->
            </div>
        </div>


        <div id="content" class="content">
            <h1 class="page-header" >Reporte 1</h1>
            <div class="wrapper bg-silver-lighter m-b-15">
                <h5>Parametros de Busqueda</h5>
                <div class='form-inline'>
                    <input type="text" class="form-control datepicker-autoClose m-b-5" value="<?php echo date('d/m/Y'); ?>"  placeholder="Fecha Inicio" id='txt_fec_ini'/>
                    <input type="text" class="form-control datepicker-autoClose m-b-5" value="<?php echo date('d/m/Y'); ?>" placeholder="Fecha Fin" id='txt_fec_fin'/>
                    <button type="button" data-toggle="modal" data-target="#md_formapago" class="btn btn-default m-b-5">
                       Forma de Pago
                   </button>
                   <button class='btn btn-primary m-l-10 m-b-5'   onclick='fn_generar_reporte()'>Consultar</button>
               </div>

           </div>
           <div class="row">
            <div class="col-md-6">
                <div class="panel panel-inverse" data-sortable-id="ui-widget-2">
                    <div class="panel-heading">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-success btn-xs">Tipo</button>
                            <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="javascript:;" onclick="cambiar_tipo_graph('prueba');">Prueba</a></li>
                                <li><a href="javascript:;" onclick="cambiar_tipo_graph('webserver');">Webserver</a></li>
                            </ul>
                        </div>
                        <h4 class="panel-title">5 MEJORES ESTABLECIMIETOS DE SALUD</h4>
                    </div>
                    <div class="panel-body">
                        <div id='comparativo'></div>
                    </div>
                </div>
            </div>


            <div class='col-md-6'>
             <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                    </div>
                    <h4 class="panel-title">REPORTE DE VENTAS Y ATENCIONES ESTABLECIMIENTOS DE SALUD</h4>
                </div>

                <div class="panel-body">

                    <div class="table-responsive">
                      <div class='row'>
                           <div class='col-md-12'>
                               <table id="data-table" class="table data-table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                          <th >#</th>
                                          <th >Establecimientos de Salud</th>
                                          <th >Atenciones</th>
                                          <th >Ingresos</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>1</td>
                                          <td>CMM. EL NAZARENO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CEN' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CEN' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>2</td>
                                          <td>CMM. HUAYCAN</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CCH' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CCH' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>3</td>
                                          <td>CMM. JOSE CARLOS MARIATEGUI</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CCM' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CCM' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>4</td>
                                          <td>CMM. JUAN PABLO I I</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CJP' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CJP' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>5</td>
                                          <td>CMM. LA ENSENADA</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CLE' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CLE' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>6</td>
                                          <td>CMM. LAS VIOLETAS</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CLV' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CLV' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>7</td>
                                          <td>CMM. SAN RAMON</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CRM' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CRM' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>8</td>
                                          <td>CMM. SENOR DE LOS MILAGROS</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CSM' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CSM' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>9</td>
                                          <td>CMM. SINCHI ROCA</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CSR' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CSR' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>10</td>
                                          <td>CMM. TRABAJADORES HOSPITAL DEL NINO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CHN' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CHN' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>11</td>
                                          <td>CMM. VILLA LIMATAMBO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CVL' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CVL' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>12</td>
                                          <td>H.S. ATE</td>
                                          <td  style='font-weight: 700;'><p id='atencion_ATE' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_ATE' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>13</td>
                                          <td>H.S. CAMANA</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CMN' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CMN' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>14</td>
                                          <td>H.S. CARABAYLLO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CAR' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CAR' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>15</td>
                                          <td>H.S. CHICLAYO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CIX' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CIX' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>16</td>
                                          <td>H.S. CHORRILLOS</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CHR' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CHR' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>17</td>
                                          <td>H.S. COMAS</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CMS' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CMS' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>18</td>
                                          <td>H.S. CUZCO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CZC' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CZC' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>19</td>
                                          <td>H.S. CUZCO - SAN GERONIMO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CZ2' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CZ2' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>20</td>
                                          <td>H.S. EL AGUSTINO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_EAG' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_EAG' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>21</td>
                                          <td>H.S. ICA</td>
                                          <td  style='font-weight: 700;'><p id='atencion_ICA' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_ICA' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>22</td>
                                          <td>H.S. LA VICTORIA</td>
                                          <td  style='font-weight: 700;'><p id='atencion_LVC' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_LVC' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>23</td>
                                          <td>H.S. MAGDALENA DEL MAR</td>
                                          <td  style='font-weight: 700;'><p id='atencion_MGD' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_MGD' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>24</td>
                                          <td>H.S. METRO UNI</td>
                                          <td  style='font-weight: 700;'><p id='atencion_RMC' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_RMC' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>25</td>
                                          <td>H.S. MIRONES BAJO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_CLM' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_CLM' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>26</td>
                                          <td>H.S. PUENTE PIEDRA</td>
                                          <td  style='font-weight: 700;'><p id='atencion_PTP' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_PTP' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>27</td>
                                          <td>H.S. PUNTA HERMOSA</td>
                                          <td  style='font-weight: 700;'><p id='atencion_PHR' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_PHR' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>28</td>
                                          <td>H.S. RISSO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_LN2' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_LN2' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>29</td>
                                          <td>H.S. SAN JUAN DE LURIGANCHO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_SJL' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_SJL' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>30</td>
                                          <td>H.S. SAN MARTIN DE PORRES</td>
                                          <td  style='font-weight: 700;'><p id='atencion_SMP' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_SMP' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>31</td>
                                          <td>H.S. SULLANA</td>
                                          <td  style='font-weight: 700;'><p id='atencion_SLN' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_SLN' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>32</td>
                                          <td>H.S. SURQUILLO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_SRQ' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_SRQ' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>33</td>
                                          <td>H.S. TACNA</td>
                                          <td  style='font-weight: 700;'><p id='atencion_TCN' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_TCN' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>34</td>
                                          <td>H.S. TARAPOTO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_TRP' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_TRP' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>35</td>
                                          <td>H.S. TUMBES</td>
                                          <td  style='font-weight: 700;'><p id='atencion_TMB' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_TMB' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>36</td>
                                          <td>H.S. VILLA EL SALVADOR</td>
                                          <td  style='font-weight: 700;'><p id='atencion_VES' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_VES' class='odometer'>0.00</p></td>
                                      </tr>
                                      <tr>
                                          <td>37</td>
                                          <td>H.S. VILLA MARIA DEL TRIUNFO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_VMT' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_VMT' class='odometer'>0.00</p></td>
                                      </tr>

                                      <tr>
                                          <td>38</td>
                                          <td>NOVOCARDIO</td>
                                          <td  style='font-weight: 700;'><p id='atencion_NVC' class='odometer'>0</p></td>
                                          <td  style='font-weight: 700;'><p id='ingresos_NVC' class='odometer'>0.00</p></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div class='modal fade ' id='md_formapago' aria-hidden='true' style='display: none;'>
    <div class='modal-dialog modal-sm'>

        <div class='modal-content'>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Forma de Pago</h4>
            </div>
            <div class="modal-body">


                <div class='checkbox m-l-40'>
                 <label>
                     <input id='ck_contado' type='checkbox' onclick='set_value(0)' checked='true'>CONTADO
                 </label>
             </div>
             <div class='checkbox m-l-40'>
                 <label>
                     <input id='ck_credito' type='checkbox' onclick='set_value(1)'  checked='true'>TARJETA DE CREDITO
                 </label>
             </div>
             <div class='checkbox m-l-40'>
                 <label>
                     <input id='ck_sis' type='checkbox' onclick='set_value(2)' checked='true'>SIS
                 </label>
             </div>
             <div class='checkbox m-l-40'>
                 <label>
                     <input id='ck_essalud' type='checkbox' onclick='set_value(5)' checked='true'>ESSALUD
                 </label>
             </div>
             <div class='checkbox m-l-40'>
                 <label>
                     <input id='ck_solidario' type='checkbox'onclick='set_value(4)'  checked='true'>SOLIDARIO
                 </label>
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
<script src="assets/js/jquery-1.9.1.min.js"></script>
<script src="assets/js/jquery-migrate-1.1.0.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.cookie.js"></script>
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/drilldown.js"></script>
<script src="assets/plugins/odometer/odometer.js"></script>

<!-- ================== END BASE JS ========================== -->
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/jquery.dataTables.js"></script>
<script src="assets/js/dataTables.fixedColumns.js"></script>
<script src="assets/js/table-manage-fixed-columns.demo.min.js"></script>

<script src="assets/js/apps.min.js"></script>
<script src="assets/js/ajax.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
    //globals
    var recordset;
    var formapago;
    $(document).ready(function() {
        App.init();
        TableManageFixedColumns.init();
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
function cambiar_tipo_graph(tipo){
   if ( tipo=='prueba') {
          // structura de GRAFICA
  $('#comparativo').highcharts({chart: {type: 'column'},title: {text: 'Mejores Establecimientos'},subtitle: {text: 'Datos de Prueba'},xAxis: {type: 'category'},yAxis: {title: {text: 'Ingresos S/.'}},legend: {enabled: false},plotOptions: {series: {borderWidth: 0,dataLabels: {enabled: true,format: 'S/. {point.y:.2f}'}}},tooltip: {headerFormat: '<span style="font-size:11px">{series.name}</span><br>',pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>S/. {point.y:.2f}</b> of total<br/>'},series: [{name: 'Centro',colorByPoint: true,data: [{name: 'SJL',y: 67853.5,drilldown: 'SJL'}, {name: 'H.S. CAMANA',y: 59827.7,drilldown: 'H.S. CAMANA'}, {name: 'H.S. COMAS',y: 58468.8,drilldown: 'H.S. COMAS'}, {name: 'H.S. VILLA EL SAVADOR',y: 25468.77,drilldown: 'H.S. VILLA EL SAVADOR'}, {name: 'H.S. TACNA',y: 23681.91,drilldown: 'H.S. TACNA'}]}],drilldown: {series: [{name: 'SJL',id: 'SJL',data: [['ESPECIALIDAD 1',24.13],['ESPECIALIDAD 2',17.2],['ESPECIALIDAD 3',8.11],['ESPECIALIDAD 4',5.33],['ESPECIALIDAD 5',1.06],['ESPECIALIDAD 6',0.5]]}, {name: 'H.S. CAMANA',id: 'H.S. CAMANA',data: [['ESPECIALIDAD 1',5],['ESPECIALIDAD 2',4.32],['ESPECIALIDAD 3',3.68],['ESPECIALIDAD 4',2.96],['ESPECIALIDAD 5',2.53],['ESPECIALIDAD 6',1.45],['ESPECIALIDAD 7',1.24],['ESPECIALIDAD 8',0.85],['ESPECIALIDAD 9',0.6],['ESPECIALIDAD 10',0.55],['ESPECIALIDAD 11',0.38],['ESPECIALIDAD 12',0.19],['ESPECIALIDAD 13',0.14],['ESPECIALIDAD 14',0.14]]}, {name: 'H.S. COMAS',id: 'H.S. COMAS',data: [['ESPECIALIDAD 1',2.76],['ESPECIALIDAD 2',2.32],['ESPECIALIDAD 3',2.31],['ESPECIALIDAD 4',1.27],['ESPECIALIDAD 5',1.02],['ESPECIALIDAD 6',0.33],['ESPECIALIDAD 7',0.22],['ESPECIALIDAD 8',0.15]]}, {name: 'H.S. VILLA EL SAVADOR',id: 'H.S. VILLA EL SAVADOR',data: [['ESPECIALIDAD 1',2.56],['ESPECIALIDAD 2',0.77],['ESPECIALIDAD 3',0.42],['ESPECIALIDAD 4',0.3],['ESPECIALIDAD 5',0.29],['ESPECIALIDAD 6',0.26],['ESPECIALIDAD 7',0.17]]}, {name: 'H.S. TACNA',id: 'H.S. TACNA',data: [['ESPECIALIDAD 1',0.34],['ESPECIALIDAD 2',0.24],['ESPECIALIDAD 3',0.17],['ESPECIALIDAD 4',0.16]]}]}});
          //FIN ESTRUCTURA GRAFICA
   };
};
function  set_value(data){
alert(data);
}
    function pad(n, width, z) {
        z = z || '0';
        n = n + '';
        return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
    }
    function fn_get_datos(dependencia,txtdate,txtdate_end,tipo){
        var url = "get/get_datos.php?dependencia="+dependencia+"&txtdate="+txtdate+"&txtdate_end="+txtdate_end+"&method=get_grant_sales_by_day&tipo="+tipo;
        $.getJSON (url, function (datatable) {
            var data = datatable;
            if (tipo=='I') {
                $('#ingresos_'+dependencia).text(data);
            }else if (tipo=='A') {
                $('#atencion_'+dependencia).text(data);
            };


        });

    }

    function fn_get_datos_rs(dependencia,txtdate,txtdate_end,tipo){
    //obtener datos de tabla
    if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
    };
    var url = 'get/get_datos.php';
    var modurl = url +"?dependencia="+dependencia+"&txtdate="+txtdate+"&txtdate_end="+txtdate_end+"&method=get_grant_sales_by_day&tipo="+tipo;
    http.open("GET", modurl, false);
    http.addEventListener('readystatechange', function() {
        if (http.readyState == 4) {
            if(http.status == 200) {
                var miTexto = http.responseText;
                recordset= JSON.parse(miTexto);
            };
        };
    });
    // http.onreadystatechange = useHttpResponseDistritoPac;
    http.send(null);
}

function fn_generar_reporte(){

  var centro=['CEN','CCH','CCM','CJP','CLE','CLV','CRM','CSM','CSR','CHN','CVL','ATE','CMN','CAR','CIX','CHR','CMS','CZC','CZ2','EAG','ICA','LVC','MGD','RMC','CLM','PTP','PHR','LN2','SJL','SMP','SLN','SRQ','TCN','TRP','TMB','VES','VMT','NVC'];
  var fechaini=document.getElementById('txt_fec_ini').value;
  var fechafin=document.getElementById('txt_fec_fin').value;

  if (fechaini!="" && fechafin!=""){
    for (var i = 0; i < centro.length; i++) {
        fn_get_datos(centro[i],fechaini,fechafin,'A');
        fn_get_datos(centro[i],fechaini,fechafin,'I');
    };
}else{
    alert("No ha definido las fechas para Consulta");
}
}
//STAND BY HASTA TRABAJAR WEBSERVICE
function f_get_ranking5(){
  var fechaini=document.getElementById('txt_fec_ini').value;
  var fechafin=document.getElementById('txt_fec_fin').value;
//obtner los codigos de los centros
var centro=['TCN','CMN','CMS','SJL','VES'];
var datos=   new Array(centro.length);
for (var i = 0; i < datos.length; i++) {
    datos[i]= new Array(2);
};

for (var i = 0; i < datos.length; i++) {
    datos[i][0]=centro[i];
    fn_get_datos_rs(centro[i],fechaini,fechafin,'I');
    datos[i][1]= recordset;
};

alert(datos[0][0]+"->"+datos[0][1]);

}
</script>

</body>
</html>
