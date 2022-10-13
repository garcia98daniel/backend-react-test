<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ConstructorController;

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

Route::get('/constructors', [ConstructorController::class, 'getConstructors']);

Route::get('/projects', [ProjectController::class, 'getProjects']);
Route::post('/projects/create', [ProjectController::class, 'createProject']);
Route::get('/projects/{id}', [ProjectController::class, 'getProject']);
Route::patch('/projects/edit', [ProjectController::class, 'editProject']);
Route::delete('/projects/delete/{id}', [ProjectController::class, 'deleteProject']);

