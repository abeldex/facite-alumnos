<?php session_start();
include "conexion.php";
 //obtenemos los valores del formulario
 $usuario       =  $_SESSION['cuenta'];
 $formacion     =  $_POST['txt_fa_formacion'];
 $intitucion    =  $_POST['txt_fa_institucion'];
 $localidad     =  $_POST['txt_fa_localidad'];
 $desde_mes     =  $_POST['txt_fa_desde_mes'];
 $desde_anio    =  $_POST['txt_fa_desde_anio'];
 $hasta_mes     =  $_POST['txt_fa_hasta_mes'];
 $hasta_anio    =  $_POST['txt_fa_hasta_anio'];

 $query = "INSERT INTO cv_formacion VALUES (null, :form, :ins, :loc, :dm, :da, :hm, :ha, :cuenta)";

 try{
    $statement = $connect->prepare($query);

    $statement->execute(
        array(
            ':form'	    =>	$formacion,
            ':ins'	    =>	$intitucion,
            ':loc'	    =>	$localidad,
            ':dm'	    =>	$desde_mes,
            ':da'	    =>	$desde_anio,
            ':hm'	    =>	$hasta_mes,
            ':ha'	    =>	$hasta_anio,
            ':cuenta'	=>	$usuario
        )
    );

    if ($statement->rowCount() > 0)
    {
        echo 'Formación académica añadida correctamente';
    }
    else
    {
        echo 'Error al guardar la formación academica';
    }
}catch(PDOException $e){
    echo $e;
}

?>