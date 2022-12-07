<?php

require_once("conexion.php");


class ModeloCliente
{

    static public function index($tabla)
    {

        $query = "SELECT * FROM $tabla";

        $stmt = Conection::conect()->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();

    }


    static public function create($tabla, $datosCliente)
    {

        $query = "INSERT INTO clientes(primer_nombre, primer_apellido, email, id_cliente, llave_secreta, created_at, updated_at) VALUES (:primer_nombre, :primer_apellido, :email, :id_cliente, :llave_secreta, :created_at, :updated_at)";

        $stmt = Conection::conect()->prepare($query);

        $stmt->bindParam(':primer_nombre', $datosCliente['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':primer_apellido', $datosCliente['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $datosCliente['email'], PDO::PARAM_STR);
        $stmt->bindParam(':id_cliente', $datosCliente['id_cliente'], PDO::PARAM_STR);
        $stmt->bindParam(':llave_secreta', $datosCliente['llaveCliente'], PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $datosCliente['created_at'], PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $datosCliente['updated_at'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        }

        print_r(Conection::conect()->errorInfo());

    }
}