<?php
	use App\Models\ConfiguracionModel;
	$configModel = new ConfiguracionModel();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<title><?= $titulo ?></title>
	<link href="<?= base_url()?>/plugins/dataTables/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url()?>/css/app.css" rel="stylesheet">
  	<link href="<?= base_url()?>/plugins/dataTables/dataTables.bootstrap5.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  	<link href="<?= base_url()?>/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle"><?= $configModel->where('nombre', 'tienda_nombre')->first()['valor'];?></span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Menú Principal
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url()?>/inicio">
							<i class="fa fa-home"></i><span class="align-middle">Inicio</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a data-bs-target="#productos" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
							<i class="fa fa-cubes"></i><span class="align-middle">Productos</span>
						</a>
						<ul id="productos" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url()?>/unidades"><i class="fa fa-minus"></i> Unidades</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url()?>/categorias"><i class="fa fa-minus"></i> Categorías </a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url()?>/productos"><i class="fa fa-minus"></i> Productos </a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url()?>/clientes">
							<i class="fa fa-user"></i> <span class="align-middle">Clientes</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a data-bs-target="#administracion" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
							<i class="fa fa-cogs"></i><span class="align-middle">Administración</span>
						</a>
						<ul id="administracion" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url()?>/configuracion"><i class="fa fa-minus"></i> Configuración</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url()?>/categorias"><i class="fa fa-minus"></i> Categorías </a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url()?>/productos"><i class="fa fa-minus"></i> Productos </a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url()?>/cajas">
							<i class="fa fa-user"></i> <span class="align-middle">Caja</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-sign-up.html">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign Up</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-blank.html">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
            </a>
					</li>

					

					

					
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="fa fa-cogs"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="<?= base_url()?>/img/avatar/8.png" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">Charles Hall</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="fa fa-user"></i> Perfil</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"> <i class="fa fa-sign-out"></i> Cerrar Sesión</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
