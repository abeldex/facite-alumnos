<?php
    include('../inc/conexion.php');

    $alumno = $_GET['cuenta'];
    //hacemos la consulta de los creditos acumulados
    $query_creditos = "SELECT IFNULL(SUM(creditos_computables),0) as 'creditos' FROM Registros inner JOIN Actividades on Registros.actividad = Actividades.id_actividad WHERE cuenta = :cuenta and estado = 'aprobado'";
    $estado_3 = $connect->prepare($query_creditos);
    $estado_3->execute(
        array(
            ':cuenta'	    =>	$alumno
        )
    );
    $res_cre = $estado_3->fetchAll();
    $tot_cred = 0;
    foreach ($res_cre as $row_cre)
    {
        $tot_cred = $row_cre['creditos'];
    }

    //hacemos las caonsultas para ver los creditos de cada rubro
    $acts1 = '';
    $query_act = "SELECT IFNULL(SUM(creditos_computables),0) as 'historial', t.nombre_act FROM Registros r 
    inner join Actividades a 
    on r.actividad = a.id_actividad
    inner join TipoActividades t
    on a.categoria =  t.id_tipo_act
    WHERE cuenta = '".$alumno."' and estado = 'aprobado' and t.id_tipo_act = 1
    UNION
    SELECT IFNULL(SUM(creditos_computables),0) as 'cult', t.nombre_act FROM Registros r 
    inner join Actividades a 
    on r.actividad = a.id_actividad
    inner join TipoActividades t
    on a.categoria =  t.id_tipo_act
    WHERE cuenta = '".$alumno."' and estado = 'aprobado' and t.id_tipo_act = 2
    UNION
    SELECT IFNULL(SUM(creditos_computables),0) as 'depo', t.nombre_act FROM Registros r 
    inner join Actividades a 
    on r.actividad = a.id_actividad
    inner join TipoActividades t
    on a.categoria =  t.id_tipo_act
    WHERE cuenta = '".$alumno."' and estado = 'aprobado' and t.id_tipo_act = 3";

    $estado_act = $connect->prepare($query_act);
    $estado_act->execute();
    $total_actividades = $estado_act->rowCount();
    $res_act = $estado_act->fetchAll();
    $historial = '';
    foreach ($res_act as $row_act)
    {
        $historial = $historial .'<p>'.$row_act['historial'].' '.$row_act['nombre_act'].'</p>';
    }




    

    $set['FACITE_APP'][]=array('cuenta' => $alumno,'creditos' => $tot_cred, 'historial' => $historial);		
    //echo $set;
    header( 'Content-Type: application/json; charset=utf-8' );
    $json = json_encode($set);
    echo $json;     
?>


