<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\studentController;

Route::get('/students', [studentController::class, 'index']);

Route::get('/students/{id}', function () {
    return "Obteniendo estudiante en especifico";
});

Route::post('/students', [studentController::class, 'store']);

Route::put('/students/{id', function () {
    return "Editando estudiantes";
});

Route::delete('/students({id}', function () {
    return "Eliminando estudiantes";
});
