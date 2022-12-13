<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ConvocatoriaController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\UserController;


//agregar middleware

Route::middleware('web')->get('/', [HomeController::class, 'index']);
Route::middleware('web')->resource('users', UserController::class)->names('admin.users');
Route::middleware('web')->resource('convocatorias', ConvocatoriaController::class)->names('admin.convocatorias');
Route::middleware('web')->resource('empresas', EmpresaController::class)->names('admin.empresas');
Route::middleware('web')->get('revision/{empresa}', [EmpresaController::class, 'revision'])->name('admin.empresas.revision');