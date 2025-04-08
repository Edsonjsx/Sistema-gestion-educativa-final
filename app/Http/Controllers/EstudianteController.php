<?php

namespace App\Http\Controllers;

use App\Models\ApoderadoModel;
use App\Models\EstudianteModel;
use App\Models\GradoModel;
use App\Models\SeccionModel;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $datos = EstudianteModel::where('estado', 1)->get();
        return view('estudiante', compact('datos'));
    }

    public function create()
    {
        $apoderado = ApoderadoModel::all();
        $grado = GradoModel::all();
        $seccion = SeccionModel::all();

        return view('agregarestudiante', compact('apoderado', 'grado', 'seccion'));
    }

    public function actualizar($id)
    {

        $estudiante = EstudianteModel::find($id);
        $apoderado = ApoderadoModel::all();
        $grado = GradoModel::all();
        $seccion = SeccionModel::all();

        return view('actualizarestudiante', compact('estudiante', 'apoderado', 'grado', 'seccion'));
    }

    public function modificado(Request $request, $id)
    {

        $estudiante = EstudianteModel::find($id);
        $estudiante->nombre = $request->post('nombre');
        $estudiante->apellido_paterno = $request->post('apellido_paterno');
        $estudiante->apellido_materno = $request->post('apellido_materno');
        $estudiante->dni = $request->post('dni');
        $estudiante->fecha_nacimiento = $request->post('fecha_nacimiento');

        $estudiante->id_apoderado = $request->post('id_apoderado');
        $estudiante->id_grado = $request->post('id_grado');
        $estudiante->id_seccion = $request->post('id_seccion');
        $estudiante->estado = $request->post('estado',1);
        $estudiante->save();

        return redirect()->route('estudiante.index');
    }

    public function show($id)
    {
        $estudiante = EstudianteModel::find($id);
        return view('eliminarestudiante', compact('estudiante'));
    }

    public function destroy($id)
    {

    // Buscar al estudiante
    $estudiante = EstudianteModel::find($id);

    // Verificar si el estudiante existe
    if (!$estudiante) {
        return redirect()->route('estudiante.index')->with('error', 'Estudiante no encontrado.');
    }

    // Realizar la eliminación lógica
    $estudiante->eliminarLogico();

    // Redireccionar con mensaje de éxito
    return redirect()->route('estudiante.index')->with('success', 'Estudiante eliminado correctamente.');
    }

    public function store(Request $request)
    {

        $estudiante = new EstudianteModel();
        $estudiante->nombre = $request->post('nombre');
        $estudiante->apellido_paterno = $request->post('apellido_paterno');
        $estudiante->apellido_materno = $request->post('apellido_materno');
        $estudiante->dni = $request->post('dni');
        $estudiante->fecha_nacimiento = $request->post('fecha_nacimiento');

        $estudiante->id_apoderado = $request->post('id_apoderado');
        $estudiante->id_grado = $request->post('id_grado');
        $estudiante->id_seccion = $request->post('id_seccion');
        $estudiante->estado = 1;
        $estudiante->save();

        return redirect()->route('estudiante.index');
    }
}
