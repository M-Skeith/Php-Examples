<?php
// Conectamos a la base de datos
require_once('../conexion.php');
backup_tables();

// En la variable $tables se pueden informar las tablas especificas separadas por comas:
// articulos,juegos,comentarios
// Con el asterisco '*' respaldará toda la base de datos

function backup_tables($tables = '*')
{
   mysql_query ("SET NAMES 'utf8'");  
   // Obtiene todas las tablas
   if($tables == '*')
   {
      $tables = array();
      $result = mysql_query('SHOW TABLES');
      while($row = mysql_fetch_row($result))
      {
         $tables[] = $row[0];
      }
   }
   else
   {
	  // Obtiene las tablas indicadas en la entrada (Separadas por comas)
      $tables = is_array($tables) ? $tables : explode(',',$tables);
   }
   // Bucle para crear el respaldo
   foreach($tables as $table)
   {
      $result = mysql_query('SELECT * FROM '.$table);
      $num_fields = mysql_num_fields($result);
      
      $return.= 'DROP TABLE '.$table.';';
      $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
    for ($i = 0; $i < $num_fields; $i++)
      {
         while($row = mysql_fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               @$row[$j] = ereg_replace("\n","\\n",$row[$j]);
               if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
               if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }
   // Guarda el fichero SQL
   $handle = fopen('db-backup-'.date('Y-m-d').'.sql','w+');
   fwrite($handle,$return);
   fclose($handle);
}
?>