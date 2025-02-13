<?php
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;

Route::get('/user', [UserController::class, 'index']);
// Route::get ('/login', [AuthController::class, 'login']);
Route::post ('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return response()->json($request->user());
});
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);