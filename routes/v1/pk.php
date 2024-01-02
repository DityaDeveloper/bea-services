<?php

  /* get user info PK dummy */
  $router->get('/pk/{limit}/dummy', [ 'as' => 'showDummy', 'uses' => 'PKController@showDummy']);

/* restrict route */
$router->group(['middleware' => 'auth'], function () use ($router) {

  /* get user info PK */
  $router->get('/pk/{limit}', [ 'as' => 'show', 'uses' => 'PKController@show']);

});
