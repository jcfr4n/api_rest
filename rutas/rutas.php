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

}elseif (count(array_filter($arrayRutas)) == 2) {

    // Cuando se solicitan los cursos

    if (array_filter($arrayRutas)[2]=="cursos") {       

        $json = array(
            "detalle" => "estas en la vista cursos"

        );

        echo json_encode($json);

        return;
    }

    // Cuando accedemos al registro

    if (array_filter($arrayRutas)[2]=="registro") {       

        $json = array(
            "detalle" => "estas en la vista registro"

        );

        echo json_encode($json);

        return;
    }

}