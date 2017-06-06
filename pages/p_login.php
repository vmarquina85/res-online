<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Res-online</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link rel="icon" sizes="16x16" type="image/png" href="../assets/img/favicon/logo.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../assets/css/jquery-ui.min.css" rel="stylesheet" />
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="../assets/css/animate.min.css" rel="stylesheet" />
	<link href="../assets/css/style.min.css" rel="stylesheet" />
	<link href="../assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="../assets/css/orange.css" rel="stylesheet" id="theme" />
	<link href="../assets/css/sysinv.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../assets/js/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader">
		<div class="material-loader">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
			</svg>
			<div class="message">Cargando...</div>
		</div>
	</div>
	<!-- end #page-loader -->
	<div class="login-cover">
		<div class="login-cover-image"><img src="../assets/img/login-bg/bg-1.jpg" data-id="login-cover-image" alt="" /></div>
		<div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin login -->
		<div class="login login-v2" data-pageload-addclass="animated fadeIn">
			<!-- begin brand -->
			<div class="login-header">
				<div class="brand">
				<span><img src="../assets/img/logo.png"></span>
					<strong class='text-white sombrear'>Res-online</strong>
					<small>Reportes Gerenciales - PE/GG</small>
				</div>
			</div>
			<!-- end brand -->
			<div class="login-content">
				<div id='alert' hidden></div>
				<form action="javascript:;" method='POST'>
					<div class="form-group m-b-20">
						<input type="text" class="form-control input-lg" placeholder="Usuario" id='usuario'   required/>
					</div>
					<div class="form-group m-b-20">
						<input type="password" class="form-control input-lg" placeholder="Contraseña" id='password' required />
					</div>
					<div class="login-buttons">
						<button type="submit" name='btn-login' onClick='javascript:Ingresar();' class="btn btn-warning btn-block btn-lg">Ingresar</button>
					</div>
				</form>
			</div>
		</div>
		<!-- end login -->
		<!-- begin theme-panel -->
		<!-- end theme-panel -->
	</div>
	<!-- end page container -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../assets/js/jquery-1.9.1.min.js"></script>
	<script src="../assets/js/jquery-migrate-1.1.0.min.js"></script>
	<script src="../assets/js/jquery-ui.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jquery.slimscroll.min.js"></script>
	<script src="../assets/js/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="../assets/js/login-v2.demo.min.js"></script>
	<script src="../assets/js/apps.min.js"></script>
	<script src="../class/login/login.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
	$(document).ready(function() {
		App.init();
		LoginV2.init();
	});
	</script>
</body>
</html>
