<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\solicitudesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use App\Http\Controllers\PerfilController;
use App\Models\Menu;
use App\Http\Controllers\Auth\ResetPasswordController;


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
/*
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/


/*Route::get('/', function () {
    return view('auth.login');
});*/

Route::get('/', function () {
    return view('auth.login');

}); //->middleware(['auth', 'verified']);

Route::get('/perfil',[App\Http\Controllers\PerfilController::class, 'indexx' ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
Auth::routes(['verify' => true]);

Route::get('lte', [App\Http\Controllers\MenuController::class, 'index']);



Route::get('menu', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('/nuwwe/tiposolicitud', [App\Http\Controllers\NuwweController::class, 'tiposolicitud']);
Route::get('/nuwwe/tiposolicitudId/{id}', [App\Http\Controllers\NuwweController::class, 'tiposolicitudId']);
Route::get('/nuwwe/solicitud', [App\Http\Controllers\NuwweController::class, 'solicitud']);
Route::get('/nuwwe/solicitudId/{id}', [App\Http\Controllers\NuwweController::class, 'solicitudId']);
//Route::get('/nuwwe/solicitudStore', [App\Http\Controllers\NuwweController::class, 'solicitudstore']);
//Route::put('/nuwwe/solicitudEnviar', [App\Http\Controllers\NuwweController::class, 'solicitudEnviar']);
//Route::put('/nuwwe/solicitudEnvia','NuwweController@solicitudEnviar');
Route::put('/nuwwe/solicitudEnviar', [App\Http\Controllers\NuwweController::class, 'solicitudEnviar'])->name('solicitudEnviar');


Route::get('/nuwwe/historicoSolicitud', [App\Http\Controllers\NuwweController::class, 'historicoSolicitud']);

//Route::get('/nuwwe/inmueble', [App\Http\Controllers\NuwweController::class, 'inmueble']);
//Route::get('/nuwwe/inmueblesCliente', [App\Http\Controllers\NuwweController::class, 'inmueblesCliente']);
//Route::get('/nuwwe/inmuebleId/{id}', [App\Http\Controllers\NuwweController::class, 'inmuebleId']);


//Route::get('/nuwwe/tipoInmueble', [App\Http\Controllers\NuwweController::class, 'tipoInmueble']);
//Route::get('/nuwwe/solicitudTramite', [App\Http\Controllers\NuwweController::class, 'solicitudTramite']);
//Route::get('/nuwwe/solicitudTramiteId/{id}', [App\Http\Controllers\NuwweController::class, 'solicitudTramiteId']);

Route::get('/nuwwe/responsableSolicitud', [App\Http\Controllers\NuwweController::class, 'responsableSolicitud']);
Route::get('/nuwwe/responsableSolicitudId/{id}', [App\Http\Controllers\NuwweController::class, 'responsableSolicitudId']);
Route::get('/nuwwe/cliente', [App\Http\Controllers\NuwweController::class, 'cliente']);
Route::get('/nuwwe/clienteId/{id}', [App\Http\Controllers\NuwweController::class, 'clienteId']);
Route::get('/nuwwe/tipoCliente', [App\Http\Controllers\NuwweController::class, 'tipoCliente']);
Route::get('/nuwwe/tipoClienteId/{id}', [App\Http\Controllers\NuwweController::class, 'tipoClienteId']);
//Route::get('/nuwwe/inmuebleVideoId/{id}', [App\Http\Controllers\NuwweController::class, 'inmuebleVideoId']);
//Route::get('/nuwwe/inmuebleVideoUpLoad', [App\Http\Controllers\NuwweController::class, 'inmuebleVideoUpLoad']);
//Route::get('/nuwwe/inmuebleFoto', [App\Http\Controllers\NuwweController::class, 'inmuebleFoto']);
Route::get('/nuwwe/destroy', [App\Http\Controllers\NuwweController::class, 'destroy']);
//Route::get('/nuwwe/inmueblesCliente', [App\Http\Controllers\NuwweController::class, 'inmueblesCliente']);

//Route::resource('solicitudes', solicitudesController::class);
Route::get('solicitudes', [App\Http\Controllers\solicitudesController::class, 'index'])->name('solicitudes.index')->middleware(['auth', 'verified']);
Route::put('solicitudes', [App\Http\Controllers\solicitudesController::class, 'store'])->name('solicitudes.store')->middleware(['auth', 'verified']);
Route::get('solicitudes/create', [App\Http\Controllers\solicitudesController::class, 'create'])->name('solicitudes.create')->middleware(['auth', 'verified']);
//Route::get('solicitudes/createDos', [App\Http\Controllers\SolicitudesController::class, 'createDos'])->name('solicitudes.createDos')->middleware(['auth', 'verified']);
//Route::get('solicitudes/createDos', [App\Http\Controllers\solicitudesController::class, 'create'])->name('solicitudes.createDos')->middleware(['auth', 'verified']);
Route::get('solicitudes/{id}', [App\Http\Controllers\solicitudesController::class, 'show'])->name('solicitudes.show')->middleware(['auth', 'verified']);
//Route::get('solicitudes/{id}', [App\Http\Controllers\solicitudesController::class, 'show'])->name('solicitudes.show')->middleware(['auth', 'verified']);
Route::delete('solicitudes/{solicitude}', [App\Http\Controllers\solicitudesController::class, 'destroy'])->name('solicitudes.destroy')->middleware(['auth', 'verified']);

// INICIO NUEVOS DE PRUEBAS COPIA DE SOLICITUDES

Route::get('pruebas', [App\Http\Controllers\pruebasController::class, 'index'])->name('solicitudes.index')->middleware(['auth', 'verified']);
Route::put('pruebas', [App\Http\Controllers\pruebasController::class, 'store'])->name('solicitudes.store')->middleware(['auth', 'verified']);
Route::get('pruebas/create', [App\Http\Controllers\pruebasController::class, 'create'])->name('solicitudes.create')->middleware(['auth', 'verified']);
//Route::get('pruebas/{id}', [App\Http\Controllers\pruebasController::class, 'show'])->name('solicitude.show')->middleware(['auth', 'verified']);
//Route::get('pruebas/{id}', [App\Http\Controllers\solicitudesController::class, 'show'])->name('pruebas.show')->middleware(['auth', 'verified']);
//Route::get('pruebas/{id}', [App\Http\Controllers\pruebasController::class, 'pruebas'])->name('pruebas.show')->middleware(['auth', 'verified']);
//Route::get('solicitudes/duplicate/{id}', [App\Http\Controllers\pruebasController::class, 'duplicate'])->name('solicitudes.duplicate')->middleware(['auth', 'verified']);
//Route::get('pruebas/{id}', [App\Http\Controllers\pruebasController::class, 'duplicate'])->name('pruebas.duplicate')->middleware(['auth', 'verified']);
Route::get('pruebas/{id}', [App\Http\Controllers\PruebasController::class, 'show'])->name('pruebas.show')->middleware(['auth', 'verified']);
//Route::get('solicitudes/{id}', [App\Http\Controllers\solicitudesController::class, 'show'])->name('solicitudes.show')->middleware(['auth', 'verified']);

Route::delete('pruebas/{prueba}', [App\Http\Controllers\pruebasController::class, 'destroy'])->name('solicitudes.destroy')->middleware(['auth', 'verified']);

// FIN NUEVOS DE PRUEBAS COPIA DE SOLICITUDES

Route::get('solicitudes_seguimiento', [App\Http\Controllers\solicitudesController::class, 'index_seguimiento'])->name('solicitudes.index_seguimiento')->middleware(['auth', 'verified']);
Route::get('solicitudes_seguimiento/{id}', [App\Http\Controllers\solicitudesController::class, 'show_seguimiento'])->name('solicitudes.show_seguimiento')->middleware(['auth', 'verified']);

Route::get('solicitudes_seguimiento_admin', [App\Http\Controllers\solicitudesController::class, 'index_seguimiento_admin'])->name('solicitudes.index_seguimiento_admin')->middleware(['auth', 'verified']);
Route::get('solicitudes_seguimiento_admin/{id}', [App\Http\Controllers\solicitudesController::class, 'show_seguimiento_admin'])->name('solicitudes.show_seguimiento_admin')->middleware(['auth', 'verified']);
Route::get('solicitudes/{id}/edit', [App\Http\Controllers\solicitudesController::class, 'edit'])->name('solicitudes.edit')->middleware(['auth', 'verified']);
Route::patch('solicitudes/{id}', [App\Http\Controllers\solicitudesController::class, 'update'])->name('solicitudes.update')->middleware(['auth', 'verified']);

//Route::get('solicitudes', [App\Http\Controllers\solicitudesController::class, 'index'])->name('solicitudes');
//Route::get('solicitudes/create', [App\Http\Controllers\solicitudesController::class, 'create'])->name('create');
//Route::post('solicitudes/create', [App\Http\Controllers\solicitudesController::class, 'create']);


//Route::get('solicitudes/create', [App\Http\Controllers\NuwweController::class, 'tiposolicitud'])->name('create');
//Route::get('solicitudes/create', [App\Http\Controllers\NuwweController::class, 'inmueblesCliente'])->name('create');

//Route::resource('solicitudes', [App\Http\Controllers\solicitudesController::class]);

Route::get('logs', [App\Http\Controllers\logsController::class, 'index'])->name('logs.index');
Route::put('logs', [App\Http\Controllers\logsController::class, 'store'])->name('logs.store');
Route::get('logs/create', [App\Http\Controllers\logsController::class, 'create'])->name('logs.create');
Route::get('logs/{id}', [App\Http\Controllers\logsController::class, 'show'])->name('logs.show');


Route::post('perfil/actualizar', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update')->middleware(['auth', 'verified']);
Route::post('perfil/actualizarContrasena', [App\Http\Controllers\PerfilController::class, 'updatePassword'])->name('perfil.updatePassword')->middleware(['auth', 'verified']);
Route::post('reset/actualizarContrasena', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePasswordReset'])->name('resetPassword.updatePasswordReset');




/**Ruta de correo electronico verificar */
Route::get('email/verify',  function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

// El controlador de verificación de correo electrónico
Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware('verified');


/*
Route::get('pruebas', [App\Http\Controllers\pruebasController::class, 'index'])->name('pruebas.index');
Route::put('pruebas', [App\Http\Controllers\pruebasController::class, 'store'])->name('pruebas.store');
Route::get('pruebas/create', [App\Http\Controllers\pruebasController::class, 'create'])->name('pruebas.create');
Route::get('pruebas/{id}', [App\Http\Controllers\pruebasController::class, 'show'])->name('pruebas.show');
 */
Route::get('adjuntos', [App\Http\Controllers\adjuntosController::class, 'index'])->name('adjuntos.index');
Route::put('adjuntos', [App\Http\Controllers\adjuntosController::class, 'store'])->name('adjuntos.store');
Route::get('adjuntos/create', [App\Http\Controllers\adjuntosController::class, 'create'])->name('adjuntos.create');
Route::get('adjuntos/{id}', [App\Http\Controllers\adjuntosController::class, 'show'])->name('adjuntos.show');

Route::put('seguimientos', [App\Http\Controllers\seguimientosController::class, 'store'])->name('seguimientos.store')->middleware(['auth', 'verified']);

Route::get('usuarios', [App\Http\Controllers\usuariosController::class, 'index'])->name('usuarios.index')->middleware(['auth', 'verified']);
Route::put('usuarios', [App\Http\Controllers\usuariosController::class, 'store'])->name('usuarios.index')->middleware(['auth', 'verified']);
Route::get('usuarios/create', [App\Http\Controllers\usuariosController::class, 'create'])->name('usuarios.create')->middleware(['auth', 'verified']);
Route::get('usuarios/{id}/edit', [App\Http\Controllers\usuariosController::class, 'edit'])->name('usuarios.edit')->middleware(['auth', 'verified']);
Route::patch('usuarios/{id}', [App\Http\Controllers\usuariosController::class, 'update'])->name('usuarios.update')->middleware(['auth', 'verified']);


//Route::get('bitacora', [App\Http\Controllers\BitacoraController::class, 'indexx'])->name('bitacora.index');

//rutas  de plataforma
Route::get('plataforma', [App\Http\Controllers\PlataformaController::class, 'index'])->name('plataforma.index')->middleware(['auth', 'verified']);
Route::post('plataforma/{id}', [App\Http\Controllers\PlataformaController::class, 'modificar'])->name('plataforma.modificar')->middleware(['auth', 'verified']);


Route::get('estado', [App\Http\Controllers\EstadoController::class, 'index'])->name('estado.index')->middleware(['auth', 'verified']);
Route::get('verificar', [App\Http\Controllers\EstadoController::class, 'verificar'])->name('estado.verificar')->middleware(['auth', 'verified']);

Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index')->middleware(['auth', 'verified']);
Route::get('roles/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit')->middleware(['auth', 'verified']);
Route::put('rol', [App\Http\Controllers\RoleController::class, 'guardar'])->name('role.guardar')->middleware(['auth', 'verified']);


Route::get('costo_doblez', [App\Http\Controllers\costo_doblezController::class, 'index'])->name('costo_doblez.index')->middleware(['auth', 'verified']);
Route::put('costo_doblez', [App\Http\Controllers\costo_doblezController::class, 'store'])->name('costo_doblez.index')->middleware(['auth', 'verified']);
Route::get('costo_doblez/create', [App\Http\Controllers\costo_doblezController::class, 'create'])->name('costo_doblez.create')->middleware(['auth', 'verified']);
Route::get('costo_doblez/{id}/edit', [App\Http\Controllers\costo_doblezController::class, 'edit'])->name('costo_doblez.edit')->middleware(['auth', 'verified']);
Route::patch('costo_doblez/{id}', [App\Http\Controllers\costo_doblezController::class, 'update'])->name('costo_doblez.update')->middleware(['auth', 'verified']);
Route::delete('costo_doblez/{id}', [App\Http\Controllers\costo_doblezController::class, 'destroy'])->name('costo_doblez.destroy')->middleware(['auth', 'verified']);

Route::get('costo_caracol', [App\Http\Controllers\costo_caracolController::class, 'index'])->name('costo_caracol.index')->middleware(['auth', 'verified']);
Route::put('costo_caracol', [App\Http\Controllers\costo_caracolController::class, 'store'])->name('costo_caracol.index')->middleware(['auth', 'verified']);
Route::get('costo_caracol/create', [App\Http\Controllers\costo_caracolController::class, 'create'])->name('costo_caracol.create')->middleware(['auth', 'verified']);
Route::get('costo_caracol/{id}/edit', [App\Http\Controllers\costo_caracolController::class, 'edit'])->name('costo_caracol.edit')->middleware(['auth', 'verified']);
Route::patch('costo_caracol/{id}', [App\Http\Controllers\costo_caracolController::class, 'update'])->name('costo_caracol.update')->middleware(['auth', 'verified']);
Route::delete('costo_caracol/{id}', [App\Http\Controllers\costo_caracolController::class, 'destroy'])->name('costo_caracol.destroy')->middleware(['auth', 'verified']);

Route::get('costo_ab', [App\Http\Controllers\costo_abController::class, 'index'])->name('costo_ab.index')->middleware(['auth', 'verified']);
Route::put('costo_ab', [App\Http\Controllers\costo_abController::class, 'store'])->name('costo_ab.index')->middleware(['auth', 'verified']);
Route::get('costo_ab/create', [App\Http\Controllers\costo_abController::class, 'create'])->name('costo_ab.create')->middleware(['auth', 'verified']);
Route::get('costo_ab/{id}/edit', [App\Http\Controllers\costo_abController::class, 'edit'])->name('costo_ab.edit')->middleware(['auth', 'verified']);
Route::patch('costo_ab/{id}', [App\Http\Controllers\costo_abController::class, 'update'])->name('costo_ab.update')->middleware(['auth', 'verified']);
Route::delete('costo_ab/{id}', [App\Http\Controllers\costo_abController::class, 'destroy'])->name('costo_ab.destroy')->middleware(['auth', 'verified']);

Route::get('costo_curvas', [App\Http\Controllers\costo_curvasController::class, 'index'])->name('costo_curvas.index')->middleware(['auth', 'verified']);
Route::put('costo_curvas', [App\Http\Controllers\costo_curvasController::class, 'store'])->name('costo_curvas.index')->middleware(['auth', 'verified']);
Route::get('costo_curvas/create', [App\Http\Controllers\costo_curvasController::class, 'create'])->name('costo_curvas.create')->middleware(['auth', 'verified']);
Route::get('costo_curvas/{id}/edit', [App\Http\Controllers\costo_curvasController::class, 'edit'])->name('costo_curvas.edit')->middleware(['auth', 'verified']);
Route::patch('costo_curvas/{id}', [App\Http\Controllers\costo_curvasController::class, 'update'])->name('costo_curvas.update')->middleware(['auth', 'verified']);
Route::delete('costo_curvas/{id}', [App\Http\Controllers\costo_curvasController::class, 'destroy'])->name('costo_curvas.destroy')->middleware(['auth', 'verified']);

Route::get('variables', [App\Http\Controllers\variablesController::class, 'index'])->name('variables.index')->middleware(['auth', 'verified']);
Route::put('variables', [App\Http\Controllers\variablesController::class, 'store'])->name('variables.index')->middleware(['auth', 'verified']);
Route::get('variables/create', [App\Http\Controllers\variablesController::class, 'create'])->name('variables.create')->middleware(['auth', 'verified']);
Route::get('variables/{id}/edit', [App\Http\Controllers\variablesController::class, 'edit'])->name('variables.edit')->middleware(['auth', 'verified']);
Route::patch('variables/{id}', [App\Http\Controllers\variablesController::class, 'update'])->name('variables.update')->middleware(['auth', 'verified']);
Route::delete('variables/{id}', [App\Http\Controllers\variablesController::class, 'destroy'])->name('variables.destroy')->middleware(['auth', 'verified']);

Route::get('solicitudes/{id}/edit', [App\Http\Controllers\SolicitudesController::class, 'edit'])->name('solicitudes.edit')->middleware(['auth', 'verified']);
