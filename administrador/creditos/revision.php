<?php session_start();
include('../../inc/cabecera_admin.php');
if (!isset($_SESSION['cuenta'])) {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/administrador/login.php"</script>';
  }
//hacemos la consulta a la base de datos
$cuenta = $_SESSION['cuenta'];
$query_act = "SELECT * FROM `Registros` 
inner JOIN Documentos on Registros.id_registro = Documentos.registro 
inner join Actividades on Registros.actividad = Actividades.id_actividad
inner join Alumnos on Registros.cuenta = Alumnos.cuenta
WHERE Registros.estado = 'pendiente'";
$estado_act = $connect->prepare($query_act);
$estado_act->execute();
$total_actividades = $estado_act->rowCount();

?>
<main id="col-main">	
            <div style="float:right; position:relative;"><img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/document-03-128.png"></div>
			<div class="dashboard-container"><br>
                <h4 class="heading-extra-margin-bottom">Revisión de Actividades</h4>
                <div class="row">
                    <div class="col-12" id="tabla">
                    <ul class="list-group">
                        <?php
                            if($total_actividades > 0)
                            {
                                $res_act = $estado_act->fetchAll();
                                foreach ($res_act as $row_act)
								{
                                    $color = "danger";
                                    $carrera = "Tronco Común";
                                    if($row_act['carrera'] == '1')
                                        $carrera = "Licenciatura en Ingeniería Geodesica";
                                    if($row_act['carrera'] == '2')
                                        $carrera = "Licenciatura en Ingeniería Geomática";
                                    if($row_act['carrera'] == '3')
                                        $carrera = "Licenciatura en Astronomía";
                                    echo '
                                    <li class="list-group-item">
                                    <b>Alumno : </b>['.$row_act['cuenta'].'] '.$row_act['nombre'].'<br>
                                    <b>Programa de Estudios : </b>'.$carrera.'<br>
                                    <b>Archivo: </b> <a target="_blank" href="http://facite.uas.edu.mx/alumnos/'.substr($row_act['url_doc'], 3).'" >'.$row_act['nombre_doc'].'</a> 
                                    <br>
                                    <b>Actividad:</b> '.$row_act['nombre_actividad'].'
                                    <br>
                                    <b>Créditos:</b> '.$row_act['creditos_computables'].'
                                    <br>
                                    <button type="button" class="btn btn-green-pro aprobar" id="'.$row_act['id_registro'].'">Aprobar</button>
                                    <button type="button" class="btn btn-danger rechazar" id="'.$row_act['id_registro'].'">Rechazar</button>
                                    <img src="https://cdn1.iconfinder.com/data/icons/office-icons-17/512/ilustracoes_04-14-512.png" width="100px" style="position:absolute; right:0; top:0;"/>
                                    </li>
                                    ';

                                }
                            }
                            else
                            {
                                echo '<center><img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/document-09-256.png"/>
                                    <h5 class="text-primary">No se encontraron actividades para revisión</h5>
                                </center>';
                            }
                                
                        ?>
                    </ul>
                    </div>
                </div><!-- close .row -->
						
			</div><!-- close .dashboard-container -->
</main>


<?php
include('../../inc/pie.php');
?>

<script>
    $(document).on("click", ".aprobar", function() {
        var postForm = { 
            'id'     : this.id 
        };

        Swal.fire({
        title: '¿Aprobar la Actividad?',
        text: "Una vez aprobada se acumulará en los créditos del alumno!",
        type: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Aprobar!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.value) {
            $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/administrador/creditos/aprobar_actividad.php',
            data: postForm, 
            success: function(data){
                Swal.fire({
                type: 'success',
                title: data,
                showConfirmButton: false,
                timer: 1500
                })
                $('#tabla').load(location.href + ' #tabla>*', "");
            }

        });
        }
        })
    });

    $(document).on("click", ".rechazar", function() {

        Swal.fire({
        title: '¿Rechazar la Actividad?',
        input: 'text',
        text: "Por favor ingrese el motivo por el cual esta rechazando la actividad",
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Rechazar!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.value) {
                //alert(result.value);
                var postForm = { 
                    'id'    : this.id, 
                    'obs'   : result.value
                };

                $.ajax({
                type: 'POST',
                url: 'http://facite.uas.edu.mx/alumnos/administrador/creditos/rechazar_actividad.php',
                data: postForm, 
                success: function(data){
                    Swal.fire({
                    type: 'success',
                    title: data,
                    showConfirmButton: false,
                    timer: 1500
                    })
                    $('#tabla').load(location.href + ' #tabla>*', "");
                }
        });
        }
        })
    });

    async function GetObservaciones() {
        const {value: text} = await Swal.fire({
            input: 'textarea',
            inputPlaceholder: 'Motivo por el cual fue rechazada la actividad...',
            showCancelButton: true
            })    

            if (text) {
                return text;
            }
    }
</script>
