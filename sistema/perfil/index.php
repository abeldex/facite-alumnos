<?php session_start();
include('../../inc/cabecera.php');
include('../../inc/conexion.php');
//verificar si ya inicio sesion
if (!isset($_SESSION['cuenta'])) {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/"</script>';
  }

    $alumno = $_SESSION['cuenta'];

    //hacemos la consulta a la base de datos
    $query = "SELECT * FROM Alumnos WHERE cuenta ='".$alumno."'";

    $estado = $connect->prepare($query);
    $estado->execute();
    $res = $estado->fetchAll();
    foreach ($res as $row){
        $cuenta = $row['cuenta'];
        $nombre = $row['nombre'];
        $correo = $row['correo'];
        $telefono = $row['telefono'];
        $carrera = "";
        if($row['carrera'] == 1){
            $carrera = "Licenciatura en Ingeniería Geodesica";
        }
        elseif($row['carrera'] == 1){
            $carrera = "Licenciatura en Ingeniería Geomática";
        }
        elseif($row['carrera'] == 3){
            $carrera = "Licenciatura en Astronomía";
        }
        else{
            $carrera = "";
        }
        $grado = $row['grado'];
        $grupo = $row['grupo'];
        $cohorte = $row['cohorte'];
        $pass = $row['password'];
    }

?>
<main id="col-main">	
			<div class="dashboard-container">
                <br><br>
                    <div class="row">
                       
                        <div class="col-12  col-lg-3">
                                <div id="account-edit-photo">
                                    <div><img src="http://distribuidorde10.com/wp-content/uploads/2018/06/no_existe_segunda_oportunidad.gif" alt="Account Image"></div>
                                    <p><a class="btn btn-green-pro">Cambiar Foto Perfil</a></p>
                                </div>
                        </div><!-- close .col -->

                        <div class="col">
						
							<form class="account-settings-form">
						
							<h5>Información General</h5>
							<p class="small-paragraph-spacing">Información del alumno proporcionada por la Facite.</p>
							<div class="row">
								<div class="col-sm">
	   	  						 <div class="form-group">
	   								 <label for="account-name" class="col-form-label">Cuenta:</label>
	   	  							 <input type="text" disabled class="form-control" id="account-name" value="<?php echo $cuenta;?>">
	   	  						 </div>
								</div><!-- close .col -->
								<div class="col-sm">
    	  	  						 <div class="form-group">
    	  								 <label for="first-name" class="col-form-label">Nombre:</label>
    	  	  							 <input type="text" disabled class="form-control" id="first-name" value="<?php echo $nombre;?>">
    	  	  						 </div>
								</div><!-- close .col -->
								
							</div><!-- close .row -->
                            <div class="row">
                                <div class="col-sm">
    	  	  						 <div class="form-group">
    	  								 <label for="last-name" class="col-form-label">Carrera:</label>
    	  	  							 <input type="text" disabled class="form-control" id="last-name" value="<?php echo $carrera;?>">
    	  	  						 </div>
								</div><!-- close .col -->
                                <div class="col-sm">
    	  	  						 <div class="form-group">
    	  								 <label for="grade-name" class="col-form-label">Grado:</label>
    	  	  							 <input type="text" disabled class="form-control" id="grade-name" value="<?php echo $grado;?>">
    	  	  						 </div>
								</div><!-- close .col -->
                                <div class="col-sm">
    	  	  						 <div class="form-group">
    	  								 <label for="group-name" class="col-form-label">Grupo:</label>
    	  	  							 <input type="text" disabled class="form-control" id="group-name" value="<?php echo $grupo;?>">
    	  	  						 </div>
								</div><!-- close .col -->
                            </div>
							<hr>
						
							<h5>Informacion de la Cuenta</h5>
							<p class="small-paragraph-spacing">Puedes cambiar tu direccion de correo electronico y telefono aquí.</p>
							
							<div class="row">
								<div class="col-sm">
	   	  						 <div class="form-group">
	   								 <label for="e-mail" class="col-form-label">Correo Electrónico</label>
	   	  							 <input type="text" disabled class="form-control" id="e-mail" value="<?php echo $correo;?>">
	   	  						 </div>
                                      
								</div><!-- close .col -->
								<div class="col-sm">
	   	  						 <div class="form-group">
	   								 <label for="telefono" class="col-form-label">Telefono</label>
	   	  							 <input type="text" disabled class="form-control" id="telefono" value="<?php echo $telefono;?>">
	   	  						 </div>
                                      
								</div>
								
							</div><!-- close .row -->
							
							<hr>
							<h5>Cambiar Contraseña</h5>
							<p class="small-paragraph-spacing">Puedes cambiar la contraseña que utilizas para tu cuenta aquí.</p>
							<div class="row">
								<div class="col-sm">
	   	  						 <div class="form-group">
	   								 <label for="password" class="col-form-label">Contraseña Actual:</label>
	   	  							 <input type="password" disabled class="form-control" id="password" value="<?php echo $pass;?>" placeholder="Contraseña actual">
	   	  						 </div>
								</div><!-- close .col -->
								<div class="col-sm">
	   	  						 <div class="form-group">
	   								 <label for="new-password" class="col-form-label">Nueva Contraseña:</label>
	   	  							 <input type="password" class="form-control" id="new-password" placeholder="Minimo 4 caracteres">
	   	  						 </div>
								</div><!-- close .col -->
								<div class="col-sm">
	   	  						 <div class="form-group">
	   								 <div><label for="confirm-password" class="col-form-label">&nbsp; &nbsp;</label></div>
	   	  							 <input type="password" class="form-control" id="confirm-password" placeholder="Confirmar Contraseña">
	   	  						 </div>
								</div><!-- close .col -->
							</div><!-- close .row -->
							<hr>
							<p><a href="#" class="btn btn-green-pro" id="btn_guardar_cambios">Guardar Cambios</a></p>
							<br>
							</form>
						
						</div><!-- close .col -->

                    </div>
                </div>
</main>
<?php
include('../../inc/pie.php');
?>

<script>
    $('#btn_guardar_cambios').on('click', function (event) {
        event.preventDefault();
        var pass = $('#new-password').val();
        var rep_pass = $('#confirm-password').val();
        if(pass == rep_pass){
            $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/inc/actualiza_contra.php',
            data: {'nueva': pass},
            success: function(data){
                Swal.fire({
                    type: 'success',
                    title: data,
                    showConfirmButton: false,
                    timer: 1500
                })

                $('#new-password').val('');
                $('#confirm-password').val('');
            }
        });
        }
        else{
            Swal.fire({
                    type: 'error',
                    title: 'Las contraseñas deben coincidir',
                    showConfirmButton: false,
                    timer: 1500
                })
        }
       

    });
</script>
