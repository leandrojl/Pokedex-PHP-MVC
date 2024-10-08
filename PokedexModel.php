<?php

class PokedexModel{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function getAllPokemons(){
        $query = "SELECT p.id, p.nro_id_unico, p.nombre, p.imagen, p.descripcion as pokemon_descripcion, t.descripcion as tipo_descripcion FROM pokemon  p JOIN tipo t ON p.tipo_id = t.id";
        return $this->database->query($query);
    }



}