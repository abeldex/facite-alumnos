<?php session_start();
include('../../inc/cabecera_admin.php');
if (!isset($_SESSION['cuenta'])) {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/administrador/login.php"</script>';
  }
$query = "SELECT * FROM Alumnos";

$estado = $connect->prepare($query);
$estado->execute();
$total = $estado->rowCount();
?>
<main id="col-main">	
			<div class="dashboard-container"><br>
                <h4 class="heading-extra-margin-bottom">Alumnos Registrados</h4>
                
                <!-- Vinculo actividades -->
                            <div class="col-12" id="tabla">
                            <button class="btn bg-success text-white" data-toggle="modal"  data-target="#mdlNuevoAlumno">Registrar Alumno</button>
                            <div class="card">
                                <div class="card-content">
                                    <table class="table table-striped">
                                        <thead class="bg-primary text-light">
                                            <th>Cuenta</th>
                                            <th >Nombre del Alumno</th>
                                            <th >Correo</th>
                                            <th >Telefono</th>
                                            <th >Estado</th>
                                            <th >Carrera</th>
                                            <th >Grado</th>
                                            <th >Grupo</th>
                                            <th >Cohorte</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($total > 0)
                                            {
                                                $res = $estado->fetchAll();
                                                foreach ($res as $row)
                                                {
                                                    echo '
                                                    <tr>
                                                        <td ><small>'.$row['cuenta'].'</small></td>
                                                        <td ><small>'.$row['nombre'].'</small></td>
                                                        <td ><small>'.$row['correo'].'</small></td>
                                                        <td ><small>'.$row['telefono'].'</small></td>
                                                        <td ><small>'.$row['estado'].'</small></td>
                                                        <td ><small>'.$row['carrera'].'</small></td>
                                                        <td ><small>'.$row['grado'].'</small></td>
                                                        <td ><small>'.$row['grupo'].'</small></td>
                                                        <td ><small>'.$row['cohorte'].'</small></td>
                                                </tr>
                                                    ';
                                                }
                                            }
                                            else
                                            {
                                                    echo '
                                                        <tr><td colspan="3">No hay ninguna alumno registrado</td></tr>
                                                    ';
                                            }

                                        ?>
                                        </tbody>
                                    </table>
                                </div> <!-- card content -->    
                            </div><!-- card -->
                        </div><!-- close .col -->
                </div>
            </div><!-- close .dashboard-container -->
</main>

<!-- Modal -->
<div id="mdlNuevoAlumno" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Alumno</h5>                          
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_alumnos" class="form">
                            <div class="form-group">
                                    <label for="cuenta_alumno">Numero de Cuenta:</label>
                                    <input type="number" class="form-control" id="cuenta_alumno" name="cuenta_alumno" placeholder="ej. 09193553">
                            </div>
                            <div class="form-group">
                                    <label for="nombre_alumno">Nombre del Alumno:</label>
                                    <input type="text" class="form-control" id="nombre_alumno" name="nombre_alumno" placeholder="ej. JIMENEZ PAYAN MIGUEL ANGEL">
                            </div>
                            <div class="form-group">
                                    <label for="correo_alumno">Correo Electrónico:</label>
                                    <input type="email" class="form-control" id="correo_alumno" name="correo_alumno" placeholder="ej. alumno@correo.com">
                            </div>
                            <div class="form-group">
                                    <label for="telefono_alumno">Telefono:</label>
                                    <input type="text" class="form-control" id="telefono_alumno" name="telefono_alumno" placeholder="ej. 6671919297">
                            </div>
							 <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="carrera_alumno">Carrera:</label>       
                                            <select class="form-control" id="carrera_alumno" name="carrera_alumno">
                                                <option value="1">Geodesia</option>
                                                <option value="2">Geomatica</option>
                                                <option value="3">Astronomia</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="cohorte_alumno">Cohorte:</label>
                                            <input type="text" class="form-control" id="cohorte_alumno" name="cohorte_alumno" placeholder="ej. 2014-2019">
                                        </div>
                                    </div>
							 </div>
							 <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="grado_alumno">Grado:</label>
                                        <input type="number" class="form-control" id="grado_alumno" name="grado_alumno" placeholder="ej. 4">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="grupo_alumno">Grupo:</label>
                                        <input type="number" class="form-control" id="grupo_alumno" name="grupo_alumno" placeholder="ej. 2">
                                    </div>
                                </div>
                             </div>
							
				</form>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
              <button type="button" class="btn btn-green-pro" id="btn_guardar">Guardar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->      

<?php
include('../../inc/pie.php');
?>
<script>
     $(document).on("click", "#btn_guardar", function() {
        //var nombre = $('#nombre_actividad').val().trim();
        //var creditos = $('#creditos_actividad').val();
        //var categoria = $('#categoria_actividad').val();
        //alert(nombre + " " + creditos + " " + categoria);
        $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/administrador/alumnos/insertar_alumno.php',
            data: $("#form_alumnos").serialize(), 
            success: function(data){
                Swal.fire({
                type: 'success',
                title: 'Alumno Registrado Correctamente',
                showConfirmButton: false,
                timer: 1500
                })
                $('#tabla').load(location.href + ' #tabla>*', "");
	            $('#btn_cancelar').click();
                document.getElementById('form_alumnos').reset();
            }

        });     
    });
</script>
