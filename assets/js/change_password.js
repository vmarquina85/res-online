$("#Li_chgpsw").click(function(){
var modal= $("#modal_chgpsw");
 if (modal.length == 0) {
 	modal = $("<?php echo file_get_contents('../cambio_contrasena.php');?>").hide().appendTo("body");
 	FormPlugins.init();
}
 $(modal).modal();

});