<?php
include_once('config/configuration.php');
$configuration = new Configuration();
$router = $configuration->getRouter();
?>


<?php
echo 'es el $_GET= ';
    var_dump($_GET);
    $page = $_GET['page'];
    echo '<br>';
    $action = isset($_GET['action']) ? $_GET['action'] : '';


    $router->route($page,$action);


?>
