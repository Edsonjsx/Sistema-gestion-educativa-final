@extends('layouts.appcurso')

@section('content')

<div class="flex flex-col items-center justify-start min-h-screen bg-gray-100">
    <h1 class="text-center text-gray-800 text-2xl font-medium mt-8">Lista de Cursos</h1>

    <div class="flex justify-center mt-4 w-full">
        <div class="w-full max-w-7xl bg-white shadow-lg rounded-lg p-8">
            <table class="w-full border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-300 text-gray-700 uppercase text-sm leading-normal text-center">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Nombre</th>
                        <th class="py-3 px-4">Actualizar</th>
                        <th class="py-3 px-4">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $item)
                    <tr class="text-center text-gray-600 border-t">
                        <td class="py-3 px-4">{{ $item->id_curso }}</td>
                        <td class="py-3 px-4">{{ $item->nombre }}</td>
                        <td class="py-3 px-4">
                            <form action="{{ route('curso.actualizar', $item->id_curso) }}" method="GET">
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-3 rounded text-sm">
                                    Actualizar
                                </button>
                            </form>
                        </td>
                        <td class="py-3 px-4">
                            <form action="{{ route('curso.show', $item->id_curso) }}" method="GET">
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
        <a href="{{ route('curso.create')}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-3 px-5 rounded">Agregar un Curso</a>
        <a href="{{ route('home.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded">Volver</a>
    </p>
</div>

@endsection
