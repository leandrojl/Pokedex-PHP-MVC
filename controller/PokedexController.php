<?php
class PokedexController{

    private $model;

    private $presenter;

    public function __construct($model,$presenter){

        $this->model = $model;
        $this->presenter = $presenter;
    }

    public function listar()
    {
        $data['pokedex'] = $this->model->getAllPokemons();
        $this->presenter->show('listado_pokemon',$data);

    }


}