<?php 
session_start();
// Conectamos a la BBDD
require_once('conexion.php');
mysql_query ("SET NAMES 'utf8'");

// 
$titulo    = 'Noticias de MetalSkeith';	
$context = stream_context_create(array("http" => array("header" => "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36")));
// Obtiene el codigo html que genera newsletter.php para enviarlo por correo
$mensaje = file_get_contents("http://www.metalskeith.es/jxj/newsletter.php", false, $context);	
$cabeceras = 'MIME-Version: 1.0' . "\r\n" .
	'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
	'From: MetalSkeith <skeith@metalskeith.es>' . "\r\n" .
	'Reply-To: skeith@metalskeith.es' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();	

// Busca todas las direcciones de correo registradas al boletín para enviarselo por correo
$resultado = mysql_query("SELECT email FROM newsletter where activo = 'si'");	
$numero_lineas = mysql_num_rows($resultado);
if ($numero_lineas > 0)
{
	$contador = 0;
	while($row = mysql_fetch_array($resultado))
	{
		$posts[$contador]['email'] = $row['email'];
		$contador++;
	}
	$contarows = 0;
	foreach ($posts as $postSuelto) 
	{
		$para =  $postSuelto['email'];					

// Envía los boletines 		
		if (!mail($para, $titulo, $mensaje, $cabeceras))
		{
		echo 'Error al enviar correo a: '.$para.'<br>';
		}
		sleep(20);	
		
			$email =  null;	
			$contarows++;
	}
}	
echo 'Bolet&iacute;n enviado a todos los usuarios';
?>