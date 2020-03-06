<?php session_start();
include "conexion.php";
 //obtenemos los valores del formulario
 $usuario       =  $_SESSION['cuenta'];
 $tabla         =  $_POST['txt_tabla'];
 $id            =  $_POST['txt_id'];
 $tablaid = "";

if($tabla == 'cv_formacion'){
    $tablaid = "id_formacion";
} elseif($tabla == 'cv_experiencia'){
    $tablaid = "id_experiencia";
} elseif($tabla == 'cv_habilidades'){
    $tablaid = "id_habilidad";
} elseif($tabla == 'cv_intereses'){
    $tablaid = "id_intereses";
} elseif($tabla == 'cv_idiomas'){
    $tablaid = "id_idiomas";
} 

 
 $query = "DELETE FROM ".$tabla." WHERE cuenta = '".$usuario."' and ".$tablaid." = ".$id;

 //echo $query;

 try{
    $statement = $connect->prepare($query);

    $statement->execute();

    if ($statement->rowCount() > 0)
    {
        echo 'Eliminado correctamente';
    }
    else
    {
        echo 'Error al eliminar';
    }
}catch(PDOException $e){
    echo $e;
}

?>