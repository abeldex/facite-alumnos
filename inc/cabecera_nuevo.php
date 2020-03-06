<?php

include('../inc/conexion.php');

?>

<!doctype html>
<html lang="es">

    <head>
		<meta charset="utf-8" />
		<base href="http://facite.uas.edu.mx/alumnos/sistema/">
        <title>Sistema de Alumnos | Facultad de Ciencias de la Tierra y el Espacio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
		<link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
		<!-- SweetAlert-->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.2.6/dist/sweetalert2.all.min.js"></script>
		<!-- Dropzone -->
		<link rel="stylesheet" href="../assets/css/dropzone.css">

		<style type="text/css">
          .borde-dropzone{
            border: 2px dashed #47a447 !important;
            border-radius: 5px !important;
            background: white !important;
           }

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

            #div_reglamento{
                width:100%;
                height:250px;
                border:0px solid #FFFFFF;
                position:relative;
                height:800px;
            }
            .w100{
                width:100%;
                position:absolute;
                height:100%;
	        }
        </style>


    </head>

    <body data-topbar="colored" data-sidebar-size="small">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="../assets/images/logopeque.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="../assets/images/logo.svg" alt="" width="100%">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="../assets/images/logopeque.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="../assets/images/logo-light.svg" alt="" width="100%">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>

                        <!-- App Search
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>-->
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="../assets/images/default.png" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo $_SESSION['nombre'];?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="http://facite.uas.edu.mx/alumnos/sistema/perfil/"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Perfil</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-settings font-size-16 align-middle mr-1"></i> Ayuda/Sporte</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="http://facite.uas.edu.mx/alumnos/inc/logout.php"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Salir</a>
                            </div>
                        </div>
            
                    </div>
                </div>

            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="http://facite.uas.edu.mx/alumnos/sistema/" class="waves-effect">
                                    <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-monitor-dashboard"></i></div>
                                    <span>Inicio</span>
                                </a>
                            </li>

                            <li>
                                <a href="http://facite.uas.edu.mx/alumnos/sistema/creditos/" class=" waves-effect">
                                    <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-bullseye-arrow"></i></div>
                                    <span>Créditos</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://facite.uas.edu.mx/alumnos/sistema/constancias/" class="has-arrow waves-effect">
                                    <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-certificate-outline"></i></div>
                                    <span>Constancias</span>
                                </a>
                            </li>

                            <li>
                                <a href="http://facite.uas.edu.mx/alumnos/sistema/cv/" class="has-arrow waves-effect">
                                    <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-newspaper-variant-outline"></i></div>
                                    <span>Curriculum</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
			<!-- Left Sidebar End -->	