<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StoreController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('cms/admin/')->group(function()
{
    Route::view('/','cms.parent');
    Route::view('/temp','cms.temp');
    Route::resource('libraries',LibraryController::class);
    Route::post('libraries_update/{id}',[LibraryController::class,'update']);
    Route::resource('stores',StoreController::class);
    Route::post('stores_update/{id}',[StoreController::class,'update']);
    Route::resource('managers',ManagerController::class);
    Route::post('update_managers/{id}',[ManagerController::class,'update']);
    Route::resource('authors',AuthorController::class);
    Route::post('update_authors/{id}',[AuthorController::class,'update']);
    Route::resource('sections',SectionController::class);
    Route::post('sections_update/{id}',[SectionController::class,'update']);

});
