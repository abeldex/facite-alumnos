<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/dropzone.css">
        <style type="text/css">
          .borde-dropzone{
            border: 2px dashed #47a447 !important;
            border-radius: 5px !important;
            background: white !important;
           }
        </style>
    </head>
    <body>
    <div class="container">
     <div class="row">
        <div class="col-md-5 col-md-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Desarrollo Hidrocálido - Ejemplo de Dropzone con jQuery</h3>
            </div>
            <div class="panel-body text-center" >
                <p><img src="archivos/logo_desarrollo_hidrocalido.png" alt="www.desarrollohidrocalido.com"></p>
                <button class="btn btn-success" data-toggle="modal"  data-target="#mdlArchivos">Archivos</button>
                <div class="row" id="divMostrarArchivos"></div>
            </div>
          </div> <!-- Fin del panel panel-default -->
        </div>
      </div> <!-- Fin del Row --> 
       <!-- Modal -->
      <div id="mdlArchivos" class="modal fade">
        <div class="modal-dialog" style="width: 65%;">
          <div class="modal-content">
            <div class="modal-body">
            <div class="row">
              <div class="col-md-12" id="formDropZone"></div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->      
     </div> <!-- Fin del Container -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dropzone.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>