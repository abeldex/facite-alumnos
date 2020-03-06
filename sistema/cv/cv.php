<?php session_start();

ini_set('display_errors',1); 
error_reporting(E_ALL);
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

<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:"Calibri Light";
	panose-1:2 15 3 2 2 2 4 3 2 4;}
@font-face
	{font-family:Consolas;
	panose-1:2 11 6 9 2 2 4 3 2 4;}
@font-face
	{font-family:"Segoe UI";
	panose-1:2 11 5 2 4 2 4 2 2 3;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:0cm;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
h1
	{mso-style-link:"T�tulo 1 Car";
	margin-top:12.0pt;
	margin-right:0cm;
	margin-bottom:2.0pt;
	margin-left:0cm;
	page-break-after:avoid;
	font-size:16.0pt;
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;}
h1.CxSpFirst
	{mso-style-link:"T�tulo 1 Car";
	margin-top:12.0pt;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:0cm;
	margin-bottom:.0001pt;
	page-break-after:avoid;
	font-size:16.0pt;
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;}
h1.CxSpMiddle
	{mso-style-link:"T�tulo 1 Car";
	margin:0cm;
	margin-bottom:.0001pt;
	page-break-after:avoid;
	font-size:16.0pt;
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;}
h1.CxSpLast
	{mso-style-link:"T�tulo 1 Car";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:2.0pt;
	margin-left:0cm;
	page-break-after:avoid;
	font-size:16.0pt;
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;}
h2
	{mso-style-link:"T�tulo 2 Car";
	margin:0cm;
	margin-bottom:.0001pt;
	page-break-after:avoid;
	font-size:13.0pt;
	font-family:"Calibri",sans-serif;
	color:#77448B;}
h3
	{mso-style-link:"T�tulo 3 Car";
	margin:0cm;
	margin-bottom:.0001pt;
	page-break-after:avoid;
	font-size:12.0pt;
	font-family:"Calibri",sans-serif;
	color:#4C4C4C;
	text-transform:uppercase;
	font-weight:normal;}
p.MsoHeading8, li.MsoHeading8, div.MsoHeading8
	{mso-style-link:"T�tulo 8 Car";
	margin-top:2.0pt;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:0cm;
	margin-bottom:.0001pt;
	page-break-after:avoid;
	font-size:9.0pt;
	font-family:"Calibri",sans-serif;
	color:#272727;}
p.MsoHeading9, li.MsoHeading9, div.MsoHeading9
	{mso-style-link:"T�tulo 9 Car";
	margin-top:2.0pt;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:0cm;
	margin-bottom:.0001pt;
	page-break-after:avoid;
	font-size:9.0pt;
	font-family:"Calibri",sans-serif;
	color:#272727;
	font-style:italic;}
p.MsoFootnoteText, li.MsoFootnoteText, div.MsoFootnoteText
	{mso-style-link:"Texto nota pie Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoCommentText, li.MsoCommentText, div.MsoCommentText
	{mso-style-link:"Texto comentario Car";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:0cm;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-link:"Encabezado Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-link:"Pie de p�gina Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoCaption, li.MsoCaption, div.MsoCaption
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#111111;
	font-style:italic;}
p.MsoEnvelopeReturn, li.MsoEnvelopeReturn, div.MsoEnvelopeReturn
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:"Calibri",sans-serif;
	color:#4C4C4C;}
p.MsoEndnoteText, li.MsoEndnoteText, div.MsoEndnoteText
	{mso-style-link:"Texto nota al final Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoMacroText, li.MsoMacroText, div.MsoMacroText
	{mso-style-link:"Texto macro Car";
	margin-top:4.0pt;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:0cm;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:Consolas;
	color:#3B2245;
	font-weight:bold;}
p.MsoListBullet, li.MsoListBullet, div.MsoListBullet
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:18.0pt;
	text-indent:-18.0pt;
	line-height:106%;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoListBulletCxSpFirst, li.MsoListBulletCxSpFirst, div.MsoListBulletCxSpFirst
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:18.0pt;
	margin-bottom:.0001pt;
	text-indent:-18.0pt;
	line-height:106%;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoListBulletCxSpMiddle, li.MsoListBulletCxSpMiddle, div.MsoListBulletCxSpMiddle
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:18.0pt;
	margin-bottom:.0001pt;
	text-indent:-18.0pt;
	line-height:106%;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoListBulletCxSpLast, li.MsoListBulletCxSpLast, div.MsoListBulletCxSpLast
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:18.0pt;
	text-indent:-18.0pt;
	line-height:106%;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoListNumber, li.MsoListNumber, div.MsoListNumber
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:18.0pt;
	text-indent:-18.0pt;
	line-height:106%;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoListNumberCxSpFirst, li.MsoListNumberCxSpFirst, div.MsoListNumberCxSpFirst
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:18.0pt;
	margin-bottom:.0001pt;
	text-indent:-18.0pt;
	line-height:106%;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoListNumberCxSpMiddle, li.MsoListNumberCxSpMiddle, div.MsoListNumberCxSpMiddle
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:18.0pt;
	margin-bottom:.0001pt;
	text-indent:-18.0pt;
	line-height:106%;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoListNumberCxSpLast, li.MsoListNumberCxSpLast, div.MsoListNumberCxSpLast
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:18.0pt;
	text-indent:-18.0pt;
	line-height:106%;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoTitle, li.MsoTitle, div.MsoTitle
	{mso-style-link:"T�tulo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:33.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#111111;
	text-transform:uppercase;}
p.MsoTitleCxSpFirst, li.MsoTitleCxSpFirst, div.MsoTitleCxSpFirst
	{mso-style-link:"T�tulo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:33.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#111111;
	text-transform:uppercase;}
p.MsoTitleCxSpMiddle, li.MsoTitleCxSpMiddle, div.MsoTitleCxSpMiddle
	{mso-style-link:"T�tulo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:33.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#111111;
	text-transform:uppercase;}
p.MsoTitleCxSpLast, li.MsoTitleCxSpLast, div.MsoTitleCxSpLast
	{mso-style-link:"T�tulo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:33.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#111111;
	text-transform:uppercase;}
p.MsoSubtitle, li.MsoSubtitle, div.MsoSubtitle
	{mso-style-link:"Subt�tulo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:33.0pt;
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;
	font-weight:bold;}
p.MsoSubtitleCxSpFirst, li.MsoSubtitleCxSpFirst, div.MsoSubtitleCxSpFirst
	{mso-style-link:"Subt�tulo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:33.0pt;
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;
	font-weight:bold;}
p.MsoSubtitleCxSpMiddle, li.MsoSubtitleCxSpMiddle, div.MsoSubtitleCxSpMiddle
	{mso-style-link:"Subt�tulo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:33.0pt;
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;
	font-weight:bold;}
p.MsoSubtitleCxSpLast, li.MsoSubtitleCxSpLast, div.MsoSubtitleCxSpLast
	{mso-style-link:"Subt�tulo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:33.0pt;
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;
	font-weight:bold;}
p.MsoBodyText3, li.MsoBodyText3, div.MsoBodyText3
	{mso-style-link:"Texto independiente 3 Car";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:6.0pt;
	margin-left:0cm;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.MsoBodyTextIndent3, li.MsoBodyTextIndent3, div.MsoBodyTextIndent3
	{mso-style-link:"Sangr�a 3 de t\. independiente Car";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:6.0pt;
	margin-left:18.0pt;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
em
	{color:#4C4C4C;
	font-weight:normal;
	font-style:normal;}
p.MsoDocumentMap, li.MsoDocumentMap, div.MsoDocumentMap
	{mso-style-link:"Mapa del documento Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:"Segoe UI",sans-serif;
	color:#4C4C4C;}
p.MsoPlainText, li.MsoPlainText, div.MsoPlainText
	{mso-style-link:"Texto sin formato Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:Consolas;
	color:#4C4C4C;}
code
	{font-family:Consolas;}
kbd
	{font-family:Consolas;}
pre
	{mso-style-link:"HTML con formato previo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:Consolas;
	color:#4C4C4C;}
tt
	{font-family:Consolas;}
p.MsoCommentSubject, li.MsoCommentSubject, div.MsoCommentSubject
	{mso-style-link:"Asunto del comentario Car";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:0cm;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;
	font-weight:bold;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-link:"Texto de globo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:9.0pt;
	font-family:"Segoe UI",sans-serif;
	color:#4C4C4C;}
span.MsoPlaceholderText
	{color:gray;}
p.MsoQuote, li.MsoQuote, div.MsoQuote
	{mso-style-link:"Cita Car";
	margin-top:10.0pt;
	margin-right:0cm;
	margin-bottom:8.0pt;
	margin-left:0cm;
	text-align:center;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#404040;
	font-style:italic;}
p.MsoIntenseQuote, li.MsoIntenseQuote, div.MsoIntenseQuote
	{mso-style-link:"Cita destacada Car";
	margin-top:18.0pt;
	margin-right:0cm;
	margin-bottom:18.0pt;
	margin-left:0cm;
	text-align:center;
	border:none;
	padding:0cm;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#77448B;
	font-style:italic;}
span.MsoIntenseReference
	{font-variant:small-caps;
	color:#77448B;
	text-transform:none;
	letter-spacing:0pt;
	font-weight:bold;}
span.MsoBookTitle
	{letter-spacing:0pt;
	font-weight:bold;
	font-style:italic;}
p.MsoTocHeading, li.MsoTocHeading, div.MsoTocHeading
	{margin-top:12.0pt;
	margin-right:0cm;
	margin-bottom:2.0pt;
	margin-left:0cm;
	page-break-after:avoid;
	font-size:16.0pt;
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;
	font-weight:bold;}
span.Ttulo1Car
	{mso-style-name:"T�tulo 1 Car";
	mso-style-link:"T�tulo 1";
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;
	font-weight:bold;}
span.Ttulo2Car
	{mso-style-name:"T�tulo 2 Car";
	mso-style-link:"T�tulo 2";
	font-family:"Calibri",sans-serif;
	color:#77448B;
	font-weight:bold;}
span.Ttulo3Car
	{mso-style-name:"T�tulo 3 Car";
	mso-style-link:"T�tulo 3";
	font-family:"Calibri",sans-serif;
	text-transform:uppercase;}
span.HTMLconformatoprevioCar
	{mso-style-name:"HTML con formato previo Car";
	mso-style-link:"HTML con formato previo";
	font-family:Consolas;}
p.msonormal0, li.msonormal0, div.msonormal0
	{mso-style-name:msonormal;
	margin-right:0cm;
	margin-left:0cm;
	font-size:12.0pt;
	font-family:"Times New Roman",serif;}
span.Ttulo8Car
	{mso-style-name:"T�tulo 8 Car";
	mso-style-link:"T�tulo 8";
	font-family:"Calibri",sans-serif;
	color:#272727;}
span.Ttulo9Car
	{mso-style-name:"T�tulo 9 Car";
	mso-style-link:"T�tulo 9";
	font-family:"Calibri",sans-serif;
	color:#272727;
	font-style:italic;}
span.TextonotapieCar
	{mso-style-name:"Texto nota pie Car";
	mso-style-link:"Texto nota pie";}
span.TextocomentarioCar
	{mso-style-name:"Texto comentario Car";
	mso-style-link:"Texto comentario";}
span.EncabezadoCar
	{mso-style-name:"Encabezado Car";
	mso-style-link:Encabezado;}
span.PiedepginaCar
	{mso-style-name:"Pie de p�gina Car";
	mso-style-link:"Pie de p�gina";}
span.TextonotaalfinalCar
	{mso-style-name:"Texto nota al final Car";
	mso-style-link:"Texto nota al final";}
span.TextomacroCar
	{mso-style-name:"Texto macro Car";
	mso-style-link:"Texto macro";
	font-family:Consolas;
	color:#3B2245;
	font-weight:bold;}
span.TtuloCar
	{mso-style-name:"T�tulo Car";
	mso-style-link:T�tulo;
	font-family:"Times New Roman",serif;
	color:#111111;
	text-transform:uppercase;}
span.SubttuloCar
	{mso-style-name:"Subt�tulo Car";
	mso-style-link:Subt�tulo;
	font-family:"Calibri",sans-serif;
	color:#111111;
	text-transform:uppercase;
	font-weight:bold;}
span.Textoindependiente3Car
	{mso-style-name:"Texto independiente 3 Car";
	mso-style-link:"Texto independiente 3";}
span.Sangra3detindependienteCar
	{mso-style-name:"Sangr�a 3 de t\. independiente Car";
	mso-style-link:"Sangr�a 3 de t\. independiente";}
span.MapadeldocumentoCar
	{mso-style-name:"Mapa del documento Car";
	mso-style-link:"Mapa del documento";
	font-family:"Segoe UI",sans-serif;}
span.TextosinformatoCar
	{mso-style-name:"Texto sin formato Car";
	mso-style-link:"Texto sin formato";
	font-family:Consolas;}
span.AsuntodelcomentarioCar
	{mso-style-name:"Asunto del comentario Car";
	mso-style-link:"Asunto del comentario";
	font-weight:bold;}
span.TextodegloboCar
	{mso-style-name:"Texto de globo Car";
	mso-style-link:"Texto de globo";
	font-family:"Segoe UI",sans-serif;}
span.CitaCar
	{mso-style-name:"Cita Car";
	mso-style-link:Cita;
	color:#404040;
	font-style:italic;}
span.CitadestacadaCar
	{mso-style-name:"Cita destacada Car";
	mso-style-link:"Cita destacada";
	color:#77448B;
	font-style:italic;}
p.Informacindecontacto, li.Informacindecontacto, div.Informacindecontacto
	{mso-style-name:"Informaci�n de contacto";
	margin-top:2.0pt;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:0cm;
	margin-bottom:.0001pt;
	text-align:right;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
p.Iconos, li.Iconos, div.Iconos
	{mso-style-name:Iconos;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:1.0pt;
	margin-left:0cm;
	text-align:center;
	font-size:9.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
.MsoChpDefault
	{font-size:10.0pt;
	font-family:"Calibri Light",sans-serif;
	color:#4C4C4C;}
 /* Page Definitions */
 @page WordSection1
	{size:595.3pt 841.9pt;
	margin:36.0pt 72.0pt 54.0pt 108.0pt;}
div.WordSection1
	{page:WordSection1;}
 /* List Definitions */
 ol
	{margin-bottom:0cm;}
ul
	{margin-bottom:0cm;}
-->
</style>

</head>

<body lang=ES-MX>

<div class=WordSection1>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 summary="La primera tabla es la tabla de dise�o del nombre y de la informaci�n de contacto. La segunda tabla es la tabla del objetivo"
 width="100%" style='width:100.0%;margin-left:.25pt;border-collapse:collapse;
 border:none'>
 <tr style='height:97.2pt'>
  <td width=326 valign=bottom style='width:244.8pt;padding:0cm 7.2pt 34.55pt 0cm;
  height:97.2pt'>
  <p class=MsoTitle><span lang=ES> <?php echo $nom ?>  </span></p>
  <p class=MsoSubtitle><span lang=ES><?php echo $ap ?></span></p>
  </td>
  <td width=250 valign=bottom style='width:187.2pt;padding:0cm 0cm 34.55pt 7.2pt;
  height:97.2pt'>
  <p class=Informacindecontacto><span lang=ES><?php echo $dir ?></span><span lang=ES> </span><span
  lang=ES><img width=12 height=12 id="Icono de direcci�n"
  src="cv_archivos/image001.png" alt="Icono de direcci�n"></span></p>
  <p class=Informacindecontacto><span lang=ES><?php echo $ciudad ?></span><span lang=ES> </span><span
  lang=ES></span></p>
  <p class=Informacindecontacto><span lang=ES><?php echo $tel ?></span><span lang=ES> </span><span
  lang=ES><img width=12 height=12 id="Icono de tel�fono"
  src="cv_archivos/image002.png" alt="Icono de tel�fono"></span></p>
  <p class=Informacindecontacto><span lang=ES><?php echo $correo ?></span><span
  lang=ES></span><span lang=ES><img width=14 height=10 id="Forma libre 5"
  src="cv_archivos/image003.png" alt="Icono de correo electr�nico"></span></p>
  </td>
 </tr>
</table>

<table class=MsoTable15Plain2 border=0 cellspacing=0 cellpadding=0
 summary="La primera tabla es la tabla de dise�o del nombre y de la informaci�n de contacto. La segunda tabla es la tabla del objetivo"
 width="108%" style='width:108.5%;margin-left:-36.0pt;border-collapse:collapse;
 border:none'>
 <tr>
  <td width=49 valign=bottom style='width:36.5pt;border:none;border-bottom:
  solid #7F7F7F 1.0pt;padding:0cm 10.8pt 0cm 0cm'>
  <p class=Iconos><b><span lang=ES><img width=29 height=29
  id="Icono en un c�rculo de Objetivo" src="cv_archivos/image006.png"
  alt="Icono de Objetivo"></span></b></p>
  </td>
  <td width=576 valign=bottom style='width:432.2pt;border:none;border-bottom:
  solid #7F7F7F 1.0pt;padding:0cm 0cm 0cm 0cm'>
  <h1><span lang=ES style='font-weight:normal'><b>Perfil</b></span></h1>
  </td>
 </tr>
</table>

<p class=MsoNormal><span lang=ES><?php echo $perfil ?></span></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 summary="Tabla de dise�o del apartado Educaci�n" width="108%"
 style='width:108.5%;margin-left:-36.0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=48 valign=bottom style='width:36.0pt;padding:0cm 10.8pt 0cm 0cm'>
  <p class=Iconos><span lang=ES><img width=29 height=29
  id="Icono en un c�rculo de Educaci�n" src="cv_archivos/image007.png"
  alt="Icono de Educaci�n"></span></p>
  </td>
  <td width=572 valign=top style='width:429.35pt;padding:0cm 0cm 0cm 0cm'>
  <h1><span lang=ES>Formación Académica</span></h1>
  </td>
 </tr>
</table>

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
        <h2><span lang=ES>'.$formacion_f.'</span><span lang=ES> | </span><em><b><span
        lang=ES style="color:#77448B"><span style="color:windowtext">'.$institucion_f.'</span></span></b></em></h2>

        <h3><span lang=ES>'.$desdem_f.' </span><span lang=ES>'.$desdea_f.' </span> - <span
        lang=ES>'.$hastam_f.'</span> '.$hastaa_f.'</h3>

        <p class=MsoNormal><span lang=ES>'.$localidad_f.'</span></p>';

   }

?>


<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 summary="Tabla de dise�o de Experiencia" width="108%" style='width:108.5%;
 margin-left:-36.0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=48 valign=bottom style='width:36.0pt;padding:0cm 10.8pt 0cm 0cm'>
  <p class=Iconos><span lang=ES><img width=29 height=29
  id="Icono en un c�rculo de Experiencia" src="cv_archivos/image008.png"
  alt="Icono de Experiencia"></span></p>
  </td>
  <td width=572 valign=top style='width:429.35pt;padding:0cm 0cm 0cm 0cm'>
  <h1><span lang=ES>Experiencia Laboral</span></h1>
  </td>
 </tr>
</table>

<?php  
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

        echo "
      <h2><span lang=ES>".$cargo_e."</span><span lang=ES> | </span><em><b><span lang=ES
        style='color:#77448B'><span style='color:windowtext'>".$empresa_e."</span></span></b></em></h2>

        <h3><span lang=ES>".$desdem_e." </span><span lang=ES>".$desdea_e."</span> - <span
        lang=ES>".$hastam_e." </span>".$hastaa_e."</h3>

        <p class=MsoNormal><span lang=ES>".$descripcion_e."</span></p>
        
        ";
    }

?>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 summary="La tabla superior tiene el encabezado de las aptitudes; la segunda tabla, la lista de las aptitudes, y la tabla inferior, las actividades"
 width="108%" style='width:108.5%;margin-left:-36.0pt;border-collapse:collapse;
 border:none'>
 <tr>
  <td width=48 valign=bottom style='width:36.0pt;padding:0cm 10.8pt 0cm 0cm'>
  <p class=Iconos><span lang=ES><img width=29 height=29
  id="Icono en un c�rculo de Aptitudes" src="cv_archivos/image009.png"
  alt="Icono de Aptitudes"></span></p>
  </td>
  <td width=572 valign=top style='width:429.35pt;padding:0cm 0cm 0cm 0cm'>
  <h1><span lang=ES>Habilidades y Aptitudes</span></h1>
  </td>
 </tr>
</table>

<table class=MsoTableGridLight border=0 cellspacing=0 cellpadding=0
 summary="La tabla superior tiene el encabezado de las aptitudes; la segunda tabla, la lista de las aptitudes, y la tabla inferior, las actividades"
 width="100%" style='width:100.0%;border-collapse:collapse;border:none'>
 <tr>
    <?php
    $res_habilidades = $estado_habilidades->fetchAll();
    foreach ($res_habilidades as $row_habilidades){
        $descripcion_habilidad    =  $row_habilidades['descripcion'];
        $nivel_habilidad          =  $row_habilidades['nivel'];

        echo "
        <td width=288 valign=top style='width:216.0pt;padding:0cm 0cm 0cm 0cm'>
        <p class=MsoListBulletCxSpFirst><span lang=ES style='font-family:Symbol;
        color:#77448B'>•<span style='font:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span></span><span lang=ES>".$descripcion_habilidad." | Nivel: ".$nivel_habilidad."</span></p> 
        </td>
        ";
    }

    ?>
 </tr>
</table>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 summary="La tabla superior tiene el encabezado de las aptitudes; la segunda tabla, la lista de las aptitudes, y la tabla inferior, las actividades"
 width="108%" style='width:108.5%;margin-left:-36.0pt;border-collapse:collapse;
 border:none'>
 <tr>
  <td width=48 valign=bottom style='width:36.25pt;padding:0cm 10.8pt 0cm 0cm'>
  <p class=Iconos><span lang=ES><img width=29 height=29
  id="Icono en un c�rculo de Actividades" src="cv_archivos/image010.png"
  alt="Icono de Actividades"></span></p>
  </td>
  <td width=577 valign=top style='width:432.45pt;padding:0cm 0cm 0cm 0cm'>
  <h1><span lang=ES>Intereses</span></h1>
  </td>
 </tr>
</table>

<?php
        $res_intereses = $estado_intereses->fetchAll();
        foreach ($res_intereses as $row_intereses){
            $descripcion_interes   =  $row_intereses['descripcion'];

        echo "
        <p class=MsoNormal>• <span lang=ES>".$descripcion_interes."</span></p>
        ";
    }

    ?>


</div>

</body>

</html>
