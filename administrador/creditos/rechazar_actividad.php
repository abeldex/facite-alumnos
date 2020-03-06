<?php
//REGISTRO DE NUEVA ACTIVIDAD
//agregamos la referencia hacia la conexion a la base de datos
    include('../../inc/conexion.php');
    //obtenemos los valores del formulario
    $id     =   $_POST['id'];
    $obs     =   $_POST['obs'];
	    
	//creamos la query para insertar el nuevo registro
	$eliminar_actividad = "
	    UPDATE Registros SET estado = 'rechazado', observaciones = :obs WHERE id_registro = :id
	";
	//preparamos la consulta par ala ejecucion
	$statement = $connect->prepare($eliminar_actividad);
	//establecemos los parametros de la query por medio de un array y ejecutamos la consulta
	$statement->execute(
		array(
            ':id'	    =>	$id,
            ':obs'	    =>	$obs
		)
	);
	
	if ($statement->rowCount() > 0)
    {
        echo 'Actividad Rechazada';
    }
    else
    {
         echo 'Error al Rechazar la Actividad';
    }


?>