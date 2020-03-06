<?php
include('../inc/cabecera.php');
//verificar si ya inicio sesion
session_start();
if (!isset($_SESSION['cuenta'])) {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/"</script>';
  }

    $alumno = $_SESSION['cuenta'];

    //hacemos la consulta a la base de datos
	$query_act2 = "SELECT * FROM Actividades";
	$estado_act2 = $connect->prepare($query_act2);
	$estado_act2->execute();
    $total_actividades2 = $estado_act2->rowCount();

    //hacemos la consulta de los creditos acumulados
    $query_creditos = "SELECT IFNULL(SUM(creditos_computables),0) as 'creditos' FROM Registros inner JOIN Actividades on Registros.actividad = Actividades.id_actividad WHERE cuenta = :cuenta and estado = 'aprobado'";
    $estado_3 = $connect->prepare($query_creditos);
    $estado_3->execute(
        array(
            ':cuenta'	    =>	$alumno
        )
    );
    $res_cre = $estado_3->fetchAll();
    $tot_cred = 0;
    foreach ($res_cre as $row_cre)
    {
        $tot_cred = $row_cre['creditos'];
    }

    //obtenemos la informacion de los tipos de actividades
    $query_tipo = "SELECT * FROM TipoActividades";
    $estado_tipo = $connect->prepare($query_tipo);
    $estado_tipo->execute();
    $total_tipo = $estado_tipo->rowCount();
?>
	
		<main id="col-main">	
			<div class="dashboard-container">
				<br>
				<div class="row">
                    <div class="col-12" >    
                        <ul class="nav nav-tabs dashboard-sub-menu" id="myTab" role="tablist" style="margin-top:-20px;">
                            <li class="nav-item" style=>
                                <a class="nav-link active" id="inicio-tab" data-toggle="tab" href="#inicio" role="tab" aria-controls="home" aria-selected="true">Actividades de Libre Elección</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="creditos-tab" data-toggle="tab" href="#creditos" role="tab" aria-controls="creditos" aria-selected="false">Historial de Créditos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="enviar-tab" data-toggle="tab" href="#subir" role="tab" aria-controls="contact" aria-selected="false">Enviar Documentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reglamento-tab" data-toggle="tab" href="#reglamento" role="tab" aria-controls="reglamento" aria-selected="false">Reglamento</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="inicio" role="tabpanel" aria-labelledby="inicio-tab">
                           <h4>Listado de Actividades de Libre Elección</h4>
                                <?php
                                        if($total_tipo > 0){
                                            $res_tipo = $estado_tipo->fetchAll();
                                            echo '<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">';
                                            foreach ($res_tipo as $row_tipo){
                                                echo '
                                                
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-'.$row_tipo['id_tipo_act'].'-tab" data-toggle="pill" href="#pills-'.$row_tipo['id_tipo_act'].'" role="tab" aria-controls="pills-'.$row_tipo['id_tipo_act'].'" aria-selected="true"><b>'.$row_tipo['nombre_act'].'</b></a>
                                                </li>
                                    
                                                ';
                                            }		
                                            echo ' </ul>';
                                            echo ' <div class="tab-content" id="pills-tabContent">';
                                            foreach ($res_tipo as $row_tipo){
                                                
                                                echo '
                                                <div class="tab-pane fade " id="pills-'.$row_tipo['id_tipo_act'].'" role="tabpanel" aria-labelledby="pills-'.$row_tipo['id_tipo_act'].'-tab"><p style="text-align:justify;">'.$row_tipo['desc_act'].'</p><h6>EVIDENCIAR '.$row_tipo['minimo_creditos'].' CRÉDITOS OBLIGATORIOS COMO MÍNIMO</h6><BR>';
                                                
                                                echo '<div id="divtabla'.$row_tipo['id_tipo_act'].'">
                                                Contenido de la tabla '.$row_tipo['id_tipo_act'].'</div>';                                       
                                                
                                                
                                                echo '</div>';
                                            }
                                            echo ' </div>';		
                                            
                                        }
                                        else{
                                            echo 'No se encuentran categorias de actividades';
                                        }
                                ?>
            
                            </div>

                            <div class="tab-pane fade" id="creditos" role="tabpanel" aria-labelledby="creditos-tab">
                            <h4>Historial de Créditos Acumulados</h4>
                                <br>
                                <div class="row">
                                    <div class="col-lg-3">
                                    <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated" role="progressbar" style="width: <?php echo ($tot_cred * 100) / 34; ?>%" aria-valuenow="<?php echo $tot_cred; ?>" aria-valuemin="0" aria-valuemax="34"></div>
                                        </div>
                                    <ul id="profile-watched-stats">
                                        <li>
                                        <span style="font-size:120px;">
                                        <?php echo $tot_cred; ?>                                       
                                        </span> Créditos Acumulados de <b>34</b></li>
                                    </ul>
                                    <center><small>Créditos Acumulados por categoría</small></center>
                                    <div id="historial_actividades"></div>
                                    </div>
                                   
                                    <div class="col-lg-9">
                                        
                                        <div id="divMostrarArchivos"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="subir" role="tabpanel" aria-labelledby="enviar-tab">
                                <h4>Enviar Documentos Probatorios</h4>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <h5>Paso 1:</h5>
                                    <p>Seleccionar una actividad, asignar el nombre de la evidencia a presentar y una descripción de la misma .</p>
                                    <select class="form-control form-control-lg" id="cmb_categorias"> 
                                    </select>
                                    <br>
                                        <select class="form-control form-control-lg" id="cmb_actividades">
                                        </select><br>
                                        <div id="div_validacion"></div>
                                        <input type="text" class="form-control" id="txt_nombre_evidencia" placeholder="Nombre para la evidencia" style="font-size:20px;"><br>
                                        <textarea rows="5" style="font-size:20px;" class="form-control" id="txt_desc_evidencia" placeholder="Ingrese la descripcion de su evidencia presentada"></textarea>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                    <h5>Paso 2:</h5>
                                    <p>Seleccionar el archivo que evidencie tu actividad presentada. (Deben ser evidencias válidas como lo muestra la descripción de la actividad). Todas las evidencias concentradas en un solo archivo PDF.</p>
                                    <button class="btn btn-green-pro btn-lg" data-toggle="modal"  data-target="#mdlArchivos" id="btn_subir">Subir Archivos</button>
                                    <br>
                                   <img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/documents-01-128.png" width="150"/>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="reglamento" role="tabpanel" aria-labelledby="reglamento-tab">
                                <div class="row">
                                    <div class="col-lg-12" id="div_reglamento">

                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
				</div><!-- close .row -->
						
			</div><!-- close .dashboard-container -->
		</main>

         <!-- Modal -->
      <div id="mdlArchivos" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Paso 2: Adjuntar Archivos</h5>
                                           
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">
            <div class="alert alert-success" id="modal_titulo" role="alert" style="margin-left:10px; margin-right:10px; display:inline-block;">     
            </div>
              <div class="col-md-12" id="formDropZone"></div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->     
      
      
      <!-- Modal Descripcion de Actividades-->
      <div id="mdlDescripcion" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary" >
            <i class="material-icons text-white" style="font-size:30px;">info</i><h5 class="modal-title text-white">  Descripción de la Actividad</h5>
                                           
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">
              <div class="col-md-12" id="DescBody"></div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-green-pro" data-dismiss="modal">Cerrar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->   

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
include('../inc/pie.php');
?>

