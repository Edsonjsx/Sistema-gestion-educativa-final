@extends('layouts.appmatricula')

@section('content')
<div class="flex flex-col items-center justify-start min-h-screen bg-gray-100">
    <h1 class="text-center text-gray-800 text-2xl font-medium mt-8">Agregar Nueva Matricula</h1>

    <div class="flex justify-center mt-4 w-full">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 overflow-x-auto">
            <form action="{{ route('matricula.store') }}" method="POST" id="matriculaForm">
                @csrf

                <div id="errorMessages" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" style="display: none;">
                    <strong class="font-bold">¡Oops!</strong>
                    <span class="block sm:inline">Hubo algunos problemas con tu entrada.</span>
                    <ul class="list-disc list-inside mt-2" id="errorList"></ul>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Estudiante</label>
                    <select name="id_estudiante" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        <option value="">Seleccione un estudiante</option>
                        @foreach($estudiante as $estudiantes)
                            <option value="{{ $estudiantes->id_estudiante }}">{{ $estudiantes->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Certificado Notas</label>
                    <input type="text" name="certificado_notas" id="certificado_notas" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Traslado</label>
                    <select name="traslado" id="traslado" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        <option value="1">1</option>
                        <option value="0">0</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Otros Documentos</label>
                    <input type="text" name="otros_documentos" id="otros_documentos" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Fecha Solicitud</label>
                    <input type="date" name="fecha_solicitud" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Observaciones</label>
                    <input type="text" name="observaciones" id="observaciones" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                </div>
                <div class="flex space-x-4 mt-4">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Agregar
                    </button>
                    <a href="{{ route('matricula.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('matriculaForm').addEventListener('submit', function(event) {
        let certificadoNotas = document.getElementById('certificado_notas').value;
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