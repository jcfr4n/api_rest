<?php

require_once("conexion.php");

class ModeloCursos
{
    static public function index($tabla)
    {

        $query = "SELECT * FROM $tabla";
        $stmt = Conection::conect()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}