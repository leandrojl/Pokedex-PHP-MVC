<?php
include_once('config/configuration.php');
$configuration = new Configuration();
$router = $configuration->getRouter();
?>


<?php

    $page = $_GET['page'];
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $pokemond_id = isset($_GET['pokemon_id']) ? $_GET['pokemon_id'] : '';
    var_dump($page);
    var_dump($action);
    echo 'pokemon id:';
    var_dump($pokemond_id);

    $router->route($page,$action);


?>
