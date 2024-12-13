<?php

use Illuminate\Support\Facades\Route;

use App\Models\Skill;

use App\Models\Portfolio;

use App\Http\Controllers\TestController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;


Route::get('/', [AdminController::class, 'renderWelcomePage'])->name('welcome');

Route::get('/pages/{name}', [AdminController::class, 'renderPublicPages'])->name('pages');

/**
     * Система комментариев
     */

Route::post('/add-comment', [BlogController::class, 'addComment'])->name('addComment');
Route::get('/delete-comment/{id}', [BlogController::class, 'deleteComment'])->name('deleteComment');
Route::post('/edit-comment/{id}', [BlogController::class, 'editComment'])->name('editComment');
 
Route::get('/create-skill', [SkillController::class, 'renderCreatePage'])
    ->middleware('auth')
    ->name('skillCreate');

Route::post('/create-skill', [SkillController::class, 'createSkill'])
    ->middleware('auth')
    ->name('skillCreate.post');

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


Route::get('/skills-json/', [TestController::class, 'getAllSkills'])->middleware('auth');

Route::get('/portfolio', [PortController::class, 'renderPortPage'])->middleware('auth')->name('portCreate');

Route::post('/portfolio', [PortController::class, 'createPort'])->middleware('auth')->name('portCreate.post');


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
    'auth',
    'roleChecker:admin'
])->prefix('admin')->group(function () {
    Route::get('/users', [AdminController::class, 'renderUsers'])
    ->name('renderUsers');


    Route::get('/users/{id}', [AdminController::class, 'renderEditUsers'])
        ->name('renderEditUsers');

    Route::post('/users/{id}', [AdminController::class, 'editUser'])
    ->name('editUser');
    Route::get('/add-user', [AdminController::class, 'renderAddUser'])
        ->name('renderAddUser');

    Route::post('/add-user', [AdminController::class, 'addUser'])
        ->name('addUser');
    
    

    Route::get('/category', [CategoryController::class, 'renderCategory'])
    ->name('renderCategory');

    Route::get('/category/{id}', [CategoryController::class, 'renderEditCategory'])
        ->name('renderEditCategory');
    Route::post('/category/{id}', [CategoryController::class, 'editCategory'])
    ->name('editCategory');
    Route::get('/add-category', [CategoryController::class, 'renderAddCategory'])
        ->name('renderAddCategory');
    Route::post('/add-category', [CategoryController::class, 'addCategory'])
        ->name('addCategory');


    Route::get('/post/{id}', [PostController::class, 'renderEditPost'])
        ->name('renderEditPost');
    Route::post('/post/{id}', [PostController::class, 'editPost'])
    ->name('editPost');
    Route::delete('/post/{id}', [PostController::class, 'deletePost'])
    ->name('deletePost');
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
