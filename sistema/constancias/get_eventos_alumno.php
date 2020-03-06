<?php
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    include('../../inc/conexion_constancias.php');

    $cuenta = isset($_GET["cuenta"]) ? $_GET["cuenta"] : "";
    //obtener los eventos donde tuvieron entrada y salida los alumnos
    $query = "SELECT * FROM `Registros` inner join eventos on eventos.id = Registros.evento WHERE REPLACE(cuenta, '-', '') like '%$cuenta%'
    AND entrada is not null AND salida is not null";

    $estado = $connect2->prepare($query);
    $estado->execute();
    $total_eventos = $estado->rowCount();
    if($total_eventos > 0)
    {
        $res = $estado->fetchAll();
        foreach ($res as $row)
        {
            //obtenemos la configuracion de las constancias 
            $evento = $row["evento"];
            $query_evento = "SELECT * FROM constancias_conf WHERE evento = $evento";
            $estado_evento = $connect2->prepare($query_evento);
            $estado_evento->execute();
            $res_evento = $estado_evento->fetchAll();
            $texto_c = "";
            $fecha_c = "";
            $titulo = $row["title"];
            $fecha_e = $row["inicio_normal"];
            $total_res = $estado_evento->rowCount();
            $click = "";
            $color = "btn-secondary";
            $icono = '<i class="mdi mdi-block-helper text-white"></i>';
            $desc = "No configurada";
            if($total_res > 0){
                foreach ($res_evento as $row_e)
                {
                    $fecha_c = $row_e["fecha"];
                    $texto_c = $row_e["texto"];
                }
                $click = 'onclick="descargar(\''.$_SESSION['nombre'].'\', '.$evento.');"';
                $color = "btn-success";
                $icono = '<i class="mdi mdi-file-download-outline text-white"></i>';
                $desc = "Descargar";
            }
            

            echo '
                <tr>
                    <td>'.$titulo.'</td>
                    <td>'.$fecha_e.'</td>
                    <td><center><a class="btn '.$color.'" '.$click.' title="'.$desc.'">'.$icono.'</a></center></td>
                </tr>
            ';
        }
    }
    else{
        echo '
        <tr>
            <td colspan="4">No se encontraron eventos a los que asististe!</td>
        </tr>
        ';
    }
?>