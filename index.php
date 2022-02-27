<?php
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/router.php';

$router = new Router();

$router->addRoute('/example', 'App\Controller\ExampleController');

$router->searchRoute($_SERVER['REQUEST_URI']);