<?php
    include('../inc/conexion.php');
	$query = "
	SELECT * FROM VistaActividades 
    ";
	$statement = $connect->prepare($query);
	$statement->execute();
    $count = $statement->rowCount();

	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$set['FACITE_APP'][]=array('id_actividad' => $row['id_actividad'],'categoria'=>$row['nombre_act'],'nombre_actividad'=>$row['nombre_actividad'],'definicion'=>$row['definicion'], 'creditos'=>$row['creditos_computables'], 'creditosmax'=>$row['creditos_maximos'], 'creditosmin'=>$row['minimo_creditos'], 'evidencias'=>$row['evidencias_desc']);		
		}
			
    }
    //echo $set;
    header( 'Content-Type: application/json; charset=utf-8' );
    $json = json_encode($set);
    echo $json;
    /*
	else
	{
		$set['FACITE_APP'][]=array('msg' =>'No existen actividades','success'=>'0');
	}
}

    */
   
     

?>
