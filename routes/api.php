<?php

use App\Http\Controllers\data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data',[data::class, 'data']);

Route::get('list/{id?}',[data::class, 'list']);

Route::get('item/{data}',[data::class, 'item']);

Route::post('add',[data::class, 'add']);

Route::put('update',[data::class, 'update']);

Route::get('search/{string}',[data::class, 'search']);

Route::delete('delete/{id}',[data::class, 'delete']);

Route::post('addstudent', [data::class, 'addstudent']);