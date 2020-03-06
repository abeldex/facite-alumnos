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
				
					<!--<div class="col-12">-->
                    <nav style="margin-top:-50px">
							<ul class="nav dashboard-sub-menu" id="nav-tab" role="tablist">
								<li id="nav_home"><a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><b>Inicio</b></a></li>
								<li id="nav_historial"><a class="nav-item nav-link" id="nav-historial-tab" data-toggle="tab" href="#nav-historial" role="tab" aria-controls="nav-historial" aria-selected="true"><b>Historial de créditos acumulados</a></b></li>
								<li id="nav_subir"><a class="nav-item nav-link" id="nav-subir-tab" data-toggle="tab" href="#nav-subir" role="tab" aria-controls="nav-subir" aria-selected="false"><b>Enviar Documentos Probatorios</a></b></li>
								<li id="nav_descargar"><a class="nav-item nav-link" id="nav-descargar-tab" data-toggle="tab" href="#nav-descargar" role="tab" aria-controls="nav-descargar" aria-selected="false"><b>Descargar Documentos Probatorios</a></b></li>
							
						</nav>
                        <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-historial-home">
						<div class="tab-content" id="nav-tabContent">
							<div>
								<h4>Listado de Actividades de Libre Elección</h4>
								<h5>Total de Creditos a cubrir: 34</h5><br>
								

								
                                <?php
                                        if($total_tipo > 0){
                                            $res_tipo = $estado_tipo->fetchAll();
                                            echo '<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">';
                                            foreach ($res_tipo as $row_tipo){
                                                echo '
                                                
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-'.$row_tipo['id_tipo_act'].'-tab" data-toggle="pill" href="#pills-'.$row_tipo['id_tipo_act'].'" role="tab" aria-controls="pills-'.$row_tipo['id_tipo_act'].'" aria-selected="true"><b>Actividades '.$row_tipo['nombre_act'].'</b></a>
                                                </li>
                                    
                                                ';
                                            }		
                                            echo ' </ul>';
                                            echo ' <div class="tab-content" id="pills-tabContent">';
                                            foreach ($res_tipo as $row_tipo){
                                                
                                                echo '
                                                <div class="tab-pane fade" id="pills-'.$row_tipo['id_tipo_act'].'" role="tabpanel" aria-labelledby="pills-'.$row_tipo['id_tipo_act'].'-tab"><p style="text-align:justify;">'.$row_tipo['desc_act'].'</p>';
                                                
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

                            <div class="tab-pane fade" id="nav-historial" role="tabpanel" aria-labelledby="nav-historial-tab">
								<h4>Historial de Créditos Acumulados</h4>
                                <br>
                                <div class="row">
                                    <div class="col-lg-3">
                                    <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 17.647058823529%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="34"></div>
                                        </div>
                                    <ul id="profile-watched-stats">
                                        <li>
                                        <span style="font-size:120px;">
                                        6                                        </span> Créditos Acumulados</li>
                                    </ul>
                                    </div>
                                    <div class="col-lg-9">
                                        <div id="divMostrarArchivos"></div>
                                    </div>
                                </div>
                            </div>       
                                       
							<div class="tab-pane fade" id="nav-subir" role="tabpanel" aria-labelledby="nav-subir-tab">
								<!--<h4>Enviar Documentos Probatorios</h4>-->
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <h5>Paso 1:</h5>
                                    <p>Seleccionar una actividad, asignar el nombre de la evidencia a presentar y una descripción de la misma .</p>
                                   
                                        <select class="form-control form-control-lg" id="cmb_actividades">
                                        <option>Seleccione una Actividad</option>
                                        <?php
                                            if($total_actividades2 > 0)
                                            {
                                                $res_act_2 = $estado_act2->fetchAll();
                                                foreach ($res_act_2 as $row_act_2)
                                                {
                                                    echo '
                                                        <option value="'.$row_act_2['id_actividad'].'">'.$row_act_2['nombre_actividad'].'</option>   
                                                    ';
                                                }
                                            }


                                        ?>
                                        </select><br>
                                        <input type="text" class="form-control" id="txt_nombre_evidencia" placeholder="Nombre para la evidencia"><br>
                                        <textarea rows="5" class="form-control" id="txt_desc_evidencia" placeholder="Ingrese la descripcion de su evidencia presentada"></textarea>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                    <h5>Paso 2:</h5>
                                    <p>Seleccionar los archivos que evidencien tu actividad presentada. (Deben ser evidencias válidas como lo muestra la descripción de la actividad)</p>
                                    <button class="btn btn-green-pro btn-lg" data-toggle="modal"  data-target="#mdlArchivos" id="btn_subir">Subir Archivos</button>
                                    </div>
                                </div>
                                       
                                        
                                                    
							</div>

							<div class="tab-pane fade" id="nav-descargar" role="tabpanel" aria-labelledby="nav-descargar-tab">
								<h4>Descargar Archivos</h4>
                                <br>
                               
							</div>
							
						</div>
					<!--</div> close .col -->
					
					
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
            <div class="alert alert-success" id="modal_titulo" role="alert" style="margin-left:10px; margin-right:10px; ">     
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
            <div class="modal-header bg-success" >
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
<?php

include('../inc/pie.php');

?>

<script>
	$(document).ready( function () 
	{
        getArchivos();
        getActividades(1);
        getActividades(2);
        getActividades(3);

        $( "select" ).change(function (){
            var str = "";
            $( "select option:selected" ).each(function() {
            str += $( this ).text() + " ";
            });
            if(str == 'Seleccione una Actividad'){
                $('#btn_subir').attr("disabled", "disabled");
            }
            else{
                $('#btn_subir').removeAttr("disabled");
            }
        }).change();

        $('#btn_subir').attr("disabled", "disabled");
        
        $('#pills-tab a:first').tab('show');
        //$('.nav-pills a[href="pills-1-tab"]').tab('show');    
        var table = $('.tablita').DataTable( {
            responsive: true,
        });

		$('#nav_home').addClass('current');

		$('#nav_home').click(function(e){
			$("#nav_historial").removeClass("current");
			$("#nav_subir").removeClass("current");
			$("#nav_descargar").removeClass("current");
			$('#nav_home').addClass('current');
		});

		$('#nav_historial').click(function(e){
			$("#nav_home").removeClass("current");
			$("#nav_subir").removeClass("current");
			$("#nav_descargar").removeClass("current");
			$('#nav_historial').addClass('current');
		});

		$('#nav_descargar').click(function(e){
			$("#nav_home").removeClass("current");
			$("#nav_subir").removeClass("current");
			$("#nav_historial").removeClass("current");
			$('#nav_descargar').addClass('current');
		});

		$('#nav_subir').click(function(e){
			$("#nav_home").removeClass("current");
			$("#nav_descargar").removeClass("current");
			$("#nav_historial").removeClass("current");
			$('#nav_subir').addClass('current');
		});


    });

    $('#mdlArchivos').on('show.bs.modal', function (event) {
        //obtenemos el id del evento seleccionado
        var actividad = $('#cmb_actividades').val();
        var actividadtext = $("#cmb_actividades option:selected" ).text();
        var nom_actividad = $("#txt_nombre_evidencia" ).val();
        var desc_actividad = $("#txt_desc_evidencia" ).val();
        alert(actividad + " | " + nom_actividad + " | " + desc_actividad);
        $('#modal_titulo').text(actividadtext);

    $("#formDropZone").append("<form id='dZUpload' class='dropzone borde-dropzone' style='cursor: pointer;'>"+
 	                         "<div class='dz-default dz-message text-center'>"+
 	                           "<span><h2>Arrastra los archivos aquí</h2></span><br>"+
 	                         "<p>(o Clic para seleccionarlos desde tu computadora)</p></div></form>");
      myAwesomeDropzone = {
        url: "http://facite.uas.edu.mx/alumnos/inc/upload.php",
        addRemoveLinks: true,
        paramName: "archivoDesarrolloHidrocalido",
        maxFilesize: 4, // MB
        dictRemoveFile: "Remover",
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
        },
        error: function (file, response) {
            //alert(response);
          file.previewElement.classList.add("dz-error");
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

