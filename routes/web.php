<?php

use Illuminate\Support\Facades\Route;

use App\Models\Cliente;
use App\Models\Endereco;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('clientes', function () {
    $cli = Cliente::all();
    foreach( $cli as $c ){
        echo $c->nome;
        echo $c->endereco->numero;
    }
});

Route::get('enderecos', function () {
    $en = Endereco::all();
    foreach( $en as $e ){
        echo $e->cliente->nome;
        echo $e->numero;
    }
});

Route::get('clientes/insert', function(){
    $c = new Cliente();
    $c->nome = "Francisco";
    $c->telefone = "11971257707";
    $c->save();

    $e = new Endereco();
    $e->rua = "Luiz Carlos Pires";
    $e->numero = 131;
    $e->bairro = "Parque America";
    $e->cidade = "Itu";
    $e->uf = "SP";
    $e->cep = "13304-397";

    //inserindo duas tabelas um pra um
    //$e->cliente_id = $c->id;
    $c->endereco()->save($e);
});
