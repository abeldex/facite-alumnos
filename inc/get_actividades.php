<?php
include('../inc/conexion.php');
$id = $_GET['id'];
$acts1 = '';
$query_act = "SELECT * FROM Actividades INNER JOIN TipoActividades on Actividades.categoria = TipoActividades.id_tipo_act WHERE id_tipo_act = ".$id;
$estado_act = $connect->prepare($query_act);
$estado_act->execute();
$total_actividades = $estado_act->rowCount();

            if($total_actividades > 0)
            {
                $acts1 .= '<table  id="example" class="table table-striped table-bordered nowrap tablita" style="width:100%" >
                <tbody>
                ';
                $res_act = $estado_act->fetchAll();
                foreach ($res_act as $row_act)
                {
                    $acts1 = $acts1 .'
                    <tr>
                        <td><a onclick="getDetalles('.$row_act['id_actividad'].');" style="font-size:16px; cursor:pointer;"><span class="mdi mdi-information-outline
                        "></span> '.$row_act['nombre_actividad'].'</a></td>                       
                </tr>
                    ';
                }
            }
            else
            {
                $acts1 .= '
                        <tr><td colspan="3">No hay ninguna actividad registrada</td></tr>
                    ';
            }

            $acts1 . +' </tbody></table>';
echo $acts1;

?>