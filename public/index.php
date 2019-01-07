<?php

require __DIR__ . '/../vendor/autoload.php';

include __DIR__ . '/../app/controllers/CoreController.php';
include __DIR__ . '/../app/controllers/MainController.php';
include __DIR__ . '/../app/controllers/ErrorController.php';
include __DIR__ . '/../app/utils/DBdata.php';

include __DIR__ . '/../app/models/CoreModel.php';
include __DIR__ . '/../app/models/Pokemon.php';
include __DIR__ . '/../app/models/PokemonType.php';
include __DIR__ . '/../app/models/Type.php';

$router = new AltoRouter();

$router->setBasePath($_SERVER['BASE_URI']);
// dump($_SERVER['BASE_URI']);

// Création des routes
$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/types', 'MainController#types', 'types');
$router->map('GET', '/type[i:id]', 'MainController#type', 'type');
$router->map('GET', '/pokemon[i:id]', 'MainController#pokemon', 'pokemon');


$match = $router->match();

// dump($match);

// Vérification que la route existe et application sinon Err404
if ($match === false) {
    $controllerName = 'ErrorController';
    $methodName = 'page404';
} else {
    $dispatcherInformations = explode('#', $match['target']);
    $controllerName = $dispatcherInformations[0];
    $methodName = $dispatcherInformations[1];
}

$controller = new $controllerName($router);
$controller->$methodName($match['params']);
