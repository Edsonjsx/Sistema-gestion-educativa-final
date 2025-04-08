@extends('layouts.appdocente')

@section('content')

<div class="flex flex-col items-center justify-start min-h-screen bg-gray-100">
    <h1 class="text-center text-gray-800 text-2xl font-medium mt-8">Actualizar Docente</h1>

    <div class="flex justify-center mt-4 w-full">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 overflow-x-auto">
            <form action="{{ route('docente.modificado', $docente->id_docente)}}" method="POST" class="space-y-4" id="docenteForm">
                @csrf
                @method('PUT') {{-- O @method('PATCH') --}}
                
                <div id="errorMessages" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" style="display: none;">
                    <strong class="font-bold">¡Oops!</strong>
                    <span class="block sm:inline">Hubo algunos problemas con tu entrada.</span>
                    <ul class="list-disc list-inside mt-2" id="errorList"></ul>
                </div>

                <div>
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{$docente->nombre}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="apellido_paterno" class="block text-gray-700 text-sm font-bold mb-2">Apellido Paterno</label>
                    <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{$docente->apellido_paterno}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="apellido_materno" class="block text-gray-700 text-sm font-bold mb-2">Apellido Materno</label>
                    <input type="text" id="apellido_materno" name="apellido_materno" value="{{$docente->apellido_materno}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="dni" class="block text-gray-700 text-sm font-bold mb-2">DNI</label>
                    <input type="number" id="dni" name="dni" value="{{$docente->dni}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="id_curso" class="block text-gray-700 text-sm font-bold mb-2">Curso</label>
                    <select id="id_curso" name="id_curso" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        @foreach($curso as $cursos) 
                        <option value="{{ $cursos->id_curso }}" {{ $cursos->id_curso == $docente->id_curso ? 'selected' : '' }}>
                            {{ $cursos->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Actualizar
                    </button>
                    <a href="{{ route('docente.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('docenteForm').addEventListener('submit', function(event) {
        let nombre = document.getElementById('nombre').value;
        let apellidoPaterno = document.getElementById('apellido_paterno').value;
        let apellidoMaterno = document.getElementById('apellido_materno').value;
        let dni = document.getElementById('dni').value;
        let errorList = document.getElementById('errorList');
        let errorMessages = document.getElementById('errorMessages');
        let errors = [];

        errorList.innerHTML = ''; // Limpiar errores anteriores
        errorMessages.style.display = 'none';

        if (/\d/.test(nombre)) {
            errors.push('El Nombre no debe contener números.');
        }

        if (/\d/.test(apellidoPaterno)) {
            errors.push('El Apellido Paterno no debe contener números.');
        }

        if (/\d/.test(apellidoMaterno)) {
            errors.push('El Apellido Materno no debe contener números.');
        }

        if (dni.length !== 8) {
            errors.push('El DNI debe tener 8 dígitos.');
        }

        if (errors.length > 0) {
            event.preventDefault(); // Evitar que el formulario se envíe
            errors.forEach(error => {
                let li = document.createElement('li');
                li.textContent = error;
                errorList.appendChild(li);
            });
            errorMessages.style.display = 'block';
        }
    });
</script>
@endsection