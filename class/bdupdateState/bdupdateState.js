function bdupdateState_gMaxFechas(){
  $.ajax({
    url:   '../get/get_bdupdateState.php',
    type:  'post',
    success:  function (response) {
        document.getElementById("dat_actu").innerHTML=response;
          $('#reg_act').tablesorter({textExtraction: "complex"});
          $('#reg_act').fadeIn(1000);
    }
  });
}
function disclamer(){
  $('#disclamer').modal();
}
