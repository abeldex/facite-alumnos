<?php session_start();
include('../inc/conexion.php');
$cuenta = $_SESSION['cuenta'];
$acts1 = '';
$query_act = "SELECT IFNULL(SUM(creditos_computables),0) as 'historial', t.nombre_act FROM Registros r 
inner join Actividades a 
on r.actividad = a.id_actividad
inner join TipoActividades t
on a.categoria =  t.id_tipo_act
WHERE cuenta = '".$cuenta."' and estado = 'aprobado' and t.id_tipo_act = 1
UNION
SELECT IFNULL(SUM(creditos_computables),0) as 'cult', t.nombre_act FROM Registros r 
inner join Actividades a 
on r.actividad = a.id_actividad
inner join TipoActividades t
on a.categoria =  t.id_tipo_act
WHERE cuenta = '".$cuenta."' and estado = 'aprobado' and t.id_tipo_act = 2
UNION
SELECT IFNULL(SUM(creditos_computables),0) as 'depo', t.nombre_act FROM Registros r 
inner join Actividades a 
on r.actividad = a.id_actividad
inner join TipoActividades t
on a.categoria =  t.id_tipo_act
WHERE cuenta = '".$cuenta."' and estado = 'aprobado' and t.id_tipo_act = 3";

$estado_act = $connect->prepare($query_act);
$estado_act->execute();
$total_actividades = $estado_act->rowCount();
            //$acts1 = $acts1 .'<option value="0" >Seleccione una actividad</option>';
            if($total_actividades > 0)
            {

                $res_act = $estado_act->fetchAll();
                foreach ($res_act as $row_act)
                {
                    $acts1 = $acts1 .'<span class="badge-pill badge-primary" style="font-size:15px;">'.$row_act['historial'].' '.$row_act['nombre_act'].'</span><br> ';
                }
            }
            else
            {
                $acts1 .= '';
            }
            echo $acts1;
?>