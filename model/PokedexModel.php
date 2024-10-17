<?php

class PokedexModel{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function transformImagePath($pokemons): array{
        foreach($pokemons as $key => $pokemon){
            //concatena la ruta
            $pokemons[$key]['imagen'] = "/public/imagenes/" . $pokemons[$key]['imagen'].".png";
            $pokemons[$key]['tipo_descripcion'] = "/public/imagenes/" . $pokemons[$key]['tipo_descripcion'].".png";
        }

        return $pokemons;
    }

    public function getAllPokemons(){
        $query = "SELECT p.id, p.nro_id_unico, p.nombre, p.imagen, p.descripcion as pokemon_descripcion, t.descripcion as tipo_descripcion FROM pokemon  p JOIN tipo t ON p.tipo_id = t.id";

        $pokemons = $this->database->query($query);

        $pokemons = $this->transformImagePath($pokemons);

        return $pokemons;
    }

    public function buscarPokemon($busqueda){
        $query = "SELECT p.id, p.nro_id_unico, p.nombre, p.imagen, p.descripcion as pokemon_descripcion, t.descripcion as tipo_descripcion 
                  FROM pokemon  p JOIN tipo t ON p.tipo_id = t.id 
                  WHERE nombre LIKE '%".$busqueda."%'";

        $pokemons = $this->database->query($query);

        $pokemons = $this->transformImagePath($pokemons);

        return $pokemons;
    }


    public function eliminarPokemon($id_pokemon){


        $query = "DELETE FROM pokemon WHERE id = $id_pokemon";

        $this->database->query($query);
    }



}