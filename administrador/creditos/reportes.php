<?php session_start();
include('../../inc/cabecera_admin.php');
if (!isset($_SESSION['cuenta'])) {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/administrador/login.php"</script>';
  }
$query = "
SELECT r.cuenta, al.nombre, (SELECT IFNULL(sum(a.creditos_computables),0) From Registros r inner join Actividades a on r.actividad = a.id_actividad
WHERE r.estado = 'aprobado' and r.cuenta = al.cuenta) as 'creditos', (SELECT count(id_registro) from Registros WHERE cuenta = r.cuenta) as 'enviados', (SELECT count(id_registro) from Registros WHERE cuenta = r.cuenta and estado='aprobado') as 'aprobados', (SELECT count(id_registro) from Registros WHERE cuenta = r.cuenta and estado='rechazado') as 'rechazados', (SELECT count(id_registro) from Registros WHERE cuenta = r.cuenta and estado='pendiente') as 'pendientes' FROM `Registros` r
inner join Actividades a on r.actividad = a.id_actividad
inner join Alumnos al on r.cuenta = al.cuenta
group by r.cuenta";

$estado = $connect->prepare($query);
$estado->execute();
$total = $estado->rowCount();
?>
<main id="col-main">	
			<div class="dashboard-container"><br>
                <h4 class="heading-extra-margin-bottom">Reporte de Alumnos con Créditos</h4>
                <div class="row">

                <!-- Vinculo actividades -->
                        <div class="col-12" id="tabla">
                                    <table class="table table-striped">
                                        <thead class="bg-primary text-light">
                                            <th>Cuenta</th>
                                            <th >Nombre del Alumno</th>
                                            <th class="text-center">Creditos Acumulados</th>
                                            <th class="text-center">Archivos Enviados</th>
                                            <th class="text-center">Pendientes</th>
                                            <th class="text-center">  Aprobados</th>
                                            <th class="text-center">Rechazados</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($total > 0)
                                            {
                                                $res = $estado->fetchAll();
                                                foreach ($res as $row)
                                                {
                                                    echo '
                                                    <tr>
                                                        <td ><b>'.$row['cuenta'].'</b></td>
                                                        <td ><b>'.$row['nombre'].'</b></td>
                                                        <td class="text-center" style="font-size:20px !important;"><span class="badge badge-primary">'.$row['creditos'].'</span></td>
                                                        <td class="text-center" style="font-size:20px !important;"><span class="badge badge-info">'.$row['enviados'].'</span></td>
                                                        <td class="text-center" style="font-size:20px !important;"><span class="badge badge-secondary">'.$row['pendientes'].'</span></td>
                                                        <td class="text-center" style="font-size:20px !important;"><span class="badge badge-success">'.$row['aprobados'].'</span></td>
                                                        <td class="text-center" style="font-size:20px !important;"><span class="badge badge-danger">'.$row['rechazados'].'</span></td>
                                                </tr>
                                                    ';
                                                }
                                            }
                                            else
                                            {
                                                    echo '
                                                        <tr><td colspan="3">No hay ninguna actividad registrada</td></tr>
                                                    ';
                                            }

                                        ?>
                                        </tbody>
                                    </table>
                        </div><!-- close .col -->
                </div>
            </div><!-- close .dashboard-container -->
</main>
<?php
include('../../inc/pie.php');
?>
