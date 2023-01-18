<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
// Route::get('/pages/{name}',[HomeController::class,'show']);
Route::view('/about', [HomeController::class, 'front.pages.about']);
Route::view('/contact', [HomeController::class, 'front.pages.contact']);

Route::group([
    'prefix'=>'/dashboard/categories',
    'as'=>'dashboard.categories.',
    'controller'=>CategoriesController::class ,
], function () {

    Route::get('/', 'index') ->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store') ->name('store');
    Route::get('/{category}/edit','edit')->name('edit');
    Route::put('/{category}','update')->name('update');
    Route::delete('/{category}','destroy')->name('destroy');
});



// // Route::view('/dashboard','layouts.dashboard');
// Route::get('/dashboard/categories',[CategoriesController::class , 'index'])
// ->name('dashboard.categories.index');
// // ----------------------------------------------------------------------------
// Route::get('/dashboard/categories/create',[CategoriesController::class , 'create'])
// ->name('dashboard.categories.create');

// Route::post('/dashboard/categories',[CategoriesController::class , 'store'])
// ->name('dashboard.categories.store');
