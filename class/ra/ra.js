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
    if (window.XMLHttpRequest) {
      var http=getXMLHTTPRequest();
    }
    //datos-----------------------------------------------------------------------
  var tipo=document.getElementById('ra_tipo_consulta').value;
  var parametro=document.getElementById('ra_razon_nombre').value;
  // var especialidad=document.getElementById('ra_especialidad').value;
  var anio=document.getElementById('ra_annio').value;
  // var mes=document.getElementById('ra_mes').value;

    //datos-----------------------------------------------------------------------
    var modurl = "../get/get_ra_reporte1.php?anio="+anio+"&parametro="+parametro+"&tipo="+tipo;
    http.open("GET", modurl, true);
    http.addEventListener('readystatechange', function() {
      if (http.readyState == 4) {
        if(http.status == 200) {
          var resultado = http.responseText;
          document.getElementById('ra_table_reporte').innerHTML=(resultado);
            endLoading('#ra_panel_resultado');
        }
      }
    });
      http.send(null);
  }
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
