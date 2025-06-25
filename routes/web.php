<?php
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
Route::put('/materiales/{codigo}', [MaterialController::class, 'update']);
Route::post('/materiales', [MaterialController::class, 'store']);
Route::get('/materiales', [MaterialController::class, 'index']);