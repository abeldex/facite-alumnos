<?php session_start();
include('../../inc/cabecera_nuevo.php');
include('../../inc/conexion.php');
//verificar si ya inicio sesion
if (!isset($_SESSION['cuenta'])) {
    echo '<script>window.location="http://facite.uas.edu.mx/alumnos/"</script>';
  }

  $alumno = $_SESSION['cuenta'];

    //hacemos la consulta a la base de datos para obtener la informacion personal
    $query = "SELECT * FROM cv_datos WHERE cuenta ='".$alumno."'";
    $estado = $connect->prepare($query);
    $estado->execute();
    $res = $estado->fetchAll();
    foreach ($res as $row){
        $nom = $row['nombre'];
        $ap = $row['apellidos'];
        $fnac = $row['fecha_nac'];
        $lnac = $row['lugar_nacimiento'];
        $dir = $row['direccion'];
        $tel = $row['telefono'];
        $correo = $row['correo'];
        $cp = $row['cod_postal'];
        $ciudad = $row['ciudad'];
        $civil = $row['estado_civil'];
        $perfil = $row['perfil'];
        $foto = $row['foto'];
    }

    //consultamos para obtener la informacion de formacion
    $query_formacion = "SELECT * FROM cv_formacion WHERE cuenta ='".$alumno."'";
    $estado_formacion = $connect->prepare($query_formacion);
    $estado_formacion->execute();
    $res_formacion = $estado_formacion->fetchAll();
    foreach ($res_formacion as $row_formacion){
        $formacion_f    = $row_formacion['formacion'];
        $institucion_f  = $row_formacion['institucion'];
        $localidad_f    = $row_formacion['localidad'];
        $desdem_f       = $row_formacion['desde_m'];
        $desdea_f       = $row_formacion['desde_a'];
        $hastam_f       = $row_formacion['hasta_m'];
        $hastaa_f       = $row_formacion['hasta_a'];
    }

    //consultamos para obtener la informacion de experiencia
    $query_experiencia = "SELECT * FROM cv_experiencia WHERE cuenta ='".$alumno."'";
    $estado_experiencia = $connect->prepare($query_experiencia);
    $estado_experiencia->execute();
    $res_experiencia= $estado_experiencia->fetchAll();
    foreach ($res_experiencia as $row_experiencia){
        $cargo_e        =  $row_experiencia['cargo'];
        $empresa_e      =  $row_experiencia['empresa'];
        $localidad_e    =  $row_experiencia['localidad'];
        $desdem_e       =  $row_experiencia['desde_m'];
        $desdea_e       =  $row_experiencia['desde_a'];
        $hastam_e       =  $row_experiencia['hasta_m'];
        $hastaa_e       =  $row_experiencia['hasta_a'];
        $descripcion_e  =  $row_experiencia['descripcion'];
    }

    //consultamos para obtener la informacion de habilidades
    $query_habilidades = "SELECT * FROM cv_habilidades WHERE cuenta ='".$alumno."'";
    $estado_habilidades = $connect->prepare($query_habilidades);
    $estado_habilidades->execute();
    $res_habilidades = $estado_habilidades->fetchAll();
    foreach ($res_habilidades as $row_habilidades){
        $descripcion_habilidad    =  $row_habilidades['descripcion'];
        $nivel_habilidad          =  $row_habilidades['nivel'];
    }

    //consultamos para obtener la informacion de los intereses
    $query_intereses = "SELECT * FROM cv_intereses WHERE cuenta ='".$alumno."'";
    $estado_intereses = $connect->prepare($query_intereses);
    $estado_intereses->execute();
    $res_intereses = $estado_intereses->fetchAll();
    foreach ($res_intereses as $row_intereses){
        $descripcion_interes   =  $row_intereses['descripcion'];
    }




