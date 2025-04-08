<?php

namespace App\Http\Controllers;

use App\Models\ApoderadoModel;
use Illuminate\Http\Request;

class ApoderadoController extends Controller
{
    public function index(){
        $datos = ApoderadoModel::all();
        return view ('apoderado', compact('datos'));
    }

    public function create(){
        return view ('agregarapoderado');
    }

    public function actualizar($id){
        
        $apoderado = ApoderadoModel::find($id);
        return view ('actualizarapoderado', compact('apoderado'));
        //echo $id;
    }

    public function modificado(Request $request, $id){

        $apoderado = ApoderadoModel::find($id);
        $apoderado->nombre = $request->post('nombre');
        $apoderado->apellido_paterno = $request->post('apellido_paterno');
        $apoderado->apellido_materno = $request->post('apellido_materno');
        $apoderado->dni = $request->post('dni');
        $apoderado->direccion = $request->post('direccion');
        $apoderado->telefono = $request->post('telefono');
        $apoderado->correo = $request->post('correo');
        $apoderado->save();

        return redirect()->route('apoderado.index');

    }

    public function show($id){
        $apoderado = ApoderadoModel::find($id);
        return view('eliminarapoderado', compact('apoderado'));
    }

    public function destroy($id){
        
        $apoderado = ApoderadoModel::find($id);
        $apoderado->delete();
        return redirect()->route('apoderado.index');
    }

    public function store(Request $request){
        
        $apoderado = new ApoderadoModel();
        $apoderado->nombre = $request->post('nombre');
        $apoderado->apellido_paterno = $request->post('apellido_paterno');
        $apoderado->apellido_materno = $request->post('apellido_materno');
        $apoderado->dni = $request->post('dni');
        $apoderado->direccion = $request->post('direccion');
        $apoderado->telefono = $request->post('telefono');
        $apoderado->correo = $request->post('correo');
        $apoderado->save();

        return redirect()->route('apoderado.index');
    }
}
