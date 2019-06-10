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

    $cadena = '{id: 1,valor:0.154sensor:1,fecha:\"01-05-19 12:00\"},
    {id:2,valor:0.16sensor:1,fecha:\"01-05-19 12:10\"}, 
    {id:3,valor:0.167sensor:1,fecha:\"01-05-19 12:20\"},
    {id:4,valor:0.169sensor:1,fecha:\"01-05-19 12:30\"},
    {id:5,valor:0.172sensor:1,fecha:\"01-05-19 12:40\"},
    {id:6,valor:0.178sensor:1,fecha:\"01-05-19 12:50\"},
    {id:7,valor:0.171sensor:1,fecha:\"01-05-19 13:00\"},
    {id:8,valor:0.169sensor:1,fecha:\"01-05-19 13:10\"},
    {id:9,valor:0.178sensor:1,fecha:\"01-05-19 13:20\"},
    {id:10,valor:0.181sensor:1,fecha:\"01-05-19 13:30\"}';


   return response()->json([
       "arregloHumA" => [0.50, 0.20, 0.10, 0.40, 0.15, 0.25],
       "humsSuelo" => json_decode($cadena),
       "arregloTemp" => [30, 200, 100, 400, 150, 250],
       "max" => 0,
       "min" => 0
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