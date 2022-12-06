# api_rest
Curso Crea una Api REST FULL completa con PHP NATIVO de Udemy.

[Link del curso](https://www.udemy.com/course-dashboard-redirect/?course_id=4736320)

## Segundo Commit
___
En el primer commit se crea la carpeta sql que contiene el script para la creación de la base de datos que usaremos para nuestra api.

## Tercer commit
___
Comenzamos con la creación de la estructura del proyecto, se crea el archivo index.php en la raíz, el cuál será el punto de entrada del proyecto. En este punto el archivo requiere el archivo "controladores/rutas.controlador.php", instancia un objeto "ControladorRutas" e invoca su método "inicio()", este método, a su vez, hace un include del fichero "rutas/rutas.php" que, de momento, solo arroja un mensaje.

## Cuarto commit
___
Se crea el archivo ".htaccess" que, en este caso, hace que toda petición sea dirigida hacia "index.php", que a su vez instancia el controlador de rutas y a través de "rutas.php" será, en definitiva, quien dirigirá las peticiones al sitio correspondiente.
Se modificó  además el fichero "rutas.php" para que tenga distintos comportamientos según se le pase una url con una petición vacia, de cursos o de registro.

## Quinto commit
___
En este commit se modifica el archivo "index.php" para requerir el uso de distintos controladores, se modifica también el archivo "rutas.php" el cual manejará las distintas llamadas a los controladores y métodos correspondientes, según el tipo de petición (GET, POST, PUT y DELETE), a quien se dirija (cursos o registros) y además si va acompañada de algún "id".
Se crea el archivo "clientes.controlador.php", por ahora, sólo con el método "create()", y se crea el archivo "cursos.controlador.php", el cual contiene los métodos "index()", "create()", "show()", "update()" y "delete()"; para el manejo de los cursos. 

## Sexto commit
___
Se crea el archivo "modelo/conexion.php" que es quien maneja la conexión con la base de datos (el script sql para la creación de la base de datos se encuentra en el directorio sql de este proyecto)

## Séptimo commit
___
Se modifica el "index.php" para requerir los modelos creados.
Se modifica el "archivo cursos.controlador.php", para que invoque el método "index($table)" de la clase "ModeloCursos" y obtenga un array con la información de los cursos.
Se crea el archivo "modelos/curso.modelo.php", en el cual se crea una clase "ModeloCursos" y, por el momento, creamos el método "index($tabla)" que va a ser invocado por el método "index($tabla)" de la clase ControladorCursos, nuestro modelo retornará el resultado de la consulta hecha a la base de datos y ese resultado se insertará en el json que devuelve la api, el cual podemos ver a través de PostMan o de la extensión Thunder Client de Visual Studio Code, al dirigir una petición de tipo get con la palabra "cursos" como endpoint.
Se crea el archivo "modelos/clientes.modelo.php", vacio de momento.

## Octavo commit
___
En este commit empezamos con lo que es el envío de datos hacia nuestra base de datos, para ello modificamos el archivo "rutas.php" para que cuando reciba una petición de tipo POST, envíe los datos recibidos al alchivo "clientes.controlador.php" y este a su vez comienza con el proceso de validación. 

## Noveno commit
___
En este commit se hace la validacion de los email repetidos, para lo cual deberemos crear un cliente dentro de la base de datos, lo hacemos manualmente, y al pasarlo como parámetro obtenemos un mensaje indicando que el mismo está repetido.

## Décimo commit
___
En el archivo "clientes.modelo.php" se crea el método "index()" que nos trae de la base de datos a todos los clientes y en el archivo "clientes.controlador.php" instanciamos un objeto "$clientes" que invoca al método "index()" de la clase "ModeloClientes" y comparamos los email de cada uno de los clientes con el email que estamos recibiendo como parámetro para validar si el email está o no repetido