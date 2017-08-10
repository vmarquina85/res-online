function disclamer(){
  $('#disclamer').modal();
}
function show_centros(){
  $("#resultados_II").carousel(0);
  // var table = $.fn.dataTable.fnTables(true);
  // if ( table.length > 0 ) {
  // $(table).dataTable().fnAdjustColumnSizing();
  // }
  $("#resultados_I").carousel(0);
  // var table = $.fn.dataTable.fnTables(true);
  // if ( table.length > 0 ) {
  // $(table).dataTable().fnAdjustColumnSizing();
  // }
}

function show_mes(){
  $("#resultados_II").carousel(1);
  // var table = $.fn.dataTable.fnTables(true);
  // if ( table.length > 0 ) {
  // $(table).dataTable().fnAdjustColumnSizing();
  // }
  $("#resultados_I").carousel(1);
  // var table = $.fn.dataTable.fnTables(true);
  // if ( table.length > 0 ) {
  // $(table).dataTable().fnAdjustColumnSizing();
  // }
}
function show_especialidades(){
  $("#resultados_II").carousel(2);
  // var table = $.fn.dataTable.fnTables(true);
  // if ( table.length > 0 ) {
  // $(table).dataTable().fnAdjustColumnSizing();
  // }
  $("#resultados_I").carousel(2);
  // var table = $.fn.dataTable.fnTables(true);
  // if ( table.length > 0 ) {
  // $(table).dataTable().fnAdjustColumnSizing();
  // }

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
  // if (document.getElementById('sl_anio1').value=='2017' && document.getElementById('sl_mes1').value=='*') {
  //   $('#sl_mes2').prop('disabled', 'disabled');
  //    $('#message').removeClass('hide');
  //    gdate=gfecphp;
  //
  // }else {
  //     $('#sl_mes2').removeAttr("disabled");
  //        gdate="";
  // }
  $('#data_ingresos1').text(0);
  $('#data_atenciones1').text(0);
  var panio=document.getElementById('sl_anio1').value;
  var pmes=document.getElementById('sl_mes1').value;
  ganio1=document.getElementById('sl_anio1').value;
  gmes1=document.getElementById('sl_mes1').value;
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
//parametro: 1 o 2 quien activo el evento
function mostrarResultados2(){
  $('#data_ingresos2').text(0);
  $('#data_atenciones2').text(0);
  var panio=document.getElementById('sl_anio2').value;
  var pmes=document.getElementById('sl_mes2').value;
  ganio2=document.getElementById('sl_anio2').value;
  gmes2=document.getElementById('sl_mes2').value;
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
        // initDatatable("#tb_response_Centro_I_2");
        $('#tb_response_Centro_I_2').tablesorter({
          headers: {
            1: {
              sorter:'FancyNumber'
            },
            2: {
              sorter:'FancyNumber'
            }
          }
        });
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
        $('#tb_response_mes_I_2').tablesorter({
          headers: {
            1: {
              sorter:'FancyNumber'
            },
            2: {
              sorter:'FancyNumber'
            }
          }
        });
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
        // initDatatable("#tb_response_esp_I_2");
        $('#tb_response_esp_I_2').tablesorter({
          headers: {
            1: {
              sorter:'FancyNumber'
            },
            2: {
              sorter:'FancyNumber'
            }
          }
        });
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
