<?php session_start();
include('../../inc/cabecera_admin.php');
if (!isset($_SESSION['cuenta'])) {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/administrador/login.php"</script>';
  }
  
//hacemos la consulta a la base de datos
$query_act2 = "SELECT * FROM Actividades";
$estado_act2 = $connect->prepare($query_act2);
$estado_act2->execute();
$total_actividades2 = $estado_act2->rowCount();

//obtenemos la informacion de los tipos de actividades
$query_tipo = "SELECT * FROM TipoActividades";
$estado_tipo = $connect->prepare($query_tipo);
$estado_tipo->execute();
$total_tipo = $estado_tipo->rowCount();
?>
<main id="col-main">	
            <div style="float:right; position:relative;"><img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/document-10-128.png" alt="Listing"></div>
			<div class="dashboard-container"><br>
                
                <h4 class="heading-extra-margin-bottom">Administración de Actividades de Libre Elección</h4>
                <button class="btn-green-pro btn-lg right" data-toggle="modal"  data-target="#mdlNuevaActividad">Nueva Actividad</button>
                <div class="row">
					<!-- Vinculo actividades -->
                    <div class="col-12" id="tabla">								
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
					</div><!-- close .col -->

                </div><!-- close .row -->
						
			</div><!-- close .dashboard-container -->
</main>

<!-- Modal -->
<div id="mdlNuevaActividad" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Actividad</h5>                          
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_actividades" class="form">
                            <div class="form-group">
                                <label for="categoria_actividad">Categoría de la Actividad:</label>   
								 <select class="form-control" id="categoria_actividad" name="categoria_actividad">
                                 <?php
                                    //hacemos la consulta a la base de datos
                                    $query_act2 = "SELECT * FROM TipoActividades";
                                    $estado_act2 = $connect->prepare($query_act2);
                                    $estado_act2->execute();
                                    $total_actividades2 = $estado_act2->rowCount();
                                        if($total_actividades2 > 0)
										{
											$res_act2 = $estado_act2->fetchAll();
											foreach ($res_act2 as $row_act2)
											{
												echo '<option value="'.$row_act2['id_tipo_act'].'">'.$row_act2['nombre_act'].'</option>';
											}
										}
										else
										{
												echo '<option value="0">No hay ninguna actividad registrada</option>';
										}    

                                 ?>
                                 </select>
                             </div>
                             <div class="form-group">
                             <label for="nombre_actividad">Nombre de la Actividad:</label>
                                <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad" >
                             </div>
                             <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="creditos_computables">Créditos Computables:</label>
                                        <input type="number" class="form-control" id="creditos_computables" name="creditos_computables" >
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="creditos_maximos">Créditos Máximos:</label>
                                        <input type="number" class="form-control" id="creditos_maximos" name="creditos_maximos" >
                                    </div>
                                </div>
                                
                             </div>
							 <div class="form-group">
                                 <label for="nombre_actividad">Definicion de Actividad:</label>       
								 <textarea rows="3" class="form-control" id="definicion_actividad" name="definicion_actividad">
                                 </textarea>
							 </div>
							 <div class="form-group">
                                 <label for="evidencias_actividad">Evidencias para la Actividad:</label>       
								 <textarea rows="3" class="form-control" id="evidencias_actividad" name="evidencias_actividad">
                                 </textarea>
							 </div>
							
				</form>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
              <button type="button" class="btn btn-green-pro" id="btn_guardar">Guardar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->      

<!-- Modal Descripcion de Actividades-->
    <div id="mdlDescripcion" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary" ><h5 class="modal-title text-white">  Descripción de la Actividad</h5>
                                           
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
      
    <!-- Modal Descripcion de Actividades-->
    <div id="mdlDescripcion" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header ">
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
include('../../inc/pie.php');
?>
<script>
    $(document).ready( function () 
	{
        getActividades(1);
        getActividades(2);
        getActividades(3); 
        $('#pills-tab a:first').tab('show');

    });

    function getActividades(id) {
        $.ajax({
            type: 'GET',
            url: 'http://facite.uas.edu.mx/alumnos/inc/get_actividades.php?id='+id,
            success: function(data){
            $("#divtabla"+id).html(data);
            }
        });
    }

    $(document).on("click", "#btn_guardar", function() {
        //var nombre = $('#nombre_actividad').val().trim();
        //var creditos = $('#creditos_actividad').val();
        //var categoria = $('#categoria_actividad').val();
        //alert(nombre + " " + creditos + " " + categoria);
        $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/administrador/creditos/insertar_actividad.php',
            data: $("#form_actividades").serialize(), 
            success: function(data){
                Swal.fire({
                type: 'success',
                title: 'Actividad Guardada Correctamente',
                showConfirmButton: false,
                timer: 1500
                })
                $('#tabla').load(location.href + ' #tabla>*', "");
	            $('#btn_cancelar').click();
            }

        });     
    });

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
