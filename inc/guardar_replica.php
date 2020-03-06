<?php session_start();
include "conexion.php";
if(isset($_POST['id_reg']) && isset($_POST['msg_rep']))
{
    //obtenemos los valores del formulario
    $id = $_POST['id_reg'];
    $msg = $_POST['msg_rep'];
    $usuario = $_SESSION['cuenta'];

    $insertar_replica = '
	    INSERT INTO `Replicas` VALUES (null,:id,:usuario,:msg, NOW())
    ';  

    $statement = $connect->prepare($insertar_replica);

    $statement->execute(
        array(
            ':id'	    =>	$id,
            ':usuario'	=>	$usuario,
            ':msg'  	=>	$msg
        )
    );

    if ($statement->rowCount() > 0)
    {
        echo 'Replica enviada correctamente';
    }
    else
    {
         echo 'Error al enviar la Replica';
    }

}
else{
    echo 'post error';
}