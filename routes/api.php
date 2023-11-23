<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CotizacionController;


// public routes
Route::post("/register", [UserController::class,"register"]);
Route::post("/login", [UserController::class,"login"]);

//protected routes

Route::middleware(["auth:sanctum"])->group(function () {

    Route::get("/mostrar", [ProductController::class,"mostrar"]);
    Route::post("/cotizar", [CotizacionController::class,"save"]);
    Route::get("/show", [CotizacionController::class,"show"]);
    Route::post("/logout", [UserController::class,"logout"])->name("logout");

    
    });
    
    
  
    
