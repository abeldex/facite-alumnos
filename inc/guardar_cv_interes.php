<?php session_start();
include "conexion.php";
 //obtenemos los valores del formulario
 $usuario       =  $_SESSION['cuenta'];
 $interes          =  $_POST['txt_interes'];

 $query = "INSERT INTO cv_intereses VALUES (null, :interes, :cuenta)";

 try{
    $statement = $connect->prepare($query);

    $statement->execute(
        array(
            ':interes'	    =>	$interes,
            ':cuenta'	=>	$usuario
        )
    );

    if ($statement->rowCount() > 0)
    {
        echo 'Interes añadido correctamente';
    }
    else
    {
        echo 'Error al guardar el interes';
    }
}catch(PDOException $e){
    echo $e;
}

?>