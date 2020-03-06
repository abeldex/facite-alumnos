<?php session_start();
    include('../inc/conexion.php');
    $cuenta = $_SESSION['cuenta'];
    $act = $_GET['id'];

    $query_act = "SELECT sum(creditos_computables) as 'creditos', creditos_maximos FROM Registros re
    inner join Actividades ac on re.actividad = ac.id_actividad
    WHERE cuenta = '".$cuenta."' and actividad = ".$act;
    $estado_act = $connect->prepare($query_act);
    $estado_act->execute();
    $res_act = $estado_act->fetchAll();
    $computados = 0;
    $maximos = 0;
    foreach ($res_act as $row_act)
    {
        $computados = $row_act['creditos'];
        $maximos = $row_act['creditos_maximos'];
    }

    if($computados >= $maximos){
        echo 'no';
    }
    else{
        echo 'ok';
    }
?>