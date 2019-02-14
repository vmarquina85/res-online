<?php
session_start();
if (!isset($_SESSION["resonlinepermitido"])) {
  header("location:../index.php");
  exit();
};
include ('../class/menu/menu_cls.php');
$menu= new menu();
session_start();
$usrreg=$_SESSION['resonline_id_usr'];
$rs_submenu=$menu->get_submenus($usrreg,'1');
echo "<li class='nav-header'>MENÚ PRINCIPAL</li>";
for ($m=0; $m <  sizeof($rs_submenu); $m++) {
echo "<li id='item".$m."' class='has-sub' data-toggle='tooltip' title='".$rs_submenu[$m]['submenu_name']."' data-placement='right'>
<a href='".$rs_submenu[$m]['submenu_link']."'>
<i class='".$rs_submenu[$m]['submenu_icon']."' aria-hidden='true'></i>
<span>".$rs_submenu[$m]['submenu_name']."</span>
</a>
</li>";
}
echo "<li class='has-sub mobile'>
<a href='javascript:;'>
<b class='caret pull-right'></b>
<i class='ion-android-contact'></i>
<span>USUARIO</span>
</a>
<ul class='sub-menu'>
<li><a href='javascript:getPasswordModal();'>Cambiar Contraseña</a></li>
<li><a href=''../class/login/logout_cls.php'>Cerrar Sesión</a></li>
</ul>
</li>";

 ?>
