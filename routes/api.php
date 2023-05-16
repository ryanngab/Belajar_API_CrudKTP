<?php

use App\Http\Controllers\WargaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/warga',[wargaController::class,'index']);
Route::post('/warga/create', [wargaController::class, 'store']);
Route::get('/warga/show/{id}', [wargaController::class, 'show']);
Route::post('/warga/update/{id}', [wargaController::class, 'update']);
Route::post('/warga/destroy/{id}', [wargaController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
