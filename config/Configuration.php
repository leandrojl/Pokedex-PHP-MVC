<?php
include_once('./helper/mysql_database_manager.php');
include_once("./helper/IncludeFilePresenter.php");
include_once("./helper/Router.php");
include_once("./helper/MustachePresenter.php");

include_once('./controller/InicioController.php');
include_once('./controller/PokedexController.php');
include_once('./controller/NosotrosController.php');

include_once('./model/InicioModel.php');
include_once('./model/PokedexModel.php');
include_once('./model/NosotrosModel.php');

include_once('./vendor/autoload.php');


class Configuration{

    public function __construct(){

    }

    public function getDatabase(){
        $config = parse_ini_file("./config/config.ini");
        return new mysql_database_manager($config['host'], $config['username'], $config['password'], $config['database'], $config['port']);

    }

    public function getPresenter(){
       // return new IncludeFilePresenter();
        return new MustachePresenter("./view");
    }


    public function getPokedexController()
    {
        return new PokedexController($this->getPokedexModel(), $this->getPresenter());
    }

    public function getPokedexModel(){
        return new PokedexModel($this->getDatabase());
    }

    public function getInicioController()
    {
        return new InicioController($this->getInicioModel(), $this->getPresenter());
    }

    public function getInicioModel(){
        return new InicioModel($this->getDatabase());
    }

    public function getNosotrosController()
    {
        return new NosotrosController($this->getNosotrosModel(), $this->getPresenter());
    }

    public function getNosotrosModel(){
        return new NosotrosModel($this->getDatabase());
    }

    public function getRouter(){

        return new Router($this,"getInicioController", "listar"); //le paso el objeto configuration con un metodo predeterminado
    }
}
?>