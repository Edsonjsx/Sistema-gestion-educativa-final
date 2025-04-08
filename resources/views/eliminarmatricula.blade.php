@extends('layouts.appmatricula')

@section('content')

<div class="flex flex-col items-center justify-start min-h-screen bg-gray-100">
    <h1 class="text-center text-gray-800 text-2xl font-medium mt-8">Eliminar una Matricula</h1>

    <div class="flex justify-center mt-4 w-full">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 overflow-x-auto">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Estas seguro de eliminar esta Matricula !!!</strong>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Cerrar</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.301-2.627-2.301-2.627a1.2 1.2 0 0 1 1.697-1.697L10 8.183l2.651-3.029a1.2 1.2 0 1 1 1.697 1.697L11.699 9.873l2.301 2.627a1.2 1.2 0 0 1 0 1.697z" />
                    </svg>
                </span>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-4 w-full">
        <div class="w-full max-w-6xl bg-white shadow-lg rounded-lg p-6 overflow-x-auto">
            <table class="w-full border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-300 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Fecha Matricula</th>
                        <th class="py-3 px-4 text-left">Estado Matricula</th>
                        <th class="py-3 px-4 text-left">Certificado Notas</th>
                        <th class="py-3 px-4 text-left">Traslado</th>
                        <th class="py-3 px-4 text-left">Otros documentos</th>
                        <th class="py-3 px-4 text-left">Fecha Solicitud</th>
                        <th class="py-3 px-4 text-left">Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <tr class="py-4 px-6 text-center text-gray-500" colspan="8">
                    </tr>
                       <td class="py-3 px-4">{{$matricula->estudiante->nombre}}</td>
                       <td class="py-3 px-4">{{$matricula->fecha_matricula}}</td>
                       <td class="py-3 px-4">{{$matricula->estado_matricula}}</td>
                       <td class="py-3 px-4">{{$matricula->certificado_notas}}</td>
                       <td class="py-3 px-4">{{$matricula->traslado}}</td>
                       <td class="py-3 px-4">{{$matricula->otros_documentos}}</td>
                       <td class="py-3 px-4">{{$matricula->fecha_solicitud}}</td>
                       <td class="py-3 px-4">{{$matricula->observaciones}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <form action="{{ route('matricula.destroy', $matricula->id_matricula) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Eliminar
        </button>
        <a href="{{ route('matricula.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver</a>
</form>
</div>


@endsection