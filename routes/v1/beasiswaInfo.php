<?php

/* restrict route */
$router->group(['middleware' => 'auth'], function () use ($router) {

    /* get user info beasiswa */
    $router->get('/profile/info-beasiswa', [ 'as' => 'update', 'uses' => 'BeaInfoController@show']);


});
