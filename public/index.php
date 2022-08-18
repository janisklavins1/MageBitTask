<?php

use app\controllers\SiteController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';



$app = new Application(dirname(__DIR__));


$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/user', [SiteController::class, 'contact']);
$app->router->post('/user', [SiteController::class, 'handleContent']);



$app->run();
