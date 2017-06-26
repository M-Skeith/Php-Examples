<?php
// Conexion a la base de datos
require_once('php/conexion.php');

// Elimina caracteres extraños que me pueden molestar en las cadenas que meto en los item de los RSS
function clrAll($str) 
{
   $str=str_replace("&","&",$str);
   $str=str_replace("&","",$str);
   $str=str_replace(";","",$str);
   $str=str_replace('"','"',$str);
   $str=str_replace('iacute','',$str);
   $str=str_replace('<strong>','',$str);
   $str=str_replace('</strong>','',$str);
   $str=str_replace('<p','',$str);
   $str=str_replace('</p','',$str);
   $str=str_replace('<','',$str);
   $str=str_replace('<p>','',$str);
   $str=str_replace('<p','',$str);
   $str=str_replace('</p','',$str);
   $str=str_replace('</','',$str);
   $str=str_replace('</p>','',$str);
   $str=str_replace("'","'",$str);
   $str=str_replace(">",">",$str);
   $str=str_replace("<","<",$str);
   return $str;
}

// Crear cabeceras desde PHP para decir que devuelvo un XML
header("Content-type: text/xml");
// Inicio del código RSS
echo '<?xml version="1.0" encoding="UTF-8"?>';

// Sentencia SQL para acceder a los últimos 20 artículos publicados
mysql_query ("SET NAMES 'utf8'");
$ssql = "select * from posts order by id desc limit 20";
$result = mysql_query($ssql);

// Cabeceras del RSS
echo '<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd">';
// Datos generales del Canal. Edítalos conforme a tus necesidades
echo "<channel>\n";
echo "<title>Metalskeith</title>";
echo "<link>http://metalskeith.es/</link>";
echo "<description>Rss oficial de Metalskeith</description>";
echo "<language>es-es</language>";
echo "<copyright>http://www.metalskeith.es</copyright>\n";

echo " <image>\n";
echo "    <title>MetalSkeith Logo</title>";
echo "    <url>http://www.metalskeith.es/w-user/images/logo.png</url>";
echo "    <link>http://www.metalskeith.es</link>";
echo "    <width>90</width>";
echo "    <height>36</height>";
echo "  </image>\n";

// Para cada registro encontrado en la base de datos
// Hay que crear la entrada RSS en un item
while ($registro = mysql_fetch_array($result))
{
   // Eliminar caracteres extraños en campos susceptibles de tenerlos
   $titulo=clrAll($registro["titulo"]);        
   $titulo_url = str_ireplace(" ", "_", $titulo);   

   $desc=clrAll(substr($registro["descripcion"], 0, 200));

   echo "<item>\n";
   echo "<title>$titulo</title>\n";
   echo "<description>$desc</description>\n";
	echo "<link>http://www.metalskeith.es/jxj/leer.php?id=".$registro['id']."&amp;p=".$titulo_url."</link>\n";
   echo "<pubDate>". date ( DATE_RSS , strtotime($registro['fecha']) )."</pubDate>\n";
   echo "<enclosure url='".$registro['imagen_post']."' type='image/jpeg' length='0'/>";
   echo "</item>\n";
}

// Cerramos las etiquetas del XML
echo "</channel>";
echo "</rss>";

?>