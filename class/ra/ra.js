function ra_cambio_label() {
  var tipo=document.getElementById('ra_tipo_consulta').value;
  if (tipo=='1') {
     document.getElementById('ra_label_razon_nombre').innerHTML='Razón Social';
  }else if(tipo=='2'){
 document.getElementById('ra_label_razon_nombre').innerHTML='Nombre de Asociado';
  }
}
function ra_obtenerReporte1(){

var elemento=document.getElementById('ra_form');
  if (validarVaciosIN(elemento)) {
      startLoading('#ra_panel_resultado');
      ra_empresas();
      ra_per_natural();
  endLoading('#ra_panel_resultado');
}
}

function ra_empresas(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  //datos-----------------------------------------------------------------------
var oper=document.getElementById('ra_select_centros').value;
var annio=$('#ra_select_anio').val();
// var especialidad=document.getElementById('ra_especialidad').value;
var especialidad=document.getElementById('ra_select_especialidad').value;
 // var mes=document.getElementById('ra_select_mes').value;

  //datos-----------------------------------------------------------------------
  // var modurl = "../get/get_ra_reporte1.php?anio="+annio+"&oper="+oper+"&esp="+especialidad+"&mes="+mes;
  var modurl = "../get/get_ra_reporte1.php?anio="+annio+"&oper="+oper+"&esp="+especialidad;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById('ra_table_reporte').innerHTML=(resultado);

      }
    }
  });
    http.send(null);
}

function ra_per_natural(){
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  //datos-----------------------------------------------------------------------
var oper=document.getElementById('ra_select_centros').value;
var annio=$('#ra_select_anio').val();
// var especialidad=document.getElementById('ra_especialidad').value;
var especialidad=document.getElementById('ra_select_especialidad').value;
// var mes=document.getElementById('ra_mes').value;

  //datos-----------------------------------------------------------------------
  // var modurl = "../get/get_ra_reporte2.php?anio="+annio+"&oper="+oper+"&esp="+especialidad+"&mes="+mes;
  var modurl = "../get/get_ra_reporte2.php?anio="+annio+"&oper="+oper+"&esp="+especialidad;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById('ra_table_reporte2').innerHTML=(resultado);

      }
    }
  });
    http.send(null);
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
