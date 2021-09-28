<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashsboardController;
use App\Http\Controllers\ItemController;
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
    return view('login');
})->name('root');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function (){
    Route::get('dashboard', [DashsboardController::class, 'index'])->name('dashboard');
    Route::get('item/new', [ItemController::class, 'new'])->name('itemNew');
    Route::post('item/save', [ItemController::class, 'save'])->name('saveItem');

});
