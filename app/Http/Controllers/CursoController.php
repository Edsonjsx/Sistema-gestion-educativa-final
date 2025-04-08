<?php

namespace App\Http\Controllers;

use App\Models\CursoModel;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        $datos = CursoModel::all();
        return view ('curso', compact('datos'));
    }

    public function create(){
        return view ('agregarcurso');
    }

    public function store(Request $request){
        
        $curso = new CursoModel();
        $curso->nombre = $request->post('nombre');
        $curso->save();

        return redirect()->route('curso.index');
    }

    public function actualizar($id){
        
        $curso = CursoModel::find($id);
        return view ('actualizarcurso', compact('curso'));
        //echo $id;
    }

    public function modificado(Request $request, $id){

        $curso = CursoModel::find($id);
        $curso->nombre = $request->post('nombre');
        $curso->save();

        return redirect()->route('curso.index');

    }

    public function show($id){
        $curso = CursoModel::find($id);
        return view('eliminarcurso', compact('curso'));
    }

    public function destroy($id)
{
    try {
        $curso = CursoModel::findOrFail($id);
        $curso->delete();

        return redirect()->route('curso.index')->with('success', 'Curso eliminado correctamente');
    } catch (\Illuminate\Database\QueryException $e) {
        // Verificamos si el error es por restricción de clave foránea
        if ($e->getCode() == 23000) {
            return redirect()->back()->with('error', 'No se puede eliminar el curso porque está asignado a un docente.');
        }
        return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar el curso.');
    }
}
}