<script>

    $(document).ready( function () 
	{
        $('#btn_subir').attr("disabled", "disabled");
        $('#pills-tab a:first').tab('show');
        getArchivos();
        getActividades(1);
        getActividades(2);
        getActividades(3);
        getHistorialCreditos(); 
        $("#div_validacion").html("");

        $.ajax({
            type: "POST",
            url: "../inc/get_categorias.php",
            data: { } 
            }).done(function(data){
            $("#cmb_categorias").html(data);
		});
        
        $("#cmb_categorias").change(function(){
            var categoria = $("#cmb_categorias option:selected").val();
            $.ajax({
                type: "POST",
                url: "../inc/get_actividades_combo.php",
                data: { id : categoria } 
                }).done(function(data){
                $("#cmb_actividades").html(data);
            });
		});

        $obj = $('<object>');
        $obj.attr("data","http://facite.uas.edu.mx/alumnos/docs/reglamento.pdf");
        $obj.attr("type","application/pdf");
        $obj.addClass("w100");

        $("#div_reglamento").append($obj);


    });

    $( "select" ).change(function (){
        validar_campos();
    }).change();
    
    $( "#cmb_actividades" ).change(function (){
        var id_act = $( "#cmb_actividades" ).val();
        ValidarActividad(id_act);
    }).change();
    
    

    $("#txt_desc_evidencia").change(function(){
        validar_campos();
    });

    
    $("#txt_nombre_evidencia").change(function(){
        validar_campos();
    });

    function validar_campos(){
            var nom = $("#txt_nombre_evidencia" ).val();
            var desc = $("#txt_desc_evidencia" ).val();
            var str = "";
            var valid = $("#alert_val").text();
            $( "select option:selected" ).each(function() {
            str += $( this ).text() + " ";
            });
            if(str == 'Seleccione una Actividad' || nom == "" || desc == "" || valid != 'Actividad disponible para evidenciar'){
                $('#btn_subir').attr("disabled", "disabled");    
            }
            else{
                $('#btn_subir').removeAttr("disabled");
            }
    }

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

    $('#mdlArchivos').on('show.bs.modal', function (event) {
        //obtenemos el id del evento seleccionado
        var actividad = $('#cmb_actividades').val();
        var actividadtext = $("#cmb_actividades option:selected" ).text();
        var nom_actividad = $("#txt_nombre_evidencia" ).val();
        var desc_actividad = $("#txt_desc_evidencia" ).val();
        //alert(actividad + " | " + nom_actividad + " | " + desc_actividad);
        $('#modal_titulo').text(actividadtext);

    $("#formDropZone").append("<form id='dZUpload' class='dropzone borde-dropzone' style='cursor: pointer;'>"+
 	                         "<div class='dz-default dz-message text-center'>"+
 	                           "<span><h2>Arrastra los archivos aquí</h2></span><br>"+
 	                         "<p>(o Clic para seleccionarlos desde tu computadora)</p></div></form>");
      myAwesomeDropzone = {
        dictInvalidFileType : "Solo se aceptan archivos en formato PDF.",
        url: "http://facite.uas.edu.mx/alumnos/inc/upload.php",
        addRemoveLinks: true,
        paramName: "archivoDesarrolloHidrocalido",
        maxFilesize: 10, // MB
        dictRemoveFile: "Remover",
        acceptedFiles: "application/pdf",
        params: {
            'act': actividad,
            'nom': nom_actividad,
            'desc': desc_actividad
        },
        success: function (file, response) {
            //alert(response);
            var imgName = response;
            file.previewElement.classList.add("dz-success");

            console.log("Successfully uploaded :" + imgName);
            $('#mdlArchivos').modal('hide');
            Swal.fire({
                    type: 'success',
                    title: 'Evidencia enviada correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
            
                $('#cmb_actividades').val('0');
                $("#txt_nombre_evidencia" ).val('');
                $("#txt_desc_evidencia" ).val('');
                $("#div_validacion").html("");
                $('#btn_subir').attr("disabled", "disabled");  
        },
        error: function (file, response) {
            //alert(response);
          file.previewElement.classList.add("dz-error");
          //.previewElement.
          $(file.previewElement).find('.dz-error-message').text(response);
          console.log("Error :" + response);
        }
      } // FIN myAwesomeDropzone
    var myDropzone = new Dropzone("#dZUpload", myAwesomeDropzone); 
    myDropzone.on("complete", function(file,response) {
 
  });
});

$('#mdlArchivos').on('hidden.bs.modal', function (event) {
  $("#formDropZone").empty();
  getArchivos();
});


 
function ValidarActividad(id) {
    $.ajax({
        type: 'GET',
        url: 'http://facite.uas.edu.mx/alumnos/inc/validar_actividad.php?id='+id,
        success: function(data){
            //$("#div_validacion").html(data);
            if(data == "ok"){
                $("#div_validacion").html('<div class="alert alert-success" role="alert" id="alert_val">Actividad disponible para evidenciar</div>');
            }
            else{
                $("#div_validacion").html('<div class="alert alert-danger" role="alert" id="alert_val">La Actividad ya cumplió los créditos máximos</div>');
            }
        }
    });
}

function getArchivos() {
    $.ajax({
        type: 'GET',
        url: 'http://facite.uas.edu.mx/alumnos/inc/getArchivos.php',
        success: function(data){
          $("#divMostrarArchivos").html("");
          $("#divMostrarArchivos").html(data);
        }
    });
}

function getActividades(id) {
    $.ajax({
        type: 'GET',
        url: 'http://facite.uas.edu.mx/alumnos/inc/get_actividades.php?id='+id,
        success: function(data){
          $("#divtabla"+id).html(data);
        }
    });
}

function getHistorialCreditos() {
    $.ajax({
        type: 'GET',
        url: 'http://facite.uas.edu.mx/alumnos/inc/get_historial_creditos.php',
        success: function(data){
          $("#historial_actividades").html(data);
        }
    });
}

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

function getDetalles(id) {
    $.ajax({
        type: 'GET',
        url: 'http://facite.uas.edu.mx/alumnos/inc/get_detalles.php?id='+id,
        success: function(data){
          $("#DescBody").html(data);
          $('#mdlDescripcion').modal('show'); 
          
          //$('#mdlDescripcion').modal('show'); 
          //$("#mdlDescripcion").show();
        }
    });
}
</script>