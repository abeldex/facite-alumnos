<?php
	$directorio = '../sistema/file-upload/';
	$gestor_dir = opendir($directorio);
	$archivos = '';
	while (false !== ($nombre_fichero = readdir($gestor_dir))) {
	    $ficheros[] = $nombre_fichero;
	    $rutaArchivo = 'file-upload/'.$nombre_fichero;
	    $archivos .='<br><a target="_blank" href="'.$rutaArchivo.'" >'.$nombre_fichero.'</a>';
 
	}
echo $archivos;
?>