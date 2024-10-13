<?php
include_once('config/configuration.php');
$configuration = new Configuration();
$router = $configuration->getRouter();
?>


<?php

    $page = $_GET['page'];
    $action = 'list';
    $router->route($page,$action);


?>
