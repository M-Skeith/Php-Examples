# Php-Examples
Examples of useful coding for various projects in php.

#[Spanish]

En éste repositorio iremos añadiendo diversas funciones creadas en php útiles para todo tipo de web.

Las funciones insertadas actualmente són:

  - JsonBBDD: Se conecta a una base de datos para realizar una consulta y convertirá el resultado de dicha consulta a formato json para posteriormente utilizarla en cualquier entorno. (Como por ejemplo desde un programa Android)
  - Rss: Generaremos un rss para leer los últimos 20 artículos publicados en una web indicando el título, descripción, fecha de publicación y la imagen de portada.
  - Conexion: Conexion simple a una bbdd usando mysql_
  - Newsletter: Genera una página HTML con un boletín simple plara enviarlo después por html.
  - EnviarNewsletter: Obtiene una lista de todas las direcciones Email registradas y envía el resultado html de Newsletter.php por correo en formato html.
  - webBotonesAjax: Web simple en html que tiene incluidas las librerías de jquery y una función ajax que cargará en la propia web el resultado obtenido de la funcion SplitSQL presente en el fichero PHP accionAjax.
  - accionAjax: Fichero PHP que una vez se ejecute lanza la función SplitSQL que hace carga en la Base de datos.
  - navegacionAjax: Genera un html que se incluye dentro de webBotonesAjax que mostrará una lista desplegable con los ficheros sql que habrá en la carpeta "assets/sql/"

#[English]


In this repository we will be adding various functions created in php useful for all types of web. 

The currently inserted functions are: 

  - JsonBBDD: Connects to a database to perform a query and converts the result of that query to json format for later use in any environment. (Like for example from an Android program) 
  - Rss: We will generate an rss to read the last 20 articles published in a web indicating the title, description, date of publication and the cover image.
  - Conexion: Simple db conection using mysql_
  - Newsletter: Generate an HTML page with a simple bulletin to send later by html.
  - EnviarNewsletter: Gets a list of all registered email addresses and sends the html result of Newsletter.php by mail in html format.
  - webBotonesAjax: Simple web in html that has included jquery libraries and an ajax function that will load on the web the result obtained from the SplitSQL function present in the PHP file accionAjax.
  - accionAjax: PHP file that once launched launches the SplitSQL function that loads the database.
  - navegacionAjax: Generates an html that is included inside webBotonesAjax that will show a dropdown list with the files sql that will be in the folder "assets / sql /"
