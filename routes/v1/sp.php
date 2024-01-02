<?php


  /* get user info PK dummy */
 $router->get('/sp/{limit}/dummy', [ 'as' => 'show', 'uses' => 'SPController@showDummy']);


/* restrict route */
$router->group(['middleware' => 'auth'], function () use ($router) {

 /* get user info PK */
 $router->get('/sp/{limit}', [ 'as' => 'show', 'uses' => 'SPController@show']);

 
});
