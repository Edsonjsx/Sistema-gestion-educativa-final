@extends('layouts.appapoderado')

@section('content')
<div class="flex flex-col items-center justify-start min-h-screen bg-gray-100">
    <h1 class="text-center text-gray-800 text-2xl font-medium mt-8">Actualizar estudiante</h1>

    <div class="flex justify-center mt-4 w-full">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 overflow-x-auto">
            <form action="{{ route('estudiante.modificado', $estudiante->id_estudiante) }}" method="POST" id="estudianteForm">
                @csrf
                @method('PUT') {{-- O @method('PATCH') --}}

                <div id="errorMessages" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" style="display: none;">
                    <strong class="font-bold">¡Oops!</strong>
                    <span class="block sm:inline">Hubo algunos problemas con tu entrada.</span>
                    <ul class="list-disc list-inside mt-2" id="errorList"></ul>
                </div>

                <div>
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{ $estudiante->nombre }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="apellido_paterno" class="block text-gray-700 text-sm font-bold mb-2">Apellido Paterno</label>
                    <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ $estudiante->apellido_paterno }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="apellido_materno" class="block text-gray-700 text-sm font-bold mb-2">Apellido Materno</label>
                    <input type="text" id="apellido_materno" name="apellido_materno" value="{{ $estudiante->apellido_materno }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="dni" class="block text-gray-700 text-sm font-bold mb-2">DNI</label>
                    <input type="text" id="dni" name="dni" value="{{ $estudiante->dni }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Fecha Nacimiento</label>
                    <input type="date" id="fecha" name="fecha_nacimiento" value="{{ $estudiante->fecha_nacimiento }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="id_apoderado" class="block text-gray-700 text-sm font-bold mb-2">Nombre Apoderado</label>
                    <select id="id_apoderado" name="id_apoderado" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        @foreach($apoderado as $apoderados)
                            <option value="{{ $apoderados->id_apoderado }}" {{ $apoderados->id_apoderado == $estudiante->id_apoderado ? 'selected' : '' }}>
                                {{ $apoderados->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="id_grado" class="block text-gray-700 text-sm font-bold mb-2">Grado</label>
                    <select id="id_grado" name="id_grado" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        @foreach($grado as $grados)
                            <option value="{{ $grados->id_grado }}" {{ $grados->id_grado == $estudiante->id_grado ? 'selected' : '' }}>
                                {{ $grados->grado }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="id_seccion" class="block text-gray-700 text-sm font-bold mb-2">Sección</label>
                    <select id="id_seccion" name="id_seccion" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        @foreach($seccion as $secciones)
                            <option value="{{ $secciones->id_seccion }}" {{ $secciones->id_seccion == $estudiante->id_seccion ? 'selected' : '' }}>
                                {{ $secciones->seccion }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="flex space-x-4">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Actualizar
                    </button>
                    <a href="{{ route('estudiante.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('estudianteForm').addEventListener('submit', function(event) {
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

        if (!/^\d{8}$/.test(dni)) {
            errors.push('El DNI debe tener 8 dígitos numéricos.');
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