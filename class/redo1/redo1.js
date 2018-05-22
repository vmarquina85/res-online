function disclamer(){
  $('#disclamer').modal();
}
function show_centros(){
  // $("#resultados_II").carousel(0);
  $("#resultados_I").carousel(0);
}
function show_mes(){
  // $("#resultados_II").carousel(1);
  $("#resultados_I").carousel(1);
}
function show_especialidades(){
  // $("#resultados_II").carousel(2);
  $("#resultados_I").carousel(2);
}
function show_fechas(){
  // $("#resultados_II").carousel(2);
  $("#resultados_I").carousel(3);
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
  $('#sl_mes1').selectpicker('val', '*');
}
//parametro: 1 o 2 quien activo el evento
function getResultados(){
  if (document.getElementById('sl_anio1').value!="" && document.getElementById('sl_anio2').value!="" && document.getElementById('sl_mes1').value!="") {
    if (document.getElementById('sl_anio1').value!=document.getElementById('sl_anio2').value) {
      var panio1=document.getElementById('sl_anio1').value;
      if( $('#cb_fact').is(':checked') ) {
        var pmes1="*";
        gmes1="*";
      }else{
        var pmes1=$('#sl_mes1').val();
        gmes1=$('#sl_mes1').val();
      }
      var panio2=document.getElementById('sl_anio2').value;
      ganio1=document.getElementById('sl_anio1').value;
      ganio2=document.getElementById('sl_anio2').value;
      var url = "../get/get_redo1_totales.php?anio="+panio1+"&mes="+pmes1+"&fact="+gfecphp;
      $.getJSON (url, function (datatable) {
        var data = datatable;
        $('#data_ingresos1').text(0);
        $('#data_ingresos1').text(format1(Number(data[0]['ingresos']),"S/."));
      });
      var url2 = "../get/get_redo1_totales.php?anio="+panio2+"&mes="+pmes1+"&fact="+gfecphp;
      $.getJSON (url2, function (datatable) {
        var data = datatable;
        $('#data_ingresos2').text(0);
        $('#data_ingresos2').text(format1(Number(data[0]['ingresos']),"S/."));
      });
      compCentrosIngresos1(panio1,panio2,pmes1,gfecphp);
      compMesIngresos1(panio1,panio2,pmes1,gfecphp);
      compEspIngresos1(panio1,panio2,pmes1,gfecphp);
      compFechaIngresos1(panio1,panio2,pmes1,gfecphp);
    }else{
      alert("Seleccionar Años Distintos")
    }
  }else{
    alert("Completar Datos");
  }
}
function compCentrosIngresos1(anio1,anio2,mes,feact){
  startLoading('#pnl_Ingresos1');
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var modurl = "../get/get_compCentros.php?anio1="+anio1+"&anio2="+anio2+"&mes="+mes+"&fact="+feact;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;

        document.getElementById('tb_comp_I11').innerHTML=(resultado);
        // initDatatable("#tb_response_Centro_I");
        $('#tb_response_Centro_I').tablesorter({
          headers: {
            1: {
              sorter:'FancyNumber'
            },
            2: {
              sorter:'FancyNumber'
            }
          }
        });
        endLoading('#pnl_Ingresos1');

      }
    }
  });
  http.send(null);
}
function compMesIngresos1(anio1,anio2,mes,feact){
  startLoading('#pnl_Ingresos1');
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var modurl = "../get/get_compMes.php?anio1="+anio1+"&anio2="+anio2+"&mes="+mes+"&fact="+feact;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById('tb_comp_I21').innerHTML=(resultado);
        //initDatatable("#tb_response_mes_I");
        $('#tb_response_mes_I').tablesorter({
          headers: {
            1: {
              sorter:'FancyNumber'
            },
            2: {
              sorter:'FancyNumber'
            }
          }
        });
        endLoading('#pnl_Ingresos1');
      }
    }
  });
  http.send(null);
}
function compFechaIngresos1(anio1,anio2,mes,feact){
  startLoading('#pnl_Ingresos1');
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var modurl = "../get/get_compFechas.php?anio1="+anio1+"&anio2="+anio2+"&mes="+mes+"&fact="+feact;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById('tb_comp_I41').innerHTML=(resultado);
        //initDatatable("#tb_response_mes_I");
        $('#tb_response_fecha_I').tablesorter({
          headers: {
            1: {
              sorter:'FancyNumber'
            },
            2: {
              sorter:'FancyNumber'
            }
          }
        });
        endLoading('#pnl_Ingresos1');
      }
    }
  });
  http.send(null);
}
function compEspIngresos1(anio1,anio2,mes,feact){
  startLoading('#pnl_Ingresos1');
  if (window.XMLHttpRequest) {
    var http=getXMLHTTPRequest();
  }
  var modurl = "../get/get_compEsp.php?anio1="+anio1+"&anio2="+anio2+"&mes="+mes+"&fact="+feact;
  http.open("GET", modurl, true);
  http.addEventListener('readystatechange', function() {
    if (http.readyState == 4) {
      if(http.status == 200) {
        var resultado = http.responseText;
        document.getElementById('tb_comp_I31').innerHTML=(resultado);
        // initDatatable("#tb_response_esp_I");
        $('#tb_response_esp_I').tablesorter({
          headers: {
            1: {
              sorter:'FancyNumber'
            },
            2: {
              sorter:'FancyNumber'
            }
          }
        });
        endLoading('#pnl_Ingresos1');
      }
    }
  });
  http.send(null);
}
// PARA EL AÑO A COMPARAR
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
function get_details_1(objeto,tipanio){
  // $('#loading').modal();
  fila=objeto.closest('tr');
  var centro=fila.getElementsByTagName("td")[0].innerHTML;
  if (tipanio==0) {
    startLoading('#pnl_Ingresos1');
    var parametros = {
      "anio":ganio1 ,
      "mes": gmes1,
      "centro":centro
    };
    $.ajax({
      data:  parametros,
      url:   '../get/get_detalle_1.php',
      type:  'post',
      success:  function (response) {
        document.getElementById("tabla_det").innerHTML=response;
        endLoading('#pnl_Ingresos1');
        $('#modal_detalles').modal();
      }
    });
  }else{
    startLoading('#pnl_Ingresos2');
    var parametros = {
      "anio":ganio2 ,
      "mes": gmes2,
      "centro":centro
    };
    $.ajax({
      data:  parametros,
      url:   '../get/get_detalle_1.php',
      type:  'post',
      success:  function (response) {
        document.getElementById("tabla_det").innerHTML=response;
        endLoading('#pnl_Ingresos2');
        $('#modal_detalles').modal();
      }
    });
  }

}
function get_details_2(objeto,tipanio){
  // $('#loading').modal();
  fila=objeto.closest('tr');
  var centro=fila.getElementsByTagName("td")[0].innerHTML;
  if (tipanio==0) {
    startLoading('#pnl_Ingresos1');
    var parametros = {
      "anio":ganio1 ,
      "mes": gmes1,
      "centro":centro
    };
    $.ajax({
      data:  parametros,
      url:   '../get/get_detalle_2.php',
      type:  'post',
      success:  function (response) {
        document.getElementById("tabla_det").innerHTML=response;
        endLoading('#pnl_Ingresos1');
        $('#modal_detalles').modal();
      }
    });
  }else{
    startLoading('#pnl_Ingresos2');
    var parametros = {
      "anio":ganio2 ,
      "mes": gmes2,
      "centro":centro
    };
    $.ajax({
      data:  parametros,
      url:   '../get/get_detalle_2.php',
      type:  'post',
      success:  function (response) {
        document.getElementById("tabla_det").innerHTML=response;
        endLoading('#pnl_Ingresos2');
        $('#modal_detalles').modal();
      }
    });
  }
}
