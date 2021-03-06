function getPasswordModal(){
  var control=document.getElementById('modalPass');
  if (control==undefined) {
    $("body").append("<div id='modalPass' class='modal fade' aria-hidden='true' style='display: none;'><div class='dialog-normal modal-dialog'><div class='modal-content '><div class='modal-header bg-orange'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button><h4 class='modal-title text-white'>Cambio de Contraseña</h4></div><div class='modal-body'><form id='formPass' class='form-horizontal'><div class='form-group'><label class='control-label col-md-4'>Contraseña Actual</label><div class='col-md-8'><input type='password'  class='form-control m-b-5' id='actual_contrasena'></div></div><div class='form-group'><label class='control-label col-md-4'>Nueva Contraseña</label><div class='col-md-8'><input type='password' name='password' id='new_contrasena' class='form-control m-b-5'><div id='passwordStrengthDiv' class='is0 m-t-5 is10'></div></div></div><div class='form-group'><label class='control-label col-md-4'>Repetir Contraseña</label><div class='col-md-8'><input type='password' name='password' id='repetir_contrasena' class='form-control m-b-5'><div id='passwordStrengthDiv2' class='is0 m-t-5 is10'></div></div></div></form></div><div class='modal-footer'><a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Cancelar</a><a href='javascript:cambiarPass();' class='btn btn-sm btn-success'>Aceptar</a></div></div></div></div>");
    iniciarPasswordMeter();
    $("#modalPass").modal();
  }else{
    limpiarFormulario("#formPass");
    $("#modalPass").modal();
  }
}
function limpiarFormulario(formulario){
  $(formulario)[0].reset();
}
function format1(n, currency) {
    return currency + " " + n.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
}
function iniciarPasswordMeter(){
  $("#new_contrasena").passwordStrength(), $("#repetir_contrasena").passwordStrength({
    targetDiv: "#passwordStrengthDiv2"
  });
}
function cambiarPass(){
  if ((document.getElementById("actual_contrasena").value!="" && document.getElementById("new_contrasena").value!="") && (document.getElementById("repetir_contrasena").value!="") )
  {
    if (document.getElementById("new_contrasena").value==document.getElementById("repetir_contrasena").value) {
      if (window.XMLHttpRequest) {
        var http=getXMLHTTPRequest();
      };
      var url = '../class/login/update_contrasena.php';
      var act_pass=document.getElementById("actual_contrasena").value;
      var new_pass=document.getElementById("new_contrasena").value;
      var new_pass_rep=document.getElementById("repetir_contrasena").value;
      var modurl = url + "?pass=" + act_pass + "&n_pass=" + new_pass + "&r_pass=" + new_pass_rep;
      http.open("POST", modurl, false);
      http.addEventListener('readystatechange', function() {
        if (http.readyState == 4) {
          if(http.status == 200) {
            var respuesta = http.responseText.trim();
            if (respuesta=="0") {
              alert('Contraseña actual no es Correcta' ) ;

            }else{
              alert('Contraseña Cambiada con Exito') ;
              $("#modalPass").modal('toggle');
            };
          };
        };

      });
      http.send(null);
    }else{
      alert("Nueva Contraseña y Repetir Contraseña no condicen verificar!!.")
    }
  } else {
    alert('Debe llenar todos los datos para continuar') ;
  };
}
function validarVaciosIN(elemento){
  //elemento -> este es el div del cual se quiere recorrer
  // EI.- VERIFICAR VACIOS-----------------------
  var Children=elemento.children;
  for (var i=0; i<Children.length; i++) {
    if (Children[i].classList.contains('has-error')) {
      Children[i].classList.remove('has-error');
    }
    if (Children[i].children[1].value=="") {
      alert("Llene el Campo - "+ Children[i].children[0].innerHTML);
      Children[i].className += " has-error";
      Children[i].children[1].focus();
      return false;
    }
  }
  return true;
}
function LimpiarbyDIV(elemento){
  var Children=elemento.children;
  for (var i = 0; i < Children.length; i++) {
    if (Children[i].classList.contains('has-error')) {
      Children[i].classList.remove('has-error');
    }
Children[i].children[1].value="";
  }
}
function validarPasw(elemento){
  //elemento -> este es el div del cual se quiere recorrer
  // EI.- VERIFICAR passwords-----------------------
  var Children=elemento.children;
  var contieneClass=false;
  for (var i=0; i<Children.length; i++) {
    if (Children[i].children[1].classList.contains('password')) {
      contieneClass=true;
      var psw1 =Children[i].children[1].value;
      var psw2 =Children[i+1].children[1].value;
      if (psw1!=psw2) {
        alert("Las contraseñas no coinciden Revisar.")
        Children[i].children[1].focus();
        return false;
      }else{
        return true;
      }
    }
  }
  if (contieneClass==false) {
    alert("no se han encontrado campos contraseña (class='password')");
    return false;
  }
}
function startTimeAndDate() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('date').innerHTML=today.getDate() + "/" + checkTime(today.getMonth() + 1) + "/" + today.getFullYear();
  document.getElementById('time').innerHTML =h + ":" + m + ":" + s;
  var t = setTimeout(startTimeAndDate, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
