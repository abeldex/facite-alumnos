<?php session_start();
include "conexion.php";
    //obtenemos los valores del formulario
    $usuario    = $_SESSION['cuenta'];
    $nom        = $_POST['txt_nombre'];
    $ap         = $_POST['txt_appelidos'];
    $dir        = $_POST['txt_direccion'];
    $cp         = $_POST['txt_cp'];
    $ciu        = $_POST['txt_ciudad'];
    $tel        = $_POST['txt_telefono'];
    $corr       = $_POST['txt_correo'];
    $fna        = $_POST['txt_fecha_nac'];
    $lna        = $_POST['txt_lugar_nac'];
    $edo        = $_POST['txt_estado'];
    $perfil     = $_POST['txt_descripcion'];
    $foto = "";

    try{
    //verificar si ya tenia datos guardados
     //hacemos la consulta a la base de datos
     $query = "SELECT * FROM cv_datos WHERE cuenta ='".$usuario."'";
     $estado = $connect->prepare($query);
     $estado->execute();
     $total = $estado->rowCount();
     if ($total > 0) { 
        $insertar_datos = "UPDATE cv_datos SET nombre = :nom, apellidos = :ap, fecha_nac = :fna, direccion = :dir, telefono = :tel, correo = :corr, cod_postal = :cp, ciudad = :ciu, lugar_nacimiento = :lna, estado_civil = :edo, perfil = :per, foto = :foto WHERE cuenta = :cuenta";  
        //echo $insertar_datos;
     }
     else{
        $insertar_datos = '  
        INSERT INTO cv_datos VALUES (null,:nom, :ap, :fna, :dir, :tel, :corr, :cuenta, :foto, :cp, :ciu, :lna, :edo, :per)
        ';  
     }

     $statement = $connect->prepare($insertar_datos);

     $statement->execute(
         array(
             ':nom'	    =>	$nom,
             ':ap'	    =>	$ap,
             ':fna'	    =>	$fna,
             ':dir'	    =>	$dir,
             ':tel'	    =>	$tel,
             ':corr'	    =>	$corr,
             ':cuenta'	=>	$usuario,
             ':foto'	    =>	$foto,
             ':cp'	    =>	$cp,
             ':ciu'	    =>	$ciu,
             ':lna'	    =>	$lna,
             ':edo'	    =>	$edo,
             ':per'	    =>	$perfil
         )
     );

     if ($statement->rowCount() > 0)
     {
         echo 'Datos Personales guardados correctamente';
     }
     else
     {
         echo 'Error al guardar los datos personales';
     }

    }catch(PDOException $e){
        echo $e;
    }
    

    
?>