<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PRAStatusController;
use App\Http\Controllers\INQAppController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/myimms/PRAStatus', [PRAStatusController::class, 'index']);
Route::post('/myimms/PRAStatus/search', [PRAStatusController::class, 'show']);

Route::get('/myimms/inqApplEmpPassSts', [INQAppController::class, 'index']);
Route::post('/myimms/inqApplEmpPassSts/search', [INQAppController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('data/{id}', [PRAStatusController::class, 'destroy'])->name('data.destroy');