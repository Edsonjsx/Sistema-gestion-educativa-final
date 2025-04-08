@extends('layouts.appapoderado')

@section('content')

<div class="flex flex-col items-center justify-start min-h-screen bg-gray-100">
    <h1 class="text-center text-gray-800 text-2xl font-medium mt-8">Actualizar Matricula</h1>

    <div class="flex justify-center mt-4 w-full">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 overflow-x-auto">
            <form action="{{ route('matricula.modificado', $matricula->id_matricula)}}" method="POST" class="space-y-4" id="matriculaForm">
                @csrf
                @method('PUT') {{-- O @method('PATCH') --}}

                <div id="errorMessages" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" style="display: none;">
                    <strong class="font-bold">¡Oops!</strong>
                    <span class="block sm:inline">Hubo algunos problemas con tu entrada.</span>
                    <ul class="list-disc list-inside mt-2" id="errorList"></ul>
                </div>

                <div>
                    <label for="id_estudiante" class="block text-gray-700 text-sm font-bold mb-2">Estudiante</label>
                    <select id="id_estudiante" name="id_estudiante" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        @foreach($estudiante as $estudiantes) 
                        <option value="{{ $estudiantes->id_estudiante }}" {{ $estudiantes->id_estudiante == $matricula->id_estudiante ? 'selected' : '' }}>
                            {{ $estudiantes->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="fecha_matricula" class="block text-gray-700 text-sm font-bold mb-2">Fecha Matricula</label>
                    <input type="date" id="fecha_matricula" name="fecha_matricula" value="{{$matricula->fecha_matricula}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="estado_matricula" class="block text-gray-700 text-sm font-bold mb-2">Estado Matricula</label>
                    <select id="estado_matricula" name="estado_matricula" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        <option value="aprobado" {{ $matricula->estado_matricula == 'APROBADO' ? 'selected' : '' }}>Aprobado</option>
                        <option value="No aprobado" {{ $matricula->estado_matricula == 'NO APROBADO' ? 'selected' : '' }}>No aprobado</option>
                        <option value="En proceso" {{ $matricula->estado_matricula == 'EN PROCESO' ? 'selected' : '' }}>En proceso</option>
                    </select>
                </div>
                <div>
                    <label for="certificado_notas" class="block text-gray-700 text-sm font-bold mb-2">Certificado Notas</label>
                    <input type="text" id="certificado_notas" name="certificado_notas" value="{{$matricula->certificado_notas}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="traslado" class="block text-gray-700 text-sm font-bold mb-2">Traslado</label>
                    <select id="traslado" name="traslado" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        <option value="0" {{ $matricula->traslado == 0 ? 'selected' : '' }}>0</option>
                        <option value="1" {{ $matricula->traslado == 1 ? 'selected' : '' }}>1</option>
                    </select>
                </div>
                <div>
                    <label for="otros_documentos" class="block text-gray-700 text-sm font-bold mb-2">Otros Documentos</label>
                    <input type="text" id="otros_documentos" name="otros_documentos" value="{{$matricula->otros_documentos}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="fecha_solicitud" class="block text-gray-700 text-sm font-bold mb-2">Fecha Solicitud</label>
                    <input type="date" id="fecha_solicitud" name="fecha_solicitud" value="{{$matricula->fecha_solicitud}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="observaciones" class="block text-gray-700 text-sm font-bold mb-2">Observaciones</label>
                    <input type="text" id="observaciones" name="observaciones" value="{{$matricula->observaciones}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Actualizar
                    </button>
                    <a href="{{ route('matricula.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('matriculaForm').addEventListener('submit', function(event) {
        let otrosDocumentos = document.getElementById('otros_documentos').value;
        let observaciones = document.getElementById('observaciones').value;
        let errorList = document.getElementById('errorList');
        let errorMessages = document.getElementById('errorMessages');
        let errors = [];

        errorList.innerHTML = ''; // Limpiar errores anteriores
        errorMessages.style.display = 'none';

        if (/\d/.test(otrosDocumentos)) {
            errors.push('Otros Documentos no debe contener números.');
        }

        if (/\d/.test(observaciones)) {
            errors.push('Observaciones no debe contener números.');
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