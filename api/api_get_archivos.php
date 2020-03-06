<?php
    include('../inc/conexion.php');
    $alumno = $_GET['cuenta'];
	$query = "
	SELECT * FROM `Registros` inner JOIN Documentos on Registros.id_registro = Documentos.registro inner join Actividades on Registros.actividad = Actividades.id_actividad WHERE cuenta = :cuenta order by Registros.id_registro desc
    ";
	$statement = $connect->prepare($query);
	$statement->execute(
        array(
        ':cuenta'	    =>	$alumno
    ));

    $count = $statement->rowCount();
 	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$set['FACITE_APP'][]=array('id_registro'=>$row['id_registro'],'actividad'=>$row['nombre_actividad'],'nombre_doc'=>$row['nombre_doc'], 'url_doc'=>'http://facite.uas.edu.mx/alumnos/'.substr($row['url_doc'], 3) , 'descripcion'=>$row['desc_act'], 'estado'=>$row['estado'], 'tipo_doc'=>$row['tipo_doc'], 'observaciones'=>$row['observaciones']);		
		}
			
    }
    //echo $set;
    header( 'Content-Type: application/json; charset=utf-8' );
    $json = json_encode($set);
    echo $json;
?>