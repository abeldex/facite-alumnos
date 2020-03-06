<?php session_start();
include('conexion.php');
$cuenta = $_SESSION['cuenta'];
$nueva = $_POST['nueva'];

$query = "UPDATE Alumnos SET password = :pas WHERE cuenta = :cu";
$estado = $connect->prepare($query);
$estado->execute(
    array(
        ":pas"   => $nueva,
        ":cu"    => $cuenta
    )
);

if ($estado->rowCount() > 0)
    {
        echo 'Contraseña actualizada correctamente';
    }
    else
    {
         echo 'Error al actualizar la contraseña';
    }

?>