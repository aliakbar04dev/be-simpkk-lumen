<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function() use ($router){
    $router->get('kaderpkk', ['uses' => 'KaderpkkController@index']);
    $router->post('kaderpkk', ['uses' => 'KaderpkkController@store']);
    $router->get('kaderpkk/{id}', ['uses' => 'KaderpkkController@show']);
    $router->put('kaderpkk/{id}', ['uses' => 'KaderpkkController@update']);
    $router->delete('kaderpkk/{id}', ['uses' => 'KaderpkkController@destroy']);

    $router->get('riwpekerjaan', ['uses' => 'RpekerjaanController@index']);
    $router->post('riwpekerjaan', ['uses' => 'RpekerjaanController@store']);
    $router->get('riwpekerjaan/{id}', ['uses' => 'RpekerjaanController@show']);
    $router->put('riwpekerjaan/{id}', ['uses' => 'RpekerjaanController@update']);
    $router->delete('riwpekerjaan/{id}', ['uses' => 'RpekerjaanController@destroy']);

    $router->get('riworganisasi', ['uses' => 'RorganisasiController@index']);
    $router->post('riworganisasi', ['uses' => 'RorganisasiController@store']);
    $router->get('riworganisasi/{id}', ['uses' => 'RorganisasiController@show']);
    $router->put('riworganisasi/{id}', ['uses' => 'RorganisasiController@update']);
    $router->delete('riworganisasi/{id}', ['uses' => 'RorganisasiController@destroy']);

    $router->get('riwpengabdian', ['uses' => 'RpengabdianController@index']);
    $router->post('riwpengabdian', ['uses' => 'RpengabdianController@store']);
    $router->get('riwpengabdian/{id}', ['uses' => 'RpengabdianController@show']);
    $router->put('riwpengabdian/{id}', ['uses' => 'RpengabdianController@update']);
    $router->delete('riwpengabdian/{id}', ['uses' => 'RpengabdianController@destroy']);
    
    $router->get('riwpelatihan', ['uses' => 'RpelatihanController@index']);
    $router->post('riwpelatihan', ['uses' => 'RpelatihanController@store']);
    $router->get('riwpelatihan/{id}', ['uses' => 'RpelatihanController@show']);
    $router->put('riwpelatihan/{id}', ['uses' => 'RpelatihanController@update']);
    $router->delete('riwpelatihan/{id}', ['uses' => 'RpelatihanController@destroy']);

    $router->get('riwpenghargaan', ['uses' => 'RpenghargaanController@index']);
    $router->post('riwpenghargaan', ['uses' => 'RpenghargaanController@store']);
    $router->get('riwpenghargaan/{id}', ['uses' => 'RpenghargaanController@show']);
    $router->put('riwpenghargaan/{id}', ['uses' => 'RpenghargaanController@update']);
    $router->delete('riwpenghargaan/{id}', ['uses' => 'RpenghargaanController@destroy']);

    $router->get('kaderdokumen', ['uses' => 'KaderdokumenController@index']);
    $router->post('kaderdokumen', ['uses' => 'KaderdokumenController@store']);
    $router->get('kaderdokumen/{id}', ['uses' => 'KaderdokumenController@show']);
    $router->post('kaderdokumen/{id}', ['uses' => 'KaderdokumenController@update']);
    $router->delete('kaderdokumen/{id}', ['uses' => 'KaderdokumenController@destroy']);
});

