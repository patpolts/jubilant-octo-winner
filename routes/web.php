<?php

use App\Http\Controllers\AcoesEstrategicasController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EixosController;
use App\Http\Controllers\GrandesTemasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndicadoresAnosController;
use App\Http\Controllers\IndicadoresController;
use App\Http\Controllers\ObjetivosEstrategicosController;
use App\Http\Controllers\OdsController;
use App\Http\Controllers\PneController;
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
#Ações estrategicas
Route::get('/acoes', [AcoesEstrategicasController::class, 'view'])->middleware(['auth'])->name('acao');
Route::get('/acoes/adicionar', [AcoesEstrategicasController::class, 'add'])->middleware(['auth'])->name('acao_adicionar');
Route::post('/acoes/adicionar', [AcoesEstrategicasController::class, 'add'])->middleware(['auth'])->name('acao_adicionar');
Route::get('/acoes/editar/{acoesId}', [AcoesEstrategicasController::class, 'edit'])->middleware(['auth'])->name('acao_editar');
Route::post('/acoes/editar/{acoesId}', [AcoesEstrategicasController::class, 'edit'])->middleware(['auth'])->name('acao_editar');
#Objetivos estrategicas
Route::get('/objetivos', [ObjetivosEstrategicosController::class, 'view'])->middleware(['auth'])->name('objetivos');
Route::get('/objetivos/adicionar', [ObjetivosEstrategicosController::class, 'add'])->middleware(['auth'])->name('objetivos_adicionar');
Route::post('/objetivos/adicionar', [ObjetivosEstrategicosController::class, 'add'])->middleware(['auth'])->name('objetivos_adicionar');
Route::get('/objetivos/editar/{objetivosId}', [ObjetivosEstrategicosController::class, 'edit'])->middleware(['auth'])->name('objetivos_editar');
Route::post('/objetivos/editar/{objetivosId}', [ObjetivosEstrategicosController::class, 'edit'])->middleware(['auth'])->name('objetivos_editar');
#Grande Temas
Route::get('/grandetema', [GrandesTemasController::class, 'view'])->middleware(['auth'])->name('grandetema');
Route::get('/grandetema/adicionar', [GrandesTemasController::class, 'add'])->middleware(['auth'])->name('grandetema_adicionar');
Route::post('/grandetema/adicionar', [GrandesTemasController::class, 'add'])->middleware(['auth'])->name('grandetema_adicionar');
Route::get('/grandetema/editar/{grandeTemaId}', [GrandesTemasController::class, 'edit'])->middleware(['auth'])->name('grandetema_editar');
Route::post('/grandetema/editar/{grandeTemaId}', [GrandesTemasController::class, 'edit'])->middleware(['auth'])->name('grandetema_editar');
#Eixos
Route::get('/eixos', [EixosController::class, 'view'])->middleware(['auth'])->name('eixos');
Route::get('/eixos/adicionar', [EixosController::class, 'add'])->middleware(['auth'])->name('eixos_adicionar');
Route::post('/eixos/adicionar', [EixosController::class, 'add'])->middleware(['auth'])->name('eixos_adicionar');
Route::get('/eixos/editar/{grandeTemaId}', [EixosController::class, 'edit'])->middleware(['auth'])->name('eixos_editar');
Route::post('/eixos/editar/{grandeTemaId}', [EixosController::class, 'edit'])->middleware(['auth'])->name('eixos_editar');
#Ods
Route::get('/ods', [OdsController::class, 'view'])->middleware(['auth'])->name('ods');
Route::get('/ods/adicionar', [OdsController::class, 'add'])->middleware(['auth'])->name('ods_adicionar');
Route::post('/ods/adicionar', [OdsController::class, 'add'])->middleware(['auth'])->name('ods_adicionar');
Route::get('/ods/editar/{odsId}', [OdsController::class, 'edit'])->middleware(['auth'])->name('ods_editar');
Route::post('/ods/editar/{odsId}', [OdsController::class, 'edit'])->middleware(['auth'])->name('ods_editar');
#Pne
Route::get('/pne', [PneController::class, 'view'])->middleware(['auth'])->name('pne');
Route::get('/pne/adicionar', [PneController::class, 'add'])->middleware(['auth'])->name('pne_adicionar');
Route::post('/pne/adicionar', [PneController::class, 'add'])->middleware(['auth'])->name('pne_adicionar');
Route::get('/pne/editar/{pneId}', [PneController::class, 'edit'])->middleware(['auth'])->name('pne_editar');
Route::post('/pne/editar/{pneId}', [PneController::class, 'edit'])->middleware(['auth'])->name('pne_editar');

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
