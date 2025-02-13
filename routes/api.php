<?php
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/user', [UserController::class, 'index']);
Route::get ('/login', [AuthController::class, 'login']);
Route::post ('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return response()->json($request->user());
});
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']); // Get all categories
    Route::post('/', [CategoryController::class, 'store']); // Create category
    Route::get('/{id}', [CategoryController::class, 'show']); // Get category by ID
    Route::put('/{id}', [CategoryController::class, 'update']); // Update category
    Route::delete('/{id}', [CategoryController::class, 'destroy']); // Delete category
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']); // Get all products
    Route::post('/', [ProductController::class, 'store']); // Create product
    Route::get('/{product}', [ProductController::class, 'show']); // Get product by ID
    Route::put('/{product}', [ProductController::class, 'update']); // Update product
    Route::delete('/{product}', [ProductController::class, 'destroy']); // Delete product
});