<?php

class Conection
{

    static public function conect()
    {

        $host = "localhost";
        $db = "api-rest";
        $user = "root";
        $pass = "";


        $link = new PDO("mysql:host=" . $host . "; dbname=" . $db . ";charset=utf8", $user, $pass);

        // Después de la versión 5.3.6 esta declaración es preferible hacerla 
        // en la cadena de conexión tal como se aprecia arriba

        //$link->exec("set names utf8");

        return $link;

    }

}