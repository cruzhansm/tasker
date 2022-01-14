<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Task\TaskController;

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

Route::get('/{any}', 'App\Http\Controllers\SpaController@index')->where('any', '.*');

// Auth
Route::post('/signup/register', [SignupController::class, 'create']);
Route::post('/login/auth', [LoginController::class, 'check']);

// Tasks
Route::post('/home/all-tasks', [TaskController::class, 'retrieveAll']);
Route::post('/day/new-task', [TaskController::class, 'create']);
Route::post('/day/update-task', [TaskController::class, 'update']);
Route::post('/day/get-tasks', [TaskController::class, 'retrieveAllSpecific']);
Route::post('/day/update-status', [TaskController::class, 'updateTaskStatus']);