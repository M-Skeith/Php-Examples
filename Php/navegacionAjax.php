<?php

function cargar_backup()
{
?>
	<div id="editar_usuarios" class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil-square-o fa-fw"></i> Cargar la base de datos</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
					<form action="#" id="carga_form" method="post">
						<SELECT NAME="fichero" class="form-control" style="width:50%;float:left;" SIZE="1">
						<?php obtener_cargas(); ?>
						</SELECT>					
					<br><br><br>
					<input class="btn btn-info" type="submit" id="btn_insertar" name='enviar_editar' value="Cargar">
					</form>
                </div>
				<div id="rc_genera"> </div>
            </div>	
        </div>
    </div>
<?php
}

function obtener_cargas()
{
	// Ruta Actual
	@$directorio = opendir("assets/sql/");
	echo 'd:'.$directorio;
	// Obtenemos un archivo y luego otro sucesivamente
	while (@$archivo = readdir($directorio)) 
	{
		echo "archivo";
		// Verificamos si es o no un directorio
		if (is_dir($archivo))
		{
			// De ser un directorio lo envolvemos entre corchetes
			echo "[".$archivo . "]<br />"; 
		}
		else
		{
			$ruta = 'sql/'.$archivo;
			echo "<OPTION VALUE='$ruta'>".$archivo."</OPTION>";
		}
	}
}

?>