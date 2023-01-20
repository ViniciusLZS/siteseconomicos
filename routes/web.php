<?php

use App\Http\Controllers\EditUserRecordController;
use App\Http\Controllers\ListUserController;
use App\Http\Controllers\viewUserController;
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

// Router List User
Route::get('/listUsers', [ListUserController::class, 'index'])->name('listUsers');
Route::post('/listUsers/update', [ListUserController::class, 'update'])->name('listUsers.update');
Route::post('/listUsers/destroy', [ListUserController::class, 'destroy'])->name('listUsers.destroy');

//Router viewUser
Route::resource('viewUser', viewUserController::class)->except(['update']);

//Router editUserRecord
Route::resource('editUserRecord', EditUserRecordController::class)->except(['update']);
Route::post('/editUserRecord/update', [EditUserRecordController::class, 'update'])->name('editUserRecord.update');