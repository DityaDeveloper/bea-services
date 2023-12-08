<?php

use App\Libraries\Core;

/* v1 group */
$router->group(['prefix' => 'v1/api', 'as' => 'v1'], function () use ($router) {

    Core::renderRoutes('v1', $router);

});
