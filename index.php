<?php
include_once('./helper/mysql_database_manager.php');
include_once('./controller/PokedexController.php');
include_once('./model/PokedexModel.php');
include_once("./helper/IncludeFilePresenter.php");

$config = parse_ini_file("./config/config.ini"); //conexion a la bd

$database =  new mysql_database_manager($config['host'], $config['username'], $config['password'], $config['database'], $config['port']);
$pokedexModel = new PokedexModel($database);
$presenter = new IncludeFilePresenter();
$pokedexController =  new PokedexController($pokedexModel, $presenter);

?>


<?php
include_once './view/header.php';
?>

<?php
$endpoint=$_GET['page'];
switch ($endpoint) {
    case 'listado_pokemon':
        $pokedexController->listarPokemons();
        break;

    case 'inicio':
        include_once 'inicio.php';
        break;

    default:
        break;
}
?>


<?php
include './view/footer.php';
?>

