<?php session_start();
include "inc/conexion.php";
$alumno = $_SESSION['cuenta'];

 //hacemos la consulta a la base de datos
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
  

  //consultamos para obtener la informacion de experiencia
  $query_experiencia = "SELECT * FROM cv_experiencia WHERE cuenta ='".$alumno."'";
  $estado_experiencia = $connect->prepare($query_experiencia);
  $estado_experiencia->execute();
 

  //consultamos para obtener la informacion de habilidades
  $query_habilidades = "SELECT * FROM cv_habilidades WHERE cuenta ='".$alumno."'";
  $estado_habilidades = $connect->prepare($query_habilidades);
  $estado_habilidades->execute();
 

  //consultamos para obtener la informacion de los intereses
  $query_intereses = "SELECT * FROM cv_intereses WHERE cuenta ='".$alumno."'";
  $estado_intereses = $connect->prepare($query_intereses);
  $estado_intereses->execute();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CV</title>
<link type="text/css" rel="stylesheet" href="css/blue.css" />
<link type="text/css" rel="stylesheet" href="css/print.css" media="print"/>
<!--[if IE 7]>
<link href="css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/cufon.yui.js"></script>
<script type="text/javascript" src="js/scrollTo.js"></script>
<script type="text/javascript" src="js/myriad.js"></script>
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
		Cufon.replace('h1,h2');
</script>
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
  <div class="wrapper-top"></div>
  <div class="wrapper-mid">
    <!-- Begin Paper -->
    <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">
          <!-- Begin Image -->
          <img class="portrait" src="images/image.jpg" alt="John Smith" />
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="self">
            <h1 class="name"><?php echo $nom." ".$ap; ?> </h1><br />
            <ul>
              <li class="ad"><?php echo $dir; ?></li>
              <li class="ad"><?php echo $ciudad; ?></li>
              <li class="mail"><?php echo $correo; ?></li>
              <li class="tel"><?php echo $tel; ?></li>
            </ul>
          </div>
          <!-- End Personal Information -->
          <!-- Begin Social -->
          <div class="social">
            <ul>
              <li><a class='north' href="#" title="Download .pdf"><img src="images/icn-save.jpg" alt="Download the pdf version" /></a></li>
              <li><a class='north' href="javascript:window.print()" title="Print"><img src="images/icn-print.jpg" alt="" /></a></li>
              <li><a class='north' id="contact" href="contact/index.html" title="Contact Me"><img src="images/icn-contact.jpg" alt="" /></a></li>
              <li><a class='north' href="#" title="Follow me on Twitter"><img src="images/icn-twitter.jpg" alt="" /></a></li>
              <li><a class='north' href="#" title="My Facebook Profile"><img src="images/icn-facebook.jpg" alt="" /></a></li>
            </ul>
          </div>
          <!-- End Social -->
        </div>
        <!-- Begin 1st Row -->
        <div class="entry">
          <h2>Perfil</h2>
          <p><?php echo $perfil; ?></p>
        </div>
        <!-- End 1st Row -->
        <!-- Begin 2nd Row -->
        <div class="entry">
          <h2>Educacion</h2>
          <?php  
                $res_formacion = $estado_formacion->fetchAll();
                foreach ($res_formacion as $row_formacion){
                $formacion_f    = $row_formacion['formacion'];
                $institucion_f  = $row_formacion['institucion'];
                $localidad_f    = $row_formacion['localidad'];
                $desdem_f       = $row_formacion['desde_m'];
                $desdea_f       = $row_formacion['desde_a'];
                $hastam_f       = $row_formacion['hasta_m'];
                $hastaa_f       = $row_formacion['hasta_a'];

                echo '
                    <div class="content">
                        <h3>'.$desdem_f.' '.$desdea_f.' - '.$hastam_f.' '.$hastaa_f.'</h3>
                        <p>'.$institucion_f.', '.$localidad_f.' <br />
                        <em>'.$formacion_f.'</em></p>
                    </div>
                    ';

            }
          ?>
        </div>
        <!-- End 2nd Row -->
        <!-- Begin 3rd Row -->
        <div class="entry">
          <h2>EXPERIENCE</h2>
          <div class="content">
            <h3>May 2009 - Feb 2010</h3>
            <p>Agency Creative, London <br />
              <em>Senior Web Designer</em></p>
            <ul class="info">
              <li>Vestibulum eu ante massa, sed rhoncus velit.</li>
              <li>Pellentesque at lectus in <a href="#">libero dapibus</a> cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.</li>
            </ul>
          </div>
          <div class="content">
            <h3>Jun 2007 - May 2009</h3>
            <p>Junior Web Designer <br />
              <em>Bachelor of Science in Graphic Design</em></p>
            <ul class="info">
              <li>Sed fermentum sollicitudin interdum. Etiam imperdiet sapien in dolor rhoncus a semper tortor posuere. </li>
              <li>Pellentesque at lectus in libero dapibus cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.</li>
            </ul>
          </div>
        </div>
        <!-- End 3rd Row -->
        <!-- Begin 4th Row -->
        <div class="entry">
          <h2>SKILLS</h2>
          <div class="content">
            <h3>Software Knowledge</h3>
            <ul class="skills">
              <li>Photoshop</li>
              <li>Illustrator</li>
              <li>InDesign</li>
              <li>Flash</li>
              <li>Fireworks</li>
              <li>Dreamweaver</li>
              <li>After Effects</li>
              <li>Cinema 4D</li>
              <li>Maya</li>
            </ul>
          </div>
          <div class="content">
            <h3>Languages</h3>
            <ul class="skills">
              <li>CSS/XHTML</li>
              <li>PHP</li>
              <li>JavaScript</li>
              <li>Ruby on Rails</li>
              <li>ActionScript</li>
              <li>C++</li>
            </ul>
          </div>
        </div>
        <!-- End 4th Row -->
         <!-- Begin 5th Row -->
        <div class="entry">
        <!--<h2>WORKS</h2>
        	<ul class="works">
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/2.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/3.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/2.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/3.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        	</ul>-->
        </div>
        <!-- Begin 5th Row -->
      </div>
      <div class="clear"></div>
      <div class="paper-bottom"></div>
    </div>
    <!-- End Paper -->
  </div>
  <div class="wrapper-bottom"></div>
</div>
<div id="message"><a href="#top" id="top-link">Go to Top</a></div>
<!-- End Wrapper -->
</body>
</html>
