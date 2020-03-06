<?php
//REGISTRO DE NUEVA ACTIVIDAD
//agregamos la referencia hacia la conexion a la base de datos
include('../../inc/conexion.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    //obtenemos los valores del formulario
    $cuenta     =   $_POST['cuenta_alumno'];
    $nombre     =   $_POST['nombre_alumno'];
    $correo     =   $_POST['correo_alumno'];
    $telefono   =   $_POST['telefono_alumno'];
    $contra     =   "12345";
    $estado     =   "activo";
    $carrera    =   $_POST['carrera_alumno'];
    $grado      =   $_POST['grado_alumno'];
    $grupo      =   $_POST['grupo_alumno'];
    $cohorte    =   $_POST['cohorte_alumno'];
	    
	//creamos la query para insertar el nuevo registro
    $query = "INSERT INTO Alumnos VALUES (:cuenta, :nombre, :correo, :telefono, :contra, :estado, :carrera, :grado, :grupo, :cohorte)";

	//preparamos la consulta par ala ejecucion
	$statement = $connect->prepare($query);
	//establecemos los parametros de la query por medio de un array y ejecutamos la consulta
	$statement->execute(
		array(
			':cuenta'	    =>	$cuenta,
            ':nombre'	    =>	$nombre,
            ':correo'	    =>	$correo,
            ':telefono'	    =>	$telefono,
            ':contra'	    =>	$contra,
            ':estado'	    =>	$estado,
            ':carrera'	    =>	$carrera,
            ':grado'	    =>	$grado,
            ':grupo'	    =>	$grupo,
			':cohorte'	    =>	$cohorte
		)
	);
	
	if ($statement->rowCount() > 0)
    {
        echo 'Alumno registrado correctamente';
    }
    else
    {
         echo 'Error al registrar el Alumno';
    }
}


?>