<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;

/* CONSTANTS */
define('VIEW_PATH', __DIR__ . '/../app/Views');
define('STORAGE_PATH', __DIR__ . '/../storage');

/* ROUTER */
require_once __DIR__ . '/../app/routes.php';

$app = new App(
    router: $dispatcher
);
$app->boot()
    ->run();