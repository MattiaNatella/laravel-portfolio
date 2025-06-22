<?php


use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::get(
//     "post",
//     [ProjectController::class, 'index']
// );

Route::resource('projects', ProjectController::class);

