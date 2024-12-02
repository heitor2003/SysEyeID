<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FileController;

Route::get('/pdfs', [FileController::class, 'listPdfs']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
