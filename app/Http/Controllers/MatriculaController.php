<?php

namespace App\Http\Controllers;

use App\Models\EstudianteModel;
use App\Models\MatriculaModel;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    //funcion para crear la vista matricula y traer todos los datos
    public function index()
    {
        $datos = MatriculaModel::all();
        return view('matricula', compact('datos'));
    }

    //funcion para crear vista agregar y chapar datos de estudiante exactamente nombre
    public function create(){
        $estudiante = EstudianteModel::all();
        return view ('agregarmatricula', compact('estudiante'));
    }

    //funcion donde podemos utilizar a la tabla estudiante para traer exactamente el nombre en un combobox
    public function actualizar($id){
        
        $matricula = MatriculaModel::find($id);
        $estudiante = EstudianteModel::all();

        return view('actualizarmatricula', compact('matricula','estudiante'));
    }

    //funcion para modificar
    public function modificado(Request $request, $id){

        $matricula = MatriculaModel::find($id);
        $matricula->id_estudiante = $request->post('id_estudiante');
        $matricula->fecha_matricula = $request->post('fecha_matricula');
        $matricula->estado_matricula = $request->post('estado_matricula');
        $matricula->certificado_notas = $request->post('certificado_notas');
        $matricula->traslado = $request->post('traslado');
        $matricula->otros_documentos = $request->post('otros_documentos');
        $matricula->fecha_solicitud = $request->post('fecha_solicitud');
        $matricula->observaciones = $request->post('observaciones');
        $matricula->save();

        return redirect()->route('matricula.index');

    }

    public function show($id){
        $matricula = MatriculaModel::find($id);
        return view('eliminarmatricula', compact('matricula'));
    }

    public function destroy($id){
        
        $matricula = MatriculaModel::find($id);
        $matricula->delete();
        return redirect()->route('matricula.index');
    }

    public function store(Request $request){
        
        $matricula = new MatriculaModel();
        $matricula->id_estudiante = $request->post('id_estudiante');
        $matricula->fecha_matricula = $request->post('fecha_matricula');
        $matricula->estado_matricula = $request->post('estado_matricula');
        $matricula->certificado_notas = $request->post('certificado_notas');
        $matricula->traslado = $request->post('traslado');
        $matricula->otros_documentos = $request->post('otros_documentos');
        $matricula->fecha_solicitud = $request->post('fecha_solicitud');
        $matricula->observaciones = $request->post('observaciones');
        $matricula->save();

        return redirect()->route('matricula.index');
    }
}
