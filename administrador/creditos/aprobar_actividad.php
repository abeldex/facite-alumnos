<?php
//REGISTRO DE NUEVA ACTIVIDAD
//agregamos la referencia hacia la conexion a la base de datos
    include('../../inc/conexion.php');
    //obtenemos los valores del formulario
    $id     =   $_POST['id'];

	    
	//creamos la query para insertar el nuevo registro
	$eliminar_actividad = "
	    UPDATE Registros SET estado = 'aprobado' WHERE id_registro = :id
	";
	//preparamos la consulta par ala ejecucion
	$statement = $connect->prepare($eliminar_actividad);
	//establecemos los parametros de la query por medio de un array y ejecutamos la consulta
	$statement->execute(
		array(
			':id'	    =>	$id
		)
	);
	
	if ($statement->rowCount() > 0)
    {
        echo 'Actividad Aprobada correctamente';
    }
    else
    {
         echo 'Error al Aprobar la Actividad';
    }


?>