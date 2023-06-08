<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CategoryController::class,'index'])->name("root");

Auth::routes();

Route::get('/categories', [CategoryController::class,'index'])->name('category.index');
Route::get('/categories/{category?}', [CategoryController::class,'index'])->name('category.index');
Route::post('/page/comment/store',[PageController::class,'storeComment'])->name('page.store.comment');
Route::get('/pages/{page}',[PageController::class,'index'])->name('page.index');