?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">

    <!-- Page-Title -->
    <div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Módulo de Curriculum Vitae</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sistema de Alumnos</a></li>
                                    <li class="breadcrumb-item active">Curriculum Vitae</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-rounded dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-settings-outline mr-1"></i> Opciones
                                            </button>
                                            <!--<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">Action</a>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="tab-datos" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="mdi mdi mdi-face font-size-22"></i> Datos Personales</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab-contenido" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="mdi mdi-content-paste font-size-22"></i> Contenido</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab-descarga" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="mdi mdi mdi-file-download-outline font-size-22"></i> Descargar</a>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="tab-content" id="pills-tabContent">
                             <!-- tab descarga -->
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="tab-descarga">
                                <h4>Descargar </h4>
                                <div class="row">
                                </div>
                            </div>                   
                            <!-- tab datos -->
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="tab-datos">
                                    <div class="row">
                                    
                                        <div class="col-lg-3 row justify-content-center">
                                                <div id="text-center">
                                                    <div><img id="foto" src="../assets/images/default.png" alt="Account Image" class="rounded-circle"></div>
                                                    <p>
                                                    <!-- seleccionar foto de perfil -->
                                                    <a class="btn btn-secondary" id="add_foto" id="btn_subir">Seleccionar una foto</a>
                                                    
                                                    </p>
                                                </div>
                                        </div><!-- close .col -->

                                        <div class="col-lg-9">
                                        
                                            <form id="form-datos">
                                        
                                            <h4 class="header-title">Datos Personales</h5>
                                            <p class="card-title-desc"> En esta sección podrás añadir la información básica para tu CV.</p>
                                            <div class="row">
                                                <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="account-name" class="col-form-label">Nombre(s):</label>
                                                    <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" value="<?php echo $nom;?>">
                                                </div>
                                                </div><!-- close .col -->
                                                <div class="col-sm">
                                                    <div class="form-group">
                                                        <label for="first-name" class="col-form-label">Apellidos:</label>
                                                        <input type="text" class="form-control" id="txt_appelidos" name="txt_appelidos" value="<?php echo $ap;?>">
                                                    </div>
                                                </div><!-- close .col -->     
                                            </div><!-- close .row -->
                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="form-group">
                                                        <label for="last-name" class="col-form-label">Dirección (calle, número, piso, etc.):</label>
                                                        <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" value="<?php echo $dir;?>">
                                                    </div>
                                                </div><!-- close .col -->
                                                <div class="col-sm">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="grade-name" class="col-form-label">Codigo Postal:</label>
                                                                <input type="text"  class="form-control" id="txt_cp" name="txt_cp" value="<?php echo $cp;?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="grade-name" class="col-form-label">Ciudad:</label>
                                                                <input type="text" class="form-control" id="txt_ciudad" name="txt_ciudad" value="<?php echo $ciudad;?>">
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div><!-- close .col -->
                                            </div>
                                            <div class="row" >
                                                <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="account-name" class="col-form-label">Telefono:</label>
                                                    <input type="text" class="form-control" id="txt_telefono" name="txt_telefono" value="<?php echo $tel;?>">
                                                </div>
                                                </div><!-- close .col -->
                                                <div class="col-sm">
                                                    <div class="form-group">
                                                        <label for="first-name" class="col-form-label">Correo electrónico:</label>
                                                        <input type="text" class="form-control" id="txt_correo" name="txt_correo" value="<?php echo $correo;?>">
                                                    </div>
                                                </div><!-- close .col -->
                                                
                                            </div><!-- close .row -->

                                            <div class="row" >
                                                <div class="col-sm">
                                                    <div class="form-group">
                                                        <label for="last-name" class="col-form-label">Fecha de Nacimiento:</label>
                                                        <input type="date" class="form-control" id="txt_fecha_nac" name="txt_fecha_nac" value="<?php echo $fnac;?>">
                                                    </div>
                                                </div><!-- close .col -->
                                                <div class="col-sm">
                                                    <div class="form-group">
                                                        <label for="last-name" class="col-form-label">Lugar de Nacimiento:</label>
                                                        <input type="text" class="form-control" id="txt_lugar_nac" name="txt_lugar_nac" value="<?php echo $lnac;?>">
                                                    </div>
                                                </div><!-- close .col -->
                                            </div>

                                            <div class="row" >
                                                <div class="col-sm">
                                                    <div class="form-group">
                                                        <label for="last-name" class="col-form-label">Estado Civil:</label>
                                                        <input type="text" class="form-control" id="txt_estado" name="txt_estado" value="<?php echo $civil;?>">
                                                    </div>
                                                </div><!-- close .col -->
                                                <div class="col-sm">
                                                    <div class="form-group">
                                                        <label for="last-name" class="col-form-label">Descripción Personal:</label>
                                                        <textarea class="form-control" id="txt_descripcion" name="txt_descripcion"><?php echo $perfil;?></textarea>
                                                    </div>
                                                </div><!-- close .col -->
                                            </div>

                                            <hr>
                                            <p><a href="#" class="btn btn-primary btn-lg float-right" id="btn_guardar_datos">Guardar Datos Personales</a></p>
                                            <br>
                                            </form>
                                        
                                        </div><!-- close .col -->

                                    </div>

                            </div>

                            <!-- tab contenido -->
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="tab-contenido">
                                <h4 class="header-title">Contenido de tu Curriculum</h4>
                                <p class="card-title-desc"> En esta sección podrás añadir la información que aparecerá en tu Curriculum Vitae.</p>
                                <!--Acordion para llenar los datos del cv -->
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                        
                                        <h5 class="mb-0">
                                            <a href = "#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="mdi mdi-school-outline"></i>  Formación Académica <i class="fas fa-caret-down"></i>
                                            </a>
                                        </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <form id="form_formacion_academica" name="form_formacion_academica">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Formación:</label>
                                                    <input type="text" class="form-control" placeholder="Ej. Preparatoria" name="txt_fa_formacion" id="txt_fa_formacion">
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Institución:</label>
                                                            <input type="text" class="form-control" placeholder="" name="txt_fa_institucion" id="txt_fa_institucion">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Localidad:</label>
                                                            <input type="text" class="form-control" placeholder=""  name="txt_fa_localidad" id="txt_fa_localidad">
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Desde:</label>
                                                            <select class="form-control"  name="txt_fa_desde_mes" id="txt_fa_desde_mes">
                                                                <option value="-">Mes</option>
                                                                <option value="enero">Enero</option>
                                                                <option value="febrero">Febrero</option>
                                                                <option value="marzo">Marzo</option>
                                                                <option value="abril">Abril</option>
                                                                <option value="mayo">Mayo</option>
                                                                <option value="junio">Junio</option>
                                                                <option value="julio">Julio</option>
                                                                <option value="agosto">Agosto</option>
                                                                <option value="septiembre">Septiembre</option>
                                                                <option value="octubre">Octubre</option>
                                                                <option value="noviembre">Noviembre</option>
                                                                <option value="diciembre">Diciembre</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6"> 
                                                        <label>&nbsp</label>
                                                        <select class="form-control" name="txt_fa_desde_anio" id="txt_fa_desde_anio">
                                                                <option value="-">Año</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2001">2001</option>
                                                                <option value="1999">1999</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1989">1989</option>
                                                                <option value="1988">1988</option>
                                                            </select>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Hasta:</label>
                                                            <select class="form-control"  name="txt_fa_hasta_mes" id="txt_fa_hasta_mes">
                                                                <option value="-">Mes</option>
                                                                <option value="enero">Enero</option>
                                                                <option value="febrero">Febrero</option>
                                                                <option value="marzo">Marzo</option>
                                                                <option value="abril">Abril</option>
                                                                <option value="mayo">Mayo</option>
                                                                <option value="junio">Junio</option>
                                                                <option value="julio">Julio</option>
                                                                <option value="agosto">Agosto</option>
                                                                <option value="septiembre">Septiembre</option>
                                                                <option value="octubre">Octubre</option>
                                                                <option value="noviembre">Noviembre</option>
                                                                <option value="diciembre">Diciembre</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>&nbsp</label>
                                                            <select class="form-control" name="txt_fa_hasta_anio" id="txt_fa_hasta_anio">
                                                                <option value="-">Año</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2001">2001</option>
                                                                <option value="1999">1999</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1989">1989</option>
                                                                <option value="1988">1988</option>
                                                            </select>
                                                        </div>
                                                    </div>   
                                                </div>
                                                
                                            </div>
                                            <hr>
                                            <a class="btn btn-primary btn-md text-white float-right" id="add_formacion"><i class="fas fa-plus"></i>Añadir Formación</a>
                                           
                                            <div id="formacion_list">
                                                <!-- aqui ira la informacion de las formaciones almacenadas -->
                                                <ul class="list-group">
                                                <?php
                                                    //obtener las formaciones agregadas
                                                    $formaciones = "SELECT * FROM cv_formacion WHERE cuenta = '".$alumno."'";
                                                    $estadof = $connect->prepare($formaciones);
                                                    $estadof->execute();
                                                    $resf = $estadof->fetchAll();

                                                    foreach ($resf as $rowf){
                                                        echo '
                                                        <li class="list-group-item">
                                                        <button type="button" class="close delete" id="'.$rowf['id_formacion'].'" table="cv_formacion" lista="formacion_list" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <div class="float-right">
                                                        Desde: '.$rowf['desde_m'].' '.$rowf['desde_a'].' <br>Hasta: '.$rowf['hasta_m'].' '.$rowf['hasta_a'].'</div>
                                                        <i class="fas fa-graduation-cap"></i>
                                                        '.$rowf['formacion'].'<br>
                                                        '.$rowf['institucion'].'
                                                        
                                                        </li>
                                                        ';
                                                    }
                                                    
                                                    //echo $formaciones;
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    <hr>
                                    <div class="card">
                                    <form id="form_experiencia" name="form_experiencia">
                                        <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a href = "#"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fas fa-briefcase"></i>  Experiencia Laboral <i class="fas fa-caret-down"></i>
                                            </a>
                                        </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <!--inician controles-->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Cargo:</label>
                                                    <input type="text" class="form-control" placeholder="" name="txt_exp_cargo" id="txt_exp_cargo">
                                                </div><!--pimera col-->
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Empresa:</label>
                                                            <input type="text" class="form-control" placeholder="" name="txt_exp_empresa" id="txt_exp_empresa">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Localidad:</label>
                                                            <input type="text" class="form-control" placeholder=""  name="txt_exp_localidad" id="txt_exp_localidad">
                                                        </div>
                                                    </div>   
                                                </div><!--segunda col-->
                                            </div> <!--row 1-->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Desde:</label>
                                                            <select class="form-control"  name="txt_exp_desde_mes" id="txt_exp_desde_mes">
                                                                <option value="-">Mes</option>
                                                                <option value="enero">Enero</option>
                                                                <option value="febrero">Febrero</option>
                                                                <option value="marzo">Marzo</option>
                                                                <option value="abril">Abril</option>
                                                                <option value="mayo">Mayo</option>
                                                                <option value="junio">Junio</option>
                                                                <option value="julio">Julio</option>
                                                                <option value="agosto">Agosto</option>
                                                                <option value="septiembre">Septiembre</option>
                                                                <option value="octubre">Octubre</option>
                                                                <option value="noviembre">Noviembre</option>
                                                                <option value="diciembre">Diciembre</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6"> 
                                                        <label>&nbsp</label>
                                                        <select class="form-control" name="txt_exp_desde_anio" id="txt_exp_desde_anio">
                                                                <option value="-">Año</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2001">2001</option>
                                                                <option value="1999">1999</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1989">1989</option>
                                                                <option value="1988">1988</option>
                                                            </select>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Hasta:</label>
                                                            <select class="form-control"  name="txt_exp_hasta_mes" id="txt_exp_hasta_mes">
                                                                <option value="-">Mes</option>
                                                                <option value="enero">Enero</option>
                                                                <option value="febrero">Febrero</option>
                                                                <option value="marzo">Marzo</option>
                                                                <option value="abril">Abril</option>
                                                                <option value="mayo">Mayo</option>
                                                                <option value="junio">Junio</option>
                                                                <option value="julio">Julio</option>
                                                                <option value="agosto">Agosto</option>
                                                                <option value="septiembre">Septiembre</option>
                                                                <option value="octubre">Octubre</option>
                                                                <option value="noviembre">Noviembre</option>
                                                                <option value="diciembre">Diciembre</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>&nbsp</label>
                                                            <select class="form-control" name="txt_exp_hasta_anio" id="txt_exp_hasta_anio">
                                                                <option value="-">Año</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2001">2001</option>
                                                                <option value="1999">1999</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1989">1989</option>
                                                                <option value="1988">1988</option>
                                                            </select>
                                                        </div>
                                                    </div>   
                                                    
                                                </div>  <!--row 2-->
                                                <!--terminan controles-->   
                                        </div>
                                        <div class="row">
                                                    <div class="col-lg-12">
                                                        <label>Descripción:</label>
                                                        <textarea rows="3" class="form-control" id="txt_exp_desc" name="txt_exp_desc"></textarea>
                                                    </div>
                                                </div>
                                            <hr>
                                            <a class="btn btn-primary text-white btn-md float-right" id="add_experiencia"><i class="fas fa-plus"></i>Añadir Experiencia</a>
                                            <!--aqui vala lista de experiencia laboral -->
                                            
                                            <div id="experiencia_list">
                                                <!-- aqui ira la informacion de las formaciones almacenadas -->
                                                <ul class="list-group">
                                                <?php
                                                    //obtener las formaciones agregadas
                                                    $exp = "SELECT * FROM cv_experiencia WHERE cuenta = '".$alumno."'";
                                                    $estadoexp = $connect->prepare($exp);
                                                    $estadoexp->execute();
                                                    $resexp = $estadoexp->fetchAll();

                                                    foreach ($resexp as $rowexp){
                                                        echo '
                                                        <li class="list-group-item">
                                                        <button type="button" class="close delete" id="'.$rowexp['id_experiencia'].'" table="cv_experiencia" lista="experiencia_list" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <div class="float-right">
                                                        Desde: '.$rowexp['desde_m'].' '.$rowexp['desde_a'].' <br>Hasta: '.$rowexp['hasta_m'].' '.$rowexp['hasta_a'].'</div>
                                                        <i class="fas fa-briefcase"></i>
                                                        '.$rowexp['cargo'].'<br>
                                                        '.$rowexp['empresa'].'<br>
                                                        '.$rowexp['descripcion'].'
                                                        </li>
                                                        ';
                                                    }
                                                    
                                                    //echo $formaciones;
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <hr>
                                    <div class="card">
                                    <form id="form_habilidades" name="form_habilidades">
                                        <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                        <a href = "#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="fas fa-laptop"></i> Habilidades y Aptitudes <i class="fas fa-caret-down"></i>
                                            </a>
                                        </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Habilidad:</label>
                                                    <input type="text" class="form-control" placeholder="" name="txt_habilidad" id="txt_habilidad">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Nivel:</label>
                                                    <select class="form-control" name="txt_habilidad_nivel" id="txt_habilidad_nivel">
                                                        <option value="-">Elige una opción</option>
                                                        <option value="Muy bueno">Muy bueno</option>
                                                        <option value="Bueno">Bueno</option>
                                                        <option value="Base">Base</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <a class="btn btn-primary text-white btn-md float-right" id="add_habilidad"><i class="fas fa-plus"></i>Añadir Habilidad</a>
                                            <!-- aqui va la lista de habilidades -->
                                           
                                            <div id="habilidades_list">
                                                <!-- aqui ira la informacion de las formaciones almacenadas -->
                                                <ul class="list-group">
                                                <?php
                                                    //obtener las formaciones agregadas
                                                    $hab = "SELECT * FROM cv_habilidades WHERE cuenta = '".$alumno."'";
                                                    $estadoh = $connect->prepare($hab);
                                                    $estadoh->execute();
                                                    $resh = $estadoh->fetchAll();

                                                    foreach ($resh as $rowh){
                                                        echo '
                                                        <li class="list-group-item">
                                                        <button type="button" class="close delete" id="'.$rowh['id_habilidad'].'" table="cv_habilidades" lista = "habilidades_list"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <div class="float-right">
                                                        Nivel: '.$rowh['nivel'].'</div>
                                                        <i class="fas fa-laptop"></i>
                                                        '.$rowh['descripcion'].'
                                                        </li>
                                                        ';
                                                    }
                                                    
                                                    //echo $formaciones;
                                                ?>
                                                </ul>
                                            </div>

                                        </div>

                                        </form> 
                                        </div>
                                        <hr>            
                                        <div class="card">
                                        <form id="form_intereses" name="form_intereses">            
                                        <div class="card-header" id="headingFour">
                                        <h5 class="mb-0">
                                        <a href = "#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <i class="fas fa-paint-brush"></i> Intereses <i class="fas fa-caret-down"></i>
                                            </a>
                                        </h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <label>Interés:</label>
                                                    <input type="text" class="form-control" placeholder="" name="txt_interes" id="txt_interes">
                                                </div>
                                                
                                            </div>
                                            <hr>
                                            <a class="btn btn-primary text-white float-right" id="add_interes"><i class="fas fa-plus"></i>Añadir interés</a>
                                            <div id="intereses_list">
                                                <!-- aqui ira la informacion de las formaciones almacenadas -->
                                                <ul class="list-group">
                                                <?php
                                                    //obtener las formaciones agregadas
                                                    $interes = "SELECT * FROM cv_intereses WHERE cuenta = '".$alumno."'";
                                                    $estadoi = $connect->prepare($interes);
                                                    $estadoi->execute();
                                                    $resi = $estadoi->fetchAll();

                                                    foreach ($resi as $rowi){
                                                        echo '
                                                        <li class="list-group-item">
                                                        <button type="button" class="close delete" id="'.$rowi['id_intereses'].'" table="cv_intereses" lista="intereses_list"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <i class="fas fa-paint-brush"></i>
                                                        '.$rowi['descripcion'].'
                                                        </li>
                                                        ';
                                                    }
                                                    
                                                    //echo $formaciones;
                                                ?>
                                                </ul>
                                            </div>

                                        </div>

                                        </form> 
                                        </div>
                                        <hr>   
      
                                    <div class="card">
                                    <form id="form_idiomas" name="form_idiomas">     
                                        <div class="card-header" id="headingFive">
                                        <h5 class="mb-0">
                                        <a href = "#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            <i class="fas fa-language"></i> Idiomas <i class="fas fa-caret-down"></i>
                                            </a>
                                        </h5>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Idioma:</label>
                                                    <input type="text" class="form-control" placeholder="" name="txt_idioma" id="txt_idioma">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Nivel:</label>
                                                    <select class="form-control" name="txt_idioma_nivel" id="txt_idioma_nivel">
                                                        <option value="-">Elige una opción</option>
                                                        <option value="Nativo">Nativo</option>
                                                        <option value="Alto">Alto</option>
                                                        <option value="Medio">Medio</option>
                                                        <option value="Bajo">Bajo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <a class="btn btn-primary text-white float-right" id="add_idioma"><i class="fas fa-plus"></i>Añadir idioma</a>
                                            <div id="idiomas_list">
                                                <!-- aqui ira la informacion de las formaciones almacenadas -->
                                                <ul class="list-group">
                                                <?php
                                                    //obtener las formaciones agregadas
                                                    $idiomas = "SELECT * FROM cv_idiomas WHERE cuenta = '".$alumno."'";
                                                    $estadoid = $connect->prepare($idiomas);
                                                    $estadoid->execute();
                                                    $resid = $estadoid->fetchAll();

                                                    foreach ($resid as $rowid){
                                                        echo '
                                                        <li class="list-group-item">
                                                        <button type="button" class="close delete" id="'.$rowid['id_idiomas'].'" table="cv_idiomas" lista="idiomas_list" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <div class="float-right">
                                                        Nivel: '.$rowid['nivel'].'</div>
                                                        <i class="fas fa-language"></i>
                                                        '.$rowid['idioma'].'
                                                        </li>
                                                        ';
                                                    }
                                                    
                                                    //echo $formaciones;
                                                ?>
                                                </ul>
                                            </div>
                                           
                                            </div>
                                        </div>    
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br><br><br>            

                                                    </div>
                                        </div><!--termna body card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                                             


     

