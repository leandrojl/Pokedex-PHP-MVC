<?php
class InicioController{

    private $model;

    private $presenter;

    public function __construct($model,$presenter){

        $this->model = $model;
        $this->presenter = $presenter;
    }


    public function listar()
    {
        $data = []; //no hay llamado a la base de datos
        $this->presenter->show('inicio',$data);
    }


}