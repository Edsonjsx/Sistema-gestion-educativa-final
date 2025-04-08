<?php

use App\Http\Controllers\ApoderadoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta de inicio después de autenticación
Route::get('/home', function () {
    // Verificar si el usuario está autenticado
    if (!session('is_logged_in')) {
        return redirect('/');  // Si no está autenticado, redirige al login
    }

    return view('home');  // Página de inicio si está autenticado
})->name('home.index');


    // Ruta para el logout (cerrar sesión)
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Otras rutas protegidas con verificación de autenticación


//vista
//Route::get('/home', [HomeController::class, 'index'])->name('home.index');

//listar vista
Route::get('/apoderado', [ApoderadoController::class, 'index'])->name('apoderado.index');
//vista para crear un nuevo apoderado
Route::get('/apoderado/create', [ApoderadoController::class, 'create'])->name('apoderado.create');
//función donde almacenamos los datos y enviamos al index
Route::post('/apoderado/store', [ApoderadoController::class, 'store'])->name('apoderado.store');
//Funcion para chapar el id
Route::get('/apoderado/actualizar/{id}', [ApoderadoController::class, 'actualizar'])->name('apoderado.actualizar');
//funcion donde mostramos los datos con el id
Route::put('/apoderado/modificado/{id}', [ApoderadoController::class, 'modificado'])->name('apoderado.modificado');
//funcion chapa el id
Route::get('/apoderado/show/{id}', [ApoderadoController::class, 'show'])->name('apoderado.show');
//Elimina dependiendo id
Route::delete('/apoderado/destroy/{id}', [ApoderadoController::class, 'destroy'])->name('apoderado.destroy');


Route::get('/estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/estudiante/create', [EstudianteController::class, 'create'])->name('estudiante.create');
Route::post('/estudiante/store', [EstudianteController::class, 'store'])->name('estudiante.store');
Route::get('/estudiante/actualizar/{id}', [EstudianteController::class, 'actualizar'])->name('estudiante.actualizar');
Route::put('/estudiante/modificado/{id}', [EstudianteController::class, 'modificado'])->name('estudiante.modificado');
Route::get('/estudiante/show/{id}', [EstudianteController::class, 'show'])->name('estudiante.show');
Route::delete('/estudiante/destroy/{id}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');


Route::get('/matricula', [MatriculaController::class, 'index'])->name('matricula.index');
Route::get('/matricula/create', [MatriculaController::class, 'create'])->name('matricula.create');
Route::post('/matricula/store', [MatriculaController::class, 'store'])->name('matricula.store');
Route::get('/matricula/actualizar/{id}', [MatriculaController::class, 'actualizar'])->name('matricula.actualizar');
Route::put('/matricula/modificado/{id}', [MatriculaController::class, 'modificado'])->name('matricula.modificado');
Route::get('/matricula/show/{id}', [MatriculaController::class, 'show'])->name('matricula.show');
Route::delete('/matricula/destroy/{id}', [MatriculaController::class, 'destroy'])->name('matricula.destroy');

Route::get('/docente', [DocenteController::class, 'index'])->name('docente.index');
Route::get('/docente/create', [DocenteController::class, 'create'])->name('docente.create');
Route::post('/docente/store', [DocenteController::class, 'store'])->name('docente.store');
Route::get('/docente/actualizar/{id}', [DocenteController::class, 'actualizar'])->name('docente.actualizar');
Route::put('/docente/modificado/{id}', [DocenteController::class, 'modificado'])->name('docente.modificado');
Route::get('/docente/show/{id}', [DocenteController::class, 'show'])->name('docente.show');
Route::delete('/docente/destroy/{id}', [DocenteController::class, 'destroy'])->name('docente.destroy');


Route::get('/curso', [CursoController::class, 'index'])->name('curso.index');
Route::get('/curso/create', [CursoController::class, 'create'])->name('curso.create');
Route::post('/curso/store', [CursoController::class, 'store'])->name('curso.store');
Route::get('/curso/actualizar/{id}', [CursoController::class, 'actualizar'])->name('curso.actualizar');
Route::put('/curso/modificado/{id}', [CursoController::class, 'modificado'])->name('curso.modificado');
Route::get('/curso/show/{id}', [CursoController::class, 'show'])->name('curso.show');
Route::delete('/curso/destroy/{id}', [CursoController::class, 'destroy'])->name('curso.destroy');

