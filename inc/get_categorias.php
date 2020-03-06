<?php
include('../inc/conexion.php');
$cat = '';
$query_act = "SELECT * FROM TipoActividades";
$estado_act = $connect->prepare($query_act);
$estado_act->execute();
$total_actividades = $estado_act->rowCount();
            $cat = $cat .'<option value="0" >Seleccione una Categoría</option>';    
            if($total_actividades > 0)
            {
                $res_act = $estado_act->fetchAll();
                foreach ($res_act as $row_act)
                {
                    $cat = $cat .'<option value="'.$row_act['id_tipo_act'].'" >'.$row_act['nombre_act'].'</option>';
                }
            }
            else
            {
                $cat .= '
                        <option>No hay ninguna categoria registrada</option>
                    ';
            }
            echo $cat;
?>