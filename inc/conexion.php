<?php
error_reporting(0);
	ini_set('display_errors', 0);
//Creamos la conexion a la base de datos
    try {
        $connect = new PDO('mysql:host=localhost;dbname=alumnos_db', 'facite', 'Facite_2530');
        // Crear una excepcion por cualquier error que ocurra al conectar a la bd
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$connect->exec("set names utf8");

        //iniciamos una sesion
        session_start();
        date_default_timezone_set('America/Mazatlan');
        setlocale(LC_TIME, 'spanish');
    }
    catch(PDOException $e){
         echo "Error en la conexion con la base de datos: " . $e->getMessage();
    }
    
?>