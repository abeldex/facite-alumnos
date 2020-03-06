<?php
include "conexion.php";
if(isset($_POST['act']) && isset($_POST['nom']) && isset($_POST['desc']))
{
//obtenemos los valores del formulario
$actividad = $_POST['act'];
$nom_act = $_POST['nom'];
$desc_act = $_POST['desc'];
//echo $actividad;
//$actividad2 = $_POST['parametro2'];
$alumno = $_SESSION['cuenta'];
//echo $alumno;

// En versiones de PHP anteriores a la 4.1.0, debería utilizarse $HTTP_POST_FILES en lugar
// de $_FILES.

$dir_subida = '../sistema/file-upload/'.$alumno;
if (!is_dir($dir_subida)) {
    mkdir($dir_subida, 0775, true);
}

$fichero_subido = $dir_subida .'/'. basename($_FILES['archivoDesarrolloHidrocalido']['name']);
echo '<pre>';
if (move_uploaded_file($_FILES['archivoDesarrolloHidrocalido']['tmp_name'], $fichero_subido)) {
    //guardamos el registro en la base de datos
    //echo "El fichero es válido y se subió con éxito.\n";
    $insertar_actividad = '
	    INSERT INTO `Registros` VALUES (null,:cuenta,:actividad,"pendiente","Evidencia en revisión",:nom_act, :desc_act)
    ';  
    //preparamos la consulta par ala ejecucion
    $statement = $connect->prepare($insertar_actividad);
    //establecemos los parametros de la query por medio de un array y ejecutamos la consulta
    $statement->execute(
        array(
            ':cuenta'	    =>	$alumno,
            ':actividad'	=>	$actividad,
            ':nom_act'  	=>	$nom_act,
            ':desc_act'	    =>	$desc_act
        )
    );
    //guardar el registro del documento en la bd
    $id_registro = $connect->lastInsertId();
    $insertar_doc = '
	    INSERT INTO `Documentos` VALUES (null,:url,:nombre,:tipo,:reg)
    ';  
    $statement2 = $connect->prepare($insertar_doc);
    $statement2->execute(
        array(
            ':url'	    =>	$fichero_subido,
            ':nombre'	=>	basename($_FILES['archivoDesarrolloHidrocalido']['name']),
            ':tipo'	=>	basename($_FILES['archivoDesarrolloHidrocalido']['type']),
            ':reg'	=>	$id_registro
        )
    );


} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}
echo 'Más información de depuración:';
print_r($_FILES);
print "</pre>";   
}
else
{
    print 'error en los posts';
}
?>