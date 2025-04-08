<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de Gestión Educativa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header Section -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <div class="text-xl font-bold text-indigo-600">SGE</div>
                <div class="hidden sm:flex space-x-6">
                    <a href="#" class="text-gray-700 hover:text-indigo-600 transition">Inicio</a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 transition">Acerca de</a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600 transition">Contacto</a>
                </div>
            </div>
        </header>

        <!-- Main Content Section -->
        <main class="flex-grow flex items-center justify-center p-4 sm:p-6 md:p-8">
            <div class="max-w-6xl w-full bg-white rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row">
                <!-- Left Image Section -->
                <div class="bg-gradient-to-r from-indigo-700 to-blue-500 md:w-1/2 p-8 flex flex-col justify-center items-center text-white relative">
                    <div class="absolute inset-0 opacity-20 bg-pattern"></div>
                    <div class="relative z-10 text-center max-w-md">
                        <h1 class="text-3xl font-bold mb-4">Sistema de Gestión Educativa</h1>
                        <p class="text-lg opacity-90 mb-6">
                            Bienvenido a nuestra plataforma integral para la gestión educativa.
                            Administra cursos, estudiantes, docentes y más con nuestra interfaz intuitiva.
                        </p>
                    </div>
                </div>

                <!-- Right Form Section -->
                <div class="md:w-1/2 p-6 md:p-12">
                    <div class="max-w-md mx-auto">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-1">Bienvenido</h2>
                        <p class="text-gray-600 mb-8">Inicia sesión o regístrate para comenzar</p>

                        <!-- Form Tabs -->
                        <div class="border-b border-gray-200 mb-8">
                            <div class="flex -mb-px">
                                <button id="login-tab" class="px-4 py-3 text-center font-medium text-indigo-600 border-b-2 border-indigo-600 flex-1">
                                    Iniciar Sesión
                                </button>
                                <button id="register-tab" class="px-4 py-3 text-center font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 flex-1">
                                    Registrarse
                                </button>
                            </div>
                        </div>

                        <!-- Login Form -->
                        <div id="login-form" class="block">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                @if ($errors->any())
                                <div class="bg-red-50 text-red-700 p-4 rounded-md mb-6 border border-red-200">
                                    <ul class="list-disc pl-5">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="mb-6">
                                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Nombre de Usuario</label>
                                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                </div>


                                <div class="mb-6">
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                </div>

                                <div class="text-right mb-6">
                                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">¿Olvidaste tu contraseña?</a>
                                </div>

                                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                                    Iniciar Sesión
                                </button>
                            </form>
                        </div>



                        <!-- Register Form -->
                        <div id="register-form" class="hidden">
                            <form action="{{ route('register') }}" method="POST">
                                @csrf

                                <!-- Nombre -->
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('name')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Apellido Paterno -->
                                <div class="mb-4">
                                    <label for="apellido_paterno" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                                    <input type="text" name="apellido_paterno" id="apellido_paterno" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('apellido_paterno')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Apellido Materno -->
                                <div class="mb-4">
                                    <label for="apellido_materno" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                                    <input type="text" name="apellido_materno" id="apellido_materno" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('apellido_materno')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- DNI -->
                                <div class="mb-4">
                                    <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
                                    <input type="text" name="dni" id="dni" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('dni')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Correo -->
                                <div class="mb-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                                    <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('email')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Usuario -->
                                <div class="mb-4">
                                    <label for="username" class="block text-sm font-medium text-gray-700">Usuario</label>
                                    <input type="text" name="username" id="username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('username')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Contraseña -->
                                <div class="mb-4">
                                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('password')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirmar Contraseña -->
                                <div class="mb-4">
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('password_confirmation')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                                    Registrarse
                                </button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </main>

        <!-- Footer Section -->
        <footer class="bg-white border-t border-gray-200 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} Sistema de Gestión Educativa. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>

    <style>
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='140' height='140' viewBox='0 0 140 140' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.15' fill-rule='evenodd'%3E%3Ccircle cx='46' cy='70' r='2'/%3E%3Ccircle cx='93' cy='69' r='2'/%3E%3Ccircle cx='69' cy='93' r='2'/%3E%3Ccircle cx='69' cy='46' r='2'/%3E%3Ccircle cx='81' cy='58' r='2'/%3E%3Ccircle cx='58' cy='81' r='2'/%3E%3Ccircle cx='58' cy='58' r='2'/%3E%3Ccircle cx='81' cy='81' r='2'/%3E%3C/g%3E%3C/svg%3E");
            background-repeat: repeat;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');

            loginTab.addEventListener('click', function() {
                // Update tabs
                loginTab.classList.add('text-indigo-600', 'border-indigo-600');
                loginTab.classList.remove('text-gray-500', 'border-transparent');
                registerTab.classList.add('text-gray-500', 'border-transparent');
                registerTab.classList.remove('text-indigo-600', 'border-indigo-600');

                // Show/hide forms
                loginForm.classList.remove('hidden');
                loginForm.classList.add('block');
                registerForm.classList.add('hidden');
                registerForm.classList.remove('block');
            });

            registerTab.addEventListener('click', function() {
                // Update tabs
                registerTab.classList.add('text-indigo-600', 'border-indigo-600');
                registerTab.classList.remove('text-gray-500', 'border-transparent');
                loginTab.classList.add('text-gray-500', 'border-transparent');
                loginTab.classList.remove('text-indigo-600', 'border-indigo-600');

                // Show/hide forms
                registerForm.classList.remove('hidden');
                registerForm.classList.add('block');
                loginForm.classList.add('hidden');
                loginForm.classList.remove('block');
            });
        });
    </script>
</body>

</html>