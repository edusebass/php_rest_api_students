<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/students', function() {
    return "Holi";
});

Route::get('/students/{id}', function() {
    return "Obteniendo estudiante en especifico";
});

Route::post('/students', function() {
    return "Creando estudiantes";
});

Route::put('/students/{id', function() {
    return "Editando estudiantes";
});

Route::delete('/students({id}', function() {
    return "Eliminando estudiantes";
});
