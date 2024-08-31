<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoPizzaController;


Route::post('/cadastrar', [UserController::class, 'store']);

Route::prefix('/user')->group(function (){
    Route::get('/', [UserController::class, 'index']);
    Route::put('/atualizar/{id}', [UserController::class, 'update']);
    Route::delete('/deletar/{id}', [UserController::class, 'destroy']);
});


Route::prefix('/pizza')->group(function (){
    Route::get('/', [TipoPizzaController::class, 'index']);
    Route::post('/criar_pizza', [TipoPizzaController::class, 'store']);
    Route::get('/mostrar_pizza/{id}', [TipoPizzaController::class, 'show']); 
    Route::put('/atualizar_pizza/{id}', [TipoPizzaController::class, 'update']);
    Route::delete('/deletar_pizza/{id}', [TipoPizzaController::class, 'destroy']);
});
