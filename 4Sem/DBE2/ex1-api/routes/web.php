<?php

use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\Api\ProdutoController as ApiProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    echo "Olá Mundo !!!";
});


Route::get('/home', [HomeController::class, 'index']);


// Route::controller(ProdutoController::class)->group(function(){
//     Route::prefix('/produtos')->group(function () {
//         Route::get('/','index')->name("produto.index");
//         Route::get('/{produto}','show')->name("produto.show");
//     });



//     // Route::middleware('auth')->group(function(){
//         Route::prefix('/produto')->group(function () {
//             Route::get('/','create')->name("produto.create");
//             Route::post('/','store')->name("produto.store");
//             Route::get('/{id}/edit','edit')->name("produto.edit");
//             Route::post('/{id}/update','update')->name("produto.update");
//             Route::get('/{id}/delete',[
//                 ProdutoController::class,
//                 'destroy']
//             )->name('produto.delete');
//         });
//         // })->middleware('auth'); //apenas rotas do prefixo
//     // });//grupo de rotas a serem protegidas pelo middleware auth

// });


Route::resource(
    'fornecedores',
    FornecedorController::class
)->parameters(
        ['fornecedores' => 'fornecedor']
    );


Route::Resource('api/produtos', ApiProdutoController::class);


Route::apiResource('fabricantes', FabricanteController::class);
