<?php
include('../inc/conexion.php');
$id = $_POST['id'];
$acts1 = '';
$query_act = "SELECT * FROM Actividades INNER JOIN TipoActividades on Actividades.categoria = TipoActividades.id_tipo_act WHERE id_tipo_act = ".$id;
$estado_act = $connect->prepare($query_act);
$estado_act->execute();
$total_actividades = $estado_act->rowCount();
            //$acts1 = $acts1 .'<option value="0" >Seleccione una actividad</option>';
            if($total_actividades > 0)
            {

                $res_act = $estado_act->fetchAll();
                foreach ($res_act as $row_act)
                {
                    $acts1 = $acts1 .'<option value="'.$row_act['id_actividad'].'" >'.$row_act['nombre_actividad'].'</option>';
                }
            }
            else
            {
                $acts1 .= '
                        <option>No hay ninguna actividad registrada</option>
                    ';
            }
            echo $acts1;
?>