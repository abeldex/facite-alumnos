<?php session_start();
include('../../inc/cabecera_nuevo.php');
include('../../inc/conexion.php');
//verificar si ya inicio sesion
if (!isset($_SESSION['cuenta'])) {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/"</script>';
}

$cuenta = $_SESSION['cuenta']; 
$nombre = $_SESSION['nombre'];    

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
                                    <h4 class="page-title mb-1">Módulo de Constancias</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sistema de Alumnos</a></li>
                                    <li class="breadcrumb-item active">Constancias</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-rounded dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-settings-outline mr-1"></i> Opciones
                                            </button>
                                            <!--<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">Action</a>
                                            </div>-->
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">ASISTENCIA A EVENTOS Y CONFERENCIAS</h4>
                            <p class="card-title-desc"> En esta sección encontrás los eventos y conferencias a los que asististe.</p>

                            <table class="table table-striped ">
								<thead class="thead-light">
									<tr>
										<th >Evento</th>
										<th>Fecha</th>
                                        <th class="text-center">Descargar</th>
									</tr>
								</thead>
							    <tbody id="tbody">
								</tbody>
							</table>
                        </div><!--termna body card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal" >
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Descargar Constancia</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                           
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->

<?php
include('../../inc/pie_nuevo.php');
?>

<script>
            $(document).ready( function () 
            {	<?php   
                    echo 'getEventos('.$cuenta.');';
                ?>
                
            });

            function descargar(nombre, evento)
            {
                var url = 'http://facite.uas.edu.mx/constancias/generar2.php?nombre='+nombre+'&evento='+evento;
                // Add response in Modal body
                    $('.modal-body').html('<object type="application/pdf" data="'+url+'" width="100%" height="500" style="height: 85vh;">No Support</object>');
                    // Display Modal
                    $('#myModal').modal('show'); 
            }
            

            <?php
                    echo "
                    function getEventos(cuenta) {
                        $.ajax({
                            type: 'GET',
                            url: 'http://facite.uas.edu.mx/alumnos/sistema/constancias/get_eventos_alumno.php?cuenta='+cuenta,
                            success: function(data){
                                $('#tbody').html('');
                                $('#tbody').html(data);
                            }
                        });
                    }   
                    ";
            ?>

        </script>	