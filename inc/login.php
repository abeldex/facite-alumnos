<?php

include('../inc/conexion.php');
if(isset($_POST["username"]) && isset($_POST["password"]))
{
	$query = "
	SELECT * FROM Alumnos 
		WHERE cuenta = :u
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
				'u'	=>	$_POST["username"]
			)
	);
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
		
				//if($row["password"] == $_POST["password"])
				//echo "<script>alert('".$row["usuario_usuario"]."')</script>";
				//echo "<script>alert('".$row["password_usuario"]."')</script>";
				if($row["password"] == $_POST["password"]){
				//if(password_verify($_POST["password"], $row["password"])){
					$_SESSION['cuenta'] = $row['cuenta'];
					$_SESSION['nombre'] = $row['nombre'];
					echo 'exito';
				}
				else
				{
                    echo 'contra';
				}
		}
			
	}
	else
	{
		echo 'cuenta';
	}
}
else
	echo 'no post';
?>