<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndicadoresAnosController;
use App\Http\Controllers\IndicadoresController;
use App\Models\IndicadoresAnos;
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
Route::get('/meta/{metasId}', [HomeController::class,'metasView'])->name('public_metas_view');
Route::get('sobre', [HomeController::class,'sobre']);

/**
 *  Views Admin
 */
Route::get('/dashboard', [Controller::class,'adminIndex'])->middleware(['auth'])->name('dashboard');

Route::get('/metas', [MetasController::class, 'view'])->middleware(['auth'])->name('metas');
Route::get('/metas/adicionar', [MetasController::class, 'add'])->middleware(['auth'])->name('metas_adicionar');
Route::post('/metas/adicionar', [MetasController::class, 'add'])->middleware(['auth'])->name('metas_adicionar');
Route::get('/metas/editar/{metasId}', [MetasController::class, 'edit'])->middleware(['auth'])->name('metas_editar');
Route::post('/metas/editar/{metasId}', [MetasController::class, 'edit'])->middleware(['auth'])->name('metas_editar');

Route::get('/eixos', [Controller::class, 'viewEixos'])->middleware(['auth'])->name('eixos');
Route::get('/ouse', [Controller::class, 'viewOuse'])->middleware(['auth'])->name('objetivos');

#Indicadores
Route::get('/indicadores', [IndicadoresController::class, 'view'])->middleware(['auth'])->name('indicadores');
Route::get('/indicadores/adicionar', [IndicadoresController::class, 'add'])->middleware(['auth'])->name('indicadores_adicionar');
Route::post('/indicadores/adicionar', [IndicadoresController::class, 'add'])->middleware(['auth'])->name('indicadores_adicionar');
Route::get('/indicadores/editar/{indicadorId}', [IndicadoresController::class, 'edit'])->middleware(['auth'])->name('indicadores_editar');
Route::post('/indicadores/editar/{indicadorId}', [IndicadoresController::class, 'edit'])->middleware(['auth'])->name('indicadores_editar');
#indicadore anos
Route::get('/indicadores-anos', [IndicadoresAnosController::class, 'view'])->middleware(['auth'])->name('indicadores_anos');
Route::get('/indicadores-anos/adicionar', [IndicadoresAnosController::class, 'add'])->middleware(['auth'])->name('indicadores_anos_adicionar');
Route::post('/indicadores-anos/adicionar', [IndicadoresAnosController::class, 'add'])->middleware(['auth'])->name('indicadores_anos_adicionar');
Route::get('/indicadores-anos/editar/{idcAnosId}', [IndicadoresAnosController::class, 'edit'])->middleware(['auth'])->name('indicadores_anos_editar');
Route::post('/indicadores-anos/editar/{idcAnosId}', [IndicadoresAnosController::class, 'edit'])->middleware(['auth'])->name('indicadores_anos_editar');

Route::get('/acao', [Controller::class, 'viewAcao'])->middleware(['auth'])->name('acao');
Route::get('/grandetema', [Controller::class, 'viewGrandeTema'])->middleware(['auth'])->name('grandetema');

/**
 * Api
 */
Route::get('/api', [ApiController::class,'home'])->middleware(['auth'])->name('api');

Route::get('/api/metas', [ApiController::class,'metas'])->middleware(['auth'])->name('api_metas');
Route::get('/api/metas/adicionar', [ApiController::class,'metasAdd'])->middleware(['auth'])->name('api_metas_adicionar');
Route::post('/api/metas/adicionar', [ApiController::class,'metasAdd'])->middleware(['auth'])->name('api_metas_adicionar');
Route::get('/api/metas/editar', [ApiController::class,'metasEdit'])->middleware(['auth'])->name('api_metas_editar');

Route::get('/api/indicadores', [ApiController::class,'indicadores'])->middleware(['auth'])->name('api_indicadores');
Route::get('/api/grandestemas', [ApiController::class,'grandestemas'])->middleware(['auth'])->name('api_grandestemas');
Route::get('/api/objetivos', [ApiController::class,'objetivos'])->middleware(['auth'])->name('api_objetivos');
Route::get('/api/eixos', [ApiController::class,'eixos'])->middleware(['auth'])->name('api_eixos');
Route::get('/api/acoes', [ApiController::class,'acoes'])->middleware(['auth'])->name('api_acoes');


require __DIR__.'/auth.php';
