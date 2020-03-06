<?php
include('../../inc/cabecera_admin.php');

session_start();
if (!isset($_SESSION['cuenta']) || $_SESSION['cuenta'] != "administrador") {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/administrador/login.php"</script>';
  }
?>
<main id="col-main">	
			<div class="dashboard-container"><br>
            <h4 class="heading-extra-margin-bottom">Módulo de Créditos</h4>
                 <div class="row">
					<!-- Vinculo actividades -->
                    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
						<div class="item-listing-container-skrn">
							<a href="creditos/actividades.php"><img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/document-10-128.png" alt="Listing"></a>
							<div class="item-listing-text-skrn">
								<div class="item-listing-text-skrn-vertical-align"><center><b><a href="creditos/actividades.php">ACTIVIDADES</a></b></center>
								</div><!-- close .item-listing-text-skrn-vertical-align -->
							</div><!-- close .item-listing-text-skrn -->
						</div><!-- close .item-listing-container-skrn -->
					</div><!-- close .col -->

                    <!-- Vinculo Alumnos -->
                    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
						<div class="item-listing-container-skrn">
							<a href="creditos/revision.php"><img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/document-03-128.png" alt="Listing"></a>
							<div class="item-listing-text-skrn">
								<div class="item-listing-text-skrn-vertical-align"><center><b><a href="creditos/revision.php">REVISIÓN DE DOCUMENTOS</a></b></center>
								</div><!-- close .item-listing-text-skrn-vertical-align -->
							</div><!-- close .item-listing-text-skrn -->
						</div><!-- close .item-listing-container-skrn -->
					</div><!-- close .col -->

                     <!-- Vinculo Alumnos -->
                     <div class="col-12 col-md-6 col-lg-4 col-xl-2">
						<div class="item-listing-container-skrn">
							<a href="creditos/replicas.php"><img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/document-05-128.png" alt="Listing"></a>
							<div class="item-listing-text-skrn">
								<div class="item-listing-text-skrn-vertical-align"><center><b><a href="creditos/replicas.php">REPLICAS</a></b></center>
								</div><!-- close .item-listing-text-skrn-vertical-align -->
							</div><!-- close .item-listing-text-skrn -->
						</div><!-- close .item-listing-container-skrn -->
					</div><!-- close .col -->

                    <!-- Vinculo Alumnos -->
                    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
						<div class="item-listing-container-skrn">
							<a href="creditos/aprobados.php"><img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/documents-01-128.png" alt="Listing"></a>
							<div class="item-listing-text-skrn">
								<div class="item-listing-text-skrn-vertical-align"><center><b><a href="creditos/aprobados.php">DOCUMENTOS APROBADOS</a></b></center>
								</div><!-- close .item-listing-text-skrn-vertical-align -->
							</div><!-- close .item-listing-text-skrn -->
						</div><!-- close .item-listing-container-skrn -->
					</div><!-- close .col -->

                    <!-- Vinculo Reportes -->
                    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
						<div class="item-listing-container-skrn">
							<a href="creditos/reportes.php"><img src="https://cdn2.iconfinder.com/data/icons/xomo-basics/128/documents-07-128.png" alt="Listing"></a>
							<div class="item-listing-text-skrn">
								<div class="item-listing-text-skrn-vertical-align"><center><b><a href="creditos/reportes.php">REPORTES</a></b></center>
								</div><!-- close .item-listing-text-skrn-vertical-align -->
							</div><!-- close .item-listing-text-skrn -->
						</div><!-- close .item-listing-container-skrn -->
					</div><!-- close .col -->

                    <!-- Vinculo Reportes -->
                    <div class="col-12 col-md-6 col-lg-4 col-xl-2">
						<div class="item-listing-container-skrn">
							<a href="alumnos/"><img src="https://cdn3.iconfinder.com/data/icons/beos/BeOS_people.png" alt="Listing"></a>
							<div class="item-listing-text-skrn">
								<div class="item-listing-text-skrn-vertical-align"><center><b><a href="alumnos/">ALUMNOS</a></b></center>
								</div><!-- close .item-listing-text-skrn-vertical-align -->
							</div><!-- close .item-listing-text-skrn -->
						</div><!-- close .item-listing-container-skrn -->
					</div><!-- close .col -->
                
                    
                </div><!-- close .row -->
						
			</div><!-- close .dashboard-container -->
		</main>
<?php
include('../../inc/pie.php');
?>
