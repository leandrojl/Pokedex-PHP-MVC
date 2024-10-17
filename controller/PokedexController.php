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

    public function buscarPokemon(){
        echo 'LINDA LIO';
        $busqueda= $_GET['busqueda'];
        echo "<br>";
        echo "la busqueda del pokemon es: ".$busqueda;


        $data['pokedex'] = $this->model->buscarPokemon($busqueda);

        $this->presenter->show('listado_pokemon',$data);
    }

    public function eliminarPokemon(){
        $id= $_GET['pokemon_id'];

        $this->model->eliminarPokemon($id);

        $data = $this->model->getAllPokemons();

        $this->presenter->show('listado_pokemon',$data);

    }


}