<?php session_start();
include('../inc/cabecera_admin.php');
if (!isset($_SESSION['cuenta']) || $_SESSION['cuenta'] != "administrador") {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/administrador/login.php"</script>';
  }
?>
<main id="col-main">	
			<div class="dashboard-container">
				<br>
				<div class="row">
                    <div class="col-lg-12">
                        <center>
                        <h4>Bienvenido a la Administración del Sistema Integral de Alumnos de la FACITE</h4>
                        <h5 >Para comenzar ingresa a cualquier módulo disponible</h5>
                        <img src="https://www.adma.qc.ca/site/assets/files/1713/step4.gif"/></center>
                    </div>
                </div><!-- close .row -->
						
			</div><!-- close .dashboard-container -->
		</main>
<?php
include('../inc/pie.php');
?>
