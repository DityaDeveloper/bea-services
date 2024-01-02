<?php

  /* get user info SK dummy */
  $router->get('/sk/{limit}/dummy', [ 'as' => 'showDummy', 'uses' => 'SKController@showDummy']);

/* restrict route */
$router->group(['middleware' => 'auth'], function () use ($router) {

  /* get user info SK */
  $router->get('/sk/{limit}', [ 'as' => 'show', 'uses' => 'SKController@show']);

});
