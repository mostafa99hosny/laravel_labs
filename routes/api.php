<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("posts",[PostController::class,'index'])->middleware('auth:sanctum');
Route::get("posts/{id}",[PostController::class,'show']);
Route::post("posts",[PostController::class,'store']);
Route::post("posts/{id}",[PostController::class,'update']);
Route::delete("posts/{id}",[PostController::class,'destroy']);


Route::get("users",[UserController::class,'index']);
Route::get("users/{id}",[UserController::class,'show']);
Route::post("users",[UserController::class,'store']);
Route::post("users/{id}",[UserController::class,'update']);
Route::delete("users/{id}",[UserController::class,'destroy']);

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});