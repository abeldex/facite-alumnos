<?php
include('../inc/conexion.php');
$id = $_GET['id'];
$acts1 = '';
$query_act = "SELECT * FROM Actividades WHERE id_actividad = ".$id;
$estado_act = $connect->prepare($query_act);
$estado_act->execute();
$total_actividades = $estado_act->rowCount();

            if($total_actividades > 0)
            {
                $res_act = $estado_act->fetchAll();
                foreach ($res_act as $row_act)
                {
                    $acts1 = $acts1 .'
                    <ul class="list-group">
                        <li class="list-group-item "><b>Actividad: </b>:<br>'.$row_act['nombre_actividad'].'</td>
                        <li class="list-group-item"><b>Definición</b>:<br>'.$row_act['definicion'].'</td>
                        <li class="list-group-item" style="font-size:20px;"><b>Créditos Computables:</b>  '.$row_act['creditos_computables'].' crédito(s) por evento</td>
                        <li class="list-group-item" style="font-size:20px;"><b>Créditos Máximos: </b> '.$row_act['creditos_maximos'].' créditos</td>
                        <li class="list-group-item"><b>Evidencias válidas: </b>:'.$row_act['evidencias_desc'].'</td>                        
                    </ul>
                    ';
                }
            }
            else
            {
                $acts1 .= '
                        <ul><li>No hay descripcion de la actividad</li></ul>
                    ';
            }
echo $acts1;

?>