<?php

namespace App\Http\Controllers;

use App\Models\CursoModel;
use App\Models\DocenteModel;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index(){
        $datos = DocenteModel::where('estado', 1)->get();
        return view ('docente', compact('datos'));
    }

    public function create(){
        $curso = CursoModel::all();
        return view('agregardocente', compact('curso'));
    }

     //funcion donde podemos utilizar a la tabla curso para traer exactamente el nombre en un combobox
     public function actualizar($id){
        
        $docente = DocenteModel::find($id);
        $curso = CursoModel::all();

        return view('actualizardocente', compact('docente','curso'));
    }

    //funcion para modificar
    public function modificado(Request $request, $id){

        $docente = DocenteModel::find($id);
        $docente->nombre = $request->post('nombre');
        $docente->apellido_paterno = $request->post('apellido_paterno');
        $docente->apellido_materno = $request->post('apellido_materno');
        $docente->dni = $request->post('dni');
        $docente->id_curso = $request->post('id_curso');
        $docente->estado = $request->post('estado',1);
        $docente->save();

        return redirect()->route('docente.index');

    }

    public function show($id){
        $docente = DocenteModel::find($id);
        return view('eliminardocente', compact('docente'));
    }

    public function destroy($id)
    {
    // Buscar al estudiante
    $docente = DocenteModel::find($id);

    // Verificar si el estudiante existe
    if (!$docente) {
        return redirect()->route('docente.index')->with('error', 'Docente no encontrado.');
    }

    // Realizar la eliminación lógica
    $docente->eliminarLogico();

    // Redireccionar con mensaje de éxito
    return redirect()->route('docente.index')->with('success', 'Docente eliminado correctamente.');
    }

    public function store(Request $request){
        
        $docente = new DocenteModel();
        $docente->nombre = $request->post('nombre');
        $docente->apellido_paterno = $request->post('apellido_paterno');
        $docente->apellido_materno = $request->post('apellido_materno');
        $docente->dni = $request->post('dni');
        $docente->id_curso = $request->post('id_curso');
        $docente->estado = 1;
        $docente->save();

        return redirect()->route('docente.index');
    }

}
