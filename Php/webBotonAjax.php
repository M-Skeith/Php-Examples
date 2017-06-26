<?php
session_start();
if ($_GET['a'] == 'salir')
{
	$_SESSION = array();
}
else
{
	@$usuario = $_SESSION["usuario"];
}
require_once("assets/php/conexion.php");
require_once("assets/php/navegacionAjax.php");


?>
<!DOCTYPE html>
<html lang="es">
  <body>
    <div id="wrap">
      <div id="top">
      </div><!-- /#top -->
	<?php menu_lateral(); ?>
      <div id="content">
        <div class="outer">
          <div class="inner">
            <div class="col-lg-12">
              <h2 id="metis-admin-template-with-twitter-bootstrap-build-status-https-travis-ci-org-onokumus-bootstrap-admin-template-png-http-travis-ci-org-onokumus-bootstrap-admin-template-">
                Panel Principal de MetalSkeith - Admin
              </h2>
			  <?php 
			  // Carga el formulario con la lista de los ficheros para cargar el backup.
			  cargar_backup();
			  ?>

            </div>
          </div>

          <!-- end .inner -->
        </div>

        <!-- end .outer -->
      </div>
	  
      <!-- end #content -->
    </div><!-- /#wrap -->
    <div id="footer">
      <p>2016 &copy; Metal Skeith</p>
    </div>

    <script src="assets/lib/jquery.min.js"></script>
	<script src="assets/js/jquery.form.js"></script>

    <script> 
	$(function(){

	 $("#btn_insertar").click(function(){
	 var url = "assets/php/insertar_sql.php"; // El script a dónde se realizará la petición.
		$.ajax({
			   type: "POST",
			   url: url,
			   data: $("#carga_form").serialize(), // Adjuntar los campos del formulario enviado.
			   success: function(data)
			   {
				   $("#rc_genera").html(data); // Mostrar la respuestas del script PHP.
			   }
			 });
		return false; // Evitar ejecutar el submit del formulario.
	 });
	});	
	</script>		
  </body>
</html>