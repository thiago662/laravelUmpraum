<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Cliente;
use App\Models\Endereco;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clientes', function () {
    //lazy loading
    $cli = Cliente::all();


    //o array passado dentro de with pode contrar todas as tabelas ligadas
    //eager loading
    $cliente = Cliente::with(['endereco'])->get();

    return $cliente ->toJson();
    //return $cli->toJson();
});

Route::get('enderecos', function () {
    //lazy loading
    $en = Endereco::all();

    //o array passado dentro de with pode contrar todas as tabelas ligadas
    //eager loading
    $endereco = Endereco::with(['cliente'])->get();

    return $endereco ->toJson();
    //return $en->toJson();
});
