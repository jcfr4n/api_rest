<?php

/**
 * Creamos un array con las distintas partes que forman la ruta que nos llega 
 * del navegador. 
 * Por ejemplo:
 * 
 * En el caso de la url:
 * http://localhost/api-rest/lo-que-sea/lo-siguiente
 * 
 * El array será:
 * Array
 * (
 *     [0] => 
 *     [1] => api-rest
 *     [2] => lo-que-sea
 *     [3] => lo-siguiente
 * )
 * 
 */

$arrayRutas = explode("/", $_SERVER["REQUEST_URI"]);

/* echo ("<pre>");
print_r($arrayRutas);
echo ("</pre>"); */

/**
 * array_filter elimina los índices vacios del conteo de índices.
 * 
 * Si arrayRutas contiene un solo índice es porque la ruta no tiene nada 
 * después de api-rest, es decir, no está haciendo ninguna petición.
 */

// Peticiones vacias

if (count(array_filter($arrayRutas)) == 1) {

    $json = array(
        "detalle" => "no encontrado"

    );

    echo json_encode($json);

    return;

} elseif (count(array_filter($arrayRutas)) == 2) {

    // Cuando se solicitan los cursos

    if (array_filter($arrayRutas)[2] == "cursos") {

        // Cuando accedemos con POST invocamos el método create() para crear un 
        // curso nuevo


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $cursos = new ControladorCursos;

            $cursos->create();

        }

        // Cuando accedemos con GET invocamos el método index() para listar 
        // cursos

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $cursos = new ControladorCursos;

            $cursos->index();

        }

    }

    // Cuando accedemos al registro

    if (array_filter($arrayRutas)[2] == "registro") {

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $clientes = new ControladorClientes;

            $clientes->create();

        }

    }

} elseif (count(array_filter($arrayRutas)) == 3) {

    // Comprobamos ahora si se envia un id en la ruta, la cual sería en la 3ra 
    // información de $arrayRutas, después del filtrado, para lo que hay que 
    // comprobar que sea numérico.

    if (
        array_filter($arrayRutas)[2] == "cursos" &&
        (is_numeric(array_filter($arrayRutas)[3]))
    ) {

        // Si se usa una petición GET se muestra un solo curso

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $curso = new ControladorCursos;

            $curso->show((array_filter($arrayRutas)[3]));

        }

        // Si se usa una petición PUT se actualiza un curso

        if ($_SERVER["REQUEST_METHOD"] == "PUT") {

            $curso = new ControladorCursos;

            $curso->update((array_filter($arrayRutas)[3]));

        }

        // Si se usa una petición DELETE se borra un solo curso

        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

            $curso = new ControladorCursos;

            $curso->delete((array_filter($arrayRutas)[3]));

        }

    }

}