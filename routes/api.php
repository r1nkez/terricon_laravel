<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SkillController;
use App\Http\Controllers\PortController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/skills', [SkillController::class, 'getApiSkills']);

Route::post('/skills', [SkillController::class, 'createApiSkill']);

Route::get('/portfolio', [PortController::class, 'getApiPort']);
Route::post('/portfolio', [PortController::class, 'createApiPort']);