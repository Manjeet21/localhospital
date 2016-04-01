<?php

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['middleware' => 'api','namespace' => 'App\Http\Controllers\Api'], function ($api) {
	$api->get('users/{id}', 'UsersController@show');
	$api->post('users/register', 'UsersController@register');
});