<?php
include('../../inc/pie_nuevo.php');
?>


<script>
 
    $(document).ready( function () 
	{
        $('#pills-tab a:first').tab('show');
        
        //alert('ok');
    });

    
    $('#add_idioma').on('click', function (event) {
        event.preventDefault();
        var frm = $('#form_idiomas');
        //console.log(frm.serialize());
        $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/inc/guardar_cv_idioma.php',
            data: frm.serialize(),
            success: function(data){
                Swal.fire({
                    type: 'success',
                    title: data,
                    showConfirmButton: false,
                    timer: 2000
                })
                document.getElementById('form_idiomas').reset();
                //actualizar 
                $('#idiomas_list').load(location.href + ' #idiomas_list>*', "");
            }
        });
    });

    $('#add_interes').on('click', function (event) {
        event.preventDefault();
        var frm = $('#form_intereses');
        //console.log(frm.serialize());
        $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/inc/guardar_cv_interes.php',
            data: frm.serialize(),
            success: function(data){
                Swal.fire({
                    type: 'success',
                    title: data,
                    showConfirmButton: false,
                    timer: 2000
                })
                document.getElementById('form_intereses').reset();
                //actualizar 
                $('#intereses_list').load(location.href + ' #intereses_list>*', "");
            }
        });
    });

    $('#add_habilidad').on('click', function (event) {
        event.preventDefault();
        var frm = $('#form_habilidades');
        //console.log(frm.serialize());
        $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/inc/guardar_cv_habilidades.php',
            data: frm.serialize(),
            success: function(data){
                Swal.fire({
                    type: 'success',
                    title: data,
                    showConfirmButton: false,
                    timer: 2000
                })
                document.getElementById('form_habilidades').reset();
                //actualizar 
                $('#habilidades_list').load(location.href + ' #habilidades_list>*', "");
            }
        });
    });

    //botones para eliminar
    $('.delete').on('click', function (event){
        var id = this.id;
        var table = $(this).attr("table");
        var lista = $(this).attr("lista");
        console.log(id + " " + table);
        //alert(id + " " + table);
        Swal.fire({
            title: '¿Seguro de eliminar?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: 'http://facite.uas.edu.mx/alumnos/inc/eliminar_cv_info.php',
                    data: {'txt_tabla': table, 'txt_id': id},
                    success: function(data){
                        //console.log(data);
                        $('#'+lista).load(location.href + ' #'+lista+'>*', "");
                        Swal.fire({
                            type: 'success',
                            title: data,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            }
        
        })

    });

    $('#add_experiencia').on('click', function (event) {
        event.preventDefault();
        var frm = $('#form_experiencia');
        //alert(frm.serialize());
        //console.log(frm.serialize());
        $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/inc/guardar_cv_experiencia.php',
            data: frm.serialize(),
            success: function(data){
                Swal.fire({
                    type: 'success',
                    title: data,
                    showConfirmButton: false,
                    timer: 2000
                })
                document.getElementById('form_experiencia').reset();
                //actualizar 
                $('#experiencia_list').load(location.href + ' #experiencia_list>*', "");
            }
        });
    });


    //evento boton agregar formacion
    $('#add_formacion').on('click', function (event) {
        event.preventDefault();
        var frm = $('#form_formacion_academica');
        //alert(frm.serialize());
        //console.log(frm.serialize());
        $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/inc/guardar_cv_formacion.php',
            data: frm.serialize(),
            success: function(data){
                Swal.fire({
                    type: 'success',
                    title: data,
                    showConfirmButton: false,
                    timer: 2000
                })
                document.getElementById('form_formacion_academica').reset();
                //actualizar 
                $('#formacion_list').load(location.href + ' #formacion_list>*', "");
            }
        });

    });

    $('#btn_guardar_datos').on('click', function (event) {
        event.preventDefault();
        //var pass = $('#new-password').val();
        //var rep_pass = $('#confirm-password').val();
        var frm = $('#form-datos');

        $.ajax({
            type: 'POST',
            url: 'http://facite.uas.edu.mx/alumnos/inc/guardar_cv_datos.php',
            data: frm.serialize(),
            success: function(data){
                Swal.fire({
                    type: 'success',
                    title: data,
                    showConfirmButton: false,
                    timer: 2000
                })
                //document.getElementById('form-datos').reset();
            }
        });
    });


</script>
