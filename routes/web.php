<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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
//Public routes
Route::get('/', [HomeController::class,'index']);
Route::get('sobre', [HomeController::class,'sobre']);

//Protected Routes 
Route::get('/dashboard', [Controller::class,'viewHome'])->middleware(['auth'])->name('dashboard');

Route::get('/metas', [MetasController::class, 'view'])->middleware(['auth'])->name('metas');
Route::get('/metas/editar', [MetasController::class, 'edit'])->middleware(['auth'])->name('metas_editar');
Route::get('/eixos', [Controller::class, 'viewEixos'])->middleware(['auth'])->name('eixos');
Route::get('/ouse', [Controller::class, 'viewOuse'])->middleware(['auth'])->name('objetivos');
Route::get('/indicadores', [Controller::class, 'viewIndicadores'])->middleware(['auth'])->name('indicadores');
Route::get('/acao', [Controller::class, 'viewAcao'])->middleware(['auth'])->name('acao');
Route::get('/grandetema', [Controller::class, 'viewGrandeTema'])->middleware(['auth'])->name('grandetema');

Route::post('/metas/editar', [MetasController::class, 'edit'])->middleware(['auth'])->name('metas_editar');

require __DIR__.'/auth.php';
