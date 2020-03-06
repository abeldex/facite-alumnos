<?php session_start();
include "conexion.php";
 //obtenemos los valores del formulario
 $usuario       =  $_SESSION['cuenta'];
 $habilidad     =  $_POST['txt_habilidad'];
 $nivel         =  $_POST['txt_habilidad_nivel'];

 $query = "INSERT INTO cv_habilidades VALUES (null, :hab, :niv, :cuenta)";

 try{
    $statement = $connect->prepare($query);

    $statement->execute(
        array(
            ':hab'	    =>	$habilidad,
            ':niv'	    =>	$nivel,
            ':cuenta'	=>	$usuario
        )
    );

    if ($statement->rowCount() > 0)
    {
        echo 'Habilidad añadida correctamente';
    }
    else
    {
        echo 'Error al guardar la habilidad';
    }
}catch(PDOException $e){
    echo $e;
}

?>