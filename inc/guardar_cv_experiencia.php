
<?php session_start();
include "conexion.php";
 //obtenemos los valores del formulario
 $usuario       =  $_SESSION['cuenta'];
 $cargo         =  $_POST['txt_exp_cargo'];
 $empresa       =  $_POST['txt_exp_empresa'];
 $localidad     =  $_POST['txt_exp_localidad'];
 $desde_mes     =  $_POST['txt_exp_desde_mes'];
 $desde_anio    =  $_POST['txt_exp_desde_anio'];
 $hasta_mes     =  $_POST['txt_exp_hasta_mes'];
 $hasta_anio    =  $_POST['txt_exp_hasta_anio'];
 $descripcion   =  $_POST['txt_exp_desc'];
 
 $query = "INSERT INTO cv_experiencia VALUES (null, :car, :emp, :loc, :dm, :da, :hm, :ha, :cuenta, :de)";

 try{
    $statement = $connect->prepare($query);

    $statement->execute(
        array(
            ':car'	    =>	$cargo,
            ':emp'	    =>	$empresa,
            ':loc'	    =>	$localidad,
            ':dm'	    =>	$desde_mes,
            ':da'	    =>	$desde_anio,
            ':hm'	    =>	$hasta_mes,
            ':ha'	    =>	$hasta_anio,
            ':cuenta'	=>	$usuario,
            ':de'	=>	$descripcion
        )
    );

    if ($statement->rowCount() > 0)
    {
        echo 'Experiencia añadida correctamente';
    }
    else
    {
        echo 'Error al guardar la experiencia';
    }
}catch(PDOException $e){
    echo $e;
}

?>