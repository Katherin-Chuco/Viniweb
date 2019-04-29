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

$router->get('/', "HomeController@inicio");

$router->get('/prueba', function () {

   return response()->json([
       "arregloHumA" => [0.50, 0.20, 0.10, 0.40, 0.15, 0.25],
       "arregloHumS" => [0.150, 0.120, 0.110, 0.140, 0.115, 0.125],
       "arregloTemp" => [30, 200, 100, 400, 150, 250],
   ]);
});

$router->get('/prueba/reportes', function () {

    return response()->json([
        "arregloHumA" => [0.50, 0.20, 0.10, 0.40, 0.15, 0.25],
        "arregloHumS" => [0.150, 0.120, 0.110, 0.140, 0.115, 0.125],
        "arregloTemp" => [30, 200, 100, 400, 150, 250],
    ]);
});

//$router->get('/{any?}', function () {
//    return view('inicio');
//});