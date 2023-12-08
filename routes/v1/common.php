<?php

/* test response */
$router->get('/ping', [ 'as' => 'ping', function () use ($router) {
    return 'silent is golden';
}]);

/* lumen version */
$router->get('/version', [ 'as' => 'version', function () use ($router) {
    return $router->app->version();
}]);

/* lumen version */
$router->get('/phpinfo', [ 'as' => 'phpinfo', function () use ($router) {
    return phpinfo();
}]);

/* db conn */
$router->get('/dbcon', [ 'as' => 'dbcon', function () use ($router) {
    return phpinfo();
}]);
