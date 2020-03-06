<?php
include('../../inc/cabecera_admin.php');

session_start();
if (!isset($_SESSION['cuenta']) || $_SESSION['cuenta'] != "administrador") {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/administrador/login.php"</script>';
  }

  //hacemos la consulta a la base de datos
$cuenta = $_SESSION['cuenta'];
$query_act = "SELECT DISTINCT(id_actividad), carrera, Alumnos.cuenta, nombre, url_doc, nombre_doc, nombre_actividad, creditos_computables, Registros.id_registro, Registros.estado FROM `Registros` 
inner JOIN Documentos on Registros.id_registro = Documentos.registro 
inner join Actividades on Registros.actividad = Actividades.id_actividad
inner join Alumnos on Registros.cuenta = Alumnos.cuenta
inner join Replicas on Replicas.id_registro = Registros.id_registro
WHERE Registros.estado = 'rechazado'";
$estado_act = $connect->prepare($query_act);
$estado_act->execute();
$total_actividades = $estado_act->rowCount();

?>
<main id="col-main">
			<div class="dashboard-container"><br>
            <h4 class="heading-extra-margin-bottom">Replicas de Actividades rechazadas</h4>
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
                                    <b>Alumno : </b>['.$row_act['cuenta'].'] <b>'.$row_act['nombre'].'</b>  
                                    </b> ['.$carrera.']<br>
                                    <b>Archivo: </b> <a target="_blank" href="http://facite.uas.edu.mx/alumnos/'.substr($row_act['url_doc'], 3).'" >'.$row_act['nombre_doc'].'</a> 
                                    <br>
                                    <b>Actividad:</b> '.$row_act['nombre_actividad'].' 
                                    <b>[Créditos:</b> '.$row_act['creditos_computables'].']
                                    <br>
                                    <br><button class="btn btn-warning btn-sm" id="btn_replica" onclick="getreplicas('.$row_act['id_registro'].')">Replica</button>
                                    <img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/document-05-128.png" width="100px" style="position:absolute; right:0; top:0;"/>
                                    </li>
                                    ';

                                }
                            }
                            else
                            {
                                echo '<center><img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/document-09-256.png"/>
                                    <h5 class="text-primary">No se encontraron actividades para replica</h5>
                                </center>';
                            }
                                
                        ?>
                    </ul>
                    </div>

                 </div><!-- close .row -->
						
			</div><!-- close .dashboard-container -->
		</main>

        <!-- Modal Replicas-->
      <div id="modal_replicas" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary" >
            <i class="material-icons text-white" style="font-size:30px;">announcement</i><h5 class="modal-title text-white">  Replicas</h5>
                                           
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">
            <div class="col-md-12" id="ReplicasBody" style="margin-left:15px;"></div>
              <div class="col-md-12" >
                <form id="form_replicas">  
                    <div class="form-group">
                        <textarea rows="3" style="font-size:20px;" class="form-control" id="mensaje_replica" name="mensaje_replica"  placeholder="Ingrese los motivos por los que debe reconsiderarse la evidencia presentada"></textarea>                 
                    </div>    
                    <div class="form-group">
                        <button type="button" class="btn btn-green-pro" id="btn_enviar_replica">Enviar</button>                 
                    </div>                 
                </form>                      
              </div>
              
            </div>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->   

<?php
include('../../inc/pie.php');
?>

<script>
    $('#btn_enviar_replica').on('click', function (event) {
        var id_reg = $('#replica_id').val();
        var msg_rep = $('#mensaje_replica').val();
        $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/inc/guardar_replica.php',
            data: {'id_reg': id_reg, 'msg_rep': msg_rep},
            success: function(data){
                //$('#list_replicas').load(location.href + ' #list_replicas>*', "");
                $('#mensaje_replica').val('');
                $('#modal_replicas').modal('hide'); 
                Swal.fire({
                    type: 'success',
                    title: 'Replica Enviada',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

    });

    function getreplicas(id){
        $.ajax({
            type: 'GET',
            url: 'http://facite.uas.edu.mx/alumnos/inc/get_replicas.php?id='+id,
            success: function(data){
            $("#ReplicasBody").html(data);
            $('#modal_replicas').modal('show'); 
            $("#mensaje_replica").focus();
            }
        });
    }

</script>