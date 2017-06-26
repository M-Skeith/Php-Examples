<?php 
require_once('conexion.php');
$fichero = $_POST['fichero'];
mysql_query ("SET NAMES 'utf8'");

if (SplitSQL($fichero))
{
	echo 'Carga realizada';
}
else
{
	echo 'Errores en la carga';
}

// Carga una base de datos a partir de un fichero SQL.
function SplitSQL($file, $delimiter = ';')
{
	mysql_query ("SET NAMES 'utf8'");
    set_time_limit(0);

    if (is_file($file) === true)
    {
        $file = fopen($file, 'r');
        if (is_resource($file) === true)
        {
            $query = array();
            while (feof($file) === false)
            {
                $query[] = fgets($file);
                if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1)
                {
                    $query = trim(implode('', $query));
                    if (mysql_query($query) === false)
                    {
                        echo '<h3>ERROR: ' . $query . '</h3>' . "\n";
                    }
                    else
                    {
                        //echo '<h3>SUCCESS: ' . $query . '</h3>' . "\n";
                    }
                    while (ob_get_level() > 0)
                    {
                        ob_end_flush();
                    }
                    flush();
                }
                if (is_string($query) === true)
                {
                    $query = array();
                }
            }
            return fclose($file);
        }
    }
	else
	{
		echo 'El fichero no existe.<br>';
	}
    return false;
}
?>