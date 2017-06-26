<?php
    header("Content-Type: text/html;charset=utf-8");
    // array respuesta JSON
    $response = array();
    // conexion a a bd 
    require_once ('conexion.php');

    if (isset($_GET['op'])){  
        
		if ($_GET['op'])=="1")
		{
			$result = mysql_query("SELECT * FROM juegos order by nombre");
			
			if (mysql_num_rows($result) > 0) {
				$response["nombre"] = array();
				$response["portada"] = array();
				$response["genero"] = array();
				
				while ($row = mysql_fetch_array($result)) {
					$varNombre = $row["nombre"];
					$varPortada = $row["portada"];
					$varGenero = $row["genero"];
					
					array_push($response["nombre"], $varNombre);
					array_push($response["portada"], $varPortada);
					array_push($response["genero"], $varGenero);
				}
				$response["success"] = 1;
				$response["message"] = "OK";
			}else{
				$response["success"] = 3;
				$response["message"] = "No hay juegos";
			}
			
			mysql_close();
			echo json_encode($response);
		}
    }
    else {
        // faltan campos
        $response["success"] = 0;
        $response["message"] = "ERROR, faltan campos para la consulta";
        
        echo json_encode($response);
        mysql_close();
    }
?>
