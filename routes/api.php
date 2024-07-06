<?php

use App\Http\Controllers\AccionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CasosController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\GuiaDevolucionController;
use App\Http\Controllers\HoraExtraController;
use App\Http\Controllers\OrdenRefaccionController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\RefaccionController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\NumeroOrdenController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('user_details', [AuthController::class, 'getUserDetails']);

    //CLIENTE
    Route::prefix('/cliente')
        ->name('api.cliente.')
        ->group(function () {
            Route::post('/store', [ClienteController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ClienteController::class, 'update'])->name('update');
            Route::post('/select', [ClienteController::class, 'select'])->name('select');
            Route::post('/index', [ClienteController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [ClienteController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [ClienteController::class, 'delete'])->name('delete');
        });


    //EMPLEADO
    Route::prefix('/empleado')
        ->name('api.empleado.')
        ->group(function () {
            Route::post('/store', [EmpleadoController::class, 'store'])->name('store');
            Route::post('/update/{id}', [EmpleadoController::class, 'update'])->name('update');
            Route::post('/select', [EmpleadoController::class, 'select'])->name('select');
            Route::post('/index', [EmpleadoController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [EmpleadoController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [EmpleadoController::class, 'delete'])->name('delete');
        });

    //USER
    Route::prefix('/user')
        ->name('api.user.')
        ->group(function () {
            Route::post('/store', [UsuarioController::class, 'store'])->name('store');
            Route::post('/update/{id}', [UsuarioController::class, 'update'])->name('update');
            Route::post('/index', [UsuarioController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [UsuarioController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [UsuarioController::class, 'delete'])->name('delete');
        });


    //TIPO DOCUMENTO
    Route::prefix('/tipo_documento')
        ->name('api.tipo_documento.')
        ->group(function () {
            Route::post('/store', [TipoDocumentoController::class, 'store'])->name('store');
            Route::post('/update/{id}', [TipoDocumentoController::class, 'update'])->name('update');
            Route::post('/index', [TipoDocumentoController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [TipoDocumentoController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [TipoDocumentoController::class, 'delete'])->name('delete');
        });

    //DISTRITO
    Route::prefix('/distrito')
        ->name('api.distrito.')
        ->group(function () {
            Route::post('/index', [DistritoController::class, 'index'])->name('index');
        });

    //DEPARTAMENTO
    Route::prefix('/departamento')
        ->name('api.departamento.')
        ->group(function () {
            Route::post('/index', [DepartamentoController::class, 'index'])->name('index');
        });

    //PROVINCIA
    Route::prefix('/provincia')
        ->name('api.provincia.')
        ->group(function () {
            Route::post('/index', [ProvinciaController::class, 'index'])->name('index');
        });

    //EMPLEADO
    Route::prefix('/equipo')
        ->name('api.equipo.')
        ->group(function () {
            Route::post('/store', [EquipoController::class, 'store'])->name('store');
            Route::post('/update/{id}', [EquipoController::class, 'update'])->name('update');
            Route::post('/index', [EquipoController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [EquipoController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [EquipoController::class, 'delete'])->name('delete');
        });

    //GUIA DE DEVOLUCION
    Route::prefix('/guia_devolucion')
        ->name('api.guia_devolucion.')
        ->group(function () {
            Route::post('/store', [GuiaDevolucionController::class, 'store'])->name('store');
            Route::post('/update/{id}', [GuiaDevolucionController::class, 'update'])->name('update');
            Route::post('/index', [GuiaDevolucionController::class, 'index'])->name('index');
            Route::post('/select', [GuiaDevolucionController::class, 'select'])->name('select');
            Route::get('/edit/{id}', [GuiaDevolucionController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [GuiaDevolucionController::class, 'delete'])->name('delete');
        });

    //REFACCION
    Route::prefix('/refaccion')
        ->name('api.refaccion.')
        ->group(function () {
            Route::post('/store', [RefaccionController::class, 'store'])->name('store');
            Route::post('/update/{id}', [RefaccionController::class, 'update'])->name('update');
            Route::post('/index', [RefaccionController::class, 'index'])->name('index');
            Route::post('/select', [RefaccionController::class, 'select'])->name('select');
            Route::get('/edit/{id}', [RefaccionController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [RefaccionController::class, 'delete'])->name('delete');
        });

    //ACCION
    Route::prefix('/accion')
        ->name('api.accion.')
        ->group(function () {
            Route::post('/store', [AccionController::class, 'store'])->name('store');
            Route::post('/update/{id}', [AccionController::class, 'update'])->name('update');
            Route::post('/index', [AccionController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [AccionController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [AccionController::class, 'delete'])->name('delete');
        });

    //HORA EXTRAS
    Route::prefix('/hora_extra')
        ->name('api.hora_extra.')
        ->group(function () {
            Route::post('/store', [HoraExtraController::class, 'store'])->name('store');
            Route::post('/update/{id}', [HoraExtraController::class, 'update'])->name('update');
            Route::post('/index', [HoraExtraController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [HoraExtraController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [HoraExtraController::class, 'delete'])->name('delete');
        });

    //CASOS
    Route::prefix('/casos')
        ->name('api.casos.')
        ->group(function () {
            Route::post('/store', [CasosController::class, 'store'])->name('store');
            Route::post('/update/{id}', [CasosController::class, 'update'])->name('update');
            Route::post('/index', [CasosController::class, 'index'])->name('index');
            Route::post('/select', [CasosController::class, 'select'])->name('select');
            Route::get('/edit/{id}', [CasosController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [CasosController::class, 'delete'])->name('delete');
        });

    //NUMERO DE ORDEN
    Route::prefix('/numero_orden')
        ->name('api.numero_orden.')
        ->group(function () {
            Route::post('/store', [NumeroOrdenController::class, 'store'])->name('store');
            Route::post('/update/{id}', [NumeroOrdenController::class, 'update'])->name('update');
            Route::post('/index', [NumeroOrdenController::class, 'index'])->name('index');
            Route::post('/select', [NumeroOrdenController::class, 'select'])->name('select');
            Route::get('/edit/{id}', [NumeroOrdenController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [NumeroOrdenController::class, 'delete'])->name('delete');
        });
    
    //NUMERO DE ORDEN
    Route::prefix('/orden_refaccion')
        ->name('api.orden_refaccion.')
        ->group(function () {
            Route::post('/store', [OrdenRefaccionController::class, 'store'])->name('store');
            Route::post('/update/{id}', [OrdenRefaccionController::class, 'update'])->name('update');
            Route::post('/index', [OrdenRefaccionController::class, 'index'])->name('index');
            Route::post('/select', [OrdenRefaccionController::class, 'select'])->name('select');
            Route::get('/edit/{id}', [OrdenRefaccionController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [OrdenRefaccionController::class, 'delete'])->name('delete');
        });

});