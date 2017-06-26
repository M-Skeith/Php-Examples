<?php
// Nota: Las funciones mysql_XX están obsoletas desde la versión de PHP 5.0 y eliminadas en PHP 7.0.0
// Nota2: En caso de tener una version de PHP no compatible usad mysqli::
// Datos de la base de datos.
$host = "host.bbdd";
$database = "databaseName";
$user = "userName";
$password = "passwordBBDD";


// Automáticamente inicia sesión a la BBDD sin necesidad de llamar a función
// Ésto lo hacemos para que sólo sea necesario hacer el require_once("Php/conexion.php"); al inicio.
$link = mysql_connect ($host, $user, $password);
mysql_select_db($database, $link);	

// Función para cerrar la conexion a la BBDD
function cierraBBDD()
{
	mysql_close($link);
}

?>
