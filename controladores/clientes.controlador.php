<?php

class ControladorClientes
{
    public function create($datosCliente)
    {

        if (!preg_match("/^[a-zA-ZáéííúüÁÉÍÓÚÜ]*$/", $datosCliente['nombre'])) {

            $json = array(
                "status" => "404",
                "detalle" => "error en el nombre"

            );

            echo json_encode($json);

            return;

        }

        if (!preg_match("/^[a-zA-ZáéííúüÁÉÍÓÚÜ]*$/", $datosCliente['apellido'])) {

            $json = array(
                "detalle" => "error en el apellido"

            );

            echo json_encode($json);

            return;

        }


        if (filter_var($datosCliente, FILTER_VALIDATE_EMAIL) !== false) {

            $json = array(
                "detalle" => "error en el email"

            );

            echo json_encode($json);

            return;

        }


        $clientes = ModeloCliente::index("clientes");

        foreach ($clientes as $key => $value) {

            if ($value['email'] == $datosCliente['email']) {

                $json = array(
                    "detalle" => "Lo siento, cliente duplicado"

                );

                echo json_encode($json);

                return;
            }

        }

        $salt = 'aleaiactaest';

        $idCliente = crypt($datosCliente['nombre'] . $datosCliente['apellido'] . $datosCliente['email'], $salt);

        $llaveCliente = crypt($datosCliente['email'] . $datosCliente['apellido'] . $datosCliente['nombre'], $salt);

        $datosCliente['id_cliente'] = $idCliente;
        $datosCliente['llaveCliente'] = $llaveCliente;
        $datosCliente['created_at'] = date('Y-m-d H:i:s');
        $datosCliente['updated_at'] = date('Y-m-d H:i:s');


        $create = ModeloCliente::create('clientes', $datosCliente);

        if ($create == 'ok') {

            $json = array(
                "detalle" => "Generado OK.",
                "id_cliente" => $idCliente,
                "llaveSecreta" => $llaveCliente

            );

            echo json_encode($json);

            return;
        }


    }
}