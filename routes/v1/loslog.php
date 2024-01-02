<?php

  /* get user info loslog dummy */
 $router->get('/loslog/{limit}/dummy', [ 'as' => 'show', 'uses' => 'LoslogController@showDummy']);

  /* get user info loslog dummy */
 $router->get('/loslog/{limit}/losdummy', [ 'as' => 'show', 'uses' => 'LoslogController@showlosDummy']);



/* restrict route */
$router->group(['middleware' => 'auth'], function () use ($router) {

 /* get user info loslog */
 $router->get('/loslog/{limit}', [ 'as' => 'show', 'uses' => 'LoslogController@show']);


 
});
