<?php

require_once("conexion.php");


class ModeloCliente{

    static public function index($tabla){

        $query = "SELECT * FROM $tabla";

        $stmt = Conection::conect()->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();

    }
}