<?php

class ControladorClientes{
    public function create($datosCliente){

        if (!preg_match("/^[a-zA-ZáéííúüÁÉÍÓÚÜ]*$/",$datosCliente['nombre'])) {

            $json = array(
                "status" => "404",
                "detalle" => "error en el nombre"
    
            );
    
            echo json_encode($json);

            return;

        }

        if (!preg_match("/^[a-zA-ZáéííúüÁÉÍÓÚÜ]*$/",$datosCliente['apellido'])) {

            $json = array(
                "detalle" => "error en el apellido"
    
            );
    
            echo json_encode($json);

            return;

        }


        if (filter_var($datosCliente, FILTER_VALIDATE_EMAIL) == false) {

            $json = array(
                "detalle" => "error en el email"
    
            );
    
            echo json_encode($json);

            return;

        }


    }
}