<?php

use Illuminate\Support\Facades\Route;

use App\Models\Skill;

use App\Models\Portfolio;

use App\Http\Controllers\TestController;

use App\Http\Controllers\SkillController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-skill', [SkillController::class, 'renderCreatePage'])
    ->middleware('auth')
    ->name ('skillCreate');

Route::get('/test/{id}', [TestController::class, 'show']);

Route::get('/skills/{category}', function ($category) {
    $title = "Навыки в категории $category";

    $skills = Skill::where('category', $category)->get();
    
    return view('skills',[
        'title' => $title,
        'skills' => $skills 
    ]);
});

Route::get('/skills', [TestController::class, 'ReplaceSkills']);
//daedff

Route::get('/skills-json/', [TestController::class, 'getAllSkills'])->middleware('auth');

Route::get('/portfolio', function () {
    $title = "Портфолио Terricon";

    $portfolio = Portfolio::all();
  
    return view('portfolio',[
        'title' => $title,
        'portfolio' => $portfolio
    ]);
});

Route::get('/portfolio/{category}', function ($category) {
    $title = "Портфолио Terricon";

    $portfolio = Portfolio::all();

    $portfolio = Portfolio::where('category', $category)->get();
    
    return view('portfolio',[
        'title' => $title,
        'portfolio' => $portfolio
    ]);
});



Route::get('/new', function () {
    return view('new');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
