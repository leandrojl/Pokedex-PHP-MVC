<?php
include 'mysql_database_manager.php';

$config = parse_ini_file("config.ini");

$database =  new mysql_database_manager($config['host'], $config['username'], $config['password'], $config['database'], $config['port']);

?>


<?php
include_once 'header.php';
?>

<?php
$endpoint=$_GET['page'];
switch($endpoint){
    case 'listado_pokemon':
        $query = "SELECT p.id, p.nro_id_unico, p.nombre, p.imagen, p.descripcion as pokemon_descripcion, t.descripcion as tipo_descripcion FROM pokemon  p JOIN tipo t ON p.tipo_id = t.id";
        $pokedex = $database->query($query);
        include_once 'listado_pokemon.php';
        break;

        case 'inicio':
            include_once 'inicio.php';
            break;
    default:
        include_once 'inicio.php';
        break;
}
?>


<?php
include 'footer.php';
?>

