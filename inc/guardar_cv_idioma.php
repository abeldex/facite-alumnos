<?php session_start();
include "conexion.php";
 //obtenemos los valores del formulario
 $usuario       =  $_SESSION['cuenta'];
 $idioma        =  $_POST['txt_idioma'];
 $nivel         =  $_POST['txt_idioma_nivel'];

 $query = "INSERT INTO cv_idiomas VALUES (null, :idioma, :niv, :cuenta)";

 try{
    $statement = $connect->prepare($query);

    $statement->execute(
        array(
            ':idioma'	=>	$idioma,
            ':niv'	    =>	$nivel,
            ':cuenta'	=>	$usuario
        )
    );

    if ($statement->rowCount() > 0)
    {
        echo 'Idioma añadido correctamente';
    }
    else
    {
        echo 'Error al guardar el idioma';
    }
}catch(PDOException $e){
    echo $e;
}

?>