<?php

use App\Http\Controllers\MotorController;
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
    return view('home.index');
});



// Route motor
Route::get('/motor', [MotorController::class, 'index'])->name('list_motor');Route::get('/create', [MotorController::class, 'create'])->name('create_motor');

Route::post('/store', [MotorController::class, 'store'])->name('store_motor');

Route::get('/edit/{motor}', [MotorController::class, 'edit'])->name('edit_motor');

Route::put('/upadate/{motor}', [MotorController::class, 'update'])->name('update_motor');