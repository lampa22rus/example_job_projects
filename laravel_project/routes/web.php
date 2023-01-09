<?php

use App\Http\Controllers\BookController;
use App\Http\Middleware\CheckIsAuthor;
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


Auth::routes();

Route::get('/', [BookController::class,'index'])->name('index');
Route::get('/users', [BookController::class,'users'])->name('users');
Route::get('/show/{id}', [BookController::class,'show'])->name('show');

Route::get('/create', [BookController::class,'create'])->name('create');
Route::post('/add', [BookController::class,'add'])->name('add');

Route::get('/edit/{book}', [BookController::class,'edit'])->name('edit');
// Route::get('/change', [BookController::class,'change'])->name('change');
Route::put('/update/{book}', [BookController::class,'update'])->name('update');

Route::delete('/delete/{id}', [BookController::class,'destroy'])->name('destroy');



// Route::get('/admin', function () {
//     Route::get('/create', [BookController::class,'create'])->name('create');
// })->middleware('CheckIsAdmin');


// Route::group(['middleware' => {'Auth', 'CheckIsAuthor'}], function(){
//     Route::get('/create', [BookController::class,'create'])->name('create');
// })








