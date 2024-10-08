<?php
include_once('mysql_database_manager.php');
include_once('PokedexController.php');
include_once('PokedexModel.php');
include_once("IncludeFilePresenter.php");

$config = parse_ini_file("config.ini"); //conexion a la bd

$database =  new mysql_database_manager($config['host'], $config['username'], $config['password'], $config['database'], $config['port']);
$pokedexModel = new PokedexModel($database);
$presenter = new IncludeFilePresenter();
$pokedexController =  new PokedexController($pokedexModel, $presenter);

?>


<?php
include_once 'header.php';
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
include 'footer.php';
?>

