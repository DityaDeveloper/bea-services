<?php

/* restrict route */
$router->group(['middleware' => 'auth'], function () use ($router) {

    /* get fund request user */
    $router->get('/profile/{limit}/info-fund-request', [ 'as' => 'profilefundrequest', 'uses' => 'FundRequestController@show']);

    /* get fund request user dummy*/
    $router->get('/profile/{limit}/info-fund-request/dummy', [ 'as' => 'profilefundrequestdummy', 'uses' => 'FundRequestController@showDum']);


});
