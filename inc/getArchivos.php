<?php
    include "conexion.php";
    //hacemos la consulta a la base de datos
    $cuenta = $_SESSION['cuenta'];
	$query_act = "SELECT * FROM `Registros` inner JOIN Documentos on Registros.id_registro = Documentos.registro inner join Actividades on Registros.actividad = Actividades.id_actividad WHERE cuenta = :cuenta order by Registros.id_registro desc";
	$estado_act = $connect->prepare($query_act);
	$estado_act->execute(
        array(
            ':cuenta'	    =>	$cuenta
        )
    );
    $total_actividades = $estado_act->rowCount();

    if($total_actividades > 0)
										{
                                            $archivos = '<ul class="list-group">';

											$res_act = $estado_act->fetchAll();
											foreach ($res_act as $row_act)
											{
                                                $color = "secondary";
                                                $msg = "";
                                                if($row_act['estado'] == 'aprobado'){
                                                    $color = "primary";
                                                }
                                                    
                                                if($row_act['estado'] == 'rechazado'){
                                                    $color = "danger";
                                                    $msg = 'Observaciones: '.$row_act['observaciones'];
                                                    $msg .= '<br><button class="btn btn-warning btn-sm" id="btn_replica" onclick="getreplicas('.$row_act['id_registro'].')">Replica</button>';
                                                }
                                                    
                                                

                                                $archivos .='<li class="list-group-item">
                                                                Archivo: <a target="_blank" href="http://facite.uas.edu.mx/alumnos/'.substr($row_act['url_doc'], 3).'" >'.$row_act['nombre_doc'].'</a> 
                                                                <br>
                                                                Actividad: '.$row_act['nombre_actividad'].'
                                                                <br>
                                                                Estado: <span class="badge badge-'.$color.'">'.$row_act['estado'].'</span> 
                                                                <br>'.$msg.'
                                                                </li>';
                                            }

                                            echo $archivos.'</ul>';
                                        }

	/*$directorio = '../sistema/file-upload/'.$_SESSION['cuenta'];
	$gestor_dir = opendir($directorio);
	$archivos = '<ul class="list-group">';
	while (false !== ($nombre_fichero = readdir($gestor_dir))) {
	    $ficheros[] = $nombre_fichero;
	    $rutaArchivo = '../sistema/file-upload/'.$_SESSION['cuenta'].'/'.$nombre_fichero;
        if($nombre_fichero == '.' || $nombre_fichero == '..')
        {
            $archivos .='';
        }
        else
        {
            $archivos .='<li class="list-group-item">Archivo: <a target="_blank" href="'.$rutaArchivo.'" >'.$nombre_fichero.'</a></li>';
        }
            

	}
echo $archivos.'</ul>';*/
?>