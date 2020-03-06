<?php
//REGISTRO DE NUEVA ACTIVIDAD
//agregamos la referencia hacia la conexion a la base de datos
include('../../inc/conexion.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    //obtenemos los valores del formulario
    $nombre     =   ltrim($_POST['nombre_actividad']);
    $creditos  =   $_POST['creditos_actividad'];
    $categoria   =   $_POST['categoria_actividad'];

	    
	//creamos la query para insertar el nuevo registro
	$insertar_actividad = '
	    CALL InsertarActividad(:nombre,:creditos,:categoria)
	';
	//preparamos la consulta par ala ejecucion
	$statement = $connect->prepare($insertar_actividad);
	//establecemos los parametros de la query por medio de un array y ejecutamos la consulta
	$statement->execute(
		array(
			':nombre'	    =>	$nombre,
			':creditos'	    =>	$creditos,
			':categoria'	=>	$categoria
		)
	);
	
	if ($statement->rowCount() > 0)
    {
        echo 'Actividad registrada correctamente';
    }
    else
    {
         echo 'Error al registrar la Actividad';
    }
}


?>