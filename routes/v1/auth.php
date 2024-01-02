<?php


/* login */
$router->post('/login', [ 'as' => 'login', 'uses' => 'AuthController@login']);

/* login */
$router->get('/login/dummy', [ 'as' => 'logindummy', 'uses' => 'AuthController@loginDummy']);


/* restrict route */
$router->group(['middleware' => 'auth'], function () use ($router) {

    /* update user profile */
    $router->post('/profile/update', [ 'as' => 'update', 'uses' => 'AuthController@update']);

    /* get user profile */
    $router->get('/profile', [ 'as' => 'profile', 'uses' => 'AuthController@profile']);

    /* logout user */
    $router->post('/logout', [ 'as' => 'logout', 'uses' => 'AuthController@logout']);

    /* refresh token */
    $router->get('/refresh-token', [ 'as' => 'refreshToken', 'uses' => 'AuthController@refresh']);

    /* update password */
    $router->post('/profile/update/password', [ 'as' => 'updatepassword', 'uses' => 'AuthController@updatepassword']);

});

