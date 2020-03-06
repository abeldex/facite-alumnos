<?php
include('../inc/cabecera_nuevo.php');
//verificar si ya inicio sesion
session_start();
if (!isset($_SESSION['cuenta'])) {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/"</script>';
  }

    $alumno = $_SESSION['nombre'];

?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
         <!-- Page-Title -->
         <div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Bienvenido al Sistema Integral de Alumnos de la Facultad de Ciencias de la Tierra y el Espacio</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sistema Alumnos</a></li>
                                        <li class="breadcrumb-item active">Inicio</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-rounded dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-settings-outline mr-1"></i> Opciones
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">

                            <div class="col-xl-3 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div>
                                                <h4 class="mt-3">Módulo de Créditos</h4>
                                                <div class="icons-xl py-4">
                                                    <i class="mdi mdi-bullseye-arrow text-primary mdi-48px"></i>
                                                </div>
                                                
                                                <div class="plan-features text-muted mt-3 text-justify">
                                                    <p>En el módulo de <b>Créditos</b> podrás consultar las actividades de libre elección disponibles y enviar evidencias para ir generando tu historial de créditos.</p>
                                                </div>

                                                <div class="mt-5">                  
                                                    <div class="mt-5 mb-3">
                                                        <a href="creditos/" class="btn btn-primary"><i class="mdi mdi-bullseye-arrow text-white"></i> Créditos</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            
                            <div class="col-xl-3 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div>
                                                <h4 class="mt-3">Módulo de Constancias</h4>
                                                <div class="icons-xl py-4">
                                                    <i class="mdi mdi-certificate-outline text-primary mdi-48px"></i>
                                                </div>
                                                
                                                <div class="plan-features text-muted mt-3 text-justify">
                                                    <p>En el módulo de <b>Constancias</b> podrás descargar las constancias de eventos y conferencias a los que has asistido.</p>
                                                </div>

                                                <div class="mt-5">                  
                                                    <div class="mt-5 mb-3">
                                                        <a href="constancias/" class="btn btn-primary">Constancias</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div>
                                                <h4 class="mt-3">Módulo de Curriculum Vitae</h4>
                                                <div class="icons-xl py-4">
                                                    <i class="mdi mdi-newspaper-variant-outline text-primary mdi-48px"></i>
                                                </div>
                                                
                                                <div class="plan-features text-muted mt-3 text-justify">
                                                    <p>En el módulo de <b>Curriculum Vitae</b> podrás crear y configurar tu CV en línea para así poder descargarlo cuando tu quieras.</p>
                                                </div>

                                                <div class="mt-5">                  
                                                    <div class="mt-5 mb-3">
                                                        <a href="constancias/" class="btn btn-primary">Curriculum</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>   
                    </div>


    </div>
</div>

<?php
include("../inc/pie_nuevo.php");
?>