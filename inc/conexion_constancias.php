<?php
//Creamos la conexion a la base de datos
try {
    $connect2 = new PDO('mysql:host=localhost;dbname=eventos_facite', 'facite', 'Facite_2530');
    // Crear una excepcion por cualquier error que ocurra al conectar a la bd
    $connect2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect2->exec("set names utf8");

    //iniciamos una sesion
    session_start();
    date_default_timezone_set('America/Mazatlan');
    setlocale(LC_TIME, 'spanish');
}
catch(PDOException $e){
     echo "Error en la conexion con la base de datos: " . $e->getMessage();
}

?>