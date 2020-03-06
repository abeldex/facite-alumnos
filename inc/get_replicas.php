<?php
include('../inc/conexion.php');
$id = $_GET['id'];
$rep = '';
$act = '';
$query_rep = "SELECT rep.usuario, rep.mensaje, reg.nombre_act, rep.fecha FROM Replicas rep
inner join Registros reg on rep.id_registro = reg.id_registro
where rep.id_registro = ".$id;
$estado_rep = $connect->prepare($query_rep);
$estado_rep->execute();
$total_repividades = $estado_rep->rowCount();

            if($total_repividades > 0)
            {
                $res_rep = $estado_rep->fetchAll();
                foreach ($res_rep as $row_rep)
                {
                    $act = $row_rep['nombre_act'];
                    $pos = "left";
                    if($row_rep['usuario'] == 'administrador'){
                        $pos = "right";
                    }

                    $rep = $rep .'
                    <ul class="list-group" id="list_replicas">
                        <li class="list-group-item" style="text-align:'.$pos.';">
                            <small>'. date('d M Y | H:s A', strtotime($row_rep['fecha'])).'</small> <b>['.$row_rep['usuario'].']</b>
                            <br>
                            <p>'.$row_rep['mensaje'].'</p>
                        </li>    
                    </ul>
                    ';
                }
            }
            else
            {
                $rep .= '
                        <ul class="list-group" id="list_replicas"><li class="list-group-item ">No hay Replicas registradas</li></ul>
                    ';
            }
echo '<h5>Replicas de la Evidencia: '.$act.'</h5>';
echo '<input type="hidden" id="replica_id" value="'.$id.'"/>';          
echo $rep;

?>