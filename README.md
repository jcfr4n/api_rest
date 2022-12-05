# api_rest
Curso Crea una Api REST FULL completa con PHP NATIVO de Udemy.

[Link del curso](https://www.udemy.com/course-dashboard-redirect/?course_id=4736320)

## Primer Commit
___
En el primer commit se crea la carpeta sql que contiene el script para la creación de la base de datos que usaremos para nuestra api.

## Segundo commit
___
Comenzamos con la creación de la estructura del proyecto, se crea el archivo index.php en la raíz, el cuál será el punto de entrada del proyecto. En este punto el archivo requiere el archivo "controladores/rutas.controlador.php", instancia un objeto "ControladorRutas" e invoca su método "inicio()", este método, a su vez, hace un include del fichero "rutas/rutas.php" que, de momento, solo arroja un mensaje.

## Tercer commit
___
Se crea el archivo ".htaccess" que, en este caso, hace que toda petición sea dirigida hacia "index.php", que a su vez instancia el controlador de rutas y a través de "rutas.php" será, en definitiva, quien dirigirá las peticiones al sitio correspondiente.
Se modificó  además el fichero "rutas.php" para que tenga distintos comportamientos según se le pase una url con una petición vacia, de cursos o de registro.

## Cuarto commit
___
En este commit se modifica el archivo "index.php" para requerir el uso de distintos controladores, se modifica también el archivo "rutas.php" el cual manejará las distintas llamadas a los controladores y métodos correspondientes, según el tipo de petición (GET, POST, PUT y DELETE), a quien se dirija (cursos o registros) y además si va acompañada de algún "id".
Se crea el archivo "clientes.controlador.php", por ahora, sólo con el método "create()", y se crea el archivo "cursos.controlador.php", el cual contiene los métodos "index()", "create()", "show()", "update()" y "delete()"; para el manejo de los cursos. 

## Quinto commit
___
Se crea el archivo "modelo/conexion.php" que es quien maneja la conexión con la base de datos (el script sql para la creación de la base de datos se encuentra en el directorio sql de este proyecto)
