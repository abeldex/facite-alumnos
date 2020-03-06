<?php

include('../inc/conexion.php');
if( isset($_GET["cuenta"]) && isset($_GET["password"]))
{
	$query = "
	SELECT * FROM Alumnos 
		WHERE cuenta = :u
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
				'u'	=>	$_GET["cuenta"]
			)
	);
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
				if($row["password"] == $_GET["password"]){
					$set['FACITE_APP'][]=array('cuenta' => $row['cuenta'],'name'=>$row['nombre'],'success'=>'1');
				}
				else
				{
                    $set['FACITE_APP'][]=array('msg' =>'Contrasena incorrecta','success'=>'0');
				}
		}
			
	}
	else
	{
		$set['FACITE_APP'][]=array('msg' =>'La cuenta no existe','success'=>'0');
	}
}
else
    $set['FACITE_APP'][]=array('msg' =>'No post','success'=>'0');


    header( 'Content-Type: application/json; charset=utf-8' );
    $json = json_encode($set);

    echo $json;
    exit;
     

?>
