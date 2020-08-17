<?php
/*  Observación:
PHP scripts run as the user 'nobody'. A typical directory on your account will be owned by your user ID, and you cannot change the owner or group of a directory (this can only be done by the 'root' superuser). To grant a PHP write permissions in a directory owned by you, the only option you have is to set the directory's permissions to 0777 (world-writeable). There is some security risk in this, so you should not set 0777 permissions on more directories than necessary, but this is a "necessary evil" in a shared server environment. 
*/

/* Observacion : instalar paquete php5-gd para Ubuntu... 	*/

	date_default_timezone_get();
	$timezone = date_default_timezone_get();
	$date = date('Y-m-d H:i:s');	
	$dato = $_POST['data'];
	$info = $_POST['info'];

//	exec('Archivos/Programa 2>&1', $salida, $return_value);
//	echo 'Estatus de la ejecucion: '.($return_value == 0 ? 'OK' : 'Error: status code ' . $return_value) . PHP_EOL;
//	echo 'Salida del Programa: ' . PHP_EOL . implode(PHP_EOL, $salida);
	//echo $salida."\n".$dato."\n".$info."\n".$date;
	//echo "Filename: ".$dato."\n"
	echo "Hora Local: ".$date."\n";
	//echo "\nStream de Imagen: \n".$info."\n";
	//echo "\nStream de Imagen: OMITIDO \n";

	//$cadena = "./Archivos/";
	//$cadena = "/var/www/android_app/Archivos/";
	//$cadena = "/opt/lampp/htdocs/android_app/Archivos";
	#$cadena = "/var/www/html/android_app/Archivos/";
	$cadena = "Archivos/";

	$cadena .= $dato;
	$cadena .= "_img.jpg";

//	echo "Chingo a su madre"
//	echo $cadena

	//$dir = 'Archivos';
	//file_put_contents ($dir.'/test.txt', "\n".$dato,FILE_APPEND);

	echo "Imagen Recibida y Decodificada en el Servidor... "."\n";
	//echo "\nJalo con MADRES ";

	// Crean la imagen a partir de lo recibido por el cliente
	$data = base64_decode($info);
	$im = imagecreatefromstring($data);

	// start buffering
	ob_start();
	// output jpeg (or any other chosen) format & quality
	imagejpeg($im, NULL, 85);
	// capture output to string
	$contents = ob_get_contents();
	// end capture
	ob_end_clean();

	// be tidy; free up memory
	imagedestroy($im);

	// lastly (for the example) we are writing the string to a file
	//echo "Jalo con MADRES ";

	$fh = fopen($cadena, "w" );
	if ( !$fh )
		echo "fopen fallo ",$php_errormsg;
	//else
	//	echo "Jalo con MADRES ";

	fwrite( $fh, $contents );
	fclose( $fh );


//	echo exec ('./Archivos/Programa');

	// lastly (for the example) we are writing the string to a file
	
	echo "Imagen Guadarda en el servidor "."\n";
	die ('\nFinalizando...');

	// Checking
	if ($old != umask()) {
		die('An error occurred while changing back the umask');
}



	
?>

