<?php

class ControladorCursos {
    public function index(){

        $json = array(
            "detalle" => "estás en la vista listar cursos"

        );

        echo json_encode($json);

        return;

    }
    public function create(){

        $json = array(
            "detalle" => "estás en la vista crear cursos"

        );

        echo json_encode($json);

        return;

    }

    public function show($id){

        $json = array(
            "detalle" => "estás en la vista mostrar el curso: " . $id

        );

        echo json_encode($json);

        return;

    }

    public function update($id){

        $json = array(
            "detalle" => "estás en la vista actualizar el curso: " . $id

        );

        echo json_encode($json);

        return;

    }

    public function delete($id){

        $json = array(
            "detalle" => "estás en la vista borrar el curso: " . $id

        );

        echo json_encode($json);

        return;

    }
}