<?php

use App\Http\Controllers\ApiController;
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
/**
 * Views public
 */
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('sobre', [HomeController::class,'sobre']);

/**
 *  Views Admin
 */
Route::get('/dashboard', [Controller::class,'viewHome'])->middleware(['auth'])->name('dashboard');
Route::get('/metas', [MetasController::class, 'view'])->middleware(['auth'])->name('metas');
Route::get('/eixos', [Controller::class, 'viewEixos'])->middleware(['auth'])->name('eixos');
Route::get('/ouse', [Controller::class, 'viewOuse'])->middleware(['auth'])->name('objetivos');
Route::get('/indicadores', [Controller::class, 'viewIndicadores'])->middleware(['auth'])->name('indicadores');
Route::get('/acao', [Controller::class, 'viewAcao'])->middleware(['auth'])->name('acao');
Route::get('/grandetema', [Controller::class, 'viewGrandeTema'])->middleware(['auth'])->name('grandetema');

Route::post('/metas/editar', [MetasController::class, 'edit'])->middleware(['auth'])->name('metas_editar');

/**
 * Api
 */
Route::get('/api', [ApiController::class,'home'])->middleware(['auth'])->name('api');
Route::get('/api/metas', [ApiController::class,'metas'])->middleware(['auth'])->name('api_metas');
Route::get('/api/indicadores', [ApiController::class,'indicadores'])->middleware(['auth'])->name('api_indicadores');
Route::get('/api/grandestemas', [ApiController::class,'grandestemas'])->middleware(['auth'])->name('api_grandestemas');
Route::get('/api/objetivos', [ApiController::class,'objetivos'])->middleware(['auth'])->name('api_objetivos');
Route::get('/api/eixos', [ApiController::class,'eixos'])->middleware(['auth'])->name('api_eixos');
Route::get('/api/acoes', [ApiController::class,'acoes'])->middleware(['auth'])->name('api_acoes');


require __DIR__.'/auth.php';
