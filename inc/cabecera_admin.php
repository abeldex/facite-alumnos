<?php

include('../../inc/conexion.php');

?>

<!doctype html>
<html lang="eS">
	<head>
        <base href="https://facite-alumnos.herokuapp.com/administrador/">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/dropzone.css">
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lato:400,700%7CMontserrat:300,400,600,700">
		
		<link rel="stylesheet" href="../icons/fontawesome/css/fontawesome-all.min.css"><!-- FontAwesome Icons -->
		<link rel="stylesheet" href="../icons/Iconsmind__Ultimate_Pack/Line%20icons/styles.min.css"><!-- iconsmind.com Icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.2.6/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		
        <title>Sistema Alumnos | Facultad de Ciencias de la Tierra y el Espacio | </title>
        <style>
             .scrollbar {
                background-color: #8E844E;
                float: left;
                height: 300px;
                margin-bottom: 25px;
                margin-left: 22px;
                margin-top: 40px;
                width: 65px;
                overflow-y: scroll;
            }

            .force-overflow {
                min-height: 450px;
            }

            #style-1::-webkit-scrollbar {
                width: 6px;
                background-color: #F5F5F5;
            } 

            
        </style>
	</head>
	<body id="style-1">
		<div id="sidebar-bg" style="background-image: url(../images/pattern2.png);">
			
      <header id="videohead-pro" class="sticky-header" style="background-color:#102938; color:#ffffff;">
			<div id="video-logo-background"><a href="https://facite-alumnos.herokuapp.com/administrador/"><img src="../images/logopeque.svg" alt="Logo"></a></div>
			<div id="video-search-header">
				<p style="font-size: 30px; font-weight:bold; margin-left:20px;">Sistema Integral de Alumnos | Administración</p>
			</div>
			<div id="mobile-bars-icon-pro" class="noselect"><i class="fas fa-bars"></i></div>
			
			
			<div id="header-user-profile">
				<div id="header-user-profile-click" class="noselect">
					<img src="../images/default.png" alt="Suzie">
					<div id="header-username"><?php echo $_SESSION['nombre'];?></div><i class="fas fa-angle-down"></i>
				</div><!-- close #header-user-profile-click -->
				<div id="header-user-profile-menu">
					<ul>
						<li><a href="#"><span class="icon-User"></span>Perfil</a></li>
						<li><a href="#!"><span class="icon-Life-Safer"></span>Ayuda/Soporte</a></li>
						<li><a href="https://facite-alumnos.herokuapp.com/inc/logout.php"><span class="icon-Power-3"></span>Salir</a></li>
					</ul>
				</div><!-- close #header-user-profile-menu -->
			</div><!-- close #header-user-profile -->
			
			<div id="header-user-notification">
				<div id="header-user-notification-click" class="noselect">
					<i class="far fa-bell"></i>
					<span class="user-notification-count">1</span>
				</div><!-- close #header-user-profile-click -->
				<div id="header-user-notification-menu">
					<h3>Notificaciones</h3>
					<div id="header-notification-menu-padding">
							<ul id="header-user-notification-list">
								<li><a href="#!"><img src="../images/default.png" alt="Profile">Prueba <div class="header-user-notify-time">Hace 1 hora</div></a></li>
							</ul>
							<div class="clearfix"></div>
						</div><!-- close #header-user-profile-menu -->
					</div>
			</div><!-- close #header-user-notification -->
			
			
			
			<div class="clearfix"></div>
			
			<nav id="mobile-navigation-pro">
			
				<ul id="mobile-menu-pro">
	            <li class="current-menu-item">
	              <a href="https://facite-alumnos.herokuapp.com/administrador/creditos/">
                  <span class="icon-Address-Book2"></span>
	                    Módulo de Créditos
	              </a>
	            <li>
	            
				</ul>
				<div class="clearfix"></div>
				
				<div id="search-mobile-nav-pro">
					<input type="text" placeholder="Search for Movies or TV Series" aria-label="Search">
				</div>
				
			</nav>
			
      </header>
		
		
		
		<nav id="sidebar-nav"><!-- Add class="sticky-sidebar-js" for auto-height sidebar -->
            <ul id="vertical-sidebar-nav" class="sf-menu">
              <li class="normal-item-pro current-menu-item">
                <a href="https://facite-alumnos.herokuapp.com/administrador/creditos/">
                    <span class="icon-Address-Book2"></span>
                        Módulo de Créditos
                </a>
              </li>
            </ul>
				<div class="clearfix"></div>
		</nav>