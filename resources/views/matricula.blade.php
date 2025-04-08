@extends('layouts.appmatricula')

@section('content')

<div class="flex flex-col items-center justify-start min-h-screen bg-gray-100">
    <h1 class="text-center text-gray-800 text-2xl font-medium mt-8">Lista de Matrículas</h1>

    <div class="flex justify-center mt-4 w-full">
        <div class="w-full bg-white shadow-lg rounded-lg p-8"> {{-- Eliminar max-w-7xl --}}
            <table class="w-full border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-300 text-gray-700 uppercase text-sm leading-normal text-center">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Estudiante</th>
                        <th class="py-3 px-4">Fecha Matricula</th>
                        <th class="py-3 px-4">Estado Matricula</th>
                        <th class="py-3 px-4">Certificado Notas</th>
                        <th class="py-3 px-4">Traslado</th>
                        <th class="py-3 px-4">Otros documentos</th>
                        <th class="py-3 px-4">Fecha_solicitud</th>
                        <th class="py-3 px-4">Observaciones</th>
                        <th class="py-3 px-4">Actualizar</th>
                        <th class="py-3 px-4">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $item)
                    <tr class="text-center text-gray-600 border-t">
                        <td class="py-3 px-4">{{ $item->id_matricula }}</td>
                        <td class="py-3 px-4">{{ $item->estudiante->nombre }}</td>
                        <td class="py-3 px-2">{{ $item->fecha_matricula }}</td>
                        <td class="py-3 px-4">{{ $item->estado_matricula }}</td>
                        <td class="py-3 px-4">{{ $item->certificado_notas }}</td>
                        <td class="py-3 px-4">{{ $item->traslado}}</td>
                        <td class="py-3 px-4">{{ $item->otros_documentos }}</td>
                        <td class="py-3 px-4">{{ $item->fecha_solicitud }}</td>
                        <td class="py-3 px-4 text-left">{{ $item->observaciones }}</td>
                        <td class="py-3 px-4">
                            <form action="{{ route('matricula.actualizar', $item->id_matricula) }}" method="GET">
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-3 rounded text-sm">
                                    Actualizar
                                </button>
                            </form>
                        </td>
                        <td class="py-3 px-4">
                            <form action="{{ route('matricula.show', $item->id_matricula) }}" method="GET">
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded text-sm">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <p class="flex space-x-4">
        <a href="{{ route('matricula.create')}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-3 px-5 rounded">Agregar una matricula</a>
        <a href="{{ route('home.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded">Volver</a>
    </p>
</div>

@endsection