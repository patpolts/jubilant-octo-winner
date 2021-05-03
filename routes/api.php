<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    $res = array(
        "data" => array(
            "username" => $request->user->email,
            "name" => $request->user->name,
            "admin" => $request->user->is_superadmin,
        )
    );
    return response($res, 200)->header('Content-Type', 'text/json');
})->middleware(['auth:api'])->name('auth_api');


Route::get('/', [ApiController::class,'home'])->middleware(['auth'])->name('api_metas_adicionar');

Route::get('/metas', [ApiController::class,'metas'])->middleware(['auth'])->name('api_metas');
Route::get('/metas/adicionar', [ApiController::class,'metasAdd'])->middleware(['auth'])->name('api_metas_adicionar');

