<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function() use ($router)
{
	$res['success'] = true;
	$res['result'] = "Welcome";
	return response($res);
});

$router->group(['prefix' => 'api/',
			'namespace' => '\App\Http\Controllers'
	], function() use ($router)
{
	$router->post('/login','LoginController@login');
	$router->post('/register','UserController@register');
	$router->get('/user/{id}',['middleware'=>'auth', 'uses'=>'UserController@get_user']);
	$router->post('/update/{id}',['middleware'=>'auth', 'uses'=>'UserController@update_user']);

});


/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/

